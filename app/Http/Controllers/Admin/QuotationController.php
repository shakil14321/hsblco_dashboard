<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Admin\QuotationRepository;
use App\Http\Requests\Admin\QuotationEstimateRequest;
use App\Mail\QuotationEstimateMail;
use App\Models\Quotation;
use App\Models\QuotationEstimate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    protected $quotationRepository;

    public function __construct(QuotationRepository $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }

    public function index()
    {
        $quotations = $this->quotationRepository->getAll();

        return view('admin.quotations.index', compact('quotations'));
    }

    public function show($id)
    {
        $quotation = $this->quotationRepository->markAsSeen($id);

        return view('admin.quotations.show', compact('quotation'));
    }

    public function destroy($id)
    {
        $this->quotationRepository->delete($id);

        return redirect()
            ->route('admin.quotations.index')
            ->with('success', 'Quotation deleted successfully');
    }


    public function sendMailForm($id)
    {
        $quotation = Quotation::with('service')->findOrFail($id);

        return view('admin.quotations.send-mail', compact('quotation'));
    }

    public function sendMail(QuotationEstimateRequest $request, $id)
    {
        $quotation = Quotation::with('service')->findOrFail($id);

        $data = $request->validated();

        $serviceCharge = $data['service_charge'] ?? 0;
        $domainCharge  = $data['domain_charge'] ?? 0;
        $hostingCharge = $data['hosting_charge'] ?? 0;
        $yearlyCharge  = $data['yearly_charge'] ?? 0;
        $monthlyCharge = $data['monthly_charge'] ?? 0;
        $discount      = $data['discount'] ?? 0;

        $total = (
                $serviceCharge +
                $domainCharge +
                $hostingCharge +
                $yearlyCharge +
                $monthlyCharge
            ) - $discount;

        $estimate = QuotationEstimate::create([
            'quotation_id'    => $quotation->id,
            'service_charge' => $serviceCharge,
            'domain_charge'  => $domainCharge,
            'hosting_charge' => $hostingCharge,
            'yearly_charge'  => $yearlyCharge,
            'monthly_charge' => $monthlyCharge,
            'discount'       => $discount,
            'total'          => $total,
            'note'           => $data['note'] ?? null,
            'sent_at'        => now(),
        ]);

        Mail::to($quotation->email)->send(new QuotationEstimateMail($estimate));

        return redirect()
            ->route('admin.quotations.index')
            ->with('success', 'Quotation mail sent successfully.');
    }

    public function estimatePdf($id)
    {
        $estimate = QuotationEstimate::with('quotation.service')->findOrFail($id);

        $pdf = Pdf::loadView('admin.quotations.estimate-pdf', compact('estimate'))
            ->setPaper('a4');

        return $pdf->stream('quotation-estimate.pdf');
    }
}

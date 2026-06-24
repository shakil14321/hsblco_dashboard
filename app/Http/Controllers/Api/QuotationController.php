<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuotationRequest;
use App\Repository\Admin\QuotationRepository;

class QuotationController extends Controller
{
    protected $quotationRepository;

    public function __construct(QuotationRepository $quotationRepository)
    {
        $this->quotationRepository = $quotationRepository;
    }

    public function store(QuotationRequest $request)
    {
        $quotation = $this->quotationRepository->store(
            $request->validated()
        );

        return response()->json([
            'message' => 'Quotation submitted successfully',

        ], 201);
    }
}

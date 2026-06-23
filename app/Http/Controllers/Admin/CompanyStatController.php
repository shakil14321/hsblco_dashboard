<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyStatRequest;
use App\Models\CompanyStat;
use App\Repository\Admin\CompanyStatRepository;

class CompanyStatController extends Controller
{
    public function __construct(
        protected CompanyStatRepository $companyStatRepository
    ) {}

    public function index()
    {
        $stats = $this->companyStatRepository->all();

        return view('admin.company-stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.company-stats.create');
    }

    public function store(CompanyStatRequest $request)
    {
//        dd($request->validated());
        $this->companyStatRepository->store(
            $request->validated()
        );

        return redirect()
            ->route('admin.company-stats.index')
            ->with('success', 'Company Stat created successfully.');
    }

    public function edit(CompanyStat $companyStat)
    {
        return view('admin.company-stats.edit', compact('companyStat'));
    }

    public function update(
        CompanyStatRequest $request,
        CompanyStat $companyStat
    ) {
        $this->companyStatRepository->update(
            $companyStat,
            $request->validated()
        );

        return redirect()
            ->route('admin.company-stats.index')
            ->with('success', 'Company Stat updated successfully.');
    }

    public function destroy(CompanyStat $companyStat)
    {
        $this->companyStatRepository->delete($companyStat);

        return back()->with('success', 'Company Stat deleted successfully.');
    }
}

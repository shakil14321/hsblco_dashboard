<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\FaqRepository;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct(
        protected FaqRepository $faqRepository
    ) {}

    public function index()
    {
        $faqs = $this->faqRepository->all();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(FaqRequest $request)
    {
        $this->faqRepository->store(
            $request->validated()
        );

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(FaqRequest $request, Faq $faq)
    {
        $this->faqRepository->update(
            $faq,
            $request->validated()
        );

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function show(Faq $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    public function destroy(Faq $faq)
    {
        $this->faqRepository->delete($faq);

        return back()->with('success', 'FAQ deleted successfully.');
    }
}

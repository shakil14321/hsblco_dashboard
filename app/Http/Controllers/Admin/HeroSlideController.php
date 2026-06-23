<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroSlideRequest;
use App\Models\HeroSlide;
use App\Repository\Admin\HeroSlideRepository;

class HeroSlideController extends Controller
{
    public function __construct(
        protected HeroSlideRepository $heroSlideRepository
    ) {}

    public function index()
    {
        $slides = $this->heroSlideRepository->all();

        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store(HeroSlideRequest $request)
    {
        $this->heroSlideRepository->store(
            $request->validated()
        );

        return redirect()
            ->route('admin.hero-slides.index')
            ->with('success', 'Hero Slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero-slides.edit', compact('heroSlide'));
    }

    public function update(HeroSlideRequest $request, HeroSlide $heroSlide)
    {
        $this->heroSlideRepository->update(
            $heroSlide,
            $request->validated()
        );

        return redirect()
            ->route('admin.hero-slides.index')
            ->with('success', 'Hero Slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $this->heroSlideRepository->delete($heroSlide);

        return back()->with('success', 'Hero Slide deleted successfully.');
    }
}

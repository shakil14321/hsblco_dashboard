<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroFeatureRequest;
use App\Models\HeroFeature;
use App\Repository\Admin\HeroFeatureRepository;

class HeroFeatureController extends Controller
{
    public function __construct(
        protected HeroFeatureRepository $heroFeatureRepository
    ) {}

    public function index()
    {
        $features = $this->heroFeatureRepository->all();

        return view('admin.hero-features.index', compact('features'));
    }

    public function create()
    {
        $slides = $this->heroFeatureRepository->slides();

        return view('admin.hero-features.create', compact('slides'));
    }

    public function store(HeroFeatureRequest $request)
    {
        $this->heroFeatureRepository->store($request->validated());

        return redirect()
            ->route('admin.hero-features.index')
            ->with('success', 'Hero Feature created successfully.');
    }

    public function edit(HeroFeature $heroFeature)
    {
        $slides = $this->heroFeatureRepository->slides();

        return view('admin.hero-features.edit', compact('heroFeature', 'slides'));
    }

    public function update(HeroFeatureRequest $request, HeroFeature $heroFeature)
    {
        $this->heroFeatureRepository->update($heroFeature, $request->validated());

        return redirect()
            ->route('admin.hero-features.index')
            ->with('success', 'Hero Feature updated successfully.');
    }

    public function destroy(HeroFeature $heroFeature)
    {
        $this->heroFeatureRepository->delete($heroFeature);

        return back()->with('success', 'Hero Feature deleted successfully.');
    }
}

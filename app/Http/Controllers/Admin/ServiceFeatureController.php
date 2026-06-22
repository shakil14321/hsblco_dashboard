<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\ServiceFeatureRepository;
use App\Http\Requests\Admin\ServiceFeatureRequest;
use App\Models\ServiceFeature;

class ServiceFeatureController extends Controller
{
    public function __construct(
        protected ServiceFeatureRepository $serviceFeatureRepository
    ) {}

    public function index()
    {
        $features = $this->serviceFeatureRepository->all();

        return view('admin.service-features.index', compact('features'));
    }

    public function create()
    {
        $services = $this->serviceFeatureRepository->services();

        return view('admin.service-features.create', compact('services'));
    }

    public function store(ServiceFeatureRequest $request)
    {
        $this->serviceFeatureRepository->store($request->validated());

        return redirect()
            ->route('admin.service-features.index')
            ->with('success', 'Service Feature created successfully.');
    }

    public function show(ServiceFeature $serviceFeature)
    {
        return view('admin.service-features.show', compact('serviceFeature'));
    }

    public function edit(ServiceFeature $serviceFeature)
    {
        $services = $this->serviceFeatureRepository->services();

        return view('admin.service-features.edit', compact('serviceFeature', 'services'));
    }

    public function update(ServiceFeatureRequest $request, ServiceFeature $serviceFeature)
    {
        $this->serviceFeatureRepository->update($serviceFeature, $request->validated());

        return redirect()
            ->route('admin.service-features.index')
            ->with('success', 'Service Feature updated successfully.');
    }

    public function destroy(ServiceFeature $serviceFeature)
    {
        $this->serviceFeatureRepository->delete($serviceFeature);

        return redirect()
            ->route('admin.service-features.index')
            ->with('success', 'Service Feature deleted successfully.');
    }
}

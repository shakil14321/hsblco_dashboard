<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\ServiceRepository;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function __construct(
        protected ServiceRepository $serviceRepository
    ) {}

    public function index()
    {
        $services = $this->serviceRepository->all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(ServiceRequest $request)
    {
        $this->serviceRepository->store(
            $request->validated()
        );

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(
        ServiceRequest $request,
        Service $service
    )
    {
        $this->serviceRepository->update(
            $service,
            $request->validated()
        );

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $this->serviceRepository->delete($service);

        return back()->with(
            'success',
            'Service deleted successfully.'
        );
    }
}

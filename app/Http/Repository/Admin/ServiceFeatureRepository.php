<?php

namespace App\Http\Repository\Admin;

use App\Models\Service;
use App\Models\ServiceFeature;

class ServiceFeatureRepository
{
    public function all()
    {
        return ServiceFeature::with('service')
            ->orderBy('position')
            ->latest()
            ->get();
    }

    public function services()
    {
        return Service::where('status', 1)
            ->orderBy('position')
            ->get();
    }

    public function store(array $data)
    {
        return ServiceFeature::create($data);
    }

    public function update(ServiceFeature $serviceFeature, array $data)
    {
        return $serviceFeature->update($data);
    }

    public function delete(ServiceFeature $serviceFeature)
    {
        return $serviceFeature->delete();
    }
}

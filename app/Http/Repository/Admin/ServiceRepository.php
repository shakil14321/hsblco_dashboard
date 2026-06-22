<?php

namespace App\Http\Repository\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceRepository
{
    public function all()
    {
        return Service::orderBy('position')
            ->latest()
            ->get();
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('services', 'public');
        }

        return Service::create($data);
    }

    public function update(Service $service, array $data)
    {
        if (isset($data['image'])) {

            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $data['image']->store('services', 'public');
        }

        return $service->update($data);
    }

    public function delete(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        return $service->delete();
    }
}

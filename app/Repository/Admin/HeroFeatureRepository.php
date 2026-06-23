<?php

namespace App\Repository\Admin;

use App\Models\HeroFeature;
use App\Models\HeroSlide;

class HeroFeatureRepository
{
    public function all()
    {
        return HeroFeature::with('heroSlide')
            ->orderBy('position')
            ->latest()
            ->get();
    }

    public function slides()
    {
        return HeroSlide::where('status', 1)
            ->orderBy('position')
            ->get();
    }

    public function store(array $data)
    {
        return HeroFeature::create($data);
    }

    public function update(HeroFeature $heroFeature, array $data)
    {
        return $heroFeature->update($data);
    }

    public function delete(HeroFeature $heroFeature)
    {
        return $heroFeature->delete();
    }
}

<?php

namespace App\Http\Repository\Admin;

use App\Models\HeroSlide;
use Illuminate\Support\Facades\Storage;

class HeroSlideRepository
{
    public function all()
    {
        return HeroSlide::latest()->get();
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('hero-slides', 'public');
        }

        return HeroSlide::create($data);
    }

    public function update(HeroSlide $heroSlide, array $data)
    {
        if (isset($data['image'])) {

            if ($heroSlide->image) {
                Storage::disk('public')->delete($heroSlide->image);
            }

            $data['image'] = $data['image']->store('hero-slides', 'public');
        }

        return $heroSlide->update($data);
    }

    public function delete(HeroSlide $heroSlide)
    {
        if ($heroSlide->image) {
            Storage::disk('public')->delete($heroSlide->image);
        }

        return $heroSlide->delete();
    }
}

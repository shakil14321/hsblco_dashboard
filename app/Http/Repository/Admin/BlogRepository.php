<?php

namespace App\Http\Repository\Admin;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogRepository
{
    public function all()
    {
        return Blog::latest()->get();
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('blogs', 'public');
        }

        return Blog::create($data);
    }

    public function update(Blog $blog, array $data)
    {
        if (isset($data['image'])) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $data['image'] = $data['image']->store('blogs', 'public');
        }

        return $blog->update($data);
    }

    public function delete(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        return $blog->delete();
    }
}

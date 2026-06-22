<?php

namespace App\Http\Repository\Admin;

use App\Models\Faq;

class FaqRepository
{
    public function all()
    {
        return Faq::orderBy('position')
            ->latest()
            ->get();
    }

    public function store(array $data)
    {
        return Faq::create($data);
    }

    public function update(Faq $faq, array $data)
    {
        return $faq->update($data);
    }

    public function delete(Faq $faq)
    {
        return $faq->delete();
    }
}

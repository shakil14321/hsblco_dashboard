<?php

namespace App\Repository\Admin;

use App\Models\Quotation;

class QuotationRepository
{
    public function getAll()
    {
        return Quotation::with('service')
            ->latest()
            ->paginate(20);
    }

    public function store(array $data)
    {
        return Quotation::create($data);
    }

    public function find($id)
    {
        return Quotation::with('service')->findOrFail($id);
    }

    public function markAsSeen($id)
    {
        $quotation = $this->find($id);

        $quotation->update([
            'status' => 1,
        ]);

        return $quotation;
    }

    public function delete($id)
    {
        $quotation = $this->find($id);

        return $quotation->delete();
    }
}

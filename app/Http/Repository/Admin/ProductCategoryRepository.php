<?php

namespace App\Http\Repository\Admin;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;

class ProductCategoryRepository
{
    public function all()
    {
        return ProductCategory::orderBy('position')->latest()->get();
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('product-categories', 'public');
        }

        return ProductCategory::create($data);
    }

    public function update(ProductCategory $productCategory, array $data)
    {
        if (isset($data['image'])) {
            if ($productCategory->image) {
                Storage::disk('public')->delete($productCategory->image);
            }

            $data['image'] = $data['image']->store('product-categories', 'public');
        }

        return $productCategory->update($data);
    }

    public function delete(ProductCategory $productCategory)
    {
        if ($productCategory->image) {
            Storage::disk('public')->delete($productCategory->image);
        }

        return $productCategory->delete();
    }
}

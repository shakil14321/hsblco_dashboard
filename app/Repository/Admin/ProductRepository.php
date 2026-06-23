<?php

namespace App\Repository\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
    public function all()
    {
        return Product::with('category')->latest()->get();
    }

    public function categories()
    {
        return ProductCategory::where('status', 1)
            ->orderBy('position')
            ->get();
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('products', 'public');
        }

        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        if (isset($data['image'])) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $data['image']->store('products', 'public');
        }

        return $product->update($data);
    }

    public function delete(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        return $product->delete();
    }
}

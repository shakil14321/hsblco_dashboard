<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Repository\Admin\ProductRepository;

class ProductController extends Controller
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    public function index()
    {
        $products = $this->productRepository->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->productRepository->categories();

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->productRepository->store(
            $request->validated()
        );

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = $this->productRepository->categories();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }

    public function update(
        ProductRequest $request,
        Product $product
    )
    {
        $this->productRepository->update(
            $product,
            $request->validated()
        );

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $this->productRepository->delete($product);

        return back()->with(
            'success',
            'Product deleted successfully.'
        );
    }
}

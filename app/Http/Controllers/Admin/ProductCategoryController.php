<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\Admin\ProductCategoryRepository;
use App\Http\Requests\Admin\ProductCategoryRequest;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function __construct(
        protected ProductCategoryRepository $productCategoryRepository
    ) {}

    public function index()
    {
        $categories = $this->productCategoryRepository->all();

        return view('admin.product-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.product-categories.create');
    }

    public function store(ProductCategoryRequest $request)
    {
        $this->productCategoryRepository->store($request->validated());

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Product Category created successfully.');
    }

    public function show(ProductCategory $productCategory)
    {
        return view('admin.product-categories.show', compact('productCategory'));
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product-categories.edit', compact('productCategory'));
    }

    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $this->productCategoryRepository->update($productCategory, $request->validated());

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Product Category updated successfully.');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $this->productCategoryRepository->delete($productCategory);

        return back()->with('success', 'Product Category deleted successfully.');
    }
}

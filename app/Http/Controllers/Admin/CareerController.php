<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerRequest;
use App\Models\Career;
use App\Repository\Admin\CareerRepository;

class CareerController extends Controller
{
    public function __construct(
        protected CareerRepository $careerRepository
    ) {}

    public function index()
    {
        $careers = $this->careerRepository->all();

        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(CareerRequest $request)
    {
        $this->careerRepository->store($request->validated());

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Career created successfully.');
    }

    public function show(Career $career)
    {
        return view('admin.careers.show', compact('career'));
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(CareerRequest $request, Career $career)
    {
        $this->careerRepository->update($career, $request->validated());

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Career updated successfully.');
    }

    public function destroy(Career $career)
    {
        $this->careerRepository->delete($career);

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Career deleted successfully.');
    }
}

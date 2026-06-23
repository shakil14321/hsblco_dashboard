<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Menu;
use App\Repository\Admin\MenuRepository;

class MenuController extends Controller
{
    public function __construct(
        protected MenuRepository $menuRepository
    ) {}

    public function index()
    {
        $menus = $this->menuRepository->all();

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $parents = $this->menuRepository->parents();

        return view('admin.menus.create', compact('parents'));
    }

    public function store(MenuRequest $request)
    {
        $this->menuRepository->store($request->validated());

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        $parents = $this->menuRepository->parents()
            ->where('id', '!=', $menu->id);

        return view('admin.menus.edit', compact('menu', 'parents'));
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $this->menuRepository->update($menu, $request->validated());

        return redirect()
            ->route('admin.menus.index')
            ->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $this->menuRepository->delete($menu);

        return back()->with('success', 'Menu deleted successfully.');
    }
}

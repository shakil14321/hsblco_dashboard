<?php

namespace App\Http\Repository\Admin;

use App\Models\Menu;

class MenuRepository
{
    public function all()
    {
        return Menu::with('parent')
            ->orderBy('position')
            ->latest()
            ->get();
    }

    public function parents()
    {
        return Menu::whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('position')
            ->get();
    }

    public function store(array $data)
    {
        return Menu::create($data);
    }

    public function update(Menu $menu, array $data)
    {
        return $menu->update($data);
    }

    public function delete(Menu $menu)
    {
        return $menu->delete();
    }
}

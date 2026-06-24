<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)
            ->orderBy('position')
            ->select('id', 'title')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $services,
        ]);
    }
}

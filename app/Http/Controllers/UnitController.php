<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(): View
    {
        return view('unit.index');
    }

    public function getData(Request $request): View
    {
        $units = Unit::query()
            ->where('deleted', false)
            ->where('name', 'like', "%{$request->input('search')}%")
            ->orderBy('name')
            ->get();

        return view('unit._index', [
            'units' => $units,
        ]);
    }
}

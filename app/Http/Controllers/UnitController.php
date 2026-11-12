<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(Request $request): View
    {
        if (! $request->ajax()) {
            return view('unit.index');
        }

        $units = Unit::query()
            ->where('deleted', false)
            ->orderBy('name')
            ->get();

        return view('unit._index', [
            'units' => $units,
        ]);
    }
}

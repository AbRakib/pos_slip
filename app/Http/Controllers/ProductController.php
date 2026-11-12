<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        if (! $request->ajax()) {
            return view('product.index');
        }

        $products = Product::query()
            ->where('deleted', false)
            ->orderBy('name')
            ->get();

        return view('product._index', [
            'products' => $products,
        ]);
    }
}

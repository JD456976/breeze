<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Products/Index',[
            'products' => ProductResource::collection(Product::all()->sortByDesc('created_at'))
        ]);
    }
}

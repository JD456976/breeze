<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Color;
use App\Models\Files;
use App\Models\Product;
use App\Models\Scent;
use App\Models\Tin;
use Inertia\Inertia;

class ProductsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Products/Index', [
            'products' => ProductResource::collection(Product::all()
                ->sortByDesc('created_at'))
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Products/Create', [
            'colors' => Color::all(),
            'scents' => Scent::all(),
            'tins' => Tin::all()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->tin_id = $request->tin;
        $product->color_id = $request->color;
        $product->scent_id = $request->scent;
        $product->cost = $request->cost;

        $product->save();

        $images = Files::getImages();

        foreach ($images as $image) {
            $product->addMediaFromDisk($image->filepath)->toMediaCollection('products');
        }

        Files::deleteImages();

        return to_route('admin.products.index')->with('success', $product->name . ' added successfully');
    }

    public function edit(Product $product)
    {
        return Inertia::render('Admin/Products/Edit', [
            'product' => $product,
            'tins' => Tin::all(),
            'colors' => Color::all(),
            'scents' => Scent::all(),
            'media' => $product->getMedia('products')->pluck('original_url'),
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->tin_id = $request->tin;
        $product->color_id = $request->color;
        $product->scent_id = $request->scent;

        $product->update();

        $product->clearMediaCollection('products');

        $images = Files::getImages();

        foreach ($images as $image) {
            $product->addMediaFromDisk($image->filepath)->toMediaCollection('products');
        }

        Files::deleteImages();

        return to_route('admin.products.index')->with('success', $product->name . ' updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('admin.products.index')->with('warning', $product->name . ' deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Http\Resources\ColorResource;
use App\Models\Color;
use App\Models\Files;
use Inertia\Inertia;

class ColorsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Colors/Index', [
            'colors' => ColorResource::collection(Color::all()
                ->sortByDesc('created_at'))
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Colors/Create');
    }

    public function store(ColorRequest $request)
    {
        $color = new Color();

        $color->name = $request->name;

        $color->save();

        $images = Files::getImages();

        foreach ($images as $image) {
            $color->addMediaFromDisk($image->filepath)->toMediaCollection('colors');
        }

        Files::deleteImages();

        return to_route('admin.colors.index')->with('success', $color->name . ' added successfully');
    }

    public function edit(Color $color)
    {
        return Inertia::render('Admin/Colors/Edit', [
            'color' => $color,
            'media' => $color->getMedia('colors')->pluck('original_url'),
        ]);
    }

    public function update(ColorRequest $request, Color $color)
    {
        $color->name = $request->name;

        $color->update();

        $color->clearMediaCollection('colors');

        $images = Files::getImages();

        foreach ($images as $image) {
            $color->addMediaFromDisk($image->filepath)->toMediaCollection('colors');
        }

        Files::deleteImages();

        return to_route('admin.colors.index')->with('success', $color->name . ' updated successfully');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        return to_route('admin.colors.index')->with('warning', $color->name . ' deleted successfully');
    }
}

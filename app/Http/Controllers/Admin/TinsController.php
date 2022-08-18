<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TinRequest;
use App\Http\Resources\TinResource;
use App\Models\Color;
use App\Models\Files;
use App\Models\Size;
use App\Models\Tin;
use Inertia\Inertia;

class TinsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Tins/Index', [
            'tins' => TinResource::collection(Tin::all()
                ->sortByDesc('created_at'))
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Tins/Create', [
            'colors' => Color::all(),
            'sizes' => Size::all()
        ]);
    }

    public function store(TinRequest $request)
    {
        $tin = new Tin();

        $tin->name = $request->name;

        $tin->save();

        $images = Files::getImages();

        foreach ($images as $image) {
            $tin->addMediaFromDisk($image->filepath)->toMediaCollection('tins');
        }

        Files::deleteImages();

        return to_route('admin.tins.index')->with('success', $tin->name.  ' added successfully');
    }

    public function edit(Tin $tin)
    {
        return Inertia::render('Admin/Tins/Edit', [
            'tin' => $tin,
            'media' => $tin->getMedia('tins')->pluck('original_url'),
        ]);
    }

    public function update(TinRequest $request, Tin $tin)
    {
        $tin->name = $request->name;

        $tin->update();

        $tin->clearMediaCollection('tins');

        $images = Files::getImages();

        foreach ($images as $image) {
            $tin->addMediaFromDisk($image->filepath)->toMediaCollection('tins');
        }

        Files::deleteImages();

        return to_route('admin.tins.index')->with('success', $tin->name . ' updated successfully');
    }

    public function destroy(Tin $tin)
    {
        $tin->delete();

        return to_route('admin.tins.index')->with('warning', $tin->name . ' deleted successfully');
    }
}

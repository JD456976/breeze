<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SizeRequest;
use App\Http\Resources\SizeResource;
use App\Models\Size;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SizesController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Sizes/Index', [
            'sizes' => SizeResource::collection(Size::all()
                ->sortByDesc('created_at'))
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Sizes/Create');
    }

    public function store(SizeRequest $request)
    {
        $size = new Size();

        $size->size = $request->size;

        $size->save();

        return to_route('admin.sizes.index')->with('success', $size->size . ' added successfully');
    }

    public function edit(Size $size)
    {
        return Inertia::render('Admin/Sizes/Edit', [
            'size' => $size
        ]);
    }

    public function update(SizeRequest $request, Size $size)
    {
        $size->size = $request->size;

        $size->update();

        return to_route('admin.sizes.index')->with('success', $size->name . ' updated successfully');
    }

    public function destroy(Size $size)
    {
        $size->delete();

        return to_route('admin.scents.index')->with('warning', $size->size . ' deleted successfully');
    }
}

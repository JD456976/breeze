<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScentRequest;
use App\Http\Resources\ScentResource;
use App\Models\Scent;
use App\Models\Size;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScentsController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Scents/Index', [
            'scents' => ScentResource::collection(Scent::all()
                ->sortByDesc('created_at'))
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Scents/Create');
    }

    public function store(ScentRequest $request)
    {
        $size = new Scent();

        $size->name = $request->name;

        $size->save();

        return to_route('admin.scents.index')->with('success', $size->name . ' added successfully');
    }

    public function edit(Scent $scent)
    {
        return Inertia::render('Admin/Scents/Edit', [
            'scent' => $scent
        ]);
    }

    public function update(ScentRequest $request, Scent $scent)
    {
        $scent->name = $request->name;

        $scent->update();

        return to_route('admin.scents.index')->with('success', $scent->name . ' updated successfully');
    }

    public function destroy(Scent $scent)
    {
        $scent->delete();

        return to_route('admin.scents.index')->with('warning', $scent->name . ' deleted successfully');
    }
}

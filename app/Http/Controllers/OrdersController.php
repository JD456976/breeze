<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\ColorResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ScentResource;
use App\Http\Resources\TinResource;
use App\Models\Color;
use App\Models\Order;
use App\Models\Scent;
use App\Models\Tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrdersController extends Controller
{
    public function index()
    {
        return Inertia::render('Orders/Index',[
            'orders' => OrderResource::collection(Order::where('user_id', Auth::id())->get()
                ->sortByDesc('created_at')),
        ]);
    }

    public function create()
    {
        return Inertia::render('Orders/Create',[
            'colors' => ColorResource::collection(Color::all()),
            'scents' => ScentResource::collection(Scent::all()),
            'tins' => TinResource::collection(Tin::all())
        ]);
    }

    public function store(OrderStoreRequest $request)
    {
    }

    public function show(Order $order)
    {
        return Inertia::render('Orders/Show',[
            'order' => new OrderResource(Order::find($order)->first())
        ]);
    }

    public function edit(Order $order)
    {
    }

    public function update(Request $request, Order $order)
    {
    }

    public function destroy(Order $order)
    {
    }
}

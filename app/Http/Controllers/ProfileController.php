<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(User $user)
    {

    }

    public function edit($slug)
    {
        return Inertia::render('Profile/Edit',[
            'user' => new UserResource(Auth::user()),
            'media' => Auth::user()->getMedia('avatars')->pluck('original_url'),
        ]);
    }

    public function update(ProfileUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->country = $request->country;

        $user->update();

        return redirect()->back()->with('success', 'Profile Updated Successfully!');
    }

    public function destroy(User $user)
    {
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $editing = false;

        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'editing', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        $editing = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.edit', compact('user', 'editing', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        // if (auth()->id() !== $user->id) {
        //     abort(404);
        // }
        Gate::authorize('update', $user);

        $validate = request()->validate([
            'name' =>'required|min:3',
            'bio' =>'required|min:3',
            'image' =>'image'
        ]);

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validate['image'] = $imagePath;
        }

        $user->update($validate);
        return redirect('profile');
    }

    public function profile(User $user)
    {
        return $this->show(auth()->user());
    }
}

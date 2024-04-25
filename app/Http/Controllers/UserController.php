<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $editing = true;
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'editing', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        if (auth()->id() !== $user->id) {
            abort(404);
        }

        $editing = false;
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'editing','ideas'));
    }
}

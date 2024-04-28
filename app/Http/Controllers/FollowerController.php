<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{
    public function follow(User $user){
        $followers = auth()->user();
        $followers->followings()->attach($user);
        return redirect()->route('users.show', $user)->with('success', 'Followed successfully!');
    }

    public function unfollow(User $user){
        $followers = auth()->user();
        $followers->followings()->detach($user);
        return redirect()->route('users.show', $user)->with('success', 'Unfollowed successfully!');
    }
}

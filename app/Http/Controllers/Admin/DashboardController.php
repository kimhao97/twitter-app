<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Comment;
use App\Models\Idea;

class DashboardController extends Controller
{
    public function index() {
        $totalUser = User::count();
        $totalIdea = Idea::count();
        $totalComment = Comment::count();
        return view('admin.dashboard', compact('totalIdea', 'totalUser', 'totalComment'));
    }
}

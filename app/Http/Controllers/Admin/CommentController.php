<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::latest()->paginate(5);

        return view('admin.comments.index', compact('comments'));
    }
}

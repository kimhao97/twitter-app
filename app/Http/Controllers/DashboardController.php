<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // $idea = new Idea([
        //     'content' =>'TEST 02',
        //     'likes'=>"55"
        // ]);
        // $idea->save();
        $ideas = Idea::with('user:id,name,image', 'comments.user:id,name,image')->orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $ideas = $ideas->search(request('search', ''));
            dump($ideas->count());
        }

        // $ideas = Idea::when(request()->has('search'), function ($query){
        //     $query->search(request('search', ''));
        // })->orderBy('created_at', 'DESC')->paginate(5);

        return view('dashboard', [
            'user' => auth()->user(),
            'ideas' => $ideas->paginate(5)
        ]);

        // $users = [
        //     [
        //         'name' => 'John',
        //         'age' =>'30',
        //     ],
        //     [
        //         'name' => 'Kevin',
        //         'age' =>'55',
        //     ]
        // ];
        // return view('dashboard',
        // [
        //     'users' => $users
        // ]
        // );
    }
}

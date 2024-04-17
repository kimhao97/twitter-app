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

        dump(Idea::all());

        return view('dashboard', [
            'ideas' => Idea::orderBy('created_at', 'DESC')->paginate(5),
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

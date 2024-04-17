<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{

    public function show(Idea $idea) {
        return view('ideas.show', compact('idea'));
    }
    public function store() {
        // dump(request()->get('idea', ''));

        request()->validate([
            'idea' =>'required|min:3|max:240',
        ]);

        $idea = new Idea([
            'content' => request()->get('idea', '')
        ]);
        $idea->save();
        return redirect()->route('dashboard')->with('success','Idea created successfully');
    }

    public function destroy(Idea $idea) {
        // $idea = Idea::where('id', $id)->first()->delete();
        $idea->delete();

        return redirect()->route('dashboard')->with('success','Idea deleted successfully');
    }
}

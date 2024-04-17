<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{

    public function show(Idea $idea) {
        $editing = false;
        return view('ideas.show', compact('idea', 'editing'));
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

    public function edit(Idea $idea) {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea) {
        request()->validate([
            'content' =>'required|min:3|max:240',
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();
        return view('ideas.show', compact('idea'))->with('success','Idea updated successfully');
    }
}

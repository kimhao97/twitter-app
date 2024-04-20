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
        $validate = request()->validate([
            'content' =>'required|min:3|max:240',
        ]);
        $validate['user_id'] = auth()->id();
        Idea::create($validate);
        return redirect()->route('dashboard')->with('success','Idea created successfully');
    }

    public function destroy(Idea $idea) {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
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

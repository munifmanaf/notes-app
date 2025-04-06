<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', session('user.id'))->get();
        // dd($notes);
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $user_id = session('user.id');
        // dd($user_id);
        return view('notes.create', compact('user_id'));
    }

    public function store(Request $request)
    {
        // dd($request, session('user.id'));
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $create_note = Note::create([
            'user_id' => session('user.id'),
            'title' => $request->title,
            'content' => $request->content
        ]);

        // auth()->user()->notes()->create($validated);

        return redirect('/notes')->with('success', 'Note created successfully!');
    }

    public function edit($id)
    {
        $note = Note::where('id', $id)->first();
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        // $this->authorize('update', $note);

        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content
        ];

        $note_update=Note::where('id', $id)
					->update($data);

        return redirect('/notes')->with('success', 'Note updated successfully!');
    }

    public function destroy($id)
    {
        $del = Note::where('id', $id)
        ->delete();
        return redirect('/notes')->with('success', 'Note deleted successfully!');
    }
}

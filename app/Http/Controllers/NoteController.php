<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotesModel;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //
    public function notes()
    {

        return view('staff.notes.add');
    }

    public function store(Request $request)
    {
        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Validate the incoming request
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // Save the note to the database
        $note = new NotesModel;
        $note->subject = $request->input('subject');
        $note->content = $request->input('content');
        $note->user_id = $userId; // Associate the user ID with the note
        $note->save();

        // Redirect back to the notes page with a success message
        return redirect('/staff/notes/view')->with('success', 'Note added successfully!');
    }

    public function mynotes()
    {

        // Get the currently authenticated user's ID
        $userId = Auth::id();
        // Fetch notes belonging to the user
        $notes = NotesModel::where('user_id', $userId)->get();
        return view('staff.notes.view', compact('notes'));
    }

    public function destroy($id)
    {
        $note = NotesModel::findOrFail($id);
        $note->delete();

        return redirect('/staff/notes/view')->with('success', 'Note deleted successfully!');
    }

    public function edit($id)
    {
        $note = NotesModel::findOrFail($id);
        return view('staff.notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = NotesModel::findOrFail($id);

        $request->validate([
            'subject' => 'required|max:255',
            'content' => 'required',
        ]);

        $note->subject = $request->input('subject');
        $note->content = $request->input('content');
        $note->save();

        return redirect('/staff/notes/view')->with('success', 'Note updated successfully!');
    }
}

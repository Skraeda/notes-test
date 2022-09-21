<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\NotesHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Notes::all(), 200);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = Notes::create($request->all());
        return response($note, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $data = $request->toArray();
        $notes = Notes::findOrFail($id);
        if (!empty($notes))
        {
            $oldNote = new NotesHistory($notes->getOriginal());
            $oldNote->save();
        }else
            return response()->json(['message' => 'Note not found'], 404);

        $notes->user_id = array_key_exists('user_id', $data) ? $data['user_id'] : null;
        $notes->journal_type_id = array_key_exists('journal_type_id', $data) ? $data['journal_type_id'] : null;
        $notes->unit_id = array_key_exists('unit_id', $data) ? $data['unit_id'] : null;
        $notes->signed_by = array_key_exists('signed_by', $data) ? $data['signed_by'] : null;
        $notes->private = array_key_exists('private', $data) ? $data['private'] : null;
        $notes->draft = array_key_exists('draft', $data) ? $data['draft'] : null;
        $notes->patient_id = array_key_exists('patient_id', $data) ? $data['patient_id'] : null;
        $notes->signed_date = array_key_exists('signed_date', $data) ? $data['signed_date'] : null;
        $notes->note = array_key_exists('note', $data) ? $data['note'] : null;
        $notes->data_date = array_key_exists('data_date', $data) ? $data['data_date'] : null;
        $notes->save();

        return response($notes, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $note = Notes::findOrFail($id);
        $notesHistory = NotesHistory::find($id);
        if (!empty($note) && empty($notesHistory))
        {
            $oldNote = new NotesHistory((array) $note);
            dd($oldNote);
            $oldNote->deleted_at = Carbon::now()->format('Y-m-d H:i:s');
            $oldNote->save();
        }else
            return response()->json(['message' => 'Note not found'], 404);


        return response()->json($note->delete(), 204);
    }
}

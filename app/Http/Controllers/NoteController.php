<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $notes = Note::all();
    return response()->json($notes, 200);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(NoteRequest $request)
  {
    Note::create($request->all());
    return response()->json([
      'success' => true
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $note = Note::find($id);
    return response()->json($note);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    return 'Actualizando una nota';
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    return "Eliminando una nota";
  }
}

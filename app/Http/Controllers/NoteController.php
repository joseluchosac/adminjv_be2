<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  public function index(): JsonResponse
  {
    $notes = Note::all();
    return response()->json($notes, 200);
  }

  public function store(NoteRequest $request): JsonResponse
  {
    $note = Note::create($request->all());
    return response()->json([
      'success' => true,
      'msg' => 'Nota creada',
      'data' => $note,
    ]);
  }

  public function show(string $id): JsonResponse
  {
    $note = Note::find($id);
    return response()->json($note);
  }

  public function update(NoteRequest $request, string $id): JsonResponse
  {
    $note = Note::find($id);
    $note->title = $request->title;
    $note->content = $request->content;
    $note->save();
    return response()->json([
      'success' => true,
      'msg' => 'Nota actualizada',
      'data' => $note,
    ]);

  }

  public function destroy(string $id): JsonResponse
  {
    Note::destroy($id);
    return response()->json([
      'success' => true,
      'msg' => 'Nota eliminada'
    ]);
  }
}

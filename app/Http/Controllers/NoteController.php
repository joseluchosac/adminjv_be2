<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NoteController extends Controller
{
  public function index(): ResourceCollection
  {
    $notes = Note::all();
    // return response()->json($notes, 200);
    return NoteResource::collection($notes);
  }

  public function store(NoteRequest $request)
  {
    // $note = Note::create($request->all());
    return $request;
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

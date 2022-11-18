<?php

namespace App\Http\Controllers\Api\todo;

use App\Http\Controllers\Controller;
use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate ( [
            'judul' => 'required|string|min:5|max:100',
            'deskripsi' => 'required|string|min:10|max:255',
            'status_id' => 'required|integer|min:1|max:5',
        ]);

        $new_todo = new Todo($validateData);
        if ($new_todo->save()) {
            return response()->json( [
                'message' => 'Todo added',
                'data' => $new_todo,
                'response_code' => 201
            ], 201);
        } else {
            return response()->json( [
                'message' => 'Error Occured'
            ], 400);
        }
    }

    public function destroy($id) {
        $todo = Todo::with('status')->get()->find($id);
        
        if($todo->delete()){
            return response()->json([
                'messages' => "Delete successful",
                'response_code' => 200
            ],200);
        } else {
            return response()->json([
                'messages' => 'Error occured',
                'response_code' => 400
            ]);
        }
    }

    //method put
    public function update(Request $request, $id)
    {
        $validateData = $request->validate ( [
            'judul' => 'required|string|min:5|max:100',
            'deskripsi' => 'required|string|min:10|max:255',
            'status_id' => 'required|integer|min:1|max:5',
        ]);
    $todo = Todo::findOrFail($id);
    
    $cek = $todo->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'status_id' => $request->status_id
    ]);
    
    if($cek){
    return response()->json([
    'messages' => 'update success!!',
    'data' => $todo,
    'response_code' => '201'
    ], 201);
    } else {
        return response()->json([
        'messages' => 'something wrong'
    ], 401); 
    }
    }
    
    //method patch
    public function updateStatus(Request $request, $id)
    {
        $validateData = $request->validate([
            'status_id' => 'required|integer|min:1|max:3',
        ]);
        
        $todo = Todo::with('status')->get()->find($id);
        
        $cek = $todo->update([
            'status_id' => $request->status_id
        ]);
        $todo->refresh();
        
        if($cek){
            return response()->json([
                'messages' => 'Status Updatedd!',
                'data' => $todo,
                'response_code' => 201
            ],201);
        } else {
            return response()->json([
                'messages' => 'Somethings Wrong!',
                'response_code' => 401
            ], 401);
        }
    }

    //method patch edit judul
    public function updateJudul(Request $request, $id)
    {
        $validateData = $request->validate([
            'judul' => 'required|string|min:5|max:100',
        ]);
        
        $todo = Todo::with('status')->get()->find($id);
        
        $cek = $todo->update([
            'judul' => $request->judul
        ]);
        $todo->refresh();
        
        if($cek){
            return response()->json([
                'messages' => 'Status Updatedd!',
                'data' => $todo,
                'response_code' => 201
            ],201);
        } else {
            return response()->json([
                'messages' => 'Somethings Wrong!',
                'response_code' => 401
            ], 401);
        }
    }
}

<?php

namespace App\Http\Controllers\Api\todo;

use App\Http\Controllers\Controller;
use App\Models\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate ( [
            'status' => 'required|string|max:20'
        ]);

        $new_status = new Status($validateData);
        if ($new_status->save()) {
            return response()->json( [
                'messsage' => 'status added',
                'data' => $new_status,
                'response_code' => 201
            ], 201);
        } else {
            return response()->json( [
                'message' => 'Error Occured'
            ], 400);
        }
    }

//method put
    public function updateStatus(Request $request, $id)
    {
        $validateData = $request->validate ( [
            'status' => 'required|string|max:20',
        ]);
    $status = Status::findOrFail($id);
    
    $cek = $status->update([
        'status' => $request->status
    ]);
    
    if($cek){
    return response()->json([
    'messages' => 'update success!!',
    'data' => $status,
    'response_code' => '201'
    ], 201);
    } else {
        return response()->json([
        'messages' => 'something wrong'
    ], 401); 
    }
    }


    public function updatePatch(Request $request, $id)
    {
        $validateData = $request->validate([
            'status' => 'required|string|max:20',
        ]);
        
        $status = Status::with('todo')->get()->find($id);
        
        $cek = $status->update([
            'status' => $request->status
        ]);
        $status->refresh();
        
        if($cek){
            return response()->json([
                'messages' => 'Status Updatedd!',
                'data' => $status,
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
<?php

namespace App\Http\Controllers\Api;

use App\Models\devise;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DeviseController extends Controller
{
    //
    public function index()
    {
        $devises = devise::all();
        if ($devises->count() > 0) {

            return response()->json([
                'status' => 200,
                'devises' => $devises
            ], 200);
        } else {

            return response()->json([
                'status' => 404,
                'devises' => 'No records found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:3',
            'currency_name' => 'required|string|max:20',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {

            $devise = devise::create([
                'code' => $request->code,
                'currency_name' => $request->currency_name,
            ]);

            if ($devise) {

                return response()->json([
                    'status' => 200,
                    'message' => "Devise created Succefully",
                ], 200);
            } else {

                return response()->json([
                    'status' => 500,
                    'message' => "Something went Wrong",
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $devise = devise::find($id);
        if ($devise) {
            return response()->json([
                'status' => 200,
                'devise' => $devise
            ], 200);
        } else {

            return response()->json([
                'status' => 404,
                'message' => "No devises Found",
            ], 404);
        }
    }


    public function edit($id)
    {
        $devise = devise::find($id);
        if ($devise) {

            return response()->json([
                'status' => 200,
                'devise' => $devise
            ], 200);
        } else {

            return response()->json([
                'status' => 404,
                'message' => "No devises Found",
            ], 404);
        }
    }



    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:3',
            'currency_name' => 'required|string|max:20',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $devise = devise::find($id);
            if ($devise) {
                $devise->update([
                    'code' => $request->code,
                    'currency_name' => $request->currency_name,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => "Devise update succesfully",
                ], 200);
            } else {

                return response()->json([
                    'status' => 404,
                    'message' => "No such devise Found",
                ], 404);
            }
        }
    }

    public function destroy($id)
    {
        $devise = devise::find($id);
        if ($devise) {
            $devise->delete();
            return response()->json([
                'status' => 200,
                'message' => "Devise Deletes Succefully",
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No such devise Found",
            ], 404);
        }
    }
}

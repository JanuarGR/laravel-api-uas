<?php

namespace App\Http\Controllers\Api;

use App\Models\Odt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OdtController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Odt::get();

        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Odt::rules('insert'));
        Odt::customValidation($validator);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }
        try {
            $data = Odt::create($request->all());

            return response()->json(['message' => 'Data berhasil disimpan', 'data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Odt::find($id);

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Odt::find($id);

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), Odt::rules('update'));
        Odt::customValidation($validator);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }

        try {
            $data = Odt::find($id);
            $data->update($request->all());

            return response()->json(['message' => 'Data berhasil diupdate', 'data' => null]);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Odt::find($id);
            $data->delete();

            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

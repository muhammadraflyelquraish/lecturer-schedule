<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;
use Illuminate\Validation\Rule;

class MatkulController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::all();
        // return response()->json(['data' => $matkuls]);
        return view('matkul.index', [
            'matkuls' => $matkuls
        ]);
    }

    public function show($id)
    {
        $matkul = Matkul::find($id);

        if (!$matkul) {
            return response()->json(['message' => 'Matkul not found'], 404);
        }

        return response()->json(['data' => $matkul]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:matkul',
            'name' => 'required|string',
            'semester' => 'required|integer',
        ]);

        $matkul = Matkul::create($request->all());

        return response()->json(['data' => $matkul], 201);
    }

    public function update(Request $request, $id)
    {
        $matkul = Matkul::find($id);

        if (!$matkul) {
            return response()->json(['message' => 'Matkul not found'], 404);
        }

        $request->validate([
            'code' => ['required', 'string', Rule::unique('matkul')->ignore($id)],
            'name' => 'required|string',
            'semester' => 'required|integer',
        ]);

        $matkul->update($request->all());

        return response()->json(['data' => $matkul]);
    }

    public function destroy($id)
    {
        $matkul = Matkul::find($id);

        if (!$matkul) {
            return response()->json(['message' => 'Matkul not found'], 404);
        }

        $matkul->delete();

        return response()->json(['message' => 'Matkul deleted']);
    }
}


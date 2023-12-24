<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::all();
        // return response()->json(['data' => $classes]);
        return view('class.index', [
            'classes' => $classes
        ]);
    }

    public function show($id)
    {
        $class = ClassModel::find($id);

        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        return response()->json(['data' => $class]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'angkatan' => 'required|string',
        ]);

        // Use create method with an associative array of form data
        $class = ClassModel::create([
            'name' => $request->input('name'),
            'angkatan' => $request->input('angkatan'),
        ]);

        // return response()->json(['data' => $class], 201);

        return redirect(route('classes.index'))->with('success', 'Data Kelas berhasil ditambah!');
    }


    public function update(Request $request, $id)
    {
        $class = ClassModel::find($id);

        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'angkatan' => 'required|string',
        ]);

        $class->name = $request->input('name');
        $class->angkatan = $request->input('angkatan');
        $class->save();

        // return response()->json(['data' => $class]);

        return redirect(route('classes.index'))->with('success', 'Data Kelas berhasil diubah!');
    }

    public function destroy($id)
    {
        $class = ClassModel::find($id);

        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        }

        $class->delete();

        // return response()->json(['message' => 'Class deleted successfully']);

        return redirect(route('classes.index'))->with('success', 'Data Kelas berhasil dihapus!');
    }
}


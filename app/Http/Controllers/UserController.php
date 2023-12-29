<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::all(),
            'roles' => Role::all()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role_id' => ['required', 'numeric'],
        ]);

        $user->update(['role_id' => $validatedData['role_id']]);

        return redirect('/users')->with('success', 'Data User berhasil diubah!');

        // $check = Method::where('method', $request['method'])->first();

        // if ($check) {
        //     return redirect('/methods')->with('sameMethod', 'Metode Pembayaran tersebut sudah ada di database!');
        // }

        // Method::create($validatedData);

        // return redirect('/methods')->with('update', 'Metode Pembayaran tersebut berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

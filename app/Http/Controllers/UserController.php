<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Armada;
use App\Models\User;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $data_armada = Armada::all();
        $data = [
            'users' => $users,
            'data_armada' => $data_armada,
        ];
        return view('kepala_gudang.user', $data);
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
        if ($request->ajax()) {
            $isValid = $request->validate([
                'username' => 'required|unique:users',
                'full_name' => 'required',
                'password' => 'required|min:8',
                'role' => 'required',
                'id_armada' => 'numeric',
            ]);

            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    $user = [
                        'full_name' => $request->full_name,
                        'username' => $request->username,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
                        'id_armada' => $request->id_armada,
                    ];

                    User::create($user);
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Armada berhasil ditambahkan.',
                    // ], 200);
                    Session::flash('success', 'Pengguna baru berhasil ditambahkan.');
                    return response()->json(['success' => true], 200);
                }
                catch(Exception $e) {
                    return response()->json([
                        'success' => 'false',
                        'errors'  => $e->getMessage(),
                    ], 400);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $user = User::findOrFail($request->id);
            return response()->json($user);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $isValid = $request->validate([
                'full_name' =>'required',
                'username' =>'required',
                'id_armada' => 'numeric',
            ]);
    
            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    $user = [
                        'full_name' => $request->full_name,
                        'username' => $request->username,
                        'password' => $request->password,
                        'role' => $request->role,
                        'id_armada' => $request->id_armada,
                    ];
                    if($request->password === null) unset($user['password']);
                    User::where('id_user', $request->id_user)->update($user);
                   
                    Session::flash('success', 'User berhasil diubah.');
                    return response()->json(['success' => true], 200);
                }
                catch(Exception $e) {
                    return response()->json([
                        'success' => 'false',
                        'errors'  => $e->getMessage(),
                    ], 400);
                }
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success', 'User berhasil dihapus.');
        return response()->json(['success' => true], 200);
    }
}

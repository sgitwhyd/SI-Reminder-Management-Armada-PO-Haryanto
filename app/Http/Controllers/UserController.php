<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $data = [
            'users' => $users,
        ];
        return view('user', $data);
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
                'email' => 'required|email|unique:users',
                'full_name' => 'required',
                'password' => 'required|min:8',
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
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
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
                'email' =>'required|email',
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
                        'email' => $request->email,
                        'password' => $request->password,
                        'role' => $request->role,
                    ];
                    if($request->password === null) unset($user['password']);
                    User::where('id_user', $request->id_user)->update($user);
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Sparepart berhasil ditambahkan.',
                    // ], 200);
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

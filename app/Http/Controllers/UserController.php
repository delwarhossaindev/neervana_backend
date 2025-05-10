<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    if ($request->ajax()) {
        $users = User::select(['id', 'name', 'email']);
        return DataTables::of($users)
            ->addColumn('action', function($row){
                return view('users.partials.actions', compact('row'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('users.index');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    $user = User::findOrFail($id);
    return view('users.show', compact('user'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id
        ]);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

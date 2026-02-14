<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $roles;
    public function __construct()
    {
        $this->roles = Role::where('team_id', teamId())->pluck('name', 'name')->all();
    }

    public function index()
    {
        $users = User::withTrashed()->orderBy('name')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roles;
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'password' => 'required|min:6',
            'roles' => 'required',
        ]);
        try {
            $input = $request->except(array('branches', 'roles', 'devices'));
            $input['password'] = Hash::make($input['password']);
            DB::transaction(function () use ($request, $input) {
                $user = User::create($input);
                $user->assignRole($request->input('roles'), teamId());
            });
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('user.list')->with("success", "User created successfully");
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
    public function edit(string $id)
    {
        $user = User::findOrFail(decrypt($id));
        $roles = $this->roles;
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.user.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = decrypt($id);
        $request->validate([
            'name' => 'required',
            'mobile' => 'nullable|numeric|digits:10|unique:users,mobile,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required',
        ]);
        try {
            $input = $request->except(array('branches', 'roles', 'devices'));
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }
            DB::transaction(function () use ($request, $input, $id) {
                $user = User::findOrFail($id);
                $user->update($input);
                DB::table('model_has_roles')->where('model_id', $id)->where('team_id', teamId())->delete();
                $user->assignRole($request->input('roles'), teamId());
            });
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('user.list')->with("success", "User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail(decrypt($id))->delete();
        return redirect()->route('user.list')->with("success", "User deleted successfully");
    }
}

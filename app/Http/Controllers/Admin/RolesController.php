<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Models\Admin\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(
            Gate::denies('role_index'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        $roles = Role::latest()->get();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(
            Gate::denies('role_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        $permissions = Permission::all()->pluck('title', 'id');
        return response()->view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:roles,title'
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return response()->json(['success' => true, 'message' => 'Role created successfully.']);
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        abort_if(
            Gate::denies('role_show'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        $role_detail = $role; // Remove the unnecessary find() method
        $permissions = Permission::all();
        return response()->view('admin.roles.show', compact('role_detail', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_if(
            Gate::denies('role_edit'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        
        $role->update([
            'title' => $request->title
        ]);
        
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('toast_success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        abort_if(
            Gate::denies('role_delete'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden |You cannot  Access this page because you do not have permission'
        );
        // delete
        //$role = Role::find($role);
        $role->delete();
        // redirect
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}

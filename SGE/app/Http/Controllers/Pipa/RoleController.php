<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\Pipa\RoleRequest;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('Pipa.panel-roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pipa.add-role');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
 * Store a newly created resource in storage.
 */
    public function store(RoleRequest $request)
    {
        $role = new \App\Models\Role;
        $role->title = $request->rol_name;
        $role->permissions = json_encode($request->permissions);
        $role->save();
        
        return redirect('panel-roles')->with('success', 'Rol creado exitosamente');
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
        $role = Role::findOrFail($id);
        return view('Pipa.edit-role', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(RoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->title = $request->rol_name;
        $role->permissions = json_encode($request->permissions);
        $role->save();
        
        return redirect('panel-roles')->with('success', 'Rol actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('panel-roles')->with('success', 'Rol eliminado exitosamente');
    }
}

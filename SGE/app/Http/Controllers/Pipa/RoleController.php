<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\Pipa\RoleRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('crud-roles-permisos')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $roles = Role::paginate(3);
        return view('Pipa.panel-roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('crud-roles-permisos')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
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
        if (Gate::denies('crud-roles-permisos')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
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
        if (Gate::denies('crud-roles-permisos')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $role = Role::findOrFail($id);
        $assigned = User::where('rol_id', $role->id)->exists();
        if ($assigned){
            return redirect()
            ->back()
            ->with('error', 'No puedes eliminar este rol ya que está asignado a uno o más usuarios.');
        }
        $role->delete();
        return redirect('panel-roles')->with('success', 'Rol eliminado exitosamente');
    }
}

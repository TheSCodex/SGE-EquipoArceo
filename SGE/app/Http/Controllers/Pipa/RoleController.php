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
    public function index(Request $request)
    {
        if (Gate::denies('crud-roles-permisos')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
    
        $query = $request->input('query');
        $rolesQuery = Role::query();
    
        // Aplicar el filtro de búsqueda si se proporciona una consulta
        if (!empty($query)) {
            $rolesQuery->where('title', 'like', '%' . $query . '%');
        }
    
        $roles = $rolesQuery->paginate(3);
    
        return view('Pipa.panel-roles', compact('roles', 'query'));
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
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }
    
        $role = Role::findOrFail($id);
    
        // Lógica para obtener todos los permisos disponibles (reemplaza con tu propia lógica)
        $permissionsArray = json_decode($role->permissions, true);
    
        return view('Pipa.edit-role', compact('role', 'permissionsArray'));
    }


    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         $role = Role::findOrFail($id);
         $role->title = $request->input('rol_name');
     
         // Decodificar los permisos actuales del rol
         $currentPermissions = json_decode($role->permissions, true);
     
         // Obtener todos los permisos disponibles (reemplaza con tu propia lógica)
         $allPermissions = [
             "crear-libro" => false,
             "editar-libro" => false,
             "crud-asesores" => false,
             "crud-empresas" => false,
             "crud-usuarios" => false,
             "leer-reportes" => false,
             "eliminar-libro" => false,
             "editar-formatos" => false,
             "gestionar-bajas" => false,
             "leer-calendario" => false,
             "leer-estudiantes" => false,
             "crear-observacion" => false,
             "leer-lista-libros" => false,
             "crear-anteproyecto" => false,
             "leer-observaciones" => false,
             "votar-anteproyecto" => false,
             "crud-roles-permisos" => false,
             "editar-anteproyecto" => false,
             "gestionar-documentos" => false,
             "comentar-observaciones" => false,
             "crud-carreras-divisiones" => false,
             "leer-asesores-academicos" => false,
             "asignar-asesor-estudiante" => false,
             "crear-asesores-academicos" => false,
             "crear-actividad-calendario" => false,
             "editar-asesores-academicos" => false,
             "leer-estudiantes-asignados" => false,
             "generar-reportes-documentos" => false,
             "leer-anteproyectos-division" => false,
             "eliminar-asesores-academicos" => false,
             "leer-anteproyecto-especifico" => false,
             "leer-anteproyectos-publicados" => false,
             "resolver-eliminar-observacion" => false,
         ];
     
         // Crear un array de permisos actualizados con valores true/false
         $updatedPermissions = [];
         foreach ($allPermissions as $permission => $value) {
             $updatedPermissions[$permission] = in_array($permission, $request->input('permissions', []));
         }
     
         // Fusionar los permisos actuales con los actualizados para mantener los valores que no se modificaron
         $updatedPermissions = array_merge($currentPermissions, $updatedPermissions);
     
         // Guardar los permisos actualizados en formato JSON
         $role->permissions = json_encode($updatedPermissions);
         $role->save();
     
         return redirect()->route('panel-roles.index')->with('success', 'Rol actualizado exitosamente');
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

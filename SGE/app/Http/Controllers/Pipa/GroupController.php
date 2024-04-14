<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pipa\GroupRequest;
use App\Models\Career;
use App\Models\Group;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function searchGroups(Request $request)
    {
        $query = $request->input('query');

        $groups = Group::where('name', 'like', '%' . $query . '%')
                    ->orWhereHas('career', function($q) use ($query) {
                        $q->where('name', 'like', '%' . $query . '%');
                    })
                    ->paginate(10);

        return view('Pipa.panel-groups', compact('groups')); // Reemplaza 'nombre_de_tu_vista' con el nombre real de tu vista
    }

    public function index(Request $request)
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
    
        $query = $request->input('query');
        $groupsQuery = Group::query()->with('career'); // Carga la relación 'career'
    
        // Aplicar el filtro de búsqueda si se proporciona una consulta
        if (!empty($query)) {
            $groupsQuery->where('name', 'like', '%' . $query . '%');
        }
    
        $groups = $groupsQuery->paginate(10);
    
        return view('Pipa.panel-groups', compact('groups', 'query'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $groups = Group::all(); 
        $careers = Career::all();
        return view('Pipa.add-group', compact('groups', 'careers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        // correo electrónico único
        $request->validate([
            'name' => 'unique:groups,name',
        ]);
        $group = new \App\Models\Group;
        $group->name = $request->name;
        $group->career_id = $request->career_id;
        $group->save();

        session()->flash('success', '¡El grupo se ha agregado exitosamente!');
        $groups = Group::paginate(10);
        return view ('Pipa.panel-groups', compact('groups'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $group = Group::findOrFail($id);
        $career = $group->career;
        $interns = Intern::where('group_id', $group->id)->paginate(10); // Paginar los resultados

        return view('Pipa.show-group', compact('group', 'career', 'interns'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // ejemplo de gate para verificar si el usuario tiene el permiso para el crud-usuario
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }

        $groups = Group::all(); 
        $careers = Career::all();
        $group = \App\Models\Group::find($id);
        $oldCareer = Career::where('id', $group->career_id)->first();
        return view('Pipa.edit-group', compact('group','oldCareer','careers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, string $id): RedirectResponse
    {
        $group = Group::findOrFail($id);
    
        // Verificar si el nombre se ha modificado y si es así, aplicar la validación de unicidad
        if ($group->name !== $request->name) {
            $request->validate([
                'name' => 'required|string|max:255|unique:groups,name',
                'career_id' => 'bail|required',
            ]);
        } else {
            $request->validate([
                'career_id' => 'bail|required',
            ]);
        }
    
        $group->update($request->all());
    
        // Actualizar automáticamente la carrera en la tabla 'interns' para los internos relacionados con este grupo
        Intern::where('group_id', $id)->update(['career_id' => $request->career_id]);
    
        session()->flash('success', 'El grupo ' . $group->name . ' se ha editado correctamente.');
        return redirect()->route('panel-groups.index');
    }
    
  
      

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $group = \App\Models\Group::find($id);
        // si es un asesor que está en la tabla de asesores:
        $intern = Intern::where('group_id', $group->id)->exists();
        if ($intern){
            return redirect()
                ->back()
                ->with('error', 'No puedes eliminar este grupo ya que está asignado a un alumno.');
        }

        $group->delete();
        return redirect()->route('panel-groups.index');
    }
}

<?php

namespace App\Http\Controllers\Pipa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pipa\UserRequest;
use App\Models\Career;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Gate;
use App\Models\AcademicAdvisor;
use App\Models\Division;
use App\Models\Academy;
use Illuminate\Support\Facades\Log;
use App\Models\Comment;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function searchUsers(Request $request)
     {
         $query = $request->input('query');
     
         $users = User::where('name', 'like', '%' . $query . '%')
                     ->orWhere('email', 'like', '%' . $query . '%')
                     ->orWhereHas('role', function ($roleQuery) use ($query) {
                         $roleQuery->where('title', 'like', '%' . $query . '%');
                     })
                     ->orWhere('identifier', 'like', '%' . $query . '%')
                     ->paginate(10); // Change get() to paginate(10) or simplePaginate(10)
     
         return view('Pipa.panel-users', compact('users'));
     }
     

    public function index(Request $request)
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
    
        $query = $request->input('query');
        $usersQuery = User::query();
    
        // Aplicar el filtro de búsqueda si se proporciona una consulta
        if (!empty($query)) {
            $usersQuery->where('name', 'like', '%' . $query . '%')
                       ->orWhere('last_name', 'like', '%' . $query . '%');
        }
    
        $users = $usersQuery->paginate(10);
    
        return view('Pipa.panel-users', compact('users', 'query'));
    }
    
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
    
        $roles = Role::all(); 
        $careers = Career::all();
        $groups = Group::all();
        $groupsByCareer = $groups->groupBy('career_id')->toArray(); // Agrupar grupos por carrera
        return view('Pipa.add-user', compact('groupsByCareer', 'roles', 'careers', 'groups'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
         // correo electrónico único
        $request->validate([
            'email' => 'unique:users,email',
        ]);

        // if($request->rol_id === "1"){
        //     $request->validate([
        //         'career_id' => 'bail|required',
        //         'group_id' => 'bail|required'
        //     ]);
        // };

        // if($request->rol_id === "2"){
        //     $request->validate([
        //         'career_id' => 'bail|required',
        //     ]);
        // };

        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->rol_id = $request->rol_id;
        $user->identifier = $request->identifier;
        // password aleatoria
        $randomPassword = Str::random(8);
        $user->password = bcrypt($randomPassword);
        $user->save();

        if (!$this->checkInternetConnection()) {
            session()->flash('error', 'No se pudo enviar el correo electrónico a la dirección ' . $request->email . ' debido a la falta de conexión a Internet.');
            return redirect()->route('panel-users.index');
        } else {
            $user->notify(new \App\Notifications\NewUserPasswordNotification($randomPassword, $request->email, $request->name, $request->last_name));
            if ($request->rol_id == 1) {
                \App\Models\Intern::create([
                    'user_id' => $user->id,
                    'group_id' => $request->group_id,
                    'career_id' => $request->career_id,
                    'student_status_id' => 1
                ]);
            }
            if ($request->rol_id == 2) {
                \App\Models\AcademicAdvisor::create([
                    'user_id' => $user->id,
                    'career_id' => $request->career_id,
                    'max_advisors' => 1,
                    'quantity_advised' => 0,
                ]);
            }



            session()->flash('success', '¡El usuario se ha agregado exitosamente!');
            $users = User::paginate(10);
            return view ('Pipa.panel-users', compact('users'));
        }   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $user = User::findOrFail($id);
        $intern = $user->interns;
        $academicAdvisor = $user->academicAdvisor;
        if ($intern){
            $career = $intern->career; 
        } elseif ($academicAdvisor){
            $career = $academicAdvisor->career;
        } else {
            $career = null;
        }
        return view('Pipa.show-user', compact('user', 'intern', 'career', 'academicAdvisor'));
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
        $roles = Role::all(); 
        $careers = Career::all();
        $user = \App\Models\User::find($id);
        $intern = $user->interns;
        $career = $intern ? $intern->career : null;
        $userGroupID = $intern ? $intern->group_id : null;
        $group = \App\Models\User::find($userGroupID);
        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();
        if ($group && $group->id) {
            $group = Group::where('id', $group->id)->first();
        } else {
            // En caso de que $group o $group->id no estén presentes, asigna null a $group
            $group = null;
        }
            $groups = Group::all();
        $groupsByCareer = $groups->groupBy('career_id')->toArray(); // Agrupar grupos por carrera
        return view('Pipa.edit-user', compact('user','roles', 'intern', 'career', 'careers', 'academicAdvisor', 'groupsByCareer', 'group', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

         // correo electrónico único
         $request->validate([
            'email' => 'unique:users,email',
        ]);
    
        // ? Verificar si no se cambio el rol pero su algun dato diferente

        if ($request->rol_id != $user->rol_id) {
            // primero verifica si es asesor académico
            if ($user->role->title === 'asesorAcademico') {
                Log::info('El usuario es asesor académico.');

                $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();

                if ($academicAdvisor){
                // despues verifica si tiene alumnos asesorados
                    $internCount = Intern::where('academic_advisor_id', $academicAdvisor->id)->count();
                    
                    if ($internCount > 0) {
                        Log::info('El usuario tiene internos.');
                        return redirect()
                            ->back()
                            ->with('error', 'No puedes cambiar el rol de un asesor académico que tiene alumnos asesorados.');
                    } else {
                        // si no tiene alumnos asesorados, eliminar el registro de la tabla de asesor academico
                        $academicAdvisor->delete();
                        Log::info('Se eliminó el usuario con ID ' . $user->id . ' de la tabla de asesores académicos.');
                    }
                } else {
                    Log::info('El usuario no existe en la tabla de asesores académico.');
                }

            } elseif ($user->role->title === 'estudiante') { // si no es asesor, verifica si el usuario es estudiante
                Log::info('El usuario a editar es un estudiante.');

                $intern = Intern::where('user_id', $user->id)->first();

                // y verifica que exista en la tabla de internos para eliminar el registro
                if($intern){
                    $intern->delete();
                    Log::info('El estudiante con ID ' . $user->id .  'se eliminó de la tabla internos.');
                }
            }

            // despues de esas validaciones, verifica si se quiere cambiar el rol a estudiante

            if ($request->input('rol_id') === '1') { 
                // si no existe en la tabla de internos, lo inserta como estudiante
                if (!Intern::where('user_id', $user->id)->exists()) {
                    $intern = new Intern();
                    $intern->user_id = $user->id;
                    $intern->career_id = $request->career_id;
                    $intern->student_status_id = '1';
                    $intern->save();
                    Log::info('Se insertó el usuario con ID ' . $user->id . ' a la tabla de internos');
                }
            } elseif ($request->input('rol_id') === '2'){ // si se quiere cambiar el rol a asesor academico
                if (!AcademicAdvisor::where('user_id', $user->id)->exists()){
                    $academicAdvisor = new AcademicAdvisor;
                    $academicAdvisor->user_id = $user->id;
                    $academicAdvisor->career_id = $request->career_id;
                    $academicAdvisor->max_advisors = 1;
                    $academicAdvisor->quantity_advised = 0;
                    $academicAdvisor->save();
                    Log::info('Se insertó el usuario con ID ' . $user->id . ' a la tabla de asesores académicos');
                }
            }
        }

        // Si se está modificando la carrera sin cambiar el rol
        if ($request->rol_id == $user->rol_id && $user->role->title === 'asesorAcademico') {
            $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();

            if ($academicAdvisor) {
                $academicAdvisor->career_id = $request->career_id;
                $academicAdvisor->save();
                Log::info('Se modificó la carrera del asesor académico con ID ' . $user->id . '.');
            }
        }

        // Si se está modificando la carrera sin cambiar el rol
        if ($request->rol_id == $user->rol_id && $user->role->title === 'estudiante') {
            $intern = Intern::where('user_id', $user->id)->first();

            if ($intern) {
                $intern->career_id = $request->career_id;
                $intern->group_id = $request->group_id;
                $intern->save();
                Log::info('Se modificó la carrera del estudiante con ID ' . $user->id . '.');
            }
        }

        $user->update($request->all());

        session()->flash('success', 'El usuario ' . $user->name . ' ' . $user->last_name . ' se ha editado correctamente.');
        return redirect()->route('panel-users.index');
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $user = \App\Models\User::find($id);
        $userId = $user->id;
        // si es un asesor que está en la tabla de asesores:
        $academicAdvisorHasInterns = Intern::whereExists(function ($query) use ($userId) {
            $query->select(DB::raw(1))
                ->from('academic_advisor')
                ->whereColumn('academic_advisor_id', 'academic_advisor.id')
                ->where('user_id', $userId);
        })->exists();
        

            $director = Division::where('director_id', $user->id)->exists();
        $assistant = Division::where('directorAsistant_id', $user->id)->exists();
        $president = Academy::where('president_id', $user->id)->exists();
        if ($academicAdvisorHasInterns){
            return redirect()
                ->back()
                ->with('error', 'No puedes eliminar a este usuario ya que está asignado como asesor a un alumno.');
        } elseif ($director){
            return redirect()
                ->back()
                ->with('error', 'No puedes eliminar a este usuario ya que es director de una división.');
        } elseif ($president){
            return redirect()
                ->back()
                ->with('error', 'No puedes eliminar a este usuario ya que es presidente de una academia.');
        } elseif ($assistant){
            return redirect()
            ->back()
            ->with('error', 'No puedes eliminar a este usuario ya que es asistente de dirección de una división.');
        }

        if($user->rol_id == 2){
            AcademicAdvisor::where('user_id', $userId)->delete();
        }

        $user->delete();
        return redirect()->route('panel-users.index');
    }

    private function checkInternetConnection(): bool
    {
        try{
            $response = Http::get('http://www.google.com');
            return $response->successful();
        } catch(\Exception $e){
            return false;
        }
    }

}

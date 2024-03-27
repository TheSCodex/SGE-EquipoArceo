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
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('crud-usuarios')) {
            abort(403,'No tienes permiso para acceder a esta sección.');
        }
        $users = User::paginate(10);
        return view('Pipa.panel-users', compact('users'));
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
        return view('Pipa.add-user', compact('roles', 'careers'));
        // return view('Pipa.add-user');
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
                    'career_id' => $request->career_id,
                    'student_status_id' => 1
                ]);
            }
            if ($request->rol_id == 2) {
                \App\Models\AcademicAdvisor::create([
                    'user_id' => $user->id,
                    'career_id' => $request->career_id,
                    'max_advisors' => 0,
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
        return view('Pipa.edit-user', compact('user','roles', 'intern', 'career', 'careers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
    
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
                $academicAdvisor->save();
                Log::info('Se insertó el usuario con ID ' . $user->id . ' a la tabla de asesores académicos');
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
        $academicAdvisor = AcademicAdvisor::where('user_id', $user->id)->exists();
        if ($academicAdvisor){
            return redirect()
                ->back()
                ->with('error', 'No puedes eliminar este asesor ya que existe en la tabla de asesores.');
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

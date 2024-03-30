<?php

namespace App\Http\Controllers\Michell\PresidentOfTheAcademy;

use App\Models\User;
use App\Models\Intern;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\AcademicAdvisor;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;



class PresidentOfTheAcademy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advisors = AcademicAdvisor::all();
        $businessConsultants = User::where('rol_id', 7)->get();
        $votes=Project::sum('like');
        // $dataStudents = Intern::with('user', 'academicAdvisor.user')->get();
        
        $dataStudents = User::join('interns', 'users.id', '=', 'interns.user_id')
            ->whereNull('interns.project_id')
            ->select('users.name')
            ->get();
        
        return view('Michell.PresidentOfTheAcademy.inicioPresidentAcademy', compact('advisors', 'businessConsultants', 'votes', 'dataStudents'));
    }

    public function AdvisorList()
    {
        $advisors = AcademicAdvisor::join('users', 'academic_advisor.user_id', '=', 'users.id')
            ->join('careers', 'academic_advisor.career_id', '=', 'careers.id')
            ->where('users.rol_id', 2)
            ->select('academic_advisor.id', 'users.name', 'careers.name AS career_name', 'academic_advisor.max_advisors', 'academic_advisor.quantity_advised')
            // ->get();
            ->paginate(10);

        return view('Michell.PresidentOfTheAcademy.AdvisorList', ['advisors' => $advisors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //* Obtener carreras
        $career = Career::all();
        // * Obtener asesores academicos
        $advisors = User::where('rol_id', 2)->select('id', 'name')->get();


        return view('Michell.PresidentOfTheAcademy.AdvisorForm', ['career' => $career, 'advisors' => $advisors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ! Verificar que la respuesta contenga contenido
        if ($request->ajax() && $request->session()->has('errors')) {
            return response()->json(['errors' => $request->session()->get('errors')]);
        }

        // ! Validar los campos
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric|unique:academic_advisor,user_id',
            'career_id' => 'required|numeric',
            'max_advisors' => 'required|numeric|gt:0',
            'quantity_advised' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            if (!$request->ajax()) {
                return redirect()
                    ->route('asesores.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            return response()->json(['errors' => $validator->errors()->toArray()]);
        }

        // ! Guardar asesores -> con el numero de asesorados
        $academicAdvisors = new AcademicAdvisor();
        $academicAdvisors->user_id = $request->input('user_id');
        $academicAdvisors->career_id = $request->input('career_id');
        $academicAdvisors->max_advisors = $request->input('max_advisors');
        $academicAdvisors->quantity_advised = $request->input('quantity_advised');
        $academicAdvisors->save();

        if (!$request->ajax()) {
            return redirect()->route('lista-asesores')->with('success', 'El  asesor a sido creado exitosamente');
        }

        return response()->json(['success' => 'Asesor creado exitosamente']);
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
    public function edit($id)
    {
        $advisor = AcademicAdvisor::find($id);
        if (!$advisor) {
            // Manejar el caso en que no se encuentre el asesor con el ID proporcionado
            return redirect()->route('lista-asesores')->with('error', 'No se encontró el asesor');
        }
        $user = User::find($advisor->user_id);
        $career = Career::find($advisor->career_id);
        return view('Michell.PresidentOfTheAcademy.EditAdvisor', [
            'advisor' => $advisor,
            'user' => $user,
            'career' => $career,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'max_advisors' => 'required|integer|min:0',
            'quantity_advised' => 'required|integer|min:0',
        ]);

        $advisor = AcademicAdvisor::find($id);
        $advisor->max_advisors = $request->input('max_advisors');
        $advisor->quantity_advised = $request->input('quantity_advised');
        $advisor->save();

        return redirect()->route('lista-asesores')->with('success', 'Asesor notificado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Desactivar restricciones de clave externa temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    
        // Eliminar el registro
        $academic = AcademicAdvisor::find($id);
        $academic->delete();
    
        // Reactivar restricciones de clave externa
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
        return redirect()->route('lista-asesores')->with('notificacion', 'Asesor eliminado correctamente');
    }
    
}

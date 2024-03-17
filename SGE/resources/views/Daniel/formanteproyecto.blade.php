@extends('templates.studenTemplate')
@section('titulo')
    Formulario de anteproyectos
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 h-auto mx-auto bg-white rounded-md my-6">
            {{-- Datos Personales --}}
            <div class="my-4">
                <h1 class="font-roboto text-xl font-semibold my-4 ml-4">Datos del alumno</h1>
            </div>
            <div class="Linea separadora bg-[#000000] h-[2px] my-2 w-[98%] mx-4"></div>
            <form method="POST" action="{{ route('anteproyecto/nuevo.store') }}" class="space-y-4 ml-4">
                <div class="Datos Personales flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Nombre completo:</h2>
                        @csrf
                        <input type="text" name="name_student" placeholder="Introduzca su nombre completo"
                            value="{{ old('name_student') }}" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('name_student')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Matricula:</h2>
                        <input type="number" name="matricula" placeholder="Matricula" value="{{ old('matricula') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('matricula')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[10%]">
                        <h2 class="font-roboto mb-1 font-medium">Grupo:</h2>
                        <input type="text" name="Group" placeholder="SM51" value="{{ old('Group') }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Group')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[20%] justifify-end items-end p-4">
                        <button class="bg-primaryColor mt-3 text-white text-md font-roboto rounded-lg h-auto p-3">
                            Colaborar
                        </button>
                    </div>
                </div>
                <div class="Datos escolares flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">División Académica:</h2>
                        <select name="division_academica" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">
                            <option value="" disabled selected>Selecciona una división académica</option>
                            <option value="division1">División 1</option>
                            <option value="division2">División 2</option>
                            <option value="division3">División 3</option>
                        </select>
                        <br>
                        @error('division_academica')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Proyecto Educativo:</h2>
                        <select name="proyecto_educativo" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">
                            <option value="" disabled selected>Selecciona tu proyecto educativo</option>
                            <option value="division1">Proyecto Educativo 1</option>
                            <option value="division2">Proyecto Educativo 2</option>
                            <option value="division3">Proyecto Educativo 3</option>
                        </select>
                        <br>
                        @error('proyecto_educativo')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="Datos Personales 2 flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Correo Electronico:</h2>
                        <input type="email" name="email_student" placeholder="Introduzca su correo electronico"
                            value="{{ old('email_student') }}" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('email_student')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Numero:</h2>
                        <input type="number" name="Numero" placeholder="998XXXXXXX" value="{{ old('Numero') }}" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Numero')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Fecha Inicio:</h2>
                        <input type="date" name="Fecha_Inicio" placeholder="SM51" value="{{ old('Fecha_Inicio') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Fecha_Inicio')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Fecha Final:</h2>
                        <input type="date" name="Fecha_Final" placeholder="SM51" value="{{ old('Fecha_Final') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Fecha_Final')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            {{-- Parte Empresa --}}
            <div class="my-4">
                <h1 class="font-roboto text-xl font-semibold mt-4">Datos de la empresa</h1>
            </div>
            <div class="Linea separadora bg-[#000000] h-[2px] mb-2 w-[98%] "></div>
                <div class="Datos de la empresa 2 flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Nombre de la empresa:</h2>
                        <input type="text" name="name_enterprise" placeholder="Introduzca el nombre de la empresa"
                            value="{{ old('name_enterprise') }}" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('name_enterprise')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Direccion:</h2>
                        <input type="text" name="direction_enterprise"
                            placeholder="Introduzca la direccion de la empresa" value="{{ old('direction_enterprise') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('direction_enterprise')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="Datos del asesor flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Nombre del asesor:</h2>
                        <input type="text" name="name_advisor"
                            placeholder="Introduzca el nombre del asesor empresarial" value="{{ old('name_advisor') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('name_advisor')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Cargo que desempeña:</h2>
                        <input type="text" name="advisor_position" placeholder="Introduzca el cargo del asesor"
                            value="{{ old('advisor_position') }}" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('advisor_position')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="Datos Personales 2 flex gap-5">
                    <div class="w-[48%]">
                        <h2 class="font-roboto mb-1 font-medium">Correo Electronico:</h2>
                        <input type="email" name="email_advisor"
                            placeholder="Introduzca el correo electronico del asesor" value="{{ old('email_advisor') }}"
                            required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('email_advisor')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[15%]">
                        <h2 class="font-roboto mb-1 font-medium">Numero:</h2>
                        <input type="number" name="Phone_advisor" placeholder="998XXXXXXX"
                            value="{{ old('Phone_advisor') }}" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('Phone_advisor')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[31%]">
                        <h2 class="font-roboto mb-1 font-medium">Area de desempeño:</h2>
                        <input type="text" name="position_student" placeholder="Introduzca el area donde trabajara"
                            value="{{ old('position_student') }}" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('position_student')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Parte Proyecto --}}
                <div class="my-4">
                    <h1 class="font-roboto text-xl font-semibold mt-4">Datos del proyecto</h1>
                </div>
                <div class="Linea separadora bg-[#000000] h-[2px] mb-2 w-[98%] mr-4"></div>
                    <div class="w-[97%]">
                        <h2 class="font-roboto mb-1 font-medium">Nombre del anteproyecto:</h2>
                        <input type="text" name="name_proyect" placeholder="Introduzca el nombre del anteproyecto"
                            value="{{ old('name_proyect') }}" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2"><br>
                        @error('name_proyect')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[97%]">
                        <h2 class="font-roboto mb-1 font-medium">Objetivo General:</h2>
                        <textarea name="objetivo_general" rows="4" placeholder="Define el objetivo general del anteproyecto" required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('objetivo_general') }}</textarea><br>
                        @error('objetivo_general')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[97%]">
                        <h2 class="font-roboto mb-1 font-medium">Planteamiento del problema:</h2>
                        <textarea name="planteamiento" rows="4"
                            placeholder="Exponen los aspectos, elementos y relaciones del problema de tu proyecto." required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('planteamiento') }}</textarea><br>
                        @error('planteamiento')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-[97%]">
                        <h2 class="font-roboto mb-1 font-medium">Justificación:</h2>
                        <textarea name="Justificacion" rows="4" placeholder="Escribe tu justificación, debe manifestarse de manera clara y precisa del por qué y para qué se va llevar a cabo el estudio. Incluye causas y propósitos que motivan la investigación. Contesta las preguntas: ¿Cuáles son los beneficios que este trabajo proporcionará? ¿Quiénes serán los beneficiados? ¿Cuál es su utilidad?" required class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('Justificacion') }}</textarea>
                        @error('Justificacion')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>                    
                    <div class="w-[97%]">
                        <h2 class="font-roboto mb-4 m font-medium">Actividades a realizar:</h2>
                        <textarea name="activities" rows="4"
                            placeholder="Enlista las actividades que vas a llevar a cabo de manera ordenada." required
                            class="w-full border-lightGray border-2 px-4 py-3 rounded-md p-2">{{ old('activities') }}</textarea><br>
                        @error('activities')
                            <div style='color:red'>{{ $message }}</div>
                        @enderror
                    </div>
                <div class="my-4 mr-4 gap-4 flex justify-end">
                    <button class="bg-primaryColor text-white text-md font-roboto rounded-lg h-auto p-3">
                        Guardar
                    </button>
                    <a href="{{ url('estudiante/anteproyecto') }}" class="bg-[#EEF4FB] text-primaryColor text-md font-roboto rounded-lg h-auto p-3">
                        Cerrar
                    </a>
                </div>
            </form>
            
        </div>
    </section>
@endsection

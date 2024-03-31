@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white">
    <form action="{{url('panel-users')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        <div class="w-full h-fit flex justify-center md:justify-start">
            <h1 class="text-3xl font-bold">Añadir usuario</h1>
            @csrf
        </div>
        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Nombre</p>
                    <input type="text" name="name" value="{{ old('name') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Apellidos</p>
                    <input type="text" name="last_name" value="{{old('last_name')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Apellidos">
                    @error('last_name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm space-y-2">Correo</p>
                    <input type="text" name="email" value="{{old('email')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Correo">
                    @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Rol</p>
                    <select name="rol_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">
                                @if ($role->title == "estudiante")
                                Estudiante
                                @elseif ($role->title == "asesorAcademico")
                                    Asesor Académico
                                @elseif ($role->title == "presidenteAcademia")
                                    Presidente de Academia
                                @elseif ($role->title == "director")
                                    Director
                                @elseif ($role->title == "asistenteDireccion")
                                    Asistente Dirección
                                @elseif ($role->title == "admin")
                                    Administrador
                                @else
                                    {{$role->title}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('rol_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm">Nómina o matrícula</p>
                    <input type="text" name="identifier" value="{{old('identifier')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nomina">
                    @error('identifier')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Especialidad</p>
                    <select name="career_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        @foreach($careers as $career)
                            <option value="{{ $career->id }}">{{ $career->name }}</option>
                        @endforeach
                    </select>
                    @error('career_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="p-2 self-center bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Añadir usuario</button>

    </form>
</div>

@endsection('contenido')
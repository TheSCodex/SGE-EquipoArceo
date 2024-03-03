@extends('templates.administratorTemplate')
@section('titulo','CRUD Usuarios')
@section('contenido')
    {{-- Test --}}
    @php
    $usuarios = [
        ['nombre' => 'Manuel', 'apellido' => 'Pasos', 'correo' => '22393126@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393126', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Kevin', 'apellido' => 'Bello', 'correo' => '22393124@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393124', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Luis', 'apellido' => 'Broca', 'correo' => '22393177@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393177', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Manuel', 'apellido' => 'Pasos', 'correo' => '22393126@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393126', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Kevin', 'apellido' => 'Bello', 'correo' => '22393124@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393124', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Luis', 'apellido' => 'Broca', 'correo' => '22393177@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393177', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Manuel', 'apellido' => 'Pasos', 'correo' => '22393126@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393126', 'especialidad' => 'Desarrollo de software',],
        ['nombre' => 'Kevin', 'apellido' => 'Bello', 'correo' => '22393124@gmail.com', 'rol' => 'Estudiante', 'nomina' => '22393124', 'especialidad' => 'Desarrollo de software',],
    ];
    @endphp
    <main class="min-h-screen h-full">
        <div class="py-8 px-20">
            <div class="border-b border-gray-200 pb-2 flex flex-row items-center">
                <div class="w-4/6">
                    <h1 class="font-bold text-2xl font-roboto">Lista de usuarios</h1>
                </div>
                <div class="flex items-center space-x-5">
                    <div class="flex flex-row border border-primaryColor p-1 items-center rounded-md">
                        <input id='search' placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-montserrat text-sm font-semibold px-2">
                        <label for="search" class="items-center"><img src="/img/logos/search.svg"></label>
                    </div>
                    <div class="p-1 flex flex-x-0 flex-col">
                        <button><img src="/img/logos/caret.svg"></button>
                    </div>
                    <div class="w-[200px]">
                        <a class="bg-primaryColor text-white p-2 rounded-md font-montserrat w-[200px] text-sm font-semibold"  href="/user/create">Agregar nuevo usuario</a>
                    </div>
                </div>
            </div>
            <div class="mt-6 w-full flex items-center justify-between">
                <table class="w-full text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Apellidos</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Correo</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Rol</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nomina</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Especialidad</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td class="font-roboto font-bold py-5">{{ $usuario['nombre'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['apellido'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['correo'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['rol'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['nomina'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['especialidad'] }}</td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/pencil.svg"></td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/trash.svg"></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
@endsection
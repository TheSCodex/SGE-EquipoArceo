@extends('templates.administratorTemplate')
@section('titulo','CRUD Asesores Empresariales')
@section('contenido')
    {{-- Test --}}
    @php
    $usuarios = [
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
        ['nombre' => 'Edgar', 'correo' => 'correo@gmail.com', 'telefono' => '9331215485', 'Gacademico' => 'Ingeniero', 'Departamento' => 'Desarrollo', ],
    ];
    @endphp
    <main class="min-h-screen h-full">
        <div class="py-8 px-20">
            <div class="border-b border-gray-200 pb-2 flex flex-row items-center ">
                <div class="w-4/6">
                    <h1 class="font-bold text-2xl font-roboto">Asesores Empresariales</h1>
                </div>
                <div class="flex items-center space-x-5">
                    <div class="flex flex-row border border-primaryColor p-1 items-center rounded-md">
                        <input id='search' placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-montserrat text-sm font-semibold px-2">
                        <label for="search" class="items-center"><img src="/img/logos/search.svg"></label>
                    </div>
                    <div class="p-1  flex flex-x-0 flex-col">
                        <button><img src="/img/logos/caret.svg"></button>
                    </div>
                    <div class="w-52">
                        <button class="bg-primaryColor text-white p-2 rounded-md  justify-center font-semibold">Agregar nuevo asesor</button>
                    </div>
                </div>
            </div>
            <div class="mt-6 w-full flex items-center justify-between">
                <table class="w-full text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Correo Electronico</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Celular</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Grado Academico</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Departamento</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td class="font-roboto font-bold py-5">{{ $usuario['nombre'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['correo'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['telefono'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['Gacademico'] }}</td>
                        <td class="font-roboto font-bold py-5">{{ $usuario['Departamento'] }}</td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/pencil.svg"></td>
                        <td class="font-roboto font-bold py-5"><img src="/img/logos/trash.svg"></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>
@endsection

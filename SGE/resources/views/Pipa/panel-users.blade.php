@extends('templates.administratorTemplate')
@section('titulo', 'Panel de Usuarios')
@section('contenido')
    {{-- Test --}}
    @php
    $users = [
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
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0 10px;
            /* Espacio vertical entre filas */
            width: 100%;
        }
        /* Estilo para las celdas de la tabla */
        th,
        td {
            /* Espacio interno de las celdas */
            padding: 10px;
        }
    </style>


    <main class="min-h-screen h-full flex flex-col">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de usuarios</h1>
            <div class="flex items-center space-x-5">
                <div class="flex flex-row border border-primaryColor p-1 items-center rounded-md">
                    <input id='search' placeholder="Buscador" type="text" class="placeholder-primaryColor focus:outline-none font-roboto">
                    <label for="search" class="items-center"><img src="/img/logos/search.svg"></label>
                </div>
                <div class="p-1 flex flex-x-0 flex-col">
                    <button><img src="/img/logos/caret.svg"></button>
                </div>
                <div class="w-52">
                    <button onclick="window.location.href='/panel-users/create'" class="bg-primaryColor text-white p-2 rounded-md font-semibold">
                        Agregar nuevo usuario
                    </button>
                </div>

            </div>
        </div>
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
            {{-- cards --}}
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($users as $user)
                        <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                            <h2 class="text-lg font-bold">{{ $user['nombre'] }}</h2>
                            <h2 class="text-lg font-bold">{{ $user['apellido'] }}</h2>
                            <p class="text-sm text-gray-500">Correo: {{ $user['correo'] }}</p>
                            <p class="text-sm text-gray-500">Rol: {{ $user['rol'] }}</p>
                            <p class="text-sm text-gray-500">Nomina: {{ $user['nomina'] }}</p>
                            <p class="text-sm text-gray-500">Especialidad: {{ $user['especialidad'] }}</p>
                            <div class="flex justify-end mt-4">
                                <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                                <img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Display table on larger screens -->
            <div class="hidden lg:block w-full">
                <table class="text-center">
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
                    @foreach ($users as $user)
                        <tr>
                            <td class="font-roboto font-bold py-5">{{ $user['nombre'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['apellido'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['correo'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['rol'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['nomina'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['especialidad'] }}</td>
                            <td class="font-roboto font-bold py-5"><img src="/img/logos/pencil.svg"></td>
                            <td class="font-roboto font-bold py-5"><img src="/img/logos/trash.svg"></td>
                             {{-- <td class="font-roboto font-bold py-5">
                        <form id="deleteForm" action="{{ route('panel-companies.destroy', $company['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirmDelete();">
                                <img src="/img/logos/trash.svg" alt="Eliminar">
                            </button>
                        </form>
                    </td>  --}}
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </main>
    <script>
        function confirmDelete() {
            return confirm("¿Estás seguro de que deseas borrar este elemento?");
        }
    
        function searchTable() {
        var searchText = document.getElementById("search").value.toLowerCase();
        var rows = document.querySelectorAll("table tr");
        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var found = false;
            for (var j = 0; j < row.cells.length; j++) {
                var cell = row.cells[j];
                if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
                    found = true;
                    break;
                }
            }
            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }
    
        // Llamamos a la función searchTable() cuando se modifica el contenido del input de búsqueda
        document.getElementById("search").addEventListener("input", searchTable);
    </script>
@endsection
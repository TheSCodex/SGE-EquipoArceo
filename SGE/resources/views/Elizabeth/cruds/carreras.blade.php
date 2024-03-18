@extends('templates/authTemplate')
@section('titulo', 'Panel de Carrera y academia')
@section('contenido')
    {{-- Test --}}
    @php
    $users = [
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
        ['Carrera' => 'Desarollo de software', 'División' => 'Software'],
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
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Carreras y Divisiones</h1>
            <div class="flex items-center flex-row justify-end">
                <div class="flex-1 md:mr-2">
                    <div class="flex justify-between border border-primaryColor items-center rounded-xl py-2 px-4">
                        <input id="search" placeholder="Buscador" type="text"
                            class="placeholder-primaryColor focus:outline-none font-montserrat py-1 px-2 justify-start">
                        <img class="w-6 h-6 mx-2 justify-end" src="/img/logos/buscar.svg">
                    </div>
                </div>
                <div class="hidden md:flex md:flex-col  md:items-center md:mx-3">
                    <button class="bg-green text-base py-1 px-3 mb-1 rounded-md text-white">▲</button>
                    <button class="bg-green text-base py-1 px-3 rounded-md text-white">▼</button>
                </div>
                <a href="/panel-careers/create"
                    class="hidden md:block bg-green text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva carrera y división</a>
            </div>
            <!-- Elementos que se mostrarán solo en dispositivos móviles -->
            <div class="flex justify-between md:hidden mt-2 mx-auto">
                <div class="flex">
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white mr-2">▲</button>
                    <button class="bg-green text-lg py-2 px-4 rounded-md text-white">▼</button>
                </div>
                <a href="/panel-careers/create" class="bg-green text-lg py-2 px-4 rounded-md text-white ml-2">Agregar nueva carrera y división</a>
            </div>
            </div>
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
            {{-- cards --}}
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($users as $user)
                        <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                            <h2 class="text-lg font-bold">{{ $user['Carrera'] }}</h2>

                            <p class="text-sm text-gray-500">División: {{ $user['División'] }}</p>
      
                            <div class="flex justify-end mt-4">
                                   <a href="/editCareer">
                                    <button> <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer"></button>
                                   </a>
                                    <a >
                                        <button><img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer"></button>
                                    </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Display table on larger screens -->
            <div class="hidden lg:block w-full">
                <table class="text-center">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs">Carrera</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">División</th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                        <th class="text-[#ACACAC] font-roboto text-xs"></th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td class="font-roboto font-bold py-5">{{ $user['Carrera'] }}</td>
                            <td class="font-roboto font-bold py-5">{{ $user['División'] }}</td>
                            <td class="font-roboto font-bold py-5">
                                <a href="/editCareer"> <button><img src="/img/logos/pencil.svg"></button></a>
                            </td>
                            <td class="font-roboto font-bold py-5">
                                <button><img src="/img/logos/trash.svg"></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
<<<<<<< HEAD
        <div class="hidden lg:block w-full">
            <table class="text-center w-full">
                <tr>
                    <th class="text-[#ACACAC] font-roboto text-xs">Carrera</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Division</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Academia</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Presidenta</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Editar</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                </tr>
                @foreach ($careers as $career)
                <tr>
                    <td class="font-roboto font-bold py-5">{{ $career->name }}</td>
                    <td class="font-roboto font-bold py-5">{{ $career->division_name }}</td>
                    <td class="font-roboto font-bold py-5">{{ $career->academy_name }}</td>
                    <td class="font-roboto font-bold py-5">{{ $career->president_name}}</td>
                    <td class="font-roboto font-bold py-5 cursor-pointer ">
                        {{--
                            <a href="{{ route('panel-careers.edit', $career->id_career) }}" class="flex justify-center">
                            <img src="/img/logos/pencil.svg">
                        </a>
                        --}}
                    </td>
                    <td class="font-roboto font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $career->name }}', '{{ $career->id_career}}')">
                        <form class="flex justify-center" id="deleteForm{{ $career->id}}" action="{{ route('panel-careers.destroy', $career->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <img src="/img/logos/trash.svg">
                        </form>
                        
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
    
</section>

<script>
    function confirmDelete(careerName, careerId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Estás a punto de eliminar a ${careerName}. Esta acción no se puede revertir.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + careerId).submit();
            }
        });
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



=======
    </main>
>>>>>>> 3b92094501480732d33f3837606e24a369d504d5
@endsection
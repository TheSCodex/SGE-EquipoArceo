@extends('templates/authTemplate')
@section('titulo', 'Panel de Compañias')
@section('contenido')
{{-- Test --}}

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


<main class="flex flex-col justify-center items-center  min-h-full flex-grow">
    

    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de Empresas</h1>
        <div class="flex items-center flex-row justify-end">
            <div>
                <div class="hidden md:flex items-center relative" >
                    <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="/panel-companies-create"
                class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva empresa
            </a>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
            
            <div>
                <div class="flex items-center relative" >
                    <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="/panel-companies-create"
                class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva empresa
            </a>

        </div>
    </div>




    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
        {{-- cards --}}
        <div class=" max-sm:hidden  w-full">
            <table class="text-center">
                <tr>
                    <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Correo Electrónico</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Celular</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Fecha de registro</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Dirección</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">RFC</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Area de especialización</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Acciones</th>
                    <th class="text-[#ACACAC] font-roboto text-xs"></th>
                </tr>
                @foreach ($companies as $company)
                <tr>
                    <td class="font-roboto font-bold py-5">{{ $company['name'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['email'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['phone'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['registration_date'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['address'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['rfc'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company->businessSector->title }}</td>
                    <td class="font-roboto font-bold py-5 flex  gap-2 items-center">
                        <form action="{{ route('panel-companies.edit', $company->id) }}" method="GET">
                            @csrf
                            <button type="submit">
                                <img src="/img/logos/pencil.svg" alt="Editar" class="cursor-pointer">
                            </button>
                        </form>
                        <form id="deleteForm" action="{{ route('panel-companies.destroy', $company['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirmDelete();">
                                <img src="/img/logos/trash.svg" alt="Eliminar">
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>

        <div class=" sm:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($companies as $company)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $company['name'] }}</h2>
                    <h2 class="text-lg font-bold">{{ $company['email'] }}</h2>
                    <p class="text-sm text-gray-500">celular: {{ $company['phone'] }}</p>
                    <p class="text-sm text-gray-500">Fecha de registro: {{ $company['registration_date'] }}</p>
                    <p class="text-sm text-gray-500">dirección: {{ $company['address'] }}</p>
                    <p class="text-sm text-gray-500">rfc: {{ $company['rfc'] }}</p>
                    <p class="text-sm text-gray-500">Especialidad: {{ $company['business_sector_id'] }}</p>
                
                    <div class="font-roboto font-bold py-5">
                        <form action="{{ route('panel-companies.edit', $company->id) }}" method="GET">
                            @csrf
                            <button type="submit">
                                <img src="/img/logos/pencil.svg" alt="Editar" class="cursor-pointer">
                            </button>
                        </form>
                    </div>
                
                    <div class="font-roboto font-bold py-5">
                        <form action="{{ route('panel-companies.destroy', $company['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <img src="/img/logos/trash.svg" alt="Eliminar">
                            </button>
                        </form>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
        <!-- Display table on larger screens -->

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












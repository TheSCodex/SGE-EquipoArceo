@extends('templates/authTemplate')
@section('titulo', 'Panel de Compañias')
@section('contenido')

<main class="flex flex-col justify-center items-center min-h-full flex-grow">

    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de Empresas</h1>
            <div class="flex items-center flex-row justify-end">
                <div>
                    <div class="hidden md:flex items-center relative">
                        <input id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
                <a href="/panel-companies-create" class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva empresa</a>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">

            <div>
                <div class="flex items-center relative">
                    <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="/panel-companies-create" class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva empresa</a>

        </div>
    </div>

    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
        <div class=" max-sm:hidden  w-full">
            <table class="text-left  w-full">
                <tr>
                    <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Correo Electrónico</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Celular</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">RFC</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Area de especialización</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Editar</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                    {{--<th class="text-[#ACACAC] font-roboto text-xs">Detalles</th> <!-- Nuevo -->--}}
                </tr>
                @foreach ($companies as $index => $company)
                <tr>
                    <td class="font-roboto font-bold py-5">{{ $company['name'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['email'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['phone'] }}</td>
                    <td class="font-roboto font-bold py-5">{{ $company['rfc'] }}</td>
                   {{-- <td class="font-roboto font-bold py-5">{{ $company->businessSector->title }}</td> --}}

                    <td class="font-roboto font-bold py-5">
                        <form action="{{ route('panel-companies.edit', $company->id) }}" method="GET">
                            @csrf
                            <button type="submit">
                                <img src="/img/logos/pencil.svg" alt="Editar" class="cursor-pointer">
                            </button>
                        </form>
                    </td>
                    <td class="font-roboto font-bold py-5">
                        <form id="deleteForm" action="{{ route('panel-companies.destroy', $company['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirmDelete();">
                                <img src="/img/logos/trash.svg" alt="Eliminar">
                            </button>
                        </form>
                    </td>
                    <td class="font-roboto font-bold py-5">
                        <button onclick="openModal('{{ $index }}')" class="text-primaryColor underline cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#02AB82" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                          </svg></button>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>

        <div class=" sm:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($companies as $index => $company)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $company['name'] }}</h2>
                    <h2 class="text-lg font-bold">{{ $company['email'] }}</h2>
                    <p class="text-sm text-gray-500">celular: {{ $company['phone'] }}</p>
                    <p class="text-sm text-gray-500">Fecha de registro: {{ $company['registration_date'] }}</p>
                    <p class="text-sm text-gray-500">dirección: {{ $company['address'] }}</p>
                    <p class="text-sm text-gray-500">rfc: {{ $company['rfc'] }}</p>
                   {{-- <p class="text-sm text-gray-500">Especialidad: {{ $company['business_sector_id'] }}</p> --}}

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
                    <div class="font-roboto font-bold py-5">
                        <button onclick="openModal('{{ $index }}')" class="text-primaryColor underline cursor-pointer">Ver Detalles</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Display table on larger screens -->

    </div>
</main>

<!-- Modal -->
@foreach ($companies as $index => $company)
<div id="companyModal{{ $index }}" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <!-- Contenido del modal -->
            <div class="p-4">
                <h2 class="text-lg font-bold mb-2">Detalles de la Empresa</h2>
                <p><strong>Fecha de Registro:</strong> {{ $company['registration_date'] }}</p>
                <p><strong>Dirección:</strong> {{ $company['address'] }}</p>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button onclick="closeModal('{{ $index }}')" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primaryColor text-base font-medium text-white hover:bg-primaryColorFocus focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primaryColorFocus sm:ml-3 sm:w-auto sm:text-sm">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    function openModal(index) {
        document.getElementById("companyModal" + index).classList.remove("hidden");
    }

    function closeModal(index) {
        document.getElementById("companyModal" + index).classList.add("hidden");
    }

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

    document.getElementById("search").addEventListener("input", searchTable);
</script>
@endsection

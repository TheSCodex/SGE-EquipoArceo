@extends('templates/authTemplate')
@section('titulo', 'Panel de Compañias')
@section('contenido')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}",
        });
    </script>
@endif
    <main class="flex flex-col  max-sm:px-2  justify-start items-center min-h-screen flex-grow">
        <div class="sm:p-8 text-left w-[90%]  mb-[2vh] sm:mb-0 ">
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
                <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de Empresas</h1>
                <div class="flex items-center flex-row justify-end">
                    <div>
                        <div class="hidden md:flex items-center relative">
                            <form action="{{ route('search.company') }}" method="GET" id="search-form">
                                <div class="hidden md:flex items-center relative">
                                    <input name="query" id="search" class="border-primaryColor placeholder-primaryColor border-b border rounded-md" type="search" placeholder="Buscar...." style="color: green;">
                                </div>
                            </form>    
                        </div>
                    </div>
                    <a href="/panel-companies/create"
                        class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar
                        nueva empresa</a>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">

                <div>
                    <div class="flex items-center relative">
                        <input
                            class="border-primaryColor max-sm:hidden placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 "
                            type="search" placeholder="Buscar...." style="color: green;">
                        <input id='searchMovil'
                            class=" sm:hidden border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 "
                            type="search" placeholder="Buscar...." style="color: green;">

                    </div>
                </div>
                <a href="/panel-companies-create"
                    class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva empresa</a>

            </div>

            <div class="mt-6    mx-auto flex items-center  justify-center">
                <div class=" pl-12  max-lg:hidden  w-full">
                    @if ($companies->isEmpty())
                        <table class=" w-full">
                            <tr>
                                <th class="  text-[#ACACAC]  font-roboto text-xs">Nombre</th>
                                <th class="  text-[#ACACAC]  font-roboto text-xs">Correo Electrónico</th>
                                <th class="  text-[#ACACAC]  font-roboto text-xs">Celular</th>
                                <th class="  text-[#ACACAC]  font-roboto text-xs">RFC</th>
                                <th class="  text-[#ACACAC]  font-roboto text-xs">Area de especialización</th>
                                <th class="  text-[#ACACAC]  font-roboto text-xs">Detalles</th> <!-- Nuevo -->
                                <th class="  text-[#ACACAC]  font-roboto text-xs">Editar</th>
                                <th class="  text-[#ACACAC]  font-roboto text-xs">Eliminar</th>
                            </tr>
                        </table>

                        <p class="mt-4 text-red-500 text-center  text-lightGray font-bold text-2xl">sin resultados</p>
                    @else
                        <div class=" flex   justify-center items-center">
                            <table class="w-full">
                                <tr>
                                    <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs">Correo Electrónico</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs">Celular</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs">RFC</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs">Area de especialización</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-center">Detalles</th> <!-- Nuevo -->
                                    <th class="text-[#ACACAC] font-roboto text-xs text-center">Editar</th>
                                    <th class="text-[#ACACAC] font-roboto text-xs text-center">Eliminar</th>
                                </tr>
                                @foreach ($companies as $index => $company)
                                    <tr class="transition duration-100 ease-in-out hover:bg-lightGray/20">
                                        <td class="font-roboto  py-5 max-w-[200px]  truncate ">
                                            {{ $company['name'] }}</td>
                                        <td class="font-roboto  py-5 max-w-[200px]  truncate">
                                            {{ $company['email'] }}</td>
                                        <td class="font-roboto  py-5 max-w-[200px]  truncate">
                                            {{ $company['phone'] }}</td>
                                            
                                        <td class="font-roboto  py-5 max-w-[200px]  truncate">{{ $company['rfc'] }}
                                        </td>
                                        <td class="font-roboto  py-5 max-w-[200px]  truncate">
                                            {{ $company->businessSector->title }}</td>

                                        <td class="font-roboto  pt-6 py-5 text-center">
                                            <form action="">

                                                <a href="{{ route('panel-companies.show', $company->id) }}"
                                                    class="flex justify-center items-center">
                                                    <img src="/img/ojoGreen.svg" class="w-7">
                                                </a>
                                            </form>

                                        </td>

                                        <td class="font-roboto flex items-center justify-center font-bold py-5 text-center">
                                            <form class="pt-2 flex justify-center items-center" action="{{ route('panel-companies.edit', $company->id) }}"
                                                method="GET">
                                                @csrf
                                                <button type="submit">
                                                    <img src="/img/logos/pencil.svg" alt="Editar" class="cursor-pointer">
                                                </button>
                                            </form>
                                        </td>

                                        <td class="font-roboto font-bold py-5 text-center">
                                            <form id="deleteForm" class="flex justify-center items-center"
                                                action="{{ route('panel-companies.destroy', $company['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="flex items-center"
                                                    onclick="confirmDelete({{ $company['id'] }})">
                                                    <img src="/img/logos/trash.svg" alt="Eliminar">
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>

                        </div>


                    @endif

                </div>
                @if ($companies->isEmpty())
                    <p class="mt-4 text-red-500 text-center lg:hidden  text-lightGray font-bold text-2xl">sin resultados</p>
                @else
                    <div class=" lg:hidden w-full mb-5">
                        <div class="grid md:grid-cols-2 gap-4 w-full">
                            @foreach ($companies as $index => $company)
                                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                                    <h2 class="text-lg font-bold">{{ $company['name'] }}</h2>
                                    <h2 class="text-lg font-bold">{{ $company['email'] }}</h2>
                                    <p class="text-sm text-gray-500">celular: {{ $company['phone'] }}</p>
                                    
                                    <p class="text-sm text-gray-500">Fecha de registro: {{ $company['registration_date'] }}
                                    </p>
                                    <p class="text-sm text-gray-500">dirección: {{ $company['address'] }}</p>
                                    <p class="text-sm text-gray-500">rfc: {{ $company['rfc'] }}</p>

                                    <div class="flex gap-3 justify-end">
                                        <button class="font-roboto font-bold  ">
                                            <a href="{{ route('panel-companies.show', $company->id) }}"
                                                class="flex justify-center">
                                                <p
                                                    class="bg-primaryColor py-2 px-5 hover:bg-darkBlue ease-in duration-100  text-white rounded-xl font-semibold">
                                                    Ver detalles</p>
                                            </a>
                                        </button>

                                        <div class="font-roboto font-bold py-5">
                                            <form action="{{ route('panel-companies.edit', $company->id) }}"
                                                method="GET">
                                                @csrf
                                                <button type="submit">
                                                    <img src="/img/logos/pencil.svg" alt="Editar" class="cursor-pointer">
                                                </button>
                                            </form>
                                        </div>

                                        <div class="font-roboto font-bold py-5">
                                            <form action="{{ route('panel-companies.destroy', $company['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <img src="/img/logos/trash.svg" alt="Eliminar">
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <!-- Display table on larger screens -->

            </div>

    </main>
    <div class="w-[90%] m-auto py-2  max-sm:flex justify-center  ">
        {{ $companies->links() }}
    </div>




    <script>
        function openModal(index) {
            document.getElementById("companyModal" + index).classList.remove("hidden");
        }

        function closeModal(index) {
            document.getElementById("companyModal" + index).classList.add("hidden");
        }

        function confirmDelete(companyId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma la eliminación, envía el formulario
                    document.getElementById('deleteForm').action = '/panel-companies/' + companyId;
                    document.getElementById('deleteForm').submit();
                }
            });
        }


        $(document).ready(function() {
        // Función para realizar la búsqueda en tiempo real
        $('#search').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('companies.index') }}",
                type: "GET",
                data: { query: query },
                success: function(response) {
                    $('#user-list').html(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Función para limpiar el campo de búsqueda y restaurar la lista original de usuarios
        $('#search').on('search', function() {
            var query = $(this).val();
            if (query === '') {
                $.ajax({
                    url: "{{ route('companies.index') }}",
                    type: "GET",
                    success: function(response) {
                        $('#user-list').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
    </script>
@endsection

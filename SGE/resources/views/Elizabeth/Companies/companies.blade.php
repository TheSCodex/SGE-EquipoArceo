@extends('templates.administratorTemplate')
@section('titulo', 'Panel de Compañias')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de empresas</h1>
        <div class="flex items-center flex-row justify-end">
            <div>
                <div class="hidden md:flex items-center relative" >
                    <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
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
        <div class="lg:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($companies as $company)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $company->name }}</h2>
                    <p class="text-sm text-gray-500">Direcci[on]: {{ $company->address }}</p>
                    <p class="text-sm text-gray-500">Correo: {{ $company->email}}</p>
                    <p class="text-sm text-gray-500">Telefono: {{ $company->phone }}</p>
                    <p class="text-sm text-gray-500">Fecha de registro: {{ $company->registration_date }}</p>
                    <p class="text-sm text-gray-500">RFC: {{ $company->rfc }}</p>
                    <p class="text-sm text-gray-500">Giro Empresarial: {{ $company->business_sector_id }}</p>


                    <div class="flex justify-end mt-4">
                        <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                        <img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="hidden lg:block">
            <table class="text-center w-full">
                <tr>
                    <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Correo</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Telefono</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Fecha de registro</th>
                    {{-- <th class="text-[#ACACAC] font-roboto text-xs">Dirección</th> --}}
                    <th class="text-[#ACACAC] font-roboto text-xs">RFC</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Giro empresarial</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Editar</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                </tr>
                @foreach ($companies as $company)
                <tr>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->name }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->email }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->phone }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->registration_date }}</td>
                    {{-- <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->address }}</td> --}}
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->rfc }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->business_sector_id }}</td>




                    <td class="font-roboto font-bold py-5 cursor-pointer ">
                        <a href="{{ route('panel-companies.edit', $company->id) }}" class="flex justify-center">
                            <img src="/img/logos/pencil.svg">
                        </a>
                    </td>
                    <td class="font-roboto font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $company->name }}', '{{ $company->id }}')">
                        <form class="flex justify-center" id="deleteForm{{ $company->id }}" action="{{ route('panel-companies.destroy', $company->id) }}" method="POST">
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
    function confirmDelete(userName, userId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Estás a punto de eliminar a ${userName}. Esta acción no se puede revertir.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + userId).submit();
            }
        });
    }
</script>

@endsection
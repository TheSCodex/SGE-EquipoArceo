@extends('templates/authTemplate')
@section('titulo', 'Panel de Asesores Empresariales')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-start items-center  min-h-screen flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de Asesores Empresariales</h1>
        <div class="flex items-center flex-row justify-end">
            <form action="{{ route('search.advisors') }}" method="GET" id="search-form">
                <div class="hidden md:flex items-center relative">
                    <input name="query" id="search" class="border-primaryColor placeholder-primaryColor border-b border rounded-md" type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </form>             
            
            
            <a href="{{ route('panel-advisors.create')}}"
                class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar un nuevo Asesor Empresarial
            </a>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">

                <div>
                <form action="{{ route('search.advisors') }}" method="GET" id="search-form">
                    <div class="flex items-center relative" >
                        <input name='query' id="search" class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </form>
                </div>
                <a href="{{ route('panel-advisors.index')}}"
                    class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4 text-center">Agregar nuevo Asesor Empresarial
                </a>
            </div>
        </div>
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @if(count($advisors) > 0)
                        @foreach ($advisors as $advisor)
                            <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                                <h2 class="text-lg font-bold">{{ $advisor->name }}</h2>
                                <p class="text-sm text-gray-500">Correo: {{ $advisor->email }}</p>
                                <p class="text-sm text-gray-500">Número telefonico: {{ $advisor->phone }}</p>
                                <p class="text-sm text-gray-500">Empresa: {{ $advisor->company ? $advisor->company->name : 'Sin empresa asociada' }}</p>
                            <div class="flex justify-end mt-4 space-x-2">
                                <td>                    
                                    <a href="{{ route('panel-advisors.show', $advisor->id) }}" class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold">Ver detalles</a>
                                </td>
                                <td class="font-roboto font-bold py-5 cursor-pointer ">
                                    <a href="{{ route('panel-advisors.edit', $advisor->id) }}"class="flex justify-center">
                                        <img src="/img/logos/pencil.svg">
                                    </a>
                                </td>
                                <td class="font-roboto font-bold py-5 cursor-pointer">
                                    <form class="flex justify-start delete-form" id="deleteForm{{ $advisor->id }}" action="{{ route('panel-advisors.destroy', $advisor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <img src="/img/logos/trash.svg" onclick="confirmDelete('{{ $advisor->name }}, posición: {{ $advisor->position }}', '{{ $advisor->id }}')">
                                    </form>
                                </td>
                            </div>
                        </div>

                        @endforeach
                    @else
                    <p id="noDataMessage" class="mt-4 text-red-500 hidden text-center  text-lightGray font-bold text-2xl" style="display: block;">
                        Sin resultados</p>
                    @endif
                
                </div>
            </div>
            <div class="hidden lg:block w-full">
                <table class="text-start w-full">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Nombre</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Correo</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Número telefonico</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Empresa</th>
                        <th class="  text-[#ACACAC] font-roboto text-xs">Detalles</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Editar</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Eliminar</th>
                    </tr>
                    @if(count($advisors) > 0)
                        @foreach ($advisors as $advisor)
                            <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20  ">
                                <td class="font-roboto pl-5  py-5 ">{{ $advisor->name }}</td>
                                <td class="font-roboto  py-5 ">{{ $advisor->email }}</td>
                                <td class="font-roboto  py-5">{{ $advisor->phone }}</td>

                                <td class="font-roboto  py-5">{{ $advisor->company ? $advisor->company->name : 'Sin empresa asociada' }}</td>
                                
                                <td class=" text-start  pl-[2%]   font-roboto py-5">
                                    <a href="{{ route('panel-advisors.show', $advisor->id) }}"
                                                class="flex justify-start">
                                                <img src="/img/ojoGreen.svg" class="w-7">
                                            </a>
                                        </td>

                                <td class="font-roboto font-bold py-5  pr-[2%] pl-[1%] cursor-pointer ">
                                    <a href="{{ route('panel-advisors.edit', $advisor->id) }}" class="flex justify-center">
                                        <img src="/img/logos/pencil.svg">
                                    </a>
                                </td>
                                <td class="font-roboto font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $advisor->name }}, posición: {{ $advisor->position }}', '{{ $advisor->id }}')">
                                    <form class="flex justify-start px-4" id="deleteForm{{ $advisor->id }}" action="{{ route('panel-advisors.destroy', $advisor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <img src="/img/logos/trash.svg">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                </table>
                    <p id="noDataMessage" class="mt-4 text-red-500 hidden text-center  text-lightGray font-bold text-2xl" style="display: block;">
                        Sin resultados</p>
                    @endif
                </table>
                
            
            </div>
        </div>
    </div>
    
</section>
<div class="w-[90%] m-auto py-2  max-sm:flex justify-center">
    {{$advisors->links()}}
</div>
@if(session()->has('successAdd'))
<script>
    function confirmAgregar(){
        Swal.fire({
            title: '¡Exito!',
            text: `¡Asesor Empresarial agregado exitosamente!`,
            icon: 'success',
        })
    }
    confirmAgregar();
</script>
@endif
@if(session()->has('successEdit'))
<script>
    function confirmAgregar(){
        Swal.fire({
            title: '¡Exito!',
            text: `¡Asesor Empresarial editado exitosamente!`,
            icon: 'success',
        })
    }
    confirmAgregar();
</script>
@endif
@if(session()->has('successDelete'))
<script>
    function confirmAgregar(){
        Swal.fire({
            title: '¡Exito!',
            text: `¡Asesor Empresarial eliminad0 exitosamente!`,
            icon: 'success',
        })
    }
    confirmAgregar();
</script>
@endif





<script>

    
    function confirmDelete(advisorName, advisorId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Estás a punto de eliminar a ${advisorName}. Esta acción no se puede revertir.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + advisorId).submit();
            }
        });
    }
</script>

@endsection

@extends('templates/authTemplate')
@section('titulo', 'Lista de anteproyectos')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de anteproyectos</h1>
            <div class="flex items-center flex-row justify-end">
                <div>
                    <div class="hidden md:flex items-center relative" >
                        <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                <div>
                    <div class="flex items-center relative" >
                        <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
            </div>
        </div>
    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
        <div class="lg:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($projects as $project)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $project->name }}</h2>
                    <p class="text-sm text-gray-500">Votos: {{ $project->likes }}</p>
                    <p class="text-sm text-gray-500">Asesor: {{ $project->adviser->name }}</p>
                    <div class="flex justify-end mt-4 space-x-2">
                        <a href="{{ route('panel-users.show', $project->id )}}" class="flex justify-center">
                            <img src="/img/ojoGreen.svg" class="w-7">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="hidden lg:block w-full">
            <table class="text-start w-full">
                <tr class="w-full">
                    <th class="text-[#ACACAC] font-roboto text-xs ">N°</th>
                    <th class="text-[#ACACAC] font-roboto text-xs ">Nombre del proyecto</th>
                    <th class="text-[#ACACAC] font-roboto text-xs ">Votos </th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Asesor Academico</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Fecha de publicacion</th>
                    <th class="text-[#ACACAC] font-roboto text-xs ">Estado</th>
                    <th class="text-[#ACACAC] font-roboto text-xs ">Detalles</th>
                </tr>
                @foreach ($projects as $project)
                <tr class="w-full">
                    <td class="font-roboto font-bold py-5">{{ $project->id }} </td>
                    <td class="font-roboto font-bold py-5 text-center"">{{ $project->name }}</td>
                    <td class="font-roboto font-bold py-5 text-center" ">{{ $project->like }}</td>
                    <td class="font-roboto font-bold py-5 text-center">{{ $project->adviser->name }}</td>
                    <td class="font-roboto font-bold py-5 text-center">{{ $project->start_date  }}</td>
                    <td class="font-roboto font-bold py-5 text-center">{{ $project->status }}</td>

                    {{-- <td class="font-roboto font-bold py-5">
                        @isset($user->career_academy_id)
                            @php
                                $career = App\Models\Career::find($user->career_academy_id);
                            @endphp
                            @if($career)
                                {{ $career->name }}
                            @else
                                Sin especialidad
                            @endif
                        @else
                            Sin especialidad
                        @endisset
                    </td> --}}
                    </td>
                    <td class="font-roboto font-bold py-5 cursor-pointer">
                        <a href="{{ route('panel-users.show', $project->id )}}" class="flex justify-center">
                            <img src="/img/ojoGreen.svg" class="w-7">
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$projects->links()}}
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

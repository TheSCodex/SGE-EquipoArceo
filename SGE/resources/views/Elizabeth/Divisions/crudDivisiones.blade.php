
@extends('templates/authTemplate')
@section('titulo', 'Panel de Carreras y Academias')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class=" mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left"> Lista de Divisiones</h1>

        <div class="flex items-center flex-row justify-end">
            <div>
                <div class="hidden md:flex items-center relative" >
                    <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="{{ route('newDivision')}}"
                class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva division
            </a>
        </div>
        
        
        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
            
            <div>
                <div class="flex items-center relative" >
                    <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="{{ route('newDivision')}}"
                class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva carrera
            </a>

        </div>
        
    </div>
    <div class="flex mt-[2%] px-[4%]  ">
        <section class="font-bold text-sm md:space-x-6 space-x-2">
            <a href="panel-careers">
                <button id="btnAll"
                    class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg">Carreras</button>
                </a>
                <a href="panel-academies">
                    <button id="btnWithAdvisor"
                    class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded md:px-5 px-4 py-1 shadow-lg">Academias</button>
                </a>
                <a href="panel-divisions">
                    <button id="btnWithOutAdvisor"
                    class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg">Divisiones</button>
                </a>
        </section>
      </div>
    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between ">
        <div class="lg:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($divisions as $division)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $division->name }}</h2>
                    <p class="text-sm text-gray-500">Division: {{ $division->directors}}</p>
                    <p class="text-sm text-gray-500">Academia: {{ $division->phone }}</p>
                    <p class="text-sm text-gray-500">Presidente: {{ $division->position }}</p>
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('panel-divisions.edit', $division->id) }}" >
                        <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                        </a>
                        <a onclick="confirmDelete('{{ $division->name }} {{ $division->position }}', '{{ $division->id }}')">
                        <form id="deleteForm{{ $division->id }}" action="{{ route('panel-divisions.destroy', $division->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <img src="/img/logos/trash.svg" alt="Delete" class="ml-2 cursor-pointer">
                    </form>
                        </a> 
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="hidden lg:block w-full ">
            <table class="text-start w-full ">
                <tr class="border-b border-gray-200 pb-[2%]">
         
                    <th class="text-[#ACACAC] font-roboto text-xs text-start">Division</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start">Director</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start">Asistente del director</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start pr-[2%] ">Editar</th> 
                    <th class="text-[#ACACAC] font-roboto text-xs text-start pr-[4%] ">Eliminar</th> 
                </tr>
                @if(count($divisions) > 0)
                @foreach ($divisions as $division)
                <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20">
                    <td class="font-roboto pl-5 font-bold py-5">{{ $division->name }}</td>

                   <td class="font-roboto font-bold py-5 text-start ">
                        @if ($principal = $principals->where('id', $division->director_id)->first())
                            {{ $principal->name }}
                        @else
                            N/A
                        @endif    
                    </td>

                    <td class="font-roboto font-bold py-5 text-start ">
                        @if ($assistant = $assistants->where('id', $division->directorAsistant_id)->first())
                            {{ $assistant->name }}
                        @else
                            N/A
                        @endif
                    </td>
                    
                    {{-- <td class="font-roboto font-bold py-5">{{ $division->position }}</td>  --}}
                    <td class="font-roboto font-bold py-5 cursor-pointer">
                        <a href="{{ route('panel-divisions.edit', $division->id) }}" class="flex justify-start">
                            <img src="/img/logos/pencil.svg">
                        </a>
                    </td>
                    <td class="font-roboto flex justify-start font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $division->name }}, Presidente: {{ $division->position }}', '{{ $division->id }}')">
                        <form class="flex justify-center" id="deleteForm{{ $division->id }}" action="{{ route('panel-divisions.destroy', $division->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <img src="/img/logos/trash.svg">
                        </form>
                    </td> 
                </tr>
                @endforeach
                @else
                <h1 class="text-xl">No hay datos registrados </h>
                @endif
            </table>
           {{$divisions->links()}}
        </div>
    </div>
</div>
    
</section>
@if(session('success'))
<script>
    
    function confirmAgregar(){
        Swal.fire({
            title: 'Se agrego correctamente',
            text: `Agregaste una nueva carrera.`,
            icon: 'success',
        })
    }
    
</script>
@endif

<script>

 
    function confirmDelete(divisionName, divisionId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Estás a punto de eliminar a ${divisionName}. Esta acción no se puede revertir.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + divisionId).submit();
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


<script>
    function searchMobileTable() {
        var searchText = document.getElementById("searchMovil").value.toLowerCase();
        var divisions = document.querySelectorAll(".grid.md\\:grid-cols-2.gap-4.w-full > div");
        
        divisions.forEach(function(division) {
            var divisionText = division.innerText.toLowerCase();
            var found = divisionText.indexOf(searchText) > -1;
            division.style.display = found ? "" : "none";
        });
    }

    document.getElementById("searchMovil").addEventListener("input", searchMobileTable);
</script>
@endsection
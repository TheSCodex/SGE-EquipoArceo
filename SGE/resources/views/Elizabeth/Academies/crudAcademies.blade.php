
@extends('templates/authTemplate')
@section('titulo', 'Panel de Academias')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-start items-center  min-h-screen flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class=" mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left"> Lista de Academias</h1>

        <div class="flex items-center flex-row justify-end">
            <div>
                <div class="hidden md:flex items-center relative" >
                    <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="{{ route('newAcademies')}}"
                class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva academia
            </a>
        </div>
        
        
        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
            
            <div>
                <div class="flex items-center relative" >
                    <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="{{ route('newAcademies')}}"
                class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva academia
            </a>

        </div>
        
    </div>
    <div class="flex mt-[2%] px-[4%] ">
        <section class="font-bold text-sm md:space-x-6 space-x-2 flex">
           <a href="panel-careers">
            <button id="btnAll"
                class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg">Carreras</button>
            </a>
            <a href="panel-academies">
                <button id="btnWithAdvisor"
                class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-primaryColor text-white rounded md:px-5 px-4 py-1 shadow-lg">Academias</button>
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
                @foreach ($academies as $academy)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $academy->name }}</h2>
                    <p class="text-sm text-gray-500">Presidente:  @if ($president = $presidents->where('id', $academy->president_id)->first())
                        {{ $president->name }}
                        @else
                            N/A
                        @endif </p>
                    <p class="text-sm text-gray-500">División: {{ $academy->division->name ?? 'N/A'}}</p>
                   
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('panel-academies.edit', $academy->id) }}" >
                        <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer flex justify-start">
                        </a>
                        <a class="flex justify-start" onclick="confirmDelete('{{ $academy->name }} {{ $academy->position }}', '{{ $academy->id }}')">
                        <form id="deleteForm{{ $academy->id }}" action="{{ route('panel-academies.destroy', $academy->id) }}" method="POST">
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
            <table class="text-start w-full  ">
                <tr class="border-b border-gray-200 pb-[2%]">
                   
                    <th class="text-[#ACACAC] font-roboto text-xs text-start">Academia</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start">Presidente</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start">División</th>
                    <th class="text-[#ACACAC] font-roboto text-xs text-start  pr-[2%] ">Editar</th> 
                    <th class="text-[#ACACAC] font-roboto text-xs text-start pl-[1%] pr-[4%] ">Eliminar</th>
                </tr>
                    @foreach ($academies as $academy)
                    <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20">
                        {{-- dd($academy) --}}
                        <td class="font-roboto pl-5 font-bold py-5">{{ $academy->name }}</td>

                        <td class="font-roboto font-bold py-5 text-start ">
                            @if ($president = $presidents->where('id', $academy->president_id)->first())
                            {{ $president->name }}
                            @else
                                N/A
                            @endif    
                        </td>

                        <td class="font-roboto font-bold py-5 text-start ">
                            @if ($division = $divisions->where('id', $academy->division_id)->first())
                            {{ $division->name }}
                            @else
                                N/A
                            @endif    
                        </td>

                        
                        {{-- <td class="font-roboto font-bold py-5">{{ $career->position }}</td>  --}}
                        <td class="font-roboto font-bold py-5 cursor-pointer ">
                            <a href="{{route('panel-academies.edit', $academy->id) }}" class="flex pl-2">
                                <img src="/img/logos/pencil.svg">
                            </a>
                        </td>

                        <td class="font-roboto font-bold py-3 cursor-pointer " onclick="confirmDelete('{{ $academy->name }}','{{ $academy->id }}')">
                            <form class="flex justify-center pl-3" id="deleteForm{{ $academy->id }}" action="{{  route('panel-academies.destroy', $academy->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <img src="/img/logos/trash.svg">
                            </form>
                        </td> 
                        
                    </tr>
                    @endforeach
            </table>
            @if($academies->isEmpty())
                <p class="mt-4 text-red-500 text-center  text-lightGray font-bold text-2xl">Sin resultados</p>
            @endif
            {{$academies->links()}}
        </div>
    </div>
</div>
    
</section>
@if(session()->has('successAdd'))
<script>
    function confirmAgregar(){
        Swal.fire({
            title: '¡Exito!',
            text: `¡Academia agregada exitosamente!`,
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
            text: `¡Academia editada exitosamente!`,
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
            text: `¡Academia eliminada exitosamente!`,
            icon: 'success',
        })
    }
    confirmAgregar();
</script>
@endif

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


<script>
    function searchMobileTable() {
        var searchText = document.getElementById("searchMovil").value.toLowerCase();
        var careers = document.querySelectorAll(".grid.md\\:grid-cols-2.gap-4.w-full > div");
        
        careers.forEach(function(career) {
            var careerText = career.innerText.toLowerCase();
            var found = careerText.indexOf(searchText) > -1;
            career.style.display = found ? "" : "none";
        });
    }

    document.getElementById("searchMovil").addEventListener("input", searchMobileTable);
</script>
@endsection
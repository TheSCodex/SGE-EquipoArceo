
    @extends('templates/authTemplate')
    @section('titulo', 'Panel de Carreras y Academias')
    @section('contenido')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <section class="flex flex-col justify-start items-center  min-h-screen flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class=" mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class=" font-bold font-montserrat text-xl mb-2 text-center md:text-left"> Lista de Carreras</h1>

            <div class="flex items-center flex-row justify-end">
                <div class="hidden md:flex items-center relative">
                    <form action="{{ route('search.careers') }}" method="GET" id="search-form">
                        <div class="hidden md:flex items-center relative">
                            <input name="query" id="search" class="border-primaryColor placeholder-primaryColor border-b border rounded-md" type="search" placeholder="Buscar...." style="color: green;">
                        </div>
                    </form>    
                </div>
                <a href="{{ route('newCareer')}}"
                    class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva carrera
                </a>
            </div>
            
            
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                
                <div>
                    <div class="flex items-center relative" >
                        <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
                <a href="{{ route('newCareer')}}"
                    class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva carrera
                </a>

            </div>
            
        </div>
        <div class="flex mt-[2%] px-[4%]  ">
            <section class=" text-sm md:space-x-6 space-x-2 flex">
                <a href="{{ route('panel-divisions.index') }}">
                    <button id="btnWithOutAdvisor"
                    class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor focus:text-white bg-[#eee] rounded px-5 py-1 shadow-lg">Divisiones</button>
                </a>
    
                <a href="{{ route('panel-academies.index') }}">
                    <button id="btnWithAdvisor"
                    class="hover:text-white hover:bg-primaryColor  focus:bg-primaryColor focus:text-white bg-[#eee] rounded md:px-5 px-4 py-1  shadow-lg">Academias</button>
                </a>
                <a href="{{ route('panel-careers.index') }}">
                    <button id="btnAll"
                        class="hover:text-white hover:bg-primaryColor focus:bg-primaryColor text-white bg-primaryColor   rounded px-5 py-1 shadow-lg">Carreras</button>
                    </a>
    
            </section>
          </div>
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between ">
            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($careers as $career)
                    <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                        <h2 class="text-lg ">{{ $career->name }}</h2>
                        <p>Academia:
                            @if ($academy = $academies->where('id', $career->academy_id)->first())
                        {{ $academy->name }}
                        @else
                            N/A
                        @endif
                        </p>
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('panel-careers.edit', $career->id) }}" >
                            <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                            </a>
                            <a onclick="confirmDelete('{{ $career->name }} {{ $career->position }}', '{{ $career->id }}')">
                            <form id="deleteForm{{ $career->id }}" action="{{ route('panel-careers.destroy', $career->id) }}" method="POST">
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
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Carrera</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Academia</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start  pr-[2%] ">Editar</th> 
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-[1%] pr-[4%] ">Eliminar</th> 
                    </tr>
                    @foreach ($careers as $career)
                    <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20">
                        <td class="font-roboto pl-5  py-5">{{ $career->name }}</td>

                        <td class="font-roboto  py-5 text-start ">
                            @if ($academy = $academies->where('id', $career->academy_id)->first())
                            {{ $academy->name }}
                            @else
                                N/A
                            @endif    
                        </td>

                        
                        {{-- <td class="font-roboto  py-5">{{ $career->position }}</td>  --}}
                        <td class="font-roboto  py-5 cursor-pointer ">
                            <a href="{{ route('panel-careers.edit', $career->id) }}" class="flex pl-2">
                                <img src="/img/logos/pencil.svg">
                            </a>
                        </td>
                        <td class="font-roboto  py-5 cursor-pointer " onclick="confirmDelete('{{ $career->name }}', '{{ $career->id }}')">
                            <form class="flex justify-center pl-4" id="deleteForm{{ $career->id }}" action="{{ route('panel-careers.destroy', $career->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <img src="/img/logos/trash.svg">
                            </form>
                        </td> 
                    </tr>
                    @endforeach
                 
                </table>
                @if($careers->isEmpty())
                <p class="mt-4 text-red-500 text-center  text-lightGray  text-2xl">Sin resultados</p>
                @endif
             
            </div>
        </div>
    </div>
    
        
</section>
<div class="w-[90%] m-auto py-2  max-sm:flex justify-center  ">
    {{ $careers->links() }}
</div>
@if(session()->has('successAdd'))
<script>
    function confirmAgregar(){
        Swal.fire({
            title: '¡Exito!',
            text: `¡Carrera agregada exitosamente!`,
            icon: 'success',
        })
    }
    confirmAgregar();
</script>
@endif
@if(session()->has('successEdit'))
<script>
    function confirmEdit(){
        Swal.fire({
            title: '¡Exito!',
            text: `¡Carrera editada exitosamente!`,
            icon: 'success',
        })
    }
    confirmEdit();
</script>
@endif
@if(session()->has('successDelete'))
<script>
    function confirmDelete(){
        Swal.fire({
            title: '¡Exito!',
            text: `¡Carrera eliminada exitosamente!`,
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

        
            // Llamamos a la función searchTable() cuando se modifica el contenido del input de búsqueda
            
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
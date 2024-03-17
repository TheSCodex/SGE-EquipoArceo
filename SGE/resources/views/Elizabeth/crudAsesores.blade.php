
@extends('templates/authTemplate')
@section('titulo', 'Panel de Usuarios')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de Asesores Empresariales</h1>
        <div class="flex items-center flex-row justify-end">
            <div>
                <div class="hidden md:flex items-center relative" >
                    <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="{{ route('formAsesores')}}"
                class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo asesor
            </a>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
            
            <div>
                <div class="flex items-center relative" >
                    <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="{{ route('formAsesores')}}"
                class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo asesor
            </a>

        </div>
    </div>
    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
        <div class="lg:hidden w-full mb-5">
            <div class="grid md:grid-cols-2 gap-4 w-full">
                @foreach ($advisors as $advisor)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">{{ $advisor->name }}</h2>
                    <p class="text-sm text-gray-500">Correo: {{ $advisor->email }}</p>
                    <p class="text-sm text-gray-500">número telefonico: {{ $advisor->phone }}</p>
                    <p class="text-sm text-gray-500">posición: {{ $advisor->position }}</p>
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('panel-advisors.edit', $advisor->id) }}" >
                        <img src="/img/logos/pencil.svg" alt="Edit" class="cursor-pointer">
                        </a>
                        <a onclick="confirmDelete('{{ $advisor->name }} {{ $advisor->position }}', '{{ $advisor->id }}')">
                        <form id="deleteForm{{ $advisor->id }}" action="{{ route('panel-advisors.destroy', $advisor->id) }}" method="POST">
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
        <div class="hidden lg:block w-full">
            <table class="text-center w-full">
                <tr>
                    <th class="text-[#ACACAC] font-roboto text-xs">Nombre</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Correo</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Número telefonico</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Posición</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Editar</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                </tr>
                @foreach ($advisors as $advisor)
                <tr>
                    <td class="font-roboto font-bold py-5">{{ $advisor->name }}</td>
                    <td class="font-roboto font-bold py-5">{{ $advisor->email }}</td>
                    <td class="font-roboto font-bold py-5">{{ $advisor->phone }}</td>
                    <td class="font-roboto font-bold py-5">{{ $advisor->position }}</td>
                    <td class="font-roboto font-bold py-5 cursor-pointer ">
                        <a href="{{ route('panel-advisors.edit', $advisor->id) }}" class="flex justify-center">
                            <img src="/img/logos/pencil.svg">
                        </a>
                    </td>
                    <td class="font-roboto font-bold py-5 cursor-pointer" onclick="confirmDelete('{{ $advisor->name }} {{ $advisor->position }}', '{{ $advisor->id }}')">
                        <form class="flex justify-center" id="deleteForm{{ $advisor->id }}" action="{{ route('panel-advisors.destroy', $advisor->id) }}" method="POST">
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
        var advisors = document.querySelectorAll(".grid.md\\:grid-cols-2.gap-4.w-full > div");
        
        advisors.forEach(function(advisor) {
            var advisorText = advisor.innerText.toLowerCase();
            var found = advisorText.indexOf(searchText) > -1;
            advisor.style.display = found ? "" : "none";
        });
    }

    document.getElementById("searchMovil").addEventListener("input", searchMobileTable);
</script>
@endsection
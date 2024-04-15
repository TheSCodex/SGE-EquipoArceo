@extends('templates/authTemplate')
@section('titulo', 'Lista de Grupos')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<section class="flex flex-col justify-start items-center  min-h-screen flex-grow">

    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de grupos</h1>
            <div class="flex items-center flex-row justify-end">
                <form action="{{ route('search.groups') }}" method="GET" id="search-form">
                    <div class="hidden md:flex items-center relative">
                        <input name="query" id="search" class="border-primaryColor placeholder-primaryColor border-b border rounded-md" type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </form>  
                <a href="/panel-groups/create"
                    class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo grupo
                </a>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                
                <div>
                    <div class="flex items-center relative" >
                        <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>


                <a href="/panel-groups/create"
                    class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo grupo
                </a>
            </div>

        </div>
        
        <div class="mt-6 w-11/12 mx-auto flex items-center justify-between min-h-full">

            <div class="lg:hidden w-full mb-5">
                <div class="grid md:grid-cols-2 gap-4 w-full">
                    @foreach ($groups as $group)
                    <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                        <h2 class="text-lg font-bold">Grupo: {{$group->name}}</h2>
                        <p class="text-sm text-gray-500 text-nowrap text-ellipsis overflow-hidden w-56">Carrera: {{ $group->career->name }}</p>
                        <div class="flex justify-end mt-4 space-x-2">
                            <div class="flex justify-end space-x-2">
                                <td>                    
                                    <a href="{{route('panel-groups.show', $group->id)}}" class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold">Ver detalles</a>
                                </td>
                            </div>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                <a href="{{ route('panel-groups.edit', $group->id) }}" class="flex justify-center">
                                    <img src="/img/logos/pencil.svg">
                                </a>
                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                {{-- Responsive --}}
                                <form class="flex justify-center delete-form" id="deleteForm{{ $group->id }}" action="{{ route('panel-groups.destroy', $group->id) }}" method="POST"  onclick="confirmDelete('{{ $group->name }}', '{{ $group->career_id }}')">
                                    @csrf
                                    @method('DELETE')
                                    <img src="/img/logos/trash.svg">
                                </form>
                            </td>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="hidden lg:block w-full h-screen">
                <table class="text-start w-full">
                    <tr>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">N°</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Grupo</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start">Carrera</th>
                        <th class="text-[#ACACAC] font-roboto text-xs px-5">Detalles</th>
                        <th class="text-[#ACACAC] font-roboto text-xs px-5">Editar</th>
                        <th class="text-[#ACACAC] font-roboto text-xs">Eliminar</th>
                    </tr>
                    @foreach ($groups as $group)
                        @php
                            $counter = ($groups->currentPage() - 1) * $groups->perPage() + $loop->index + 1;
                        @endphp
                        <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                            <td class="font-roboto ld py-5 cursor-pointer pl-5">{{ $counter }}</td>
                            <td class="font-roboto py-5 text-start pl-5">{{$group->name}}</td>
                            <td class="font-roboto py-5 text-start">{{$group->career->name}}</td>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                <a href="{{ route('panel-groups.show', $group->id )}}" class="flex justify-center">
                                    <img src="/img/ojoGreen.svg" class="w-7">
                                </a>
                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                <a href="{{ route('panel-groups.edit', $group->id) }}" class="flex justify-center">
                                    <img src="/img/logos/pencil.svg">
                                </a>
                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer"  onclick="confirmDelete('{{ $group->title }}', '{{ $group->id }}')">
                                <form class="flex justify-center" id="deleteForm{{ $group->id }}" action="{{ route('panel-groups.destroy', $group->id) }}" method="POST" onclick="confirmDelete('{{ $group->name }}', '{{ $group->id }}')">
                                    @csrf
                                    @method('DELETE')
                                    <img src="/img/logos/trash.svg" >
                                </form>

                                
                            </td>
                        </tr>
                    @endforeach

                </table>
                
            </div>
        </div>
        </div>
    </div>
    <div class="sm:p-8 sm:pt-0 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="w-11/12 mx-auto flex items-center justify-between">
            <div class="mx-auto md:w-full">
                {{$groups->links()}}
            </div>
        </div>
    </div>

</section>
<!-- Funciones JavaScript -->
<script>
    function togglePermissions(groupId) {
        var permissionsList = document.getElementById('permissions_' + groupId);
        permissionsList.classList.toggle('hidden');
    }

    @if(session('error'))
        Swal.fire({
            title: 'Oops...',
            text: '{{ session("error") }}',
            icon: 'error'
        });
    @endif

    @if(session('success'))
        Swal.fire({
            title: '¡Éxito!',
            text: '{{ session("success") }}',
            icon: 'success'
        });
    @endif
</script>

{{-- <script>
    
    public function searchGroups(Request $request)
{
    $query = $request->input('query');

    $groups = Group::where('name', 'like', '%' . $query . '%')
                  ->orWhereHas('career', function($q) use ($query) {
                      $q->where('name', 'like', '%' . $query . '%');
                  })
                  ->orWhereHas('career', function($q) use ($query) {
                      $q->whereHas('groups', function($qq) use ($query) {
                          $qq->where('name', 'like', '%' . $query . '%');
                      });
                  })
                  ->paginate(10);

    return view('search.groups', compact('groups'));
}


</script> --}}


<script>
    // Esta función confirma la eliminación de un usuario
    function confirmDelete(groupName, groupId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Estás a punto de eliminar a ${groupName}. Esta acción no se puede revertir.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                // Envía el formulario de eliminación si se confirma
                document.getElementById('deleteForm' + groupId).submit();
            }
        });
    }

  // Esta función realiza la búsqueda en la tabla cuando se modifica el contenido del campo de búsqueda
  function searchTable() {
        var searchText = document.getElementById("search").value.toLowerCase();
        var rows = document.querySelectorAll("table tr");
        var noUsersMessage = document.getElementById("no-users-message");
        var usersFound = false; // Variable para verificar si se encontraron usuarios

        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var found = false;
            for (var j = 0; j < row.cells.length; j++) {
                var cell = row.cells[j];
                if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
                    found = true;
                    usersFound = true; // Se encontró al menos un usuario
                    break;
                }
            }
            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }

        // Mostrar el mensaje de no se encontraron usuarios si no se encontraron usuarios
        if (!usersFound) {
            noUsersMessage.classList.remove('hidden');
        } else {
            noUsersMessage.classList.add('hidden');
        }
    }

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

        // Mostrar el mensaje de no se encontraron usuarios si no se encontraron usuarios
        var noUsersMessage = document.getElementById("no-users-message");
        var usersFound = [...advisors].some(advisor => advisor.style.display !== "none");
        if (!usersFound) {
            noUsersMessage.classList.remove('hidden');
        } else {
            noUsersMessage.classList.add('hidden');
        }
    }

    document.getElementById("searchMovil").addEventListener("input", searchMobileTable);
</script>

@endsection

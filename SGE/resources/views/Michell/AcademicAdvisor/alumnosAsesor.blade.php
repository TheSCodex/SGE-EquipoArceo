
@extends('templates/authTemplate')
@section('titulo', 'Estuadiantes Asesorados')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Estudiantes Asesorados</h1>
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
                    <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
           

        </div>
    </div>

   <section class="w-full px-2 lg:px-16">
        <div class="mx-8 my-5">
            <table class="w-full min-w-[600px] divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre de estudiante</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amonestacion</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($interns->count() > 0)
                        @foreach ($interns as $intern)
                        @php
                        $user = \App\Models\User::find($intern->user_id);
                    @endphp
                            <tr>
                                <td class="px-6 py-4 font-medium text-black  whitespace-nowrap">{{ $user->name }} {{$user->last_name}}</td>
                                <td class="px-6 py-4  font-medium text-black whitespace-nowrap">{{ $intern->studentStatus->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4  font-medium text-black whitespace-nowrap">{{ $intern->penalization->penalty_name ?? 'N/A' }}</td>
                                <td>
                                    <div class="flex gap-3 justify-center">
                                        <a href="{{route('download.sanon', $intern->id)}}" class="bg-green text-white px-5 py-1 text-sm rounded-md">
                                            Sansion
                                        </a>
                                        <a href="{{route('download.meria', $intern->id)}}" class="bg-green text-white px-5 py-1 text-sm rounded-md">
                                            Carta
                                        </a>
                                        <a href="{{route('download.aproba', $intern->id)}}" class="bg-green text-white px-5 py-1 text-sm rounded-md">
                                            Aprobacion
                                        </a>

                                        {{-- <form action="{{ route('intern.destroy', $intern->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')" class="bg-rose-500 text-white px-5 py-1 rounded-md text-sm">
                                                Eliminar
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                No hay estudiantes asesorados.
                            </td>
                        </tr>
                       
                    @endif
                </tbody>
            </table>
            {{$interns->links()}}
        </div>
    </section>
</div>

<script>
    function confirmDelete(advisorName, advisorId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: Estás a punto de eliminar a ${advisorName}. Esta acción no se puede revertir.,
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


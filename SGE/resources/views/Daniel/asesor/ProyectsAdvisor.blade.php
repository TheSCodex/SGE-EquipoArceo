@extends('templates/authTemplate')
@section('titulo', 'Lista de anteproyectos')
@section('contenido')
    @if (!$projectsAdvisor == null)
        <section class="flex flex-col justify-start items-center  min-h-screen h-full flex-grow">
        @else
            <section class="flex flex-col justify-start items-center  min-h-full h-screen flex-grow">
    @endif
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        @if (!$projectsAdvisor == null)
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
                <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Anteproyectos de Asesorados
                </h1>
            </div>
            <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
                <div class="w-full mb-5">
                    <div class="grid  md:grid-cols-3 lg:grid-cols-5 gap-4 w-full">
                        @foreach ($projectsAdvisor as $project)
                            <a href="{{ route('anteproyecto-Asesor.store', $project->id) }}" class="focus:outline-none">
                                <div
                                    class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl transform transition-transform hover:scale-105">
                                    <div
                                        class="border-b border-gray-500 pb-1 gap-1  w-11/12 md:flex md:items-center md:justify-between">
                                        <h2 class="text-lg font-bold">{{ $project->name }}</h2>
                                        <p class="text-sm text-center  font-bold text-primaryColor">
                                            {{ $project->like !== null ? $project->like : 0 }} Votos
                                        </p>
                                    </div>

                                    <p class="text-sm my-2 text-gray-500">
                                        {{ strlen($project->description) > 100 ? substr($project->description, 0, 100) . '...' : $project->description }}
                                    </p>
                                    <div class="flex mt-4 space-x-2">
                                        @foreach ($project->interns as $intern)
                                            <p class="text-sm text-gray-500">{{ $intern->user->name }}
                                                {{ $intern->user->last_name }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de anteproyectos de la
                división</h1>
            <div class="flex items-center flex-row justify-end">
                <div>
                    <div class="hidden md:flex items-center relative">
                        <input id='search'
                            class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search"
                            placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                <div>
                    <div class="flex items-center relative">
                        <input id='searchMovil'
                            class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 "
                            type="search" placeholder="Buscar...." style="color: green;">
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
                            <p class="text-sm text-gray-500">Votos: {{ $project->like !== null ? $project->like : 0 }}
                            </p>
                            <p class="text-sm text-gray-500">Asesor: {{ $project->adviser->name }}</p>
                            <div class="flex justify-end mt-4 space-x-2">
                                <td>
                                    <a href="{{ route('anteproyecto-Asesor.store', $project->id) }}"
                                        class="bg-primaryColor hover:bg-darkBlue ease-in duration-100 py-2 px-4 text-white rounded-xl font-semibold"">
                                        Ver detalles</a>
                                </td>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden lg:block w-full">
                <table class="text-start w-full">
                    <tr class="w-full">
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">N°</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5 w-[25%]">Nombre del proyecto</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Votos </th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Asesor Academico</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Fecha de publicacion</th>
                        <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5">Estado</th>
                        <th class="text-[#ACACAC] font-roboto text-xs ">Detalles</th>
                    </tr>

                    @foreach ($projects as $project)
                        @php
                            $counter = ($projects->currentPage() - 1) * $projects->perPage() + $loop->index + 1;
                        @endphp
                        <tr
                            class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                            <td class="font-roboto font-bold py-5 cursor-pointer pl-5">{{ $counter }}</td>
                            <td class="font-roboto font-bold py-5 pl-5">{{ $project->name }}</td>
                            <td class="font-roboto font-bold py-5 pl-8">
                                {{ $project->like !== null ? $project->like : 0 }}</td>
                            <td class="font-roboto font-bold py-5 pl-5">{{ $project->adviser->name }}</td>
                            <td class="font-roboto font-bold py-5 pl-5">{{ $project->start_date }}</td>
                            <td class="font-roboto font-bold py-5 pl-5">{{ ucfirst($project->status) }}</td>

                            </td>
                            <td class="font-roboto font-bold py-5 cursor-pointer">
                                <a href="{{ route('anteproyecto-Asesor.store', $project->id) }}"
                                    class="flex justify-center">
                                    <img src="/img/ojoGreen.svg" class="w-7">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div id="no-projects-message" class="hidden text-[#ACACAC] font-roboto text-center mt-6 ">No se encontraron
            projectos.</div>
    </div>
    <div class="my-5 mx-auto">
        {{ $projects->links() }}
    </div>

    </section>

    <script>
        function searchTable() {
            var searchText = document.getElementById("search").value.toLowerCase();
            var rows = document.querySelectorAll("table tr");
            var noProjectsMessage = document.getElementById("no-projects-message");
            var projectsFound = false;

            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var found = false;
                for (var j = 0; j < row.cells.length; j++) {
                    var cell = row.cells[j];
                    if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
                        found = true;
                        projectsFound = true;
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
            if (!projectsFound) {
                noProjectsMessage.classList.remove('hidden');
            } else {
                noProjectsMessage.classList.add('hidden');
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

            // Mostrar el mensaje de no se encontraron usuarios si no se encontraron usuarios
            var noUsersMessage = document.getElementById("no-projects-message");
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

@extends('templates/authTemplate')
@section('titulo', 'Lista de anteproyectos')
@section('contenido')
    <section class="flex flex-col justify-start items-center  min-h-full h-screen flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">

            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
                <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de anteproyectos </h1>
                <div class="flex items-center flex-row justify-end">
                    <div>
                        <div class="hidden md:flex items-center relative">
                            <input id='search'
                                class="border-primaryColor placeholder-primaryColor border-b border rounded-md "
                                type="search" placeholder="Buscar...." style="color: green;">
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
                @if ($projects->isEmpty())
                    <div class="text-[#ACACAC] font-roboto text-center mt-6 ">No se encontraron
                        projectos.</div>
                @else
                    <div class="lg:hidden w-full mb-5">
                        <div class="grid md:grid-cols-2 gap-4 w-full">
                            @foreach ($projects as $project)
                                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                                    <h2 class="text-lg font-bold">{{ $project->name }}</h2>
                                    <p class="text-sm text-gray-500">Votos:
                                        {{ $project->like !== null ? $project->like : 0 }}
                                    </p>
                                    <p class="text-sm text-gray-500">Asesor:
                                        {{ $project->interns->first()->academicAdvisor->user->name }}</p>
                                    <div class="flex justify-end mt-4 space-x-2">
                                        <td>
                                            <a href="{{ route('anteproyecto-Asesor.index', $project->id) }}"
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
                                <th class="text-[#ACACAC] font-roboto text-xs text-start pl-5 w-[25%]">Nombre del proyecto
                                </th>
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
                                @if (strtolower($project->status) == 'aprobado')
                                    <tr
                                        class="w-full transition duration-100 ease-in-out bg-green/20 hover:bg-green/40 border-b-gray-200 border-b-[0.5px]">
                                    @else
                                    <tr
                                        class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                                @endif
                                <td class="font-roboto font-medium py-5 cursor-pointer pl-5">{{ $counter }}</td>
                                <td class="font-roboto font-medium  py-5 pl-5">{{ $project->name }}</td>
                                <td class="font-roboto font-medium py-5 pl-8">
                                    {{ $project->like !== null ? $project->like : 0 }}</td>
                                <td class="font-roboto font-medium py-5 pl-5">
                                    {{ $project->interns->first()->academicAdvisor->user->name }}
                                    {{ $project->interns->first()->academicAdvisor->user->last_name }}</td>
                                <td class="font-roboto font-medium py-5 pl-5">{{ $project->start_date }}</td>
                                <td class="font-roboto font-medium py-5 pl-5">{{ ucfirst($project->status) }}</td>

                                </td>
                                <td class="font-roboto font-bold py-5 cursor-pointer">
                                    <a href="{{ route('anteproyecto-Asesor.index', $project->id) }}"
                                        class="flex justify-center">
                                        <img src="/img/ojoGreen.svg" class="w-7">
                                    </a>

                                </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endif
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

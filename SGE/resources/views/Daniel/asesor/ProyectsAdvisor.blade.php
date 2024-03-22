@extends('templates/authTemplate')
@section('titulo', 'Proyectos')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
        <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Proyectos de la division</h1>
        <div class="flex items-center flex-row justify-end">
            <div>
                <div class="hidden md:flex items-center relative">
                    <div class="relative">
                        <input id="buscarProyectos" class="border-primaryColor placeholder-primaryColor border-b border rounded-md pl-4 pr-10 py-2" type="search" placeholder="Buscar...." style="color: green;">
                        <img class="absolute top-1/2 transform -translate-y-1/2 right-2 w-6 h-6" src="/img/logos/buscar.svg" alt="Buscar">
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">

            <div>
                <div class="flex items-center relative" >
                    <div class="relative">
                        <input id="buscarProyectos2" class="border-primaryColor placeholder-primaryColor border-b border rounded-md pl-4 pr-10 py-2" type="search" placeholder="Buscar...." style="color: green;">
                        <img class="absolute top-1/2 transform -translate-y-1/2 right-2 w-6 h-6" src="/img/logos/buscar.svg" alt="Buscar">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="mt-6 w-11/12 mx-auto flex items-center justify-between">
        <div class="lg:hidden w-full mb-5">

            <div class="grid md:grid-cols-2 gap-4 w-full" id="proyectosContainer">
                @foreach ($proyectos as $proyecto)
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl" id="card">
                    <h2 class="text-lg font-bold">Proyecto: </h2>
                    <p class="text-sm text-gray-500">Estudiantes designados: {{ $proyecto->designated_students }}</p>
                    <p class="text-sm text-gray-500">Votos recibidos: {{ $proyecto->votes_received }}</p>
                    <p class="text-sm text-gray-500">Asesor Academico: {{ $proyecto->academic_consultant }}</p>
                    <p class="text-sm text-gray-500">Fecha de publicacion: {{ $proyecto->publication_date }}</p>
                    <p class="text-sm text-gray-500">Estado: {{ $proyecto->status }}</p>
                </div>
                @endforeach
                {{ $proyectos->links() }}
            </div>
        </div>
        <div class="hidden lg:block w-full">
            <table class="text-center w-full" id="proyectosTable">
                <tr>
                    <th class="text-[#ACACAC] font-roboto text-xs">N°</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Estudiantes designados</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Votos recibidos</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Asesor Academico</th>
                    {{-- <th class="text-[#ACACAC] font-roboto text-xs">Dirección</th> --}}
                    <th class="text-[#ACACAC] font-roboto text-xs">Fecha de publicacion</th>
                    <th class="text-[#ACACAC] font-roboto text-xs">Estado</th>
                </tr>
                @foreach ($proyectos as $proyecto)
                <tr>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $proyecto->id }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $proyecto->designated_students }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $proyecto->votes_received }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $proyecto->academic_consultant }}</td>
                    {{-- <td class="font-roboto font-bold py-5 text-nowrap">{{ $company->address }}</td> --}}
                    <td class="font-roboto font-bold py-5 text-nowrap">{{ $proyecto->publication_date }}</td>
                    <td class="font-roboto font-bold py-5 text-nowrap
                    @if ($proyecto->status == 'Aprobado') text-green
                    @elseif ($proyecto->status == 'En revisión') text-yellow-300
                    @elseif ($proyecto->status == 'Borrador') text-gray-500
                    @elseif ($proyecto->status == 'Cancelado') text-red
                    @endif">{{ $proyecto->status }}
                </td>
                                </tr>
                @endforeach
            </table>
            {{ $proyectos->links() }}

        </div>
    </div>
</div>
</section>

    {{-- buscador 1--}}


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputBuscar = document.getElementById('buscarProyectos');
        const proyectosContainer = document.getElementById('proyectosTable');

        inputBuscar.addEventListener('input', () => {
            const valorBuscar = inputBuscar.value.trim().toLowerCase();
            const proyectos = proyectosContainer.querySelectorAll('tr:not(:first-child)');

            proyectos.forEach(proyecto => {
                const textoProyecto = proyecto.textContent.trim().toLowerCase();
                if (textoProyecto.includes(valorBuscar)) {
                    proyecto.style.display = ''; // Mostrar la fila
                } else {
                    proyecto.style.display = 'none'; // Ocultar la fila
                }
            });
        });
    });
</script>


    {{-- buscador 2 --}}


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputBuscar = document.getElementById('buscarProyectos2');
        const proyectosContainer = document.getElementById('proyectosContainer');

        inputBuscar.addEventListener('input', () => {
            const valorBuscar = inputBuscar.value.toLowerCase();
            const proyectos = proyectosContainer.querySelectorAll('.bg-white');

            proyectos.forEach(proyecto => {
                const textoProyecto = proyecto.textContent.toLowerCase();
                if (textoProyecto.includes(valorBuscar)) {
                    proyecto.style.display = 'block';
                } else {
                    proyecto.style.display = 'none';
                }
            });
        });
    });


</script>

@endsection

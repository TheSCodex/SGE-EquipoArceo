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
            <div class="hidden md:flex md:flex-col  md:items-center md:mx-3">
                <svg width="28" height="38" viewBox="0 0 14 22" class="mt-3" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_641_2165)">
                        <path d="M12.6056 12.3749H1.4056C0.163097 12.3749 -0.466904 13.8573 0.416847 14.721L6.01685 20.221C6.56372 20.7581 7.45185 20.7581 7.99872 20.221L13.5987 14.721C14.4737 13.8573 13.8481 12.3749 12.6056 12.3749ZM7.0056 19.2499L1.4056 13.7499H12.6056L7.0056 19.2499ZM1.4056 9.6249H12.6056C13.8481 9.6249 14.4781 8.14248 13.5943 7.27881L7.99435 1.77881C7.44747 1.2417 6.55935 1.2417 6.01247 1.77881L0.412472 7.27881C-0.462528 8.14248 0.163097 9.6249 1.4056 9.6249ZM7.0056 2.7499L12.6056 8.2499H1.4056L7.0056 2.7499Z" fill="#02AB82" />
                    </g>
                    <defs>
                        <clipPath id="clip0_641_2165">
                            <rect width="14" height="22" fill="white" transform="translate(0.00585938)" />
                        </clipPath>
                    </defs>
                </svg>
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
                <div class="bg-white rounded-lg shadow-md p-4 drop-shadow-2xl">
                    <h2 class="text-lg font-bold">Proyecto: </h2>
                    <p class="text-sm text-gray-500">Estudiantes designados: {{ $proyecto->designated_students }}</p>
                    <p class="text-sm text-gray-500">Votos recibidos: {{ $proyecto->votes_received }}</p>
                    <p class="text-sm text-gray-500">Asesor Academico: {{ $proyecto->academic_consultant }}</p>
                    <p class="text-sm text-gray-500">Fecha de publicacion: {{ $proyecto->publication_date }}</p>
                    <p class="text-sm text-gray-500">Estado: {{ $proyecto->status }}</p>

                </div>
                @endforeach
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

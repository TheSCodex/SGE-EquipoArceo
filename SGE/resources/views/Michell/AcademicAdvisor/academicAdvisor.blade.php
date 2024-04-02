    @extends('templates.authTemplate')
    @section('contenido')
    <section class="flex flex-col justify-center items-center px-0 lg:px-4 min-h-full flex-grow font-montserrat">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="md:w-full md:h-[80%] md:flex flex-col justify-center md:mt-3">
                <section class=" space-y-5 mb-5">
                    <div class="md:flex items-center justify-between max-md:space-y-1 border-b pb-3">
                    <h1 id="tableTitle" class="text-xl font-bold">Lista de proyectos de la división</h1>
                    <div class="flex items-center">
            {{-- buscador --}}
            <div class="w-[90%] flex ml-[2cm] max-md:hidden">
                <input placeholder="Buscador" type="search" name="d" id="searchDesktop" class="w-[90%] placeholder:text-green placeholder:px-3 rounded-md mb-4 border-2 border-green focus:outline-none px-3">

                {{-- filtro --}}
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
            {{-- Buscador response --}}
            <div class="max-md:mr-3" id="searchContainer">
                <div class="xl:hidden lg:hidden md:hidden" id="searchIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search cursor-pointer" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1DAF90" fill="none" stroke-linecap="round" stroke-linejoin="round" id="searchIcon">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </div>
            </div>
            <div class="mr-3 xl:hidden lg:hidden md:hidden" id="disguise" style="display: none;">
                <input placeholder="Buscador" type="search" name="d" id="searchMovil" class=" w-54 placeholder:text-green placeholder:px-3 rounded-md border-2 border-green focus:outline-none px-3 xl:hidden lg:hidden md:hidden">
                <span id="closeButton" class="font-bold text-rose-400 cursor-pointer xl:hidden lg:hidden md:hidden">X</span>
            </div>

        </div>
    </section>
    {{-- Desktop --}}
    <section class="my-[2cm] mx-[2cm] max-md:mx-2cm ">
        <table class=" min-w-full divide-y divide-gray-200 max-md:mx-[2cm] max-md:w-full max-md:hidden" id="dataTable">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        N°
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estudiantes designados
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Votos recibidos
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Asesor academico
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha de publicación
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($datos as $dato)
                <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $dato['designated_students'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $dato['votes_received'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $dato['academic_consultant'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $dato['publication_date'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap @if ($dato['status'] == 'Aprobado') text-green @elseif($dato['status'] == 'En revisión') text-yellow-300 @elseif($dato['status'] == 'Borrador') text-gray-500 @elseif($dato['status'] == 'Cancelado') text-red @endif">
                        {{ $dato['status'] }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $datos->links() }}
    </section>
    {{-- Responsive --}}
    <section class="">
        <div class="hidden max-md:flex max-md:flex-wrap max-md:m-2 max-md:w-full">
            {{-- card --}}
            @foreach ($datos as $dato)
            <div class="max-md:bg-[#ffffff] max-md:shadow-md max-md:m-1 max-md:w-[95%] max-md:p-3" id="card">
                <p class="font-bold text-lg">Nombre: <b class="font-semibold">{{ $dato['designated_students'] }}</b>
                </p>
                <p class="font-bold text-lg">Votos: <b class="font-semibold">{{ $dato['votes_received'] }}</b></p>
                <p class="font-bold text-lg">Asesor academico: <b class="font-semibold">{{ $dato['academic_consultant'] }}</b></p>
                <p class="font-bold text-lg">Fecha de publicación: <b class="font-semibold">{{ $dato['publication_date'] }}</b></p>
                <p class="font-bold text-lg ">Estatus: <b class="font-semibold  @if ($dato['status'] == 'Aprobado') text-green @elseif($dato['status'] == 'En revisión') text-yellow-300 @elseif($dato['status'] == 'Borrador') text-gray-500 @elseif($dato['status'] == 'Cancelado') text-red @endif">{{ $dato['status'] }}</b>
                </p>
            </div>
            @endforeach
        </div>
    </section>


    {{-- Search desktop --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchDesktop');
            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const searchText = this.value.toLowerCase();

                for (let i = 1; i < rows.length; i++) {
                    const name = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();
                    if (name.includes(searchText)) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>

    {{-- Search mobile --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('searchIcon').addEventListener('click', function() {
                document.getElementById('searchContainer').style.display = 'none';
                document.getElementById('disguise').style.display = 'block';
                document.getElementById('disguise').focus(); // Para enfocar automáticamente el input
            });
            document.getElementById('closeButton').addEventListener('click', function() {
                document.getElementById('disguise').style.display = 'none';
                document.getElementById('searchContainer').style.display =
                    'block'; // Mostrar de nuevo el ícono de búsqueda
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchMovil');
            const cards = document.querySelectorAll('.max-md\\:bg-\\[\\#ffffff\\].max-md\\:shadow-md.max-md\\:m-1.max-md\\:w-\\[95\\%\\].max-md\\:p-3');

            searchInput.addEventListener('keyup', function() {
                const searchText = this.value.toLowerCase().trim();

                cards.forEach(card => {
                    const nameElement = card.querySelector('b');
                    if (nameElement.innerText.toLowerCase().includes(searchText)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
        @endsection
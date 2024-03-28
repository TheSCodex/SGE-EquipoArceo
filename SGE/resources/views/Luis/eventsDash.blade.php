<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actividades</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    @extends('templates/authTemplate')
    @section('contenido')
    <main class="flex flex-col justify-start items-center  min-h-full flex-grow h-screen h-min-full">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
                <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de actividades</h1>
                <div class="flex items-center flex-row justify-end">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input id="search" class="border-primaryColor placeholder-primaryColor border-b rounded-md py-2 px-4 focus:outline-none focus:border-blue-500" type="search" name="search" placeholder="Buscar....">
                        </div>
                        <select id="statusFilter" class="border-primaryColor rounded-md py-2 px-4 focus:outline-none focus:border-blue-500 w-36">
                            <option value="all">Todos</option>
                            <option value="Programada">Programada</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Terminada">Terminada</option>
                            <option value="Cancelada">Cancelada</option>
                        </select>
                    </div>
                    <a href="{{route('actividades.create')}}" class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nueva actividad</a>
                </div>
                <div class="flex sm:flex-row md:hidden mt-2 mx-auto justify-center">
                    <a href="{{route('actividades.create')}}" class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white">Agregar nueva actividad</a>
                </div>
            </div>
            <div class="w-10/12 mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-4 mt-10 mb-5 ">
                @foreach ($allEvents as $event)
                    <div class="mx-auto mb-5 bg-white rounded-xl drop-shadow-2xl event">
                        <div class="p-4">
                            <a href="{{route('actividades.show', $event->id)}}">
                                <ul class="border-l border-dashed border-primaryColor font-montserrat cursor-pointer" id="moreInfo">
                                    <li>
                                        <div class="flex-start flex items-center pt-3">
                                            <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor"></div>
                                            <h4 class="text-lg font-semibold event-title">{{$event['title']}}</h4>
                                        </div>
                                        <div class="ml-4">
                                            <h3 class="text-[#888] text-sm event-date">Fecha: {{ substr($event['date_start'], 0, 10) }}</h3>
                                            <h1 class="text-[#888] text-sm event-type">Propósito: {{$event['eventType']}}</h1>
                                            <h1 class="text-[#888] text-sm event-user">Con: {{$event['receiver']['user']['name']}} {{$event['receiver']['user']['last_name']}}</h1>
                                            <h1 class="text-[#888] text-sm event-place">Lugar: {{$event['location']}}</h1>
                                            <h1 class="text-[#888] text-sm event-status">Estatus: {{$event['status']}}</h1>
                                            <h1 class="text-[#888] text-sm">Hora: {{ substr($event['date_start'], 11)}} - {{ substr($event['date_end'], 11)}}</time>
                                        </div>
                                    </li>
                                </ul>
                            </a>
                            <div class="flex justify-center align-middle space-x-10 mt-4">
                                <div class="flex justify-center align-middle my-auto">
                                    <a href="{{route('actividades.edit', $event->id)}}">
                                        <img src="/img/logos/pencil.svg">
                                    </a>
                                </div>
                                <div class="flex justify-center align-middle my-auto">
                                    <form action="{{ route('actividades.destroy', $event->id) }}" class="delete-event" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src="/img/logos/trash.svg">
                                        </button>
                                    </form>
                                </div>
                                <div class="flex justify-center align-middle">
                                    <form action="{{ route('actividades.cancel', $event->id) }}" class="cancel-event" method="POST">
                                        @csrf
                                        <button class="bg-primaryColor px-3 py-2 rounded-xl font-semibold font-montserrat text-white">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-5 mx-auto">
                {{$allEvents->links()}}
            </div>
        </div>
    </main>
@endsection

@section('scripts-event')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "¡Agregado!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    @if (session('cancel_success'))
        <script>
            Swal.fire({
                title: "Cancelado!",
                text: "{{ session('cancel_success') }}",
                icon: "success"
            });
        </script>
    @endif

    @if (session('edit_success'))
        <script>
            Swal.fire({
                title: "¡Editado!",
                text: "{{ session('edit_success') }}",
                icon: "success"
            });
        </script>
    @endif

    @if (session('delete') == 'ok')
        <script>
            Swal.fire({
                title: "¡Eliminado!",
                text: "La actividad ha sido eliminada con éxito",
                icon: "success"
            });
        </script>
    @endif

    <script>
        // Función para filtrar por búsqueda de texto
        function filterByText() {
            var searchText = document.getElementById("search").value.toLowerCase();
            console.log(searchText);
            var events = document.querySelectorAll(".event");
            console.log(events);
            events.forEach(function(event) {
                var title = event.querySelector(".event-title").textContent.toLowerCase();
                var date = event.querySelector(".event-date").textContent.toLowerCase();
                var type = event.querySelector(".event-type").textContent.toLowerCase();
                var user = event.querySelector(".event-user").textContent.toLowerCase();
                var place = event.querySelector(".event-place").textContent.toLowerCase();
                if (title.includes(searchText) || date.includes(searchText) || type.includes(searchText) || user.includes(searchText) || place.includes(searchText)) {
                    event.style.display = "block";
                } else {
                    event.style.display = "none";
                }
            });
        }

        // Función para filtrar por el estatus
        function filterByStatus() {
            var status = document.getElementById("statusFilter").value.toLowerCase().trim(); // Convertir a minúsculas y quitar espacios en blanco
            var events = document.querySelectorAll(".event");
            events.forEach(function(event) {
                var eventStatus = event.querySelector(".event-status").textContent.toLowerCase().trim(); // Convertir a minúsculas y quitar espacios en blanco
                // Extraer el estatus del texto completo
                eventStatus = eventStatus.split(":")[1].trim(); // Dividir el texto por ":" y tomar la segunda parte, luego quitar espacios en blanco
                if (status === "all" || eventStatus === status) {
                    event.style.display = "block";
                } else {
                    event.style.display = "none";
                }
            });
        }

        // Event listener para búsqueda de texto
        document.getElementById("search").addEventListener("input", filterByText);

        // Event listener para filtrado por estatus
        document.getElementById("statusFilter").addEventListener("change", filterByStatus);


        $('.delete-event').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: "¿Estás Seguro?",
                text: "Esta actividad se eliminará definitivamente",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
</html>

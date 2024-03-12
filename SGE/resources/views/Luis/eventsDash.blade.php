<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')
    <main class="flex flex-col justify-center items-center  min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="border-b border-gray-200 mt-5 pb-2 mx-auto w-11/12 md:flex md:items-center md:justify-between">
            <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-left">Lista de eventos</h1>
            <div class="flex items-center flex-row justify-end">
                <form action="{{ route('eventos.filter') }}" method="POST" class="hidden md:block">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input class="border-primaryColor placeholder-primaryColor border-b rounded-md py-2 px-4 focus:outline-none focus:border-blue-500" type="search" name="search" placeholder="Buscar....">
                        </div>
                        <select name="status" class="border-primaryColor rounded-md py-2 px-4 focus:outline-none focus:border-blue-500">
                            <option value="all">Todos</option>
                            <option value="Programada">Programada</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Terminada">Terminada</option>
                            <option value="Cancelada">Cancelada</option>
                        </select>
                        <button type="submit" class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Filtrar</button>
                    </div>
                </form>

                <a href="{{route('eventos.create')}}"
                    class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo evento
                </a>
            </div>
            <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
                <div>
                    <div class="flex items-center relative" >
                        <input class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 py-2 px-4 " type="search" placeholder="Buscar...." style="color: green;">
                    </div>
                </div>
                <a href="{{route('eventos.create')}}"
                    class=" bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">Agregar nuevo evento
                </a>
            </div>
        </div>
        <div class="w-10/12 mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-4 mt-10 mb-5">
            @foreach ($allEvents as $event)
                <div class="mx-auto mb-5 bg-white rounded-xl drop-shadow-2xl">
                    <div class="p-4">
                        <h3 class="text-darkBlue font-bold text-xl">{{$event['date']}}</h3>
                        <ul class="border-l border-dashed border-primaryColor font-montserrat">
                            <li>
                                <div class="flex-start flex items-center pt-3">
                                    <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor"></div>
                                    <h4 class="text-lg font-semibold">{{$event['title']}}</h4>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Proposito: {{$event['eventType']}}</time>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Lugar: {{$event['location']}}</time>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Estatus: {{$event['status']}}</time>
                                </div>
                                <div class="ml-4">
                                    <time class="text-[#888] text-sm">Hora: {{ substr($event['date_start'], 11)}} - {{ substr($event['date_end'], 11)}}</time>
                                </div>
                            </li>
                        </ul>
                        <div class="flex justify-center space-x-12 mt-4">
                            <div class="flex justify-center align-middle">
                                <a href="{{route('eventos.edit', $event->id)}}">
                                    <img src="/img/logos/pencil.svg">
                                </a>
                            </div>
                            <div class="flex justify-center align-middle">
                                <form action="{{ route('eventos.destroy', $event->id) }}" class="delete-event" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="/img/logos/trash.svg">
                                    </button>
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
    </main>      
@endsection

</body>
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
                text: "El libro ha sido eliminado con éxito",
                icon: "success"
                });
        </script>
    @endif

    
    <script>
        $('.delete-event').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: "¿Estás Seguro?",
            text: "Este evento se eliminara definitivamente",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Si, eliminar!",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire({
                // title: "Deleted!",
                // text: "Your file has been deleted.",
                // icon: "success"
                // });

                this.submit();
            }
            });

        });
    </script>

 
@endsection
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Home</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
@extends('templates/authTemplate')
@section('contenido')

    @php
        $user = auth()->user();
    @endphp
    {{-- Con el siguiente código puedes obtener los permisos que tiene el usuario y con ellos hacer la 
        lógica en el header para poder presentar accesos directos segun sus permisos  --}}
    {{-- @php
        use App\Models\User;
        use App\Models\Role;
        $user = auth()->user();
        $userData = User::find($user->id);
        $userDataRole = Role::find($userData->rol_id);
    @endphp --}}

<div class="bg-white min-h-screen flex flex-col items-center">
<section class="w-full p-4 flex items-center mt-7">
<h1 class="text-2xl font-bold font-kanit ml-20">Estudiantes asesorados</h1>
    {{-- buscador --}}
    <div class="w-[50%] flex justify-evenly ml-auto">
        <input id="searchInput" placeholder="Buscador" type="search" name="d" class="w-[50%] placeholder:text-green placeholder:px-3 rounded-md mb-4 border-2 border-green focus:outline-none px-3">
        <svg width="28" height="38" viewBox="0 0 14 22" class="mt-3"  fill="none" xmlns="http://www.w3.org/2000/svg">
           
            <defs>
                <clipPath id="clip0_641_2165">
                    <rect width="14" height="22" fill="white" transform="translate(0.00585938)"/>
                </clipPath>
            </defs>
        </svg>
    </div>
</section>

    <section class="w-full px-2 lg:px-16">
    <div class="mx-8 my-5">
        <table class="w-full min-w-[600px] divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Matrícula</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Nombre de estudiante</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-black-500 uppercase tracking-wider">Amonestacion</th>
                    @if ($user->rol_id === 3)
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($interns)
                    @foreach ( $interns as $intern )
                    <tr class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $intern->identifier }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $intern->name }} {{ $intern->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $intern->interns->studentStatus->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $intern->interns->penalization->penalty_name ?? 'N/A' }}</td>
                            @if ($user->rol_id === 3)
                                <td>
                                <div class="flex gap-3 justify-center">
                                    <a href="" class="bg-green text-white px-5 py-1 text-sm rounded-md">
                                        Editar
                                    </a>

                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')" class="bg-rose-500 text-white px-5 py-1 rounded-md text-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                    @else
                        <tr>
                            <p class="text-center">No hay estudiantes</p>
                        </tr>
                @endif
            </tbody>
        </table>

        <div class="flex justify-center gap-5 mt-5">
            {{ $interns->links() }}
        </div>
    </section>

</div>
@endsection
</body>

<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('tbody tr').each(function() {
                var name = $(this).find('td:eq(1)').text().toLowerCase();
                if (name.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

</html>
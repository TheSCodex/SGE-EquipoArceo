@extends('templates/authTemplate')
@section('contenido')

    <div class="bg-white min-h-screen flex flex-col items-center">
    <section class="w-full p-4 flex items-center mt-7">
        <h1 class="text-2xl font-bold font-kanit ml-20">Estudiantes Asesorados</h1>
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
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->identifier }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }} {{$user->last_name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $intern->studentStatus->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $intern->penalization->penalty_name ?? 'N/A' }}</td>
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
        </div>
    </section>
</div>
@endsection

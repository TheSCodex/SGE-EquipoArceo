@extends('templates/authTemplate')
@section('contenido')

    <div class="bg-white min-h-screen flex flex-col items-center">
    <section class="w-full p-4 flex items-center mt-7">
    <h1 class="font-bold font-montserrat text-xl mb-2 text-center md:text-right">Estudiantes Asesorados</h1>
        <div class="flex items-center flex-row justify-end">
            <div>
                <div class="hidden md:flex items-center relative" >
                    <input  id='search' class="border-primaryColor placeholder-primaryColor border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
                </div>
            </div>
            <a href="{{ route('student.search')}}"
                class="hidden md:block bg-primaryColor text-lg py-2 px-4 rounded-md text-white md:ml-4">no se q va
            </a>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-between md:hidden mt-2 mx-auto">
            
            <div>
                <div class="flex items-center relative" >
                    <input id='searchMovil' class="border-primaryColor placeholder-primaryColor border-b border rounded-md w-full mb-2 sm:mb-0 " type="search" placeholder="Buscar...." style="color: green;">
                </div>


        </div>
    </div>
    </section>

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
                                        <a href="" class="bg-green text-white px-5 py-1 text-sm rounded-md">
                                            Generar
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

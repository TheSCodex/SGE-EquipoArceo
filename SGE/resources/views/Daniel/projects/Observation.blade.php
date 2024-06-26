@extends('templates/authTemplate')

@section('titulo')
    Observaciones
@endsection
@section('contenido')
<section class="flex flex-col justify-start items-center min-h-full h-screen flex-grow bg-gray-100 z-{-20}">
    <div class="sm: text-left w-[90%] mb-[2vh] sm:mb-0 relative">
        <div class="">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Observaciones
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Última actualización: {{ $tutorComment ? (is_string($tutorComment->fecha_hora) ? $tutorComment->fecha_hora : $tutorComment->fecha_hora->format('d/m/Y \a \l\a\s H:i')) : 'N/A' }}
                </p>
            </div>
            <div class="border border-black"></div>
            {{-- Cuadro de observación del tutor --}}
@if($tutorComment || $tutorComment === null)
<div class="sm:flex w-[95%] mt-4 mx-auto pb-10">
    @if($tutorComment)
    <div class="sm:w-full md:w-2/3 border-t rounded-l-lg border-gray-200 bg-white border h-64 p-4 overflow-y-auto overflow-hidden no-scrollbar">
        <div class="flex flex-col h-full">
            <div class="flex items-center">
                <div class="ml-4">
                    <h4 class="text-lg font-medium text-gray-900">
                        Asesor Académico
                    </h4>
                    <p class="text-sm text-gray-700">
                        {{ is_string($tutorComment->fecha_hora) ? $tutorComment->fecha_hora : $tutorComment->fecha_hora->format('d/m/Y \a \l\a\s H:i') }}
                    </p>
                    <p class="text-base text-gray-700">
                        {{ $tutorComment->content }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="sm:w-full md:w-2/3 border-t rounded-l-lg border-gray-200 bg-white border h-64 p-4 overflow-y-auto overflow-hidden no-scrollbar">
        <div class="flex flex-col h-full items-center justify-center">
            <p class="text-lg font-medium text-gray-900">Asesor Académico</p>
            <p class="text-base text-gray-700">N/A</p>
        </div>
    </div>
    @endif
    <div class="sm:w-full md:w-1/3 bg-primaryColor rounded-r-lg h-64 p-4 flex flex-col justify-between items-center text-center">
        <form method="post" action="{{ route('observationsAnteproyecto.store') }}">
            @csrf

            <div>
                <h4 class="text-lg font-medium text-white">
                    Responder
                </h4>
                <input placeholder="Comentario... (Explica a tu asesor cómo resolviste su observación brevemente)" class="bg-transparent text-base text-white placeholder-opacity-50 border-none border-transparent focus:outline-none focus:ring-0 hover:bg-white hover:text-black hover:placeholder-gray-400 rounded-md p-2 w-80" name="content" type="text" {{ $tutorComment === null ? 'disabled' : '' }}>
            </div>
            <button class="bg-darkGreen border-black text-white px-3 py-2 rounded-md hover:bg-green-dark" type="submit" {{ $tutorComment === null ? 'disabled' : '' }}>
                Guardar comentario 
            </button>
        </form>
    </div>
</div>
@endif

            {{-- Cuadros normales --}}
            <div class="sm:flex flex-wrap pb-5 max-h-[35vh] overflow-y-auto overflow-x-hidden overflow-y-transparent no-scrollbar">
                @php $counter = 0; @endphp
                @foreach($normalComments as $comment)
                    @if($counter % 2 == 0)
                        <div class="sm:w-full flex mb-5">
                    @endif
                        <div class="md:w-1/2 h-64 flex p-5">
                            <div class="border-t border-gray-200 rounded-l-lg bg-white border w-full h-64 p-4 overflow-y-auto overflow-hidden no-scrollbar">
                                <div class="flex flex-col h-full">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <h4 class="text-base font-medium text-gray-900">
                                                {{ $comment->loggedUserName }}
                                            </h4>
                                            <p class="text-sm text-gray-700">
                                                {{ is_string($comment->fecha_hora) ? $comment->fecha_hora : $comment->fecha_hora->format('d/m/Y \a \l\a\s H:i') }}
                                            </p>
                                            <p class="text-base text-gray-700 overflow-ellipsis overflow-hidden max-h-28">
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="w-2/5 bg-primaryColor h-64 p-4 flex flex-col justify-between items-center text-center">
                                <form method="post" action="{{ route('observationsAnteproyecto.store') }}">
                                    @csrf
                                    <div>
                                        <h4 class="text-lg font-medium text-white">
                                            Responder
                                        </h4>
                                        <input placeholder="Comentario... (Explica a tu asesor cómo resolviste su observación brevemente)" class="bg-transparent text-base text-white border-none border-transparent focus:outline-none focus:ring-0 rounded-md p-2 w-32  overflow-y-auto overflow-hidden hover:bg-white hover:text-black" name="content" type="text">
                                    </div>
                                    <button class="bg-darkGreen  border-black text-white px-3 py-2 m-10 rounded-md hover:bg-green-dark" type="submit">
                                        Guardar comentario 
                                    </button>
                                </form>
                            </div>
                        </div>
                    @if($counter % 2 == 1 || $loop->last)
                        </div>
                    @endif
                    @php $counter++; @endphp
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection

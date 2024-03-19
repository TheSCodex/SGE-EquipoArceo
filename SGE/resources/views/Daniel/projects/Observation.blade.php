@extends('templates/authTemplate')
@section('titulo')
    Observaciones
@endsection

@section('contenido')
<section class="flex flex-col justify-start items-center  min-h-full h-screen flex-grow bg-gray-100">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
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
    @if($tutorComment)
    <div class="sm:flex w-[95%] mt-4 mx-auto  pb-10">
        <div class="sm:w-full md:w-2/3 border-t rounded-l-lg border-gray-200 bg-white border h-64 p-4">
            <div class="flex flex-col h-full">
                <div class="flex items-center">
                    <div class="ml-4">
                        <h4 class="text-base font-medium text-gray-900">
                            Asesor Académico
                        </h4>
                        <p class="text-sm text-gray-500">
                            {{ is_string($tutorComment->fecha_hora) ? $tutorComment->fecha_hora : $tutorComment->fecha_hora->format('d/m/Y \a \l\a\s H:i') }}
                        </p>
                        <p class="text-base text-gray-600">
                            {{ $tutorComment->content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="sm:w-full md:w-1/3 bg-primaryColor rounded-r-lg h-64 p-4 flex flex-col justify-between items-center text-center">
            <div>
                <h4 class="text-lg font-medium text-white">
                    Resolver
                </h4>
                <p class="text-base text-white">
                    Comentario... (Explica a tu asesor cómo resolviste su observación brevemente)
                </p>
            </div>
            <button class="bg-darkGreen border-t border-black text-white px-3 py-2 rounded-md shadow-sm hover:bg-green-dark" type="submit">
                Marcar como resuelto y enviar a revisión
            </button>
        </div>
    </div>
    @endif

    {{-- Cuadros normales --}}
    <div class="sm:flex flex-wrap pb-10">
        @foreach($normalComments as $comment)
        <div class="sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 h-64 flex p-5 mb-5">
            <div class="border-t border-gray-200 rounded-l-lg bg-white border w-full h-64 p-4">
                <div class="flex flex-col h-full">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <h4 class="text-base font-medium text-gray-900">
                                Asesor Académico
                            </h4>
                            <p class="text-sm text-gray-500">
                                {{ is_string($comment->fecha_hora) ? $comment->fecha_hora : $comment->fecha_hora->format('d/m/Y \a \l\a\s H:i') }}
                            </p>
                            <p class="text-base text-gray-600 overflow-ellipsis overflow-hidden max-h-28">
                                {{ $comment->content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-full bg-primaryColor rounded-r-lg h-64 p-4 flex flex-col justify-between items-center text-center ">
                <div>
                    <h4 class="text-lg font-medium text-white">
                        Resolver
                    </h4>
                    <p class="text-base text-white">
                        Comentario...
                    </p>
                </div>
                <button class="bg-darkGreen border-t border-black text-white px-3 py-2 rounded-md shadow-sm hover:bg-green-dark" type="submit">
                    Resolver
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
    </div>
</section>
@endsection

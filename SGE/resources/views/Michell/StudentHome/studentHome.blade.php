@extends('templates/authTemplate')
@section('contenido')
    <div class="bg-[#F3F5F9] p-5 lg:gap-5 grid grid-cols-1 lg:grid-cols-3 grow">
        <section class="col-span-2 gap-3 flex flex-1 flex-col">
            <div class="bg-white rounded-md py-2">
                <h1 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Anteproyecto</h1>
            </div>
            <div class="font-kanit">
                <div class=" bg-primaryColor text-white rounded-md p-7">
                    @if ($studentProject)
                        <h3 class="font-bold text-lg md:text-xl">{{ $studentProject->name }}</h3>
                        <div class="my-2">
                            <p>Estatus: <span class="uppercase font-bold text-sm">{{ $studentProject->status }}</span></p>
                            <p class="mb-4 break-words line-clamp-3">Descripción: <span
                                    class="font-normal">{{ $studentProject->description }}</span></p>
                            <a href="anteproyecto"
                                class="text-[#555] bg-white py-2 px-7 font-normal font-roboto rounded-md text-sm">
                                Detalles
                            </a>
                        </div>
                    @else
                        <p class="text-center font-bold text-lg md:text-xl mb-5">Todavía no has creado una propuesta</p>

                        <div class="flex justify-center">
                            <a href="anteproyecto/nuevo"
                                class="text-[#555] bg-white py-2 px-7 font-normal font-roboto rounded-md text-sm">
                                Crear propuesta
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 grow">
                <div class="bg-white font-kanit flex gap-4 rounded-md items-center p-3">
                    <div class=" bg-primaryColor rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-2xl">
                            {{ $studentsCommentsCount }}</p>
                        <p class="text-sm text-black opacity-50">Comentarios</p>
                    </div>
                </div>

                <div class="bg-white font-kanit flex gap-4 rounded-md items-center p-3">
                    <div class=" bg-primaryColor rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        @if ($votes)
                            <p class="font-bold text-2xl">{{ $votes->like }}</p>
                        @else
                            <p class="font-bold text-2xl">0</p>
                        @endif
                        <p class="text-sm text-black opacity-50">Votos de los asesores</p>
                    </div>
                </div>

                <div class="bg-white font-kanit flex gap-4 rounded-md items-center p-3">
                    <div class=" bg-primaryColor rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        @if (isset($mensaje))
                            @if( count($notificaciones) > 0)
                                @foreach ($notificaciones as $notificacion)
                                    <p>{{ $notificacion->data['message'] }}</p>
                                    <div class="w-[90%] flex justify-around py-[.5vw] ">
                                        <form method="POST" id="AcceptCollab"
                                            action="{{ route('projects.AcceptCollab', ['id' => $notificacion->id]) }}">
                                            @csrf
                                            <button 
                                                class="bg-primaryColor text-white rounded-lg px-[1vw] self-end mb-[-1vh] mr-[-2vw]">Aceptar</button>
                                        </form>
                                        <form method="POST" id="DeleteCollab"
                                            action="{{ route('projects.DeleteCollab', ['id' => $notificacion->id]) }}">
                                            @csrf
                                            <button 
                                                class="bg-red text-white rounded-lg px-[1vw] self-end mb-[-1vh] mr-[-2vw]">Rechazar</button>
                                        </form>
                                    </div>
                                @endforeach
                            @else
                                <p>{{ $mensaje }}</p>
                            @endif
                        @else
                            <p>Día {{ $TotalDeDias }} de {{ $diaActual }}</p>
                        @endif
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-md font-kanit py-8 min-h-[300px]">
                <h3 class="font-semibold ml-10 md:text-center mb-5">Observaciones recientes</h3>
                <div class="mx-10 flex flex-col justify-between">
                    <div class="flex flex-col">
                        @if (count($comments) == 0)
                            <p class="text-center text-[#888] ">Por el momento no tienes observaciones.</p>
                        @else
                            <div class="flex flex-col gap-3 mb-5">
                                @foreach ($comments as $comment)
                                    <div class="">
                                        @php
                                            $formatedDate = \Carbon\Carbon::parse($comment->fecha_hora);
                                        @endphp
                                        <p class="text-[#888] font-semibold text-sm">{{ $formatedDate->diffForHumans() }}
                                        </p>
                                        <p class="text-[#888] line-clamp-3">{{ $comment->content }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-span-1 grid place-content-center">
                                <a href="anteproyecto/observaciones"
                                    class="bg-primaryColor rounded-md text-white text-center py-2 px-5 text-sm">
                                    Ampliar observación
                                </a>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </section>
        <section class="flex flex-col flex-1 gap-3 w-full col-span-1">

            <div class="bg-white rounded-md py-1 mt-3 lg:mt-0">
                <h3 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Asesor academico</h3>
            </div>

            <div class="space-y-2">
                <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">
                    @if ($advisor && $advisor->academicAdvisor)
                        <div class="bg-primaryColor rounded-full p-1 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="white" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <p>{{ $advisor->academicAdvisor->user->name }}</p>
                    @else
                        <p class="text-[#888] w-full text-center">Sin asesor académico</p>
                    @endif

                </div>
            </div>

            <div class="bg-white rounded-md py-1">
                <h3 class="text-lg font-medium font-kanit ml-6 max-md:text-center">Asesor empresarial</h3>
            </div>

            <div class="space-y-2">
                <div class="flex font-roboto text-base items-center space-x-5 bg-white rounded-md py-2">

                    @if (!$empresarial)
                        <p class="text-center w-full text-[#888] ">Por el momento no tienes asesores.</p>
                    @else
                        @foreach ($empresarial as $item)
                            <div class="bg-primaryColor rounded-full p-1 ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="white" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <p>{{ $item->asesor_empresarial }}</p>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class=" font-roboto bg-white p-5 rounded-l grow flex flex-col justify-center items-center">

                <h3 class="text-lg font-medium text-center font-kanit mb-3">Actividades importantes</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 place-items-center">
                    <div class="">

                        </ol>
                    </div>
                    <div class="">
                        </ol>
                    </div>

                </div>

                <div class="flex justify-center">
                    <a href="calendario"
                        class="bg-primaryColor text-white px-6 font-bold text-center text-sm py-1 rounded-md mt-3">
                        Ver más
                    </a>
                </div>

            </div>
            <div class="grid grid-cols-1  md:grid-cols-1 gap-3 h-[230px] ">
                <div class="bg-white p-5 font-black flex flex-col justify-center h-600px">
                    @if ($penalty === null)
                        <p class="text-center mb-5">No has recibido ninguna amonestación hasta el momento, buen trabajo!
                        </p>
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-up-filled"
                                width="70" height="70" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M13 3a3 3 0 0 1 2.995 2.824l.005 .176v4h2a3 3 0 0 1 2.98 2.65l.015 .174l.005 .176l-.02 .196l-1.006 5.032c-.381 1.626 -1.502 2.796 -2.81 2.78l-.164 -.008h-8a1 1 0 0 1 -.993 -.883l-.007 -.117l.001 -9.536a1 1 0 0 1 .5 -.865a2.998 2.998 0 0 0 1.492 -2.397l.007 -.202v-1a3 3 0 0 1 3 -3z"
                                    stroke-width="0" fill="currentColor" />
                                <path
                                    d="M5 10a1 1 0 0 1 .993 .883l.007 .117v9a1 1 0 0 1 -.883 .993l-.117 .007h-1a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7a2 2 0 0 1 1.85 -1.995l.15 -.005h1z"
                                    stroke-width="0" fill="currentColor" />
                            </svg>
                        </div>
                    @else
                        <h2>{{ $penalty->penalty_name }}</h2>
                        <p class="text-lg font-normal">{{ $penalty->description }}</p>
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection

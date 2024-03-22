@extends('templates/authTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('contenido')

    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <h1 class="text-2xl font-bold text-green-500 mb-[4%] sm:mb-[3%] border-b py-[1%] px-[1%] border-slate-700  ">
                Mi Anteproyecto
            </h1>
            @if (isset($message))
                <div class="w-full bg-red-200 text-red-700 py-2 px-4 mb-4 rounded-md">
                    {{ $message }}
                </div>
            @endif
            <div class="w-[91w] sm:w-[85vw] sm:min-h-[78vh] items-center flex flex-wrap sm:justify-between flex-grow ">
                <div
                    class="max-h-[615px] overflow-y-scroll no-scrollbar w-full sm:w-[68%] min-h-[50vh] sm:h-full flex flex-wrap lg-flex-col justify-between gap-[.5vh] md:gap-[1vh]">
                    <div
                        class="w-full bg-white px-[2%] sm:py-[.5%] flex-col rounded-sm font-semibold sm:font-bold my-[1%] sm:my-0">
                        <h3 class="text-lg">Nombre del proyecto: @if (isset($project))
                                <span class="mx-[1%] font-semibold">{{ $project->name }}</span>
                            @endif
                        </h3>
                    </div>
                    <div
                        class="w-full min-h-[92.5%] bg-white px-[2%] py-[.5%] rounded-sm font-semibold items-left">
                        <div class="w-full px-[3%] self-start border-b-2 border-black py-[2vh]">
                            @if (isset($project))
                                <p class=" w-[80%] sm:w-[full] text-lg sm:text-lg">Nombre de la empresa: <span
                                        class="mx-[1%] font-medium">{{ $company->name ?? 'No disponible' }}</span></p>
                                <p class=" w-[80%] sm:w-[full] text-lg sm:text-lg">Asesor empresarial: <span
                                        class="mx-[1%] font-medium">{{ $businessAdvisor->name ?? 'No disponible' }}</span>
                                </p>
                                <p class=" w-[80%] sm:w-[full] text-lg sm:text-lg">Área de desempeño: <span
                                        class="mx-[1%] font-medium">{{ $businessSector->title ?? 'No disponible' }}</span>
                                </p>
                        </div>
                        <div
                            class="flex flex-wrap flex-col flex-grow items-left justify-evenly min-h-[57vh] mt-[1.5%] gap-[4vh] w-full text-justify">
                            <div class="w-full flex flex-wrap justify-center">
                                <p class=" w-[80%] sm:w-[100%] text-lg sm:text-lg">Área de desempeño</p>
                                <p class=" w-[80%] sm:w-[100%] font-normal text-md">
                                    {{ $project->description }}
                                </p>
                            </div>
                            <div class="w-full flex flex-wrap justify-center">
                                <p class=" w-[80%] sm:w-[100%] text-lg sm:text-lg">Planteamiento del problema</p>
                                <p class=" w-[80%] sm:w-[100%] font-normal text-md">
                                    {{ $project->problem_statement }}
                                </p>
                            </div>
                            <div class="w-full flex flex-wrap justify-center">
                                <p class=" w-[80%] sm:w-[100%] text-lg sm:text-lg ">Justificación</p>
                                <p class=" w-[80%] sm:w-[100%] font-normal text-md">
                                    {{ $project->project_justificaction }}
                                </p>
                            </div>
                            <div class="w-full flex flex-wrap justify-center">
                                <p class=" w-[80%] sm:w-[100%] text-lg sm:text-lg">Actividades a realizar</p>
                                <p class=" w-[80%] sm:w-[100%] font-normal text-md">
                                    {{ $project->activities_to_do }}
                                </p>
                            </div>
                            <a href="{{ route('editAnteproyecto.edit', ['id' => $project->id]) }}" class="self-end px-[2vw] bg-[#02AB82] text-white rounded-md">Editar</a>
                        </div>
                    @else
                        <div
                            class="flex flex-wrap flex-col flex-grow items-center justify-center sm:min-h-[70vh] mt-[1.5%] gap-[10] ">
                            <!-- Esta linea es salida de los confines del inframundo -->
                            <p class=" w-[80%] sm:w-[38%] text-lg sm:text-2xl text-center ">Aun no tienes un
                                Anteproyecto. Empieza a trabajarlo ahora</p>
                            <a href="{{ route('formanteproyecto.create') }}"
                                class="block bg-[#02AB82] text-white rounded-md px-[2%] py-[1%] m-[2%] font-normal  text-center text-sm">Crea
                                uno ahora</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div
                class="sm:w-[31%] h-[82%] sm:h-full flex flex-wrap sm:flex-col justify-between mt-[1%] sm:mt-0 gap-[1vh] self-start">
                <div
                    class="w-full bg-white px-[2%] py-[1.6%] rounded-sm font-semibold sm:font-bold text-sm mb-[.5%] mt-[2%] sm:mt-0 sm:mb-0">
                    <h3>Estado del proyecto</h3>
                </div>
                <div
                    class=" w-full h-fit min-h-[12vh] my-[1%] sm:m-0 bg-white px-[2%] py-[.8%] rounded-sm font-semibold sm:h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center ">
                    <div class="w-[80%] flex flex-wrap items-center gap-[10%] ">
                        @if (isset($project))
                            <img src="{{ asset('img/iconosDaniel/estado.svg') }}" class="w-[15%]" />
                            <p class="w-[70%]">Tu proyecto esta guardado como borrador</p>
                        @else
                            <img src="{{ asset('img/iconosDaniel/eraser-solid.svg') }}" class="w-[15%]" />
                            <p class="w-[70%]">Aun no hay nada que guardar</p>
                        @endif
                    </div>
                </div>
                <div
                    class=" w-full min-h-[12vh] bg-white px-[2%] py-[.8%] rounded-sm font-semibold h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center self-start">
                    <div class="w-[80%] flex flex-wrap items-center h-full gap-[10%]">
                        <img src="{{ asset('img/iconosDaniel/votos.svg') }}" class="w-[15%]" />
                        <div class=" flex justify-between flex-wrap flex-row-reverse">
                            @if (isset($project))
                                @if ($project->like == 0)
                                    <p>Aun no tienes votos</p>
                                @else
                                    <p>Tienes {{ $project->like }} voto(s)</p>
                                @endif
                            @else
                                <p>Aun no hay nada que votar</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white px-[2%] py-[.8%] rounded-sm font-semimbold sm:font-bold text-sm">
                    <h3>Observaciones</h3>
                </div>
                @if (isset($comments) && count($comments) > 0)
                    <div
                        class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[41.5vh]  flex flex-wrap justify-center items-center text-xl overflow-y-auto">
                        @foreach ($comments as $comment)
                            <div class='flex flex-wrap w-full mb-[2vh]'>
                                <p class=' text-black w-full font-semibold text-sm'>Asesor</p>
                                <p class=' text-black opacity-[60%] w-full font-normal text-sm'>{{ $comment->content }}</p>
                            </div>
                        @endforeach
                        <a href="{{ route('observationsAnteproyecto') }}"
                            class="bg-[#02AB82] text-sm text-white font-lg px-[.5vw] py-[.2vw] rounded-md my-[2%]">Ver
                            observaciones</a>
                    </div>
                    <form method="POST" action="{{ route('observationsAnteproyecto.store') }}">
                        @csrf
                        <input class="w-full" name="content" placeholder="Ingrese su comentario" rows="4"/>
                        @error('content')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="self-end px-[2vw] bg-[#02AB82] text-white rounded-md w-full">Enviar comentario</button>
                    </form>
                    
                @elseif(isset($comments) && count($comments) == 0)
                    <div
                        class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[41.5vh]  flex justify-center items-center text-xl overflow-y-auto">
                        <p class=' text-center text-black opacity-[60%]'>No hay comentarios en tu anteproyecto.</p>
                    </div>
                    <form method="POST" action="{{ route('observationsAnteproyecto.store') }}">
                        @csrf
                        <input class="w-full" name="content" placeholder="Ingrese su comentario" rows="4"/>
                        @error('content')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="self-end px-[2vw] bg-[#02AB82] text-white rounded-md w-full">Enviar comentario</button>
                    </form>
                    
                @else
                    <div
                        class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[41.5vh]  flex justify-center items-center text-xl overflow-y-auto">
                        <p class=' text-center text-black opacity-[60%]'>Aun no tienes un anteproyecto Empieza a trabajarlo
                            ahora</p>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </section>
@endsection

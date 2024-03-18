@extends('templates/authTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('contenido')
    
    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0">
            <h1 class="text-2xl font-bold text-green-500 mb-[4%] sm:mb-[3%] border-b py-[1%] px-[1%] border-slate-700  ">Anteproyecto </h1>

<div class="w-[91w] sm:w-[85vw] sm:min-h-[78vh] items-center flex flex-wrap sm:justify-between flex-grow">

    <div class="w-full sm:w-[68%] min-h-[50vh] sm:h-full flex flex-wrap lg-flex-col justify-between gap-[.5vh] md:gap-[1vh]">
        <div class="w-full bg-white px-[2%] sm:py-[.5%] flex-col rounded-sm font-semibold sm:font-bold my-[1%] sm:my-0">
            <h3>Nombre del proyecto:     @if(isset($project))   <span class="mx-[1%] font-semibold">{{ $project->name }}</span>    @endif</h3>
        </div>

                <div class="w-full min-h-[92.5%] bg-white px-[2%] py-[.5%] rounded-sm font-bold flex flex-wrap items-center flex-col">
                    <div class="w-full px-[3%] self-start">
                        <div class="w-full px-[3%] self-start">

                            @if(isset($project))
                            <p class=" w-[80%] sm:w-[full] text-lg sm:text-lg">Nombre de la empresa: <span class="mx-[1%] font-semibold">{{ $company->name ?? 'No disponible'}}</span></p>
                            <p class=" w-[80%] sm:w-[full] text-lg sm:text-lg">Asesor empresarial: <span class="mx-[1%] font-semibold">{{ $businessAdvisor->name ?? 'No disponible'}}</span></p>
                            <p class=" w-[80%] sm:w-[full] text-lg sm:text-lg">Área de desempeño: <span class="mx-[1%] font-semibold">{{ $businessSector->title ?? 'No disponible'}}</span></p>
                        </div>
                        <div class="flex flex-wrap flex-col flex-grow items-center justify-evenly min-h-[57vh] mt-[1.5%] gap-[10] w-full"> <!-- Esta linea es salida de los confines del inframundo -->
                            <div class="w-full flex flex-wrap justify-center">
                                <p class=" w-[80%] sm:w-[80%] text-lg sm:text-lg text-center">Área de desempeño</p>
                                    <p class=" w-[80%] sm:w-[90%] font-normal text-sm    text-center">
                                        {{ $project->description }}
                                    </p>
                                </div>
    
                                <div class="w-full flex flex-wrap justify-center">
                                    <p class=" w-[80%] sm:w-[80%] text-lg sm:text-lg text-center">Planteamiento del problema</p>
                                    <p class=" w-[80%] sm:w-[90%] font-normal text-sm    text-center">
                                        {{ $project->problem_statement }}
                                    </p>
                                </div>
    
                                <div class="w-full flex flex-wrap justify-center">
                                    <p class=" w-[80%] sm:w-[80%] text-lg sm:text-lg text-center">Justificación</p>
                                    <p class=" w-[80%] sm:w-[90%] font-normal text-sm text-center">
                                        {{ $project->project_justificaction }}
                                    </p>
                                </div>
    
                                <div class="w-full flex flex-wrap justify-center">
                                    <p class=" w-[80%] sm:w-[80%] text-lg sm:text-lg text-center">Actividades a realizar</p>
                                    <p class=" w-[80%] sm:w-[90%] font-normal text-sm    text-center">
                                        {{ $project->activities_to_do }}
                                    </p>
                                    
                                </div>
                                <button class="self-end px-[2vw] bg-[#02AB82] text-white rounded-md">Editar</button>
                            </div>
    
                            @else
    
                        <div class="flex flex-wrap flex-col flex-grow items-center justify-center sm:min-h-[70vh] mt-[1.5%] gap-[10] "> <!-- Esta linea es salida de los confines del inframundo -->
    
                            <p class=" w-[80%] sm:w-[38%] text-lg sm:text-2xl text-center ">Aun no se ha creado un anteproyecto</p>

                                </div>
                            </div>
                                
                            @endif
                        </div>
                    </div>
                </div>



            <div class="sm:w-[31%] h-[82%] sm:h-full flex flex-wrap sm:flex-col justify-between mt-[1%] sm:mt-0 self-start gap-[1vh]">
                <div class="w-full bg-white px-[2%] py-[1.6%] rounded-sm font-semibold sm:font-bold text-sm mb-[.5%] mt-[2%] sm:mt-0 sm:mb-0">
                    <h3>Estado del proyecto</h3>
                </div>

                <div class=" w-full h-fit min-h-[12vh] my-[1%] sm:m-0 bg-white px-[2%] py-[.8%] rounded-sm font-semibold sm:h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center ">
                    <div class="w-[80%] flex flex-wrap items-center gap-[10%] ">
                        <img src="{{ asset('img/iconosDaniel/estado.svg') }}" class="w-[15%]" />
                        
                        @if($project->like == 0 && count($comments) == 0)
                            <p class="w-[70%]">El proyecto no cuenta con comentarios ni votos</p>
                        @elseif($project->like != 0 && count($comments) == 0)
                            <p class="w-[70%]">Este proyecto cuenta con {{$project->like}} voto(s), ningun comentario</p>
                        @elseif($project->like == 0 && count($comments) > 0)
                            <p class="w-[70%]">Este proyecto no cuenta con votos, pero sí con comentarios</p>   
                        @else 
                            <p class="w-[70%]">Este proyecto cuenta con {{$project->like}} votos y algunos comentarios</p>  
                        @endif
                    
                    </div>
                </div>

                
                <div class=" w-full min-h-[12vh] bg-white px-[2%] py-[.8%] rounded-sm font-semibold h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center">
                    <div class="w-[80%] flex flex-wrap items-center h-full gap-[10%]">
                        <img src="{{ asset('img/iconosDaniel/votos.svg') }}" class="w-[15%]" />
                        <div class="w-[70%] flex justify-between flex-wrap flex-row-reverse">
                            @if($project->like == 0)
                                <p >Este proyecto aun no cuenta con votos</p>
                            @else
                                <p>Este proyecto cuenta con {{$project->like}} voto(s)</p>
                            @endif
                            <form method="POST" action="{{ route('anteproyecto-Asesor.store')}}">
                                @csrf
                                <button type="submit" class="bg-[#02AB82] text-white rounded-lg px-[1vw] self-end mb-[-1vh] mr-[-2vw]">Votar</button>
                            </form>
                        </div>
                    </div>
                </div>

                    <div class="w-full bg-white px-[2%] py-[.8%] rounded-sm font-semimbold sm:font-bold text-sm">
                        <h3>Observaciones</h3>
                    </div>

                @if(isset($comments) && count($comments) > 0)
                    <div class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[41.5vh]  flex flex-wrap justify-center items-center text-xl overflow-y-auto">
                        @foreach($comments as $comment)
                        <div class='flex flex-wrap w-full'>
                            <p class=' text-black w-full font-normal text-sm'>Asesor</p>
                            <p class=' text-black w-full font-normal text-sm'>{{ $comment->content }}</p>
                        </div>
                        @endforeach
                        <button class="bg-[#02AB82] text-sm text-white font-lg px-[.5vw] py-[.2vw] rounded-md">Ver observaciones</button>
                    </div>
                @elseif(isset($comments) && count($comments) == 0)
                <div class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[41.5vh]  flex justify-center items-center text-xl overflow-y-auto">
                    <p class=' text-center text-black opacity-[60%]'>Este proyecto aun no tiene alguna observacion</p>
                </div>
                @else
                    <div class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[41.5vh]  flex justify-center items-center text-xl overflow-y-auto">
                        <p class=' text-center text-black opacity-[60%]'>No hay un anteproyecto que comentar</p>
                    </div>
                @endif
            </div>
        </div>
    </section>  
@endsection




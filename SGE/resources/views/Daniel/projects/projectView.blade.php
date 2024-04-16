@extends('templates/authTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('contenido')

    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0">
            <h1 class="text-2xl font-bold text-green-500 mb-[4%] sm:mb-[3%] border-b py-[1%] px-[1%] border-slate-700  ">
                Mi Anteproyecto
            </h1>
            @if (isset($message))
                <div class="w-full bg-red-200 text-red-700 py-2 px-4 mb-4 rounded-md">
                    {{ $message }}
                </div>
            @endif
            <div class="w-[91w] sm:w-[85vw] sm:min-h-[78vh] items-center flex flex-wrap sm:justify-between flex-grow">
                <div
                    class="self-start  max-h-[88vh] overflow-y-scroll no-scrollbar w-full sm:w-[68%] min-h-[50vh] sm:h-full flex flex-wrap lg-flex-col justify-between gap-[.5vh] md:gap-[1vh]">
                    <div
                        class="w-full bg-white px-[2%] sm:py-[.5%] flex-col rounded-sm font-semibold sm:font-bold my-[1%] sm:my-0">
                        <h3 class="text-lg">Nombre del Anteproyecto:
                            @if (isset($project))
                                <span class="mx-[1%] font-semibold">{{ $project->name }}</span>
                            @endif
                        </h3>
                    </div>

                    <div class="w-full min-h-[92.5%] bg-white px-[2%] py-[.5%] rounded-sm font-semibold items-left">
                        <div class="w-full flex flex-wrap px-[3%] self-start py-[2vh]">
                            @if (isset($project))
                                <h2 class="w-full text-xl font-bold mt-[1vh]">Datos del alumno </h2>
                                <div class='w-[100%] lg:w-[50%]'>
                                    <div class="flex flex-wrap ">
                                        <p class="w-[50%]  text-lg sm:text-lg">Nombre completo:</p>
                                        <p class="w-[50%] font-normal">{{ $user->name ?? 'No disponible' }}</p>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <p class="w-[50%] text-lg sm:text-lg">Division ácademica: </p>
                                        <p class="w-[50%] font-normal">{{ $division->name ?? 'No disponible' }}</p>
                                    </div>
                                    <div class="flex flex-wrap ">
                                        <p class="w-[50%] text-lg sm:text-lg ">Correo electronico:</p>
                                        <p class="w-[50%] font-normal overflow-hidden pr-[1%]">
                                            {{ $user->email ?? 'No disponible' }}</p>
                                    </div>
                                </div>

                                <div class='w-[100%] lg:w-[50%]'>
                                    <div class="flex flex-wrap">
                                        <p class="w-[50%] text-lg sm:text-lg">Programa educativo: </p>
                                        <p class="w-[50%] font-normal">{{ $career->name ?? 'No disponible' }}</p>
                                    </div>

                                    <div class="flex w-full">
                                        <div class="flex flex-wrap w-[50%]">
                                            <p class="w-[50%] text-lg sm:text-lg overflow-hidden">Matricula:</p>
                                            <p class="font-normal w-[50%] overflow-hidden px-[1%]">
                                                {{ $user->identifier ?? 'No disponible' }}</p>
                                        </div>

                                        <div class="flex w-[50%]">
                                            <p class=" w-[80%] sm:w-[60%] text-lg sm:text-lg ">Grupo:</p>
                                            <p class="mx-[1%] font-normal w-[40%]">
                                                {{ $interns[0]->group->name ?? 'No disponible' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex w-full">
                                        <div class="flex w-[50%]">
                                            <p class=" w-[80%] sm:w-[60%] text-lg sm:text-lg">Fecha inicio:</p>
                                            <p class="mx-[1%] font-normal w-[40%]">
                                                {{ $project->start_date ?? 'No disponible' }}</p>
                                        </div>

                                        <div class="flex w-[50%]">
                                            <p class=" w-[80%] sm:w-[60%] text-lg sm:text-lg">Fecha final:</p>
                                            <p class="mx-[1%] font-normal w-[40%]">
                                                {{ $project->end_date ?? 'No disponible' }}</p>
                                        </div>
                                    </div>

                                </div>
                        </div>

                        <div class="w-full flex flex-wrap px-[3%] self-start border-b-2 border-black py-[2vh]">
                            <h2 class="w-full text-xl font-bold mb-[vh]">Datos de la empresa</h2>
                            <div class='w-[100%] lg:w-[50%]'>
                                <div class="flex flex-wrap">
                                    <p class="w-[50%] text-lg sm:text-lg">Nombre de la empresa:
                                    <p>
                                    <p class="w-[50%] font-normal">{{ $company->name ?? 'No disponible' }}</p>
                                </div>

                                <div class="flex flex-wrap">
                                    <p class=" w-[50%] text-lg sm:text-lg">Asesor empresarial: </p>
                                    <p class=" w-[50%] font-normal ">{{ $businessAdvisor->name  ?? 'No disponible' }}
                                    </p>

                                </div>
                                <div class="flex flex-wrap">
                                    <p class="w-[50%] text-lg sm:text-lg">Correo electronico:</p>
                                    <p class="w-[50%] font-normal overflow-hidden">
                                        {{ $businessAdvisor->email ?? 'No disponible' }}
                                    </p>
                                </div>
                            </div>

                            <div class='w-[100%] lg:w-[50%]'>
                                <div class="flex flex-wrap">
                                    <p class="w-[50%] text-lg sm:text-lg">Direccion: </p>
                                    <p class="w-[50%] font-normal">{{ $company->address ?? 'No disponible' }}</p>
                                </div>

                                <div class="flex flex-wrap">
                                    <p class="w-[50%] text-lg sm:text-lg">Cargo que desempeña: </p>
                                    <p class="w-[50%] font-normal">
                                        {{ $businessAdvisor->position ?? 'No disponible' }}</p>
                                </div>

                                <div class="flex flex-wrap">
                                    <p class="w-[50%] text-lg sm:text-lg">Area de desempeño:</p>
                                    <p class="font-normal w-[50%]">
                                        {{ $intern->performance_area ?? 'No disponible' }}</p>
                                </div>

                                <div class="flex flex-wrap">
                                    <p class="w-[50%] text-lg sm:text-lg">Numero de teléfono:</p>
                                    <p class="font-normal w-[50%]">{{ $businessAdvisor->phone ?? 'No disponible' }}
                                    </p>
                                </div>

                            </div>
                        </div>



                        <div
                            class="flex flex-wrap flex-col flex-grow items-left justify-evenly min-h-[57vh] mt-[1.5%] gap-[4vh] w-full text-justify">
                            <div class="w-full flex flex-wrap justify-center">
                                <p class=" w-[80%] sm:w-[100%] text-lg sm:text-lg">Objetivo</p>
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

                            <a href="{{ route('editAnteproyecto.edit', ['id' => $project->id]) }}"
                                class="self-end px-[2vw] bg-primaryColor text-white text-md font-roboto rounded-lg h-auto p-3">Editar</a>
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
                class="sm:w-[31%] sm:min-h-[78vh]  flex flex-wrap sm:flex-col justify-between mt-[1%] sm:mt-0 gap-[1vh] self-start">
                <div
                    class="w-full bg-white px-[2%] py-[1.6%] rounded-sm font-semibold sm:font-bold text-sm mb-[.5%] mt-[2%] sm:mt-0 sm:mb-0">
                    <h3>Estado del Anteproyecto</h3>
                </div>
                <div
                    class="w-full h-fit min-h-[12vh] sm:m-0 bg-white px-[2%] py-[.8%] rounded-sm font-semibold sm:h-[18%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center">
                    <div class="w-[80%] flex flex-wrap items-center gap-[10%]">
                        @if (isset($project))
                                @if (strtolower($project->status) == 'aprobado')
                                    <img src="{{ asset('img/iconosDaniel/aprobado.svg') }}" class="w-[15%]" />
                                    <p class=" w-[70%]">Tu Anteproyecto ha sido <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Aprobado</span></p>
                                @elseif (strtolower($project->status) == 'en revision')
                                    <img src="{{ asset('img/iconosDaniel/revision.svg') }}" class="w-[15%]" />
                                    <p class=" w-[70%]">Tu Anteproyecto se encuentra en <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Revision</span></p>
                                @elseif (strtolower($project->status) == 'asesoramiento')
                                    <img src="{{ asset('img/iconosDaniel/asesoramiento.svg') }}" class="w-[15%]" />
                                    <p class=" w-[70%]">Tu Anteproyecto se encuentra en  <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Asesoramiento</span></p>
                                @else
                                    <img src="{{ asset('img/iconosDaniel/borrador.svg') }}" class="w-[15%]" />
                                    <p class="w-[70%]">Tu Anteproyecto esta guardado como  <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Borrador</span></p>
                                    
                                    <form class="w-full flex justify-end pt-1" id="reviewForm" method="POST"
                                        action="{{ route('ForAse', ['id' => $project->id]) }}">
                                        @csrf
                                        <button type="submit"
                                            class="bg-[#02AB82] text-white rounded-lg px-[1vw] self-end mb-[-1vh] mr-[-2vw] text-sm ">Pasar
                                            a asesoramiento</button>
                                    </form>
                                @endif
                            
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
                                    <p class="w-full">Aun no tienes votos</p>
                                @else
                                    <p class="w-full">Tienes <span class="text-primaryColor border-b-[.4vh] border-b-primaryColor px-1 font-bold py-0.5">{{ $project->like }} voto(s)</span></p>
                                @endif
                            @else
                                <p class="w-full">Aun no hay nada que votar</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white px-[2%] py-[.8%] rounded-sm font-semimbold sm:font-bold text-sm">
                    <h3>Observaciones</h3>
                </div>
                @if (isset($comments) && count($comments) > 0)
                    <div
                        class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[52vh]  flex flex-wrap justify-center items-center text-xl overflow-y-auto">
                        @foreach ($comments as $comment)
                            <div class='flex flex-wrap w-full mb-[2vh]'>
                                <p class=' text-black w-full font-semibold text-sm'>
                                    @if ($comment->academic_advisor_id !== null)
                                        Asesor
                                    @elseif($comment->president_id !== null)
                                        Presidente de academia
                                    @elseif($comment->director_id !== null)
                                        Director de division
                                    @else
                                        <span class="text-primaryColor">Tú</span>
                                    @endif
                                </p>
                                <p class=' text-black opacity-[60%] w-full font-normal text-sm'>{{ $comment->content }}
                                </p>
                            </div>
                        @endforeach
                        <a href="{{ route('observationsAnteproyecto') }}"
                            class="bg-[#02AB82] text-sm text-white font-lg px-[.5vw] py-[.2vw] rounded-md my-[2%] self-end">Ver
                            observaciones</a>
                        <form method="POST" action="{{ route('observationsAnteproyecto.store') }}"
                            class="relative w-full font-normal flex  h-[fit] self-end mb-[1vh]">
                            @csrf

                            <textarea class="w-[90%] rounded-md py-0 border-black border-opacity-[20%] pr-[1.5vw]" name="content"
                                placeholder="Ingrese su comentario" style="padding-right: calc(1.5vw + 10px);"></textarea>
                            @error('content')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="absolute inset-y-0 right-0 w-[1.5vw] h-full">
                                <img src="{{ asset('img/iconosDaniel/vector.svg') }}" class="h-full w-full"
                                    alt="Votos icon" />
                            </button>
                        </form>
                    </div>
                @elseif(isset($comments) && count($comments) == 0)
                    <div
                        class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[51.5vh]  flex flex-wrap justify-center items-center text-xl overflow-y-auto">
                        <div class="flex flex-wrap text-center items-center h-[90%]">
                            <p class=' text-black opacity-[60%] '>No hay comentarios en tu anteproyecto.</p>
                        </div>
                        <form method="POST"
                            action="{{ route('observationsAnteproyecto.store', ['id' => $project->id]) }}"
                            class="w-full font-normal flex mt-[-3vh] h-[fit] items-center">
                            @csrf

                            <textarea class="w-[90%] rounded-md py-0 border-black border-opacity-[20%]" name="content"
                                placeholder="Ingrese su comentario"></textarea>
                            @error('content')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="w-[1.5vw] mx-[.3vw] h-full">
                                <img src="{{ asset('img/iconosDaniel/vector.svg') }}" class="h-full w-full"
                                    alt="Votos icon" />
                            </button>
                        </form>
                    @else
                        <div
                            class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[52vh]  flex justify-center items-center text-xl overflow-y-auto">
                            <p class=' text-center text-black opacity-[60%]'>Aun no tienes un anteproyecto Empieza a
                                trabajarlo
                                ahora</p>
                        </div>
                @endif
            </div>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
                document.getElementById('reviewForm').addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Tu anteproyecto estará disponible para su revisión por tu asesor.',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Continuar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            event.target.submit();
                        }
                    });
                });
            </script>
            @if (session()->has('success'))
                <script>
                    Swal.fire({
                        title: '!Listo!',
                        text: `¡Tu anteproyecto sera revisado por tu asesor!`,
                        icon: 'success',
                    });
                </script>
            @endif
            @if (session()->has('Created'))
                <script>
                    Swal.fire({
                        title: '!Listo!',
                        text: `¡Tu anteproyecto ha sido creado exitosamente!`,
                        icon: 'success',
                    });
                </script>
            @endif
            @if (session()->has('Edit'))
                <script>
                    Swal.fire({
                        title: '!Listo!',
                        text: `¡Tu anteproyecto se ha editado correctamente!`,
                        icon: 'success',
                    });
                </script>
            @endif
        </div>

        </div>

    </section>
@endsection

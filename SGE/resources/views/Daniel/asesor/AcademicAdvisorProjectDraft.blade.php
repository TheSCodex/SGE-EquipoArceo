@extends('templates/authTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0">
            <h1 class="text-2xl font-bold text-green-500 mb-[4%] sm:mb-[3%] border-b py-[1%] px-[1%] border-slate-700  ">
                Anteproyecto </h1>

            <div class="w-[91w] sm:w-[85vw] sm:min-h-[78vh] items-center flex flex-wrap sm:justify-between flex-grow ">
                <div
                    class="max-h-[88vh] self-start overflow-y-scroll no-scrollbar w-full sm:w-[68%] min-h-[50vh] sm:h-full flex flex-wrap lg-flex-col justify-between gap-[.5vh] md:gap-[1vh]">
                    <div
                        class="w-full bg-white px-[2%] sm:py-[.5%] flex-col rounded-sm font-semibold sm:font-bold my-[1%] sm:my-0">
                        <h3 class="text-lg">Nombre del proyecto:
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
                                            <p class="mx-[1%] font-normal w-[40%]">{{ $interns->Group ?? 'No disponible' }}
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
                                    <p class=" w-[50%] font-normal ">{{ $businessAdvisor->name ?? 'No disponible' }}
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
                                        {{ $area->title ?? 'No disponible' }}</p>
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
                class="sm:w-[31%] h-[82%] sm:min-h-[78vh] flex flex-wrap sm:flex-col justify-between mt-[1%] sm:mt-0 self-start gap-[1vh]">
                <div
                    class="w-full bg-white px-[2%] py-[1.6%] rounded-sm font-semibold sm:font-bold text-sm mb-[.5%] mt-[2%] sm:mt-0 sm:mb-0">
                    <h3>Estado del proyecto</h3>
                </div>
                <div
                    class=" w-full min-h-[12vh] bg-white px-[2%] py-[.8%] rounded-sm font-semibold h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center">
                    <div class="w-[80%] flex flex-wrap items-center h-full gap-[10%] ">
                            @if (strtolower($project->status) == 'aprobado')
                                <img src="{{ asset('img/iconosDaniel/aprobado.svg') }}" class="w-[15%]" />
                                <p class=" w-[70%]">El Anteproyecto ha sido <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Aprobado</span></p>
                            @elseif (strtolower($project->status) == 'en revision')
                                <img src="{{ asset('img/iconosDaniel/revision.svg') }}" class="w-[15%]" />
                                <p class=" w-[70%]">El Anteproyecto se encuentra en <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Revision</span></p>
                            @elseif (strtolower($project->status) == 'asesoramiento')
                                <img src="{{ asset('img/iconosDaniel/asesoramiento.svg') }}" class="w-[15%]" />
                                <p class=" w-[70%]">El Anteproyecto se encuentra en  <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Asesoramiento</span></p>
                                <form class="w-full flex justify-end pt-1" id="reviewForm" method="POST"
                                action="{{ route('ForRev', ['id' => $project->id]) }}">
                                @csrf
                                <button type="submit"
                                    class="bg-[#02AB82] text-white rounded-lg px-[1vw] self-end mb-[-1vh] mr-[-2vw] text-sm ">Pasar
                                </form>a revisión</button>
                            @else
                                <img src="{{ asset('img/iconosDaniel/borrador.svg') }}" class="w-[15%]" />
                                <p class="w-[70%]">El Anteproyecto esta guardado como  <span class="text-primaryColor font-bold border-b-[0.4vh] border-b-primaryColor px-1">Borrador</span></p>
                            @endif
                    </div>
                </div>


                <div
                    class=" w-full min-h-[12vh] bg-white px-[2%] py-[.8%] rounded-sm font-semibold h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center">
                    <div class="w-[80%] flex flex-wrap items-center h-full gap-[10%]">
                        <img src="{{ asset('img/iconosDaniel/votos.svg') }}" class="w-[15%]" />
                        <div class="w-[70%] flex justify-between flex-wrap flex-row-reverse">
                            @if ($project->like == 0)
                                <p>Este proyecto aun no cuenta con votos</p>
                            @else
                                <p>Este proyecto cuenta con {{ $project->like }} voto(s)</p>
                            @endif


                            @if (isset($projectLikes))
                                <form method="POST" id="delVoteForm"
                                    action="{{ route('anteproyecto-Asesor.deleteLike', ['id' => $project->id]) }}">
                                    @csrf
                                    <button type="button" onclick="delVote()"
                                        class="bg-red text-white rounded-lg px-[1vw] self-end mb-[-1vh] mr-[-2vw]">Quitar
                                        voto</button>
                                </form>
                            @else
                                <form method="POST" id="voteForm"
                                    action="{{ route('anteproyecto-Asesor.storeLike', ['id' => $project->id]) }}">
                                    @csrf
                                    <button type="button" onclick="confirmVote()"
                                        class="bg-[#02AB82] text-white rounded-lg px-[1vw] self-end mb-[-1vh] mr-[-2vw]">Votar</button>
                                </form>
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
                                        Estudiante
                                    @endif
                                </p>
                                <p class=' text-black w-full font-normal text-sm'>{{ $comment->content }}</p>
                            </div>
                        @endforeach

                        <a href="{{ route('observationsAnteproyectoA', ['id' => $project->id]) }}"
                            class="bg-[#02AB82] text-sm text-white font-lg px-[.5vw] py-[.2vw] rounded-md self-end my-[1vh]">Ver
                            observaciones</a>
                        <form method="POST" action="{{ route('anteproyecto-Asesor.store', ['id' => $project->id]) }}"
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
                        class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[52vh]  flex flex-wrap justify-center items-center text-xl overflow-y-auto">
                        <div class="flex flex-wrap text-center items-center h-[90%]">
                            <p class=' text-black opacity-[60%] '>Este proyecto aun no tiene alguna observacion</p>
                        </div>


                        <form method="POST" action="{{ route('anteproyecto-Asesor.store', ['id' => $project->id]) }}"
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
                            <p class=' text-center text-black opacity-[60%]'>No hay un anteproyecto que comentar</p>
                        </div>
                @endif
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('liked'))
        <script>
            function liked() {
                Swal.fire({
                    title: '!Votado!',
                    text: `¡El voto ha sido agregado!`,
                    icon: 'success',
                })
            }
            liked();
        </script>
    @endif
    @if (session()->has('disliked'))
        <script>
            function disliked() {
                Swal.fire({
                    title: 'Voto removido',
                    text: `El voto ha sido removido del proyecto`,
                    icon: 'success',
                })
            }
            disliked();
        </script>
    @endif

    @if (session()->has('onRev'))
        <script>
            Swal.fire({
                title: '!Listo!',
                text: `¡El anteproyecto se encuentra en revision para todos los asesores!`,
                icon: 'success',
            });
        </script>
    @endif

    <script>
        document.getElementById('reviewForm').addEventListener('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Una vez que pase a revisión, el proyecto estará disponible para su revisión por los asesores.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, pasar a revisión'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        });
    </script>

    <script>
        function delVote() {
            Swal.fire({
                title: '¿Deseas remover el voto del proyecto?',
                text: `Estás a punto de eliminar el voto del proyecto, ¿estas seguro?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: ' #d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, remover voto'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delVoteForm').submit();
                }
            });
        }

        function confirmVote() {
            Swal.fire({
                title: '¿Deseas votar el proyecto?',
                text: `Estás a punto de votar el proyecto, ¿estas seguro?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, votar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('voteForm').submit();
                }
            });
        }
    </script>
@endsection

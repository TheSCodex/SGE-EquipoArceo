@extends('templates/authTemplate')
@section('titulo')
    Bienvenido
@endsection
@section('contenido')
    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <h1 class="text-2xl font-bold text-green-500 pb-3 mt-2 mb-10 border-b border-slate-700  ">
                Bienvenido, {{ $UserName['name'] }} {{ $UserName['last_name'] }}
                !
            </h1>

            <article class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                <section class="flex flex-col gap-2">
                    <div class="rounded-md h-auto bg-white p-2">
                        <h1 class="text-md font-roboto font-semibold ml-2">
                            Notificaciones
                        </h1>
                    </div>

                    <div class="rounded-lg h-auto bg-white flex flex-col gap-2 justify-center p-5 grow">
                        @forelse($notificaciones as $notificacion)
                            <div class="flex items-center px-4 p-1 my-2 justify-between">
                                <img src="{{ asset('img/iconosDaniel/Group 1000004276.svg') }}" alt="Notificacion"
                                    class="w-8 h-8 mr-2">
                                <p class="text-sm font-roboto">{{ $notificacion->data['message'] }}</p>
                            </div>
                        @empty
                            <div class="flex items-center px-4 p-1 my-2 justify-center flex-col">
                                <img src="{{ asset('img/iconosDaniel/exclamation.svg') }}" alt="Notificacion"
                                    class="w-12 h-12 mb-1">
                                <p class="text-md font-semibold font-roboto">No hay Notificaciones</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                <section class="flex flex-col bg-white rounded-lg p-5">
                    <p class="text-[#828282] font-semibold text-lg mt-2">Total de proyectos</p>
                    <hr class="border-2 border-[#ECECEC] my-5" />
                    <div class="max-h-[200px] flex justify-center p-3">
                        <canvas id="myChart"></canvas>
                    </div>
                </section>

                <section class="flex flex-col gap-2">
                    <div class="rounded-lg h-auto bg-white p-2">
                        <h1 class="text-md font-roboto font-semibold ml-2">
                            Alumnos Asesorados
                        </h1>
                    </div>

                    <div class="flex flex-col justify-between grow gap-3">
                        <div class="rounded-lg bg-white p-5 flex flex-col gap-3 grow">
                            @if ($Intern->isEmpty())
                                <p class="text-sm font-roboto">No hay alumnos asignados.</p>
                            @else
                                @php
                                    $randomInterns = $Intern->shuffle()->take(3);
                                @endphp
                                @foreach ($randomInterns as $intern)
                                    <div class="flex items-center px-4">
                                        <img src="{{ asset('img/iconosDaniel/Group 2279.svg') }}" alt="Usuario"
                                            class="w-8 h-8 mr-2">
                                        <p class="text-sm font-roboto font-semibold">{{ $intern->name }}
                                            {{ $intern->last_name }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="rounded-lg bg-white p-5 flex items-center gap-5">
                            <img src="{{ asset('img/iconosDaniel/Group 34.svg') }}" alt="Usuario" class="w-10 h-10 mr-2">
                            <div class="flex flex-col">
                                <p class="text-xl font-roboto font-semibold">{{ $totalComments }}</p>
                                <p class="text-sm font-Kanit font-medium">Comentarios por resolver en proyectos</p>
                            </div>
                        </div>
                        @php
                            $userId = auth()->id();
                            $academicAdvisor = DB::table('academic_advisor')->where('user_id', $userId)->first();
                            $academicAdvisorId = $academicAdvisor->id;
                        @endphp

                        <form action="{{ route('download.control', ['id' => $academicAdvisorId]) }}" method="GET">
                            <button type="submit" class="bg-primaryColor p-2 text-white rounded-md w-full mt-1">
                                <p>Generar Control de
                                    Estadías</p>
                            </button>
                        </form>
                    </div>
                </section>

            </article>


            <article class="mt-3 flex flex-col gap-3">

                <div class="rounded-lg h-auto bg-white p-2">
                    <h1 class="text-md font-roboto font-semibold ml-2">
                        Observaciones a proyectos
                    </h1>
                </div>

                <div class="rounded-lg py-5 px-12 bg-white flex flex-col w-full min-h-[200px] items-center justify-center">
                    @if ($comments->isEmpty())
                        <p class="text-center">No hay observaciones para mostrar.</p>
                    @else
                        @foreach ($comments as $comment)
                            @if ($comment->hasChildComments())
                                <div
                                    class="flex flex-col lg:flex-row justify-between my-2 mx-auto bg-primaryColor/20 p-4 items-center rounded-md  w-full">
                                    <div class="">
                                        <h3 class="font-medium text-lg font-roboto mb-2">{{ $comment->project->name }}</h3>
                                        <p class="text-sm font-roboto">{{ $comment->content }}</p>
                                    </div>
                                    <div class="mt-5 lg:mt-0">
                                        <button class=" bg-primaryColor text-white px-5 py-1 rounded-lg">
                                            <a href="{{ route('observationsAnteproyectoA', $comment->project_id) }}">Ver
                                                Respuesta</a>
                                        </button>
                                    </div>
                                @else
                                    <div
                                        class="flex flex-col lg:flex-row justify-between my-2 mx-auto p-4 items-center rounded-md w-full">
                                        <div class=" ">
                                            <h3 class="font-medium text-lg font-roboto mb-2">{{ $comment->project->name }}
                                            </h3>
                                            <p class="text-sm font-roboto">{{ $comment->content }}</p>
                                        </div>
                                        <div class="mt-5 lg:mt-0">
                                            <button class=" bg-primaryColor text-white px-5 py-1 rounded-lg">
                                                <a href="{{ route('observationsAnteproyectoA', $comment->project_id) }}">Ampliar
                                                    Observaciones</a>
                                            </button>
                                        </div>
                            @endif
                </div>
                @endforeach
                @endif
        </div>
        </article>

        </div>
    </section>



    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["En revision", "Aprobado"],
                datasets: [{
                    label: 'Horas',
                    data: [{{ $revisionProjects }}, {{ $approvedProjects }}],
                    backgroundColor: [
                        '#3E5366',
                        '#0FA987'
                    ],
                    borderColor: [
                        '#ffffffff'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    position: 'right'
                }
            }
        });
    </script>
@endsection

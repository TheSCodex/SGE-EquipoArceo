@extends('templates/academicAdvisorTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('contenido')
    <section class="flex flex-col justify-start items-center bg-[#F3F5F9] min-h-full h-screen flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <h1 class="text-2xl font-bold text-green-500 pb-3 mt-2 mb-10 border-b border-slate-700  ">
                Bienvenido, Asesor Academico!
            </h1>

            <article class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                <section class="flex flex-col gap-2">  
                    <div class="rounded-md h-auto bg-white p-2">
                        <h1 class="text-md font-roboto font-semibold ml-2">
                            Notificaciones
                        </h1>
                    </div>

                    <div class="rounded-lg h-auto bg-white flex flex-col gap-2 justify-between p-5 grow">
                        <div class=" flex items-center px-4 p-1 my-2 justify-center">
                            <img src="{{ asset('img/iconosDaniel/Group 1000004276.svg') }}" alt="Notificacion"
                                class="w-8 h-8 mr-2">
                            <p class="text-sm font-roboto">Rodrigo Bojorquez ha hecho modificaciones en su proyecto</p>
                        </div>
                        <div class=" flex items-center mb-2 px-4 p-1 justify-center">
                            <img src="{{ asset('img/iconosDaniel/Group 1000004276.svg') }}" alt="Notificacion"
                                class="w-8 h-8 mr-2">
                            <p class="text-sm font-roboto">Rodrigo Bojorquez ha hecho modificaciones en su proyecto</p>
                        </div>
                        <div class=" flex items-center mb-2 px-4 p-1 justify-center">
                            <img src="{{ asset('img/iconosDaniel/Group 1000004276.svg') }}" alt="Notificacion"
                                class="w-8 h-8 mr-2">
                            <p class="text-sm font-kanit text-black-50 ">Rodrigo Bojorquez ha hecho modificaciones en su
                                proyecto</p>
                        </div>
                        <button class="text-white font-roboto bg-primaryColor py-1 px-8 h-auto my-2 mx-auto rounded-lg">
                            Ver mas
                        </button>
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
                            <div class=" flex items-center px-4">
                                <img src="{{ asset('img/iconosDaniel/Group 2279.svg') }}" alt="Usuario" class="w-8 h-8 mr-2">
                                <p class="text-sm font-roboto font-semibold">Rodrigo Bojorquez Chi</p>
                            </div>
                            <div class=" flex items-center px-4">
                                <img src="{{ asset('img/iconosDaniel/Group 2279.svg') }}" alt="Usuario" class="w-8 h-8 mr-2">
                                <p class="text-sm font-roboto font-semibold">Rodrigo Bojorquez Chi</p>
                            </div>
                        </div>

                        <div class="rounded-lg bg-white p-5 flex items-center gap-5">
                            <img src="{{ asset('img/iconosDaniel/Group 34.svg') }}" alt="Usuario" class="w-10 h-10 mr-2">
                            <div class="flex flex-col">
                                <p class="text-xl font-roboto font-semibold">2</p>
                                <p class="text-sm font-Kanit font-medium">Comentarios por resolver en proyectos</p>
                            </div>
                        </div>
                    </div>
                </section>

            </article>


            <article class="mt-3 flex flex-col gap-3">

                <div class="rounded-lg h-auto bg-white p-2">
                    <h1 class="text-md font-roboto font-semibold ml-2">
                        Observaciones a proyectos
                    </h1>
                </div>
                
                <div class="rounded-lg py-5 px-12 bg-white flex flex-col w-full">
                    <div class="flex flex-col lg:flex-row justify-between my-2 mx-auto items-center w-full">
                        <div class=" ">
                            <h3 class="font-medium text-lg font-roboto mb-2">Rodrigo Bojorquez</h3>
                            <p class="text-sm font-roboto">La estructura de tu propuesta es correcta pero necesito que
                                expandas tu justificación e incluyas referencias para tus argumentos</p>
                        </div>
                        <div class="mt-5 lg:mt-0">
                            <button class=" bg-primaryColor text-white px-5 py-1 rounded-lg">
                                Ampliar Observaciones
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row justify-between my-2 mx-auto items-center w-full">
                        <div class="">
                            <h3 class="font-medium text-lg font-roboto mb-2">Rodrigo Bojorquez</h3>
                            <p class="text-sm font-roboto">La estructura de tu propuesta es correcta pero necesito que
                                expandas tu justificación e incluyas referencias para tus argumentos</p>
                        </div>
                        <div class="mt-5 lg:mt-0">
                            <button class=" bg-primaryColor text-white px-5 py-1 rounded-lg">
                                Ampliar Observaciones
                            </button>
                        </div>
                    </div>
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
                    data: [2, 3],
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

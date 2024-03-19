@extends('templates/authTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('contenido')
    <section class="flex flex-col justify-start items-center bg-[#F3F5F9] min-h-full h-screen flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <h1 class="text-2xl font-bold text-green-500 mb-[4%] sm:mb-[3%] border-b py-[1%] px-[1%] border-slate-700  ">
                Bienvenido, Asesor Academico!
            </h1>
            <div class="flex space-x-4 ">
                <div class="w-[32%] mx-auto">
                    <div class="rounded-lg h-auto bg-white mb-2 p-1">
                        <h1 class="text-md font-roboto font-semibold ml-2">
                            Notificaciones
                        </h1>
                    </div>
                    <div class="rounded-lg h-auto bg-white flex flex-col ">
                        <div class=" flex items-center px-4 p-1 my-2">
                            <img src="{{ asset('img/iconosDaniel/Group 1000004276.svg') }}" alt="Notificacion"
                                class="w-8 h-8 mr-2">
                            <p class="text-sm font-roboto">Rodrigo Bojorquez ha hecho modificaciones en su proyecto</p>
                        </div>
                        <div class=" flex items-center mb-2 px-4 p-1">
                            <img src="{{ asset('img/iconosDaniel/Group 1000004276.svg') }}" alt="Notificacion"
                                class="w-8 h-8 mr-2">
                            <p class="text-sm font-roboto">Rodrigo Bojorquez ha hecho modificaciones en su proyecto</p>
                        </div>
                        <div class=" flex items-center mb-2 px-4 p-1">
                            <img src="{{ asset('img/iconosDaniel/Group 1000004276.svg') }}" alt="Notificacion"
                                class="w-8 h-8 mr-2">
                            <p class="text-sm font-kanit text-black-50 ">Rodrigo Bojorquez ha hecho modificaciones en su
                                proyecto</p>
                        </div>
                        <button class="text-white font-roboto bg-primaryColor p-1 h-auto w-[50%] my-2 mx-auto rounded-lg">
                            Ver mas
                        </button>
                    </div>
                </div>
                <div class="w-[32%] mx-auto">
                    <div class="rounded-lg h-auto bg-white mb-2 p-1 font-bold w-full">
                        <p class="mb-5 text-center mt-2">Total de proyectos</p>
                        <div class="flex justify-center w-full h-48 mb-2">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
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
                <div class="w-[32%] mx-auto">
                    <div class="rounded-lg h-auto bg-white mb-2 p-1">
                        <h1 class="text-md font-roboto font-semibold ml-2">
                            Alumnos Asesorados
                        </h1>
                    </div>
                    <div class="rounded-lg h-auto bg-white p-1 flex flex-col">
                        <div class=" flex items-center mb-2 px-4 p-1">
                            <img src="{{ asset('img/iconosDaniel/Group 2279.svg') }}" alt="Usuario" class="w-8 h-8 mr-2">
                            <p class="text-sm font-roboto font-semibold">Rodrigo Bojorquez Chi</p>
                        </div>
                        <div class=" flex items-center mb-2 px-4 p-1">
                            <img src="{{ asset('img/iconosDaniel/Group 2279.svg') }}" alt="Usuario" class="w-8 h-8 mr-2">
                            <p class="text-sm font-roboto font-semibold">Rodrigo Bojorquez Chi</p>
                        </div>
                    </div>
                    <div class="rounded-lg h-auto bg-white mt-2 p-1">
                        <div class=" flex items-center mb-2 px-4 p-1">
                            <img src="{{ asset('img/iconosDaniel/Group 34.svg') }}" alt="Usuario" class="w-10 h-10 mr-2">
                            <div class="flex flex-col">
                                <p class="text-xl font-roboto font-semibold">2</p>
                                <p class="text-sm font-Kanit font-medium">Comentarios por resolver en proyectos</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-[99%] mt-4 mx-auto">
                <div class="rounded-lg h-auto bg-white mb-2 p-1">
                    <h1 class="text-md font-roboto font-semibold ml-2">
                        Observaciones a proyectos
                    </h1>
                </div>
                <div class="rounded-lg h-auto bg-white">
                    <div class="flex justify-center my-2 mx-auto w-[90%] items-center ">
                        <div class=" w-[70%] my-2 ml-2 ">
                            <h3 class="font-medium text-lg font-roboto ">Rodrigo Bojorquez</h3>
                            <p class="text-sm font-roboto">La estructura de tu propuesta es correcta pero necesito que
                                expandas tu justificación e incluyas referencias para tus argumentos</p>
                        </div>
                        <div class=" w-[20%]  my-2 mr-2 ">
                            <button class=" bg-primaryColor text-white p-1 px-1 rounded-lg">
                                Ampliar Observaciones
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-center my-2 mx-auto w-[90%] items-center ">
                        <div class=" w-[70%] my-2 ml-2 ">
                            <h3 class="font-medium text-lg font-roboto ">Rodrigo Bojorquez</h3>
                            <p class="text-sm font-roboto">La estructura de tu propuesta es correcta pero necesito que
                                expandas tu justificación e incluyas referencias para tus argumentos</p>
                        </div>
                        <div class=" w-[20%]  my-2 mr-2 ">
                            <button class=" bg-primaryColor text-white p-1 px-1 rounded-lg">
                                Ampliar Observaciones
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection

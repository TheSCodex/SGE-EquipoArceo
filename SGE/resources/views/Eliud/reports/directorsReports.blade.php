@extends('templates/authTemplate')

@section('titulo')
    Reportes
@endsection

@section('contenido')
    <section class="pt-4 bg-[#f3f5f9] flex flex-col items-center justify-center flex-grow min-h-full">

        <div class="lg:px-8 px-6 text-left w-full mb-[2vh] sm:mb-0">


            <div class="container mx-auto font-roboto">
                <div class="flex flex-col">
                    <div class="flex items-center justify-between">
                        <h1 class="mt-2 text-2xl font-bold">Buenos días {{ $userData->name }} {{ $userData->last_name }}!
                        </h1>
                    </div>
                </div>
                <div class="bg-black opacity-25 h-[2px] mb-6 mt-6"></div>

                @if (session()->has('success'))
                    <div class="text-primaryColor text-center font-montserrat mb-6">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if ($errors->has('error'))
                    <div class="text-red text-center font-montserrat mb-6">
                        {{ $errors->first('error') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
                    <!-- Cuadros de Reportes  -->
                    <div class="relative bg-white rounded-lg shadow-md">
                        <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Control de Estadías</h2>
                        <p class='p-4'>Formato donde asesores llevan el registro de sus asesorados a lo largo del proceso
                            de estadías.
                        </p>
                        <div
                            class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                            <a href="/exportar" class="hover:cursor-pointer " target="_blank">Generar</a>
                            <svg id='Formato Control de Estadías' class="toggleInputs hover:cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>

                    <div class="relative bg-white rounded-lg shadow-md">
                        <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Carta de Aprobación</h2>
                        <p class='p-4'>Formato de la carta de aprobación generada por los asesores para los alumnos a la
                            conclusión de sus estadías.</p>
                        <div
                            class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full rounded-b-lg">
                            <a href="/Download/CartaAprobacion" class="hover:cursor-pointer" target="_blank">Generar</a>
                            <svg id="Formato Carta de Aprobación" class="toggleInputs hover:cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>


                    <div class="relative bg-white rounded-lg shadow-md">
                        <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Carta de Digitalización</h2>
                        <p class='p-4'>Formato de la carta de digitalización generada por los asesores para los alumnos a
                            la
                            conclusión de sus estadías.</p>
                        <div
                            class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full m-0 rounded-b-lg">
                            <a href="/Download/CartaMemoria" class="hover:cursor-pointer" target="_blank">Generar</a>
                            <svg id="Formato Carta de Digitalización" class="toggleInputs hover:cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>

                    <div class="relative bg-white rounded-lg shadow-md">
                        <h2 class="p-4 font-bold opacity-30 font-montserrat">Formato Carta de Penalización</h2>
                        <p class='p-4'>Formato de la carta de digitalización generada por los asesores para los alumnos a
                            la
                            conclusión de sus estadías.</p>
                        <div
                            class="flex justify-between bg-[#02ab82] text-white py-6 px-4 mt-8 h-[67px] w-full m-0 rounded-b-lg">
                            <a href="/Download/CartaMemoria" class="hover:cursor-pointer" target="_blank">Generar</a>
                            <svg id="Formato Carta de Penalización" class="toggleInputs hover:cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>

                </div>

            </div>

            <div class="flex h-full gap-12 lg:flex-row sm:flex-col">

                <div class="lg:block hidden w-[70vw] h-[55vh] bg-white mt-[2%] rounded-md shadow-md relative">
                    <div class="absolute m-5 ml-16 ">
                        <h2 class=" text-[#828282]">APROBACION DE PROYECTOS de la {{ $division->name }}</h2>
                        <p class="text-[#828282] text-xs">Por academia</p>
                    </div>
                    <div class="mt-20 ml-10 mr-10 h-96">
                        <canvas id="myChart" width="1000" height="300"></canvas>
                    </div>
                </div>

                <div class="bg-white lg:w-[25%] w-full rounded-lg shadow-md h-[55vh] mt-[2%]">
                    <div class="duration-300" id="updateInputs" style="display:none;">
                        <div class="border-b-2 border-gray-2 00">
                            <h1 class="pt-4 pl-4 mb-4 font-bold opacity-30 font-montserrat">Reporte</h1>
                        </div>
                        <p class="p-4 font-bold">Haz seleccionado actualizar reporte con el título <span
                                id='titleDoc'></span> </p>
                        <div class="flex flex-col items-center justify-center p-4 mt-4">
                            <form style="display:none" action="{{ route('docRevision.update', $id = '1') }}" method="POST"
                                id='form1'>
                                @csrf
                                @method('PUT')
                                <input name="revision_number" value="{{ old('revision_number') }}" required type="number"
                                    placeholder="Numero de Documento..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <input name="revision_id" value="{{ old('revision_id') }}" required type="text"
                                    placeholder="Id de Revision..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <button required type="submit"
                                    class="bg-[#02ab82] text-white w-[120px] h-[35px] rounded hover:bg-blue-600 mt-16">Actualizar</button>
                            </form>
                            <form style="display:none" action="{{ route('docRevision.update', $id = '2') }}"
                                method="POST" id='form2'>
                                @csrf
                                @method('PUT')
                                <input name="revision_number" value="{{ old('revision_number') }}" required
                                    type="number" placeholder="Numero de Documento..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <input name="revision_id" value="{{ old('revision_id') }}" required type="text"
                                    placeholder="Id de Revision..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <button required type="submit"
                                    class="bg-[#02ab82] text-white w-[120px] h-[35px] rounded hover:bg-blue-600 mt-16">Actualizar</button>
                            </form>
                            <form style="display:none" action="{{ route('docRevision.update', $id = '3') }}"
                                method="POST" id='form3'>
                                @csrf
                                @method('PUT')
                                <input name="revision_number" value="{{ old('revision_number') }}" required
                                    type="number" placeholder="Numero de Documento..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <input name="revision_id" value="{{ old('revision_id') }}" required type="text"
                                    placeholder="Id de Revision..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <button required type="submit"
                                    class="bg-[#02ab82] text-white w-[120px] h-[35px] rounded hover:bg-blue-600 mt-16">Actualizar</button>
                            </form>
                            <form style="display:none" action="{{ route('docRevision.update', $id = '4') }}"
                                method="POST" id='form4'>
                                @csrf
                                @method('PUT')
                                <input name="revision_number" value="{{ old('revision_number') }}" required
                                    type="number" placeholder="Numero de Documento..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <input name="revision_id" value="{{ old('revision_id') }}" required type="text"
                                    placeholder="Id de Revision..."
                                    class="rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2" />
                                <button required type="submit"
                                    class="bg-[#02ab82] text-white w-[120px] h-[35px] rounded hover:bg-blue-600 mt-16">Actualizar</button>
                            </form>
                        </div>
                    </div>
                    <div id="reportSummary" style="display:block;" class="h-full">
                        <h3 class="pt-6 pl-6 mb-4 text-xl font-bold opacity-30">Documentos</h3>
                        <div class="bg-black opacity-25 h-[1px]"></div>
                        <div class="items-center grid-cols-1 p-6 space-y-4 grig">
                            @foreach ($files as $index => $file)
                                @if ($index < 4)
                                    <div class="mb-2 text-xs font-semibold">
                                        <p>{{ $file->advisor_name }} generó: {{ $file->title }}</p>
                                        <p>{{ $file->advisor_email }}</p>
                                        <span
                                            class="mt-2 text-xs font-light text-gray-500">{{ $file->advisor_identifier }}</span>
                                    </div>
                                @endif
                            @endforeach
                            <button class="bg-[#02ab82] text-white py-2 ml-6 w-[243px] h-[35px] mt-5 rounded">
                                <a href="/director/documentos">
                                    Visitar Listado
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
        </div>
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var academiesData = @json($academiesData);
    </script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        console.log('academiesData:', academiesData); // Log the entire academiesData

        var labels = []
        var data = [];
        var colors = [];

        var datasets = [];
        var labels = [];
        academiesData.forEach(function(academy, index) {
            var academyName = academy.name;
            var academyColor = getColor(index);
            var totalProjectsCount = 0;

            academy.careers.forEach(function(career) {
                totalProjectsCount += career.projects.filter(function(project) {
                    return project.status === 'aprobado';
                }).length;
            });

            if (totalProjectsCount > 0) {
                labels.push(academyName);
                datasets.push({
                    label: academyName,
                    data: [totalProjectsCount],
                    backgroundColor: academyColor,
                    borderWidth: 1
                });
            }
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            min: 0,
                            max: 120,
                            stepSize: 20
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                indexAxis: 'x',
                elements: {
                    bar: {
                        borderWidth: 2,
                        borderRadius: 5,
                        barThickness: 200
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 120
                    }
                }
            }
        });

        function getColor(index) {
            var colors = ['#0FA987', '#FF5733', '#FFC300', '#581845', '#5DADE2']; // add more colors as needed
            return colors[index % colors.length];
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var updateInputs = document.getElementById('updateInputs');
            var reportSummary = document.getElementById('reportSummary');
            var toggleInputsButtons = document.getElementsByClassName('toggleInputs');
            var reportTitle = document.getElementById('titleDoc');

            for (let i = 0; i < 4; i++) {
                console.log(toggleInputsButtons[i].id);

                toggleInputsButtons[i].addEventListener('click', function() {
                    reportTitle.textContent = toggleInputsButtons[i].id;

                    updateInputs.style.display = updateInputs.style.display === 'none' ? 'block' : 'none';
                    reportSummary.style.display = reportSummary.style.display === 'none' ? 'block' : 'none';

                    document.getElementById(`form1`).style.display = 'none';
                    document.getElementById(`form2`).style.display = 'none';
                    document.getElementById(`form3`).style.display = 'none';
                    document.getElementById(`form4`).style.display = 'none';

                    var formElement = document.getElementById(`form${i + 1}`);

                    if (formElement) {
                        formElement.style.display = formElement.style.display === 'none' ? 'block' : 'none';
                    }
                });
            }



        });
    </script>
@endsection

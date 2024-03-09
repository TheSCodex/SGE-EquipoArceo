@extends('templates.directorTemplate')

@section('titulo')
    Reportes
@endsection

@section('contenido')
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:px-8 text-left w-[90%] mb-[2vh] sm:mb-0">
        <div class="container mx-auto px-4 py-4 bg-[#F3F5F9] font-roboto">
            <div class="flex flex-col">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl mt-2 font-bold">Buenos días Directora!</h1>
                </div>
                <div class="bg-black opacity-25 h-[2px] mb-6 mt-6"></div> <!-- Linea separador -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <!-- Cuadros de Reportes  -->
                    <div class="bg-white rounded-lg shadow-md relative">
                        <h2 class="font-bold opacity-30 p-4 font-montserrat">Reporte</h2>
                        <p class='p-4'>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat."</p>
                        <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 rounded-b mt-2 h-[67px] w-full m-0">
                            <p>Generar</p>
                            <svg id="toggleInputs" class="hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md relative">
                        <h2 class="font-bold opacity-30 p-4 font-montserrat">Reporte</h2>
                        <p class='p-4'>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat."</p>
                        <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 rounded-b mt-2 h-[67px] w-full m-0">
                            <p>Generar</p>
                            <svg id="toggleInputs" class="hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>


                    <div class="bg-white rounded-lg shadow-md relative">
                        <h2 class="font-bold opacity-30 p-4 font-montserrat">Reporte</h2>
                        <p class='p-4'>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat."</p>
                        <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 rounded-b mt-2 h-[67px] w-full m-0">
                            <p>Generar</p>
                            <svg id="toggleInputs" class="hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path
                                    d="M18.3042 2.08777L16.9123 0.695801C16.4488 0.231934 15.8409 0 15.2331 0C14.6252 0 14.0174 0.231934 13.5535 0.69543L0.476893 13.772L0.00560345 18.0107C-0.0537716 18.5443 0.366678 19 0.888807 19C0.921834 19 0.954861 18.9981 0.988631 18.9944L5.2243 18.5265L18.3046 5.44617C19.232 4.51881 19.232 3.01514 18.3042 2.08777ZM4.67916 17.3924L1.22687 17.775L1.61133 14.3175L11.4041 4.52475L14.4757 7.59629L4.67916 17.3924ZM17.4648 4.60676L15.3151 6.7565L12.2435 3.68496L14.3933 1.53521C14.6174 1.31107 14.9158 1.1875 15.2331 1.1875C15.5504 1.1875 15.8483 1.31107 16.0729 1.53521L17.4648 2.92719C17.9276 3.39031 17.9276 4.14363 17.4648 4.60676Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                    </div>

                </div>
                
                <div class="grid grid-row-2 xl:grid-cols-4 flex-col gap-2 xs:gap-5 mt-4 w-full h-auto">
                    <img src="{{ asset('img/Eliud/grafica.jpg') }}" alt="Gráfica de Barras" class="rounded-lg shadow-md lg:mb-0 mb-4 lg:mr-6 xl:col-span-3">

                    <div class="bg-white rounded-lg shadow-md h-full">
                        <div class="duration-300" id="updateInputs" style="display:none;">
                            <div class="border-b-2 border-gray-2  00">
                                <h1 class="font-bold opacity-30 mb-4 pt-4 pl-4 font-montserrat">Reporte</h1>
                            </div>
                            <p class="font-bold p-4">Haz seleccionado actualizar reporte con el título (reporte) Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua.</p>
                            <div class="mt-4 flex flex-col justify-center items-center p-4">
                                <input type="text" placeholder="Nuevo código..."
                                    class="border rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2">
                                <input type="text" placeholder="Nueva fecha de revisión..."
                                    class="border rounded-md px-3 py-2 mb-2 w-full h-[32px] bg-gray-100 mt-2">
                                <button
                                    class="bg-[#02ab82] text-white w-[120px] h-[35px] rounded hover:bg-blue-600 mt-16">Actualizar</button>
                            </div>
                        </div>
                        <div class="duration-300" id="reportSummary" style="display:block;">
                            <h3 class="text-xl opacity-30 font-bold mb-4 pl-6 pt-6">Documentos</h3>
                            <div class="bg-black opacity-25 h-[1px]"></div> <!-- Linea separador -->
                            <div class="flex items-center flex-col p-6">
                                <div class="text-xs mb-2 font-semibold">
                                    Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                    <p>Maldonado Kevin Alexis</p>
                                    <span class="text-gray-500 font-light text-xs mt-2">El 22 de Julio de 2024</span>
                                </div>
                                <div class="text-xs mb-2 font-semibold">
                                    Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                    <p>Maldonado Kevin Alexis</p>
                                    <span class="text-gray-500 font-light text-xs mt-2">El 22 de Julio de 2024</span>
                                </div>
                                <div class="text-xs mb-2 font-semibold">
                                    Elsa Luz Rios generó la carta de aprobación para el estudiante:
                                    <p>Maldonado Kevin Alexis</p>
                                    <span class="text-gray-500 font-light text-xs mt-2">El 22 de Julio de 2024</span>
                                </div>
                                <button
                                    class="bg-[#02ab82] text-white py-2 w-[243px] h-[35px] mt-5 rounded hover:bg-[rgb(2,151,171)]">
                                    Visitar Listado
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
</section>

@endsection
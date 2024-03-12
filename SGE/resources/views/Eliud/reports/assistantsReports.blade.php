@extends('templates.directorsAssistantTemplate')

@section('titulo')
    Reportes
@endsection

@section('contenido')
    <div class="container mx-auto px-4 py-4 bg-[#F3F5F9] font-roboto">
        <div class="flex flex-col">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl mt-2 font-bold">Buenos días Norma!</h1>
            </div>
            <div class="bg-black opacity-25 h-[2px] mb-6 mt-6"></div> <!-- Linea separador -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <!-- Cuadros de Reportes  -->
                <div class="bg-white rounded-lg shadow-md relative">
                    <h2 class="font-bold opacity-30 p-4 font-montserrat">Reporte de Asistencia</h2>
                    <p class='p-4'>Este reporte ofrece un resumen de la asistencia de los estudiantes durante el período escolar, incluyendo ausencias y tardanzas.</p>
                    <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 rounded-b mt-2 h-[67px] w-full m-0">
                        <p class="hover:cursor-pointer">Generar</p>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>

                <div class="bg-white rounded-lg shadow-md relative">
                    <h2 class="font-bold opacity-30 p-4 font-montserrat">Reporte de Calificaciones</h2>
                    <p class='p-4'>Este reporte proporciona un análisis detallado de las calificaciones de los estudiantes en cada materia.</p>
                    <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 rounded-b mt-2 h-[67px] w-full m-0">
                        <p class="hover:cursor-pointer">Generar</p>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>


                <div class="bg-white rounded-lg shadow-md relative">
                    <h2 class="font-bold opacity-30 p-4 font-montserrat">Reporte de Actividades de curso</h2>
                    <p class='p-4'>Este reporte detalla las actividades de curso realizadas por los estudiantes, incluyendo participación y logros.</p>
                    <div class="flex justify-between bg-[#02ab82] text-white py-6 px-4 rounded-b mt-2 h-[67px] w-full m-0">
                        <p class="hover:cursor-pointer">Generar</p>
                    </div>
                    <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
                </div>

            </div>
            <div class="flex mt-4 w-full h-auto">
                <img src="{{ asset('img/Eliud/grafica.jpg') }}" alt="Gráfica de Barras"
                    class="rounded-lg shadow-md lg:mr-6 lg:mb-0 mb-4 h-full">

                <div class="bg-white rounded-lg shadow-md w-[360px] h-full">
                    <h3 class="text-xl opacity-30 font-bold mb-4 pl-6 pt-6">Documentos</h3>
                    <div class="bg-black opacity-25 h-[1px]"></div> <!-- Linea separador -->
                    <div class="flex items-center flex-col p-6">
                        <div class="text-sm mb-4">
                            Elsa Luz Rios generó la carta de aprobación para el estudiante:
                            <p>Maldonado Kevin Alexis</p>
                            <span class="text-gray-500 text-xs mt-2">El 22 de Julio de 2024</span>
                        </div>
                        <div class="text-sm mb-4">
                            Elsa Luz Rios generó la carta de aprobación para el estudiante:
                            <p>Maldonado Kevin Alexis</p>
                            <span class="text-gray-500 text-xs mt-2">El 22 de Julio de 2024</span>
                        </div>
                        <div class="text-sm mb-4">
                            Elsa Luz Rios generó la carta de aprobación para el estudiante:
                            <p>Maldonado Kevin Alexis</p>
                            <span class="text-gray-500 text-xs mt-2">El 22 de Julio de 2024</span>
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
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    @extends('templates.academicAdvisorTemplate')
    @section('contenido')
    <main class="bg-white h-screen flex flex-col justify-center items-center">
        <div class="flex justify-between items-center p-5 border-b-2 space-x-16 lg:space-x-96">
            <div>
                <h1 class="font-bold font-montserrat text-xl">Lista de eventos</h1>
            </div>
            <div class="flex items-center space-x-7">
                <div>
                    <input type="text" placeholder="Buscador" class="border-2 border-primaryColor h-10 p-2 rounded-2xl placeholder:text-darkGreen font-bold font-montserrat outline-none"/>
                </div>
                <div class="flex flex-col">
                    <button class="text-primaryColor">▲</button>
                    <button class="text-primaryColor">▼</button>
                </div>
                <div>
                    <button type="button" class="bg-primaryColor h-10 w-56 text-white rounded">
                        <a href="{{ route('newEventForm') }}" class="h-10 font-montserrat text-white">Agregar nuevo evento</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="overflow-y-auto max-h-[600px] w-10/12">
            <table class=" table-auto">
                <thead class="text-lightGray">
                    <tr>
                        <th class="py-5 px-6 font-montserrat">Titulo</th>
                        <th class="py-5 px-6 font-montserrat whitespace-nowrap">Fecha de inicio</th>
                        <th class="py-5 px-6 font-montserrat whitespace-nowrap">Fecha de finalización</th>
                        <th class="py-5 px-6 font-montserrat">Ubicación</th>
                        <th class="py-5 px-6 font-montserrat">Estado</th>
                    </tr>
                </thead>
                <tbody class="text-center font-bold text-sm">
                    <tr>
                        <td class="py-5 px-6 font-montserrat">Reunión informativa sobre prácticas profesionales</td>
                        <td class="py-5 px-6 font-montserrat">15-02-2024 08:40 AM</td>
                        <td class="py-5 px-6 font-montserrat">15-02-2024 09:30 AM</td>
                        <td class="py-5 px-6 font-montserrat">Cubiculo h-123</td>
                        <td class="py-5 px-6 font-montserrat">Concluido</td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/edit.png" alt="Edit" class="mr-3"></td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/trash.png" alt="Edit" class="ml-3"></td>
                    </tr>
                    <tr>
                        <td class="py-5 px-6 font-montserrat">Evaluación intermedia de prácticas profesionales</td>
                        <td class="py-5 px-6 font-montserrat">21-02-2024 08:40 AM</td>
                        <td class="py-5 px-6 font-montserrat">21-02-2024 09:30 AM</td>
                        <td class="py-5 px-6 font-montserrat">Biblioteca</td>
                        <td class="py-5 px-6 font-montserrat">Pendiente</td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/edit.png" alt="Edit" class="mr-3"></td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/trash.png" alt="Edit" class="ml-3"></td>                 </tr>
                    <tr>
                        <td class="py-5 px-6 font-montserrat">Evaluación intermedia de prácticas profesionales</td>
                        <td class="py-5 px-6 font-montserrat">22-02-2024 08:40 AM</td>
                        <td class="py-5 px-6 font-montserrat">22-02-2024 09:30 AM</td>
                        <td class="py-5 px-6 font-montserrat">Cubiculo h-123</td>
                        <td class="py-5 px-6 font-montserrat">Cancelada</td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/edit.png" alt="Edit" class="mr-3"></td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/trash.png" alt="Edit" class="ml-3"></td>                   </tr>
                    <tr>
                        <td class="py-5 px-6 font-montserrat">Sesión de retroalimentación para estudiantes</td>
                        <td class="py-5 px-6 font-montserrat">23-02-2024 08:40 AM</td>
                        <td class="py-5 px-6 font-montserrat">23-02-2024 09:30 AM</td>
                        <td class="py-5 px-6 font-montserrat">Cubiculo h-123</td>
                        <td class="py-5 px-6 font-montserrat">Pendiente</td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/edit.png" alt="Edit" class="mr-3"></td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/trash.png" alt="Edit" class="ml-3"></td></tr>
                    <tr>
                        <td class="py-5 px-6 font-montserrat">Presentación de informes finales de prácticas profesionales</td>
                        <td class="py-5 px-6 font-montserrat">24-02-2024 08:40 AM</td>
                        <td class="py-5 px-6 font-montserrat">24-02-2024 09:30 AM</td>
                        <td class="py-5 px-6 font-montserrat">Cubiculo h-123</td>
                        <td class="py-5 px-6 font-montserrat">Cancelada</td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/edit.png" alt="Edit" class="mr-3"></td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="img/icons/trash.png" alt="Edit" class="ml-3"></td>              
                    </tr>
                    <tr>
                        <td class="py-5 px-6 font-montserrat">Evaluación final de prácticas profesionales</td>
                        <td class="py-5 px-6 font-montserrat">25-02-2024 08:40 AM</td>
                        <td class="py-5 px-6 font-montserrat">25-02-2024 09:30 AM</td>
                        <td class="py-5 px-6 font-montserrat">Cubiculo h-123</td>
                        <td class="py-5 px-6 font-montserrat">Pendiente</td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="/img/logos/editar.svg" alt="Edit" class="mr-3"></td>
                        <td class="py-5 px-6 font-montserrat cursor-pointer"><img src="/img/logos/eliminar.svg" alt="Edit" class="ml-3"></td>                   
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    @endsection
</body>
</html>
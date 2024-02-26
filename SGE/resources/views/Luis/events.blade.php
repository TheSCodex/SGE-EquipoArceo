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
    <div class="bg-white h-screen flex flex-col justify-center items-center">
        <div class="flex justify-between items-center p-5 border-b-2 space-x-16 lg:space-x-96">
            <div>
                <h1 class="font-bold text-xl">Lista de eventos</h1>
            </div>
            <div class="flex items-center space-x-7">
                <div>
                    <input type="text" placeholder="Buscador" class="border-2 border-primaryColor h-10 p-2 rounded-2xl placeholder:text-darkGreen font-bold"/>
                </div>
                <div>
                    <p>▲</p>
                    <p>▼</p>
                </div>
                <div>
                    <button type="button" class="bg-primaryColor h-10 w-48 text-white rounded">
                        Agregar nuevo evento
                    </button>
                </div>
            </div>
        </div>
        <div>
            <table>
                <thead class="text-lightGray">
                    <tr>
                        <th class="w-64 py-5">Titulo</th>
                        <th class="w-40 py-5 px-5">Fecha de inicio</th>
                        <th class="w-40 py-5 px-5">Fecha de finalización</th>
                        <th class="py-5">Ubicación</th>
                        <th class="py-5">Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-center font-bold text-sm">
                    <tr>
                        <td class="py-2 px-10">Reunión informativa sobre prácticas profesionales</td>
                        <td class="py-2 px-10">15-02-2024 08:40 AM</td>
                        <td class="py-2 px-10">15-02-2024 09:30 AM</td>
                        <td class="py-2 px-10">Cubiculo h-123</td>
                        <td class="py-2 px-10">Concluido</td>
                        <td class="py-2">✏︎   &#128465;</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-10">Evaluación intermedia de prácticas profesionales</td>
                        <td class="py-2 px-10">21-02-2024 08:40 AM</td>
                        <td class="py-2 px-10">21-02-2024 09:30 AM</td>
                        <td class="py-2 px-10">Biblioteca</td>
                        <td class="py-2 px-10">Pendiente</td>
                        <td class="py-2">✏︎   &#128465;</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-10">Evaluación intermedia de prácticas profesionales</td>
                        <td class="py-2 px-10">22-02-2024 08:40 AM</td>
                        <td class="py-2 px-10">22-02-2024 09:30 AM</td>
                        <td class="py-2 px-10">Cubiculo h-123</td>
                        <td class="py-2 px-10">Cancelada</td>
                        <td class="py-2">✏︎   &#128465;</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-10">Sesión de retroalimentación para estudiantes</td>
                        <td class="py-2 px-10">23-02-2024 08:40 AM</td>
                        <td class="py-2 px-10">23-02-2024 09:30 AM</td>
                        <td class="py-2 px-10">Cubiculo h-123</td>
                        <td class="py-2 px-10">Pendiente</td>
                        <td class="py-2">✏︎   &#128465;</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-10">Presentación de informes finales de prácticas profesionales</td>
                        <td class="py-2 px-10">24-02-2024 08:40 AM</td>
                        <td class="py-2 px-10">24-02-2024 09:30 AM</td>
                        <td class="py-2 px-10">Cubiculo h-123</td>
                        <td class="py-2 px-10">Cancelada</td>
                        <td class="py-2">✏︎   &#128465;</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-10">Evaluación final de prácticas profesionales</td>
                        <td class="py-2 px-10">25-02-2024 08:40 AM</td>
                        <td class="py-2 px-10">25-02-2024 09:30 AM</td>
                        <td class="py-2 px-10">Cubiculo h-123</td>
                        <td class="py-2 px-10">Pendiente</td>
                        <td class="py-2">✏︎   &#128465;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
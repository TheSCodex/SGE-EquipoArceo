@extends('templates.directorsAssistantTemplate')

@section('titulo')
Reportes
@endsection

@section('contenido')
<div class="container mx-auto px-4 py-4">
  <div class="flex flex-col">
    <div class="flex items-center justify-between mb-4">
      <h1 class="text-2xl font-bold">Buenos días Norma!</h1>
      <a href="#" class="text-blue-500 hover:underline">Generar nuevo reporte</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

      <!-- Cuadros de Reportes  -->
      <div class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-xl font-bold mb-2">Reportes</h2>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
           ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
           laboris nisi ut aliquip ex ea commodo consequat."</p>
        <button class="bg-blue-500 text-white py-2 px-4 rounded mt-2 hover:bg-blue-600 w-full m-0">Generar</button>
      </div>

      <div class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-xl font-bold mb-2">Reportes</h2>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
           ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
           laboris nisi ut aliquip ex ea commodo consequat."</p>
        <button class="bg-blue-500 text-white py-2 px-4 rounded mt-2 hover:bg-blue-600 w-full m-0">Generar</button>
      </div>

      <div class="bg-white rounded-lg shadow-md p-4">
        <h2 class="text-xl font-bold mb-2">Reportes</h2>
        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
           ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
           laboris nisi ut aliquip ex ea commodo consequat."</p>
        <button class="bg-blue-500 text-white py-2 px-4 rounded mt-2 hover:bg-blue-600 w-full m-0">Generar</button>
      </div>
    </div>

    <!-- Contenedor de Gráfica de Barras y Cuadro de Documentos -->
    <div class="flex mt-4">
      <img src="{{ asset('img/Eliud/grafica.jpg') }}" alt="Gráfica de Barras" class="w-60 md:w-80 rounded-lg shadow-md mr-2">

      <!-- Cuadro de Documentos -->
      <div class="bg-white rounded-lg shadow-md p-4 w-1/3 flex justify-center items-center flex-col ml-2">
        <h2 class="text-xl font-bold mb-4">Documentos</h2>
        <ul class="list-disc list-inside text-sm">
          <li class="mb-2">Elsa Luz Rios generó la carta de aprobación para el estudiante: Bello Maldonado Kevin Alexis</li>
          <span class="text-gray-500 text-xs">El 22 de Julio de 2024</span>
          <li class="mb-2">Elsa Luz Rios generó la carta de aprobación para el estudiante: Bello Maldonado Kevin Alexis</li>
          <span class="text-gray-500 text-xs">El 22 de Julio de 2024</span>
          <li class="mb-2">Elsa Luz Rios generó la carta de aprobación para el estudiante: Bello Maldonado Kevin Alexis</li>
          <span class="text-gray-500 text-xs">El 22 de Julio de 2024</span>
          <li class="mb-2">Elsa Luz Rios generó la carta de aprobación para el estudiante: Bello Maldonado Kevin Alexis</li>
          <span class="text-gray-500 text-xs">El 22 de Julio de 2024</span>
        </ul>
        <button class="bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">Visitar Listado</button>
      </div>
    </div>
  </div>
</div>

@endsection

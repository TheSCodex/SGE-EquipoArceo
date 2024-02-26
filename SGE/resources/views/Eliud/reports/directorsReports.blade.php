@extends('templates.directorsAssistantTemplate')

@section('titulo')
Reportes
@endsection

@section('contenido')
<div class="container mx-auto px-4 py-4">
  <div class="flex flex-col">
    <div class="flex items-center justify-between mb-4">
      <h1 class="text-2xl font-bold">Buenos días Directora!</h1>
      <a href="#" class="text-blue-500 hover:underline">Generar nuevo reporte</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <!-- Cuadros de Reportes  -->
      <div class="bg-white rounded-lg shadow-md relative">
        <h2 class="text-lg font-bold opacity-30 p-4">Reportes</h2>
        <p class='p-4'>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
           ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
           laboris nisi ut aliquip ex ea commodo consequat."</p>
        <div class="flex justify-between bg-[#02ab82] text-white py-4 px-4 rounded-b mt-2 h-[67px] w-full m-0">
          <p>Generar</p>
          <p>Editar</p>
          </div>
          <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
      </div>

      <div class="bg-white rounded-lg shadow-md relative">
        <h2 class="text-lg font-bold opacity-30 p-4">Reportes</h2>
        <p class='p-4'>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
           ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
           laboris nisi ut aliquip ex ea commodo consequat."</p>
        <div class="flex justify-between bg-[#02ab82] text-white py-4 px-4 rounded-b mt-2 h-[67px] w-full m-0">
          <p>Generar</p>
          <p>Editar</p>
          </div>
          <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
      </div>

      <div class="bg-white rounded-lg shadow-md relative">
        <h2 class="text-lg font-bold opacity-30 p-4">Reportes</h2>
        <p class='p-4'>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
           ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
           laboris nisi ut aliquip ex ea commodo consequat."</p>
        <div class="flex justify-between bg-[#02ab82] text-white py-4 px-4 rounded-b mt-2 h-[67px] w-full m-0">
          <p>Generar</p>
          <p>Editar</p>
          </div>
          <div class='absolute right-5 rounded-full h-8 w-8 opacity-50 bg-[#02ab82] top-5'></div>
      </div>

    <div class="flex mt-4 w-[683px] h-[440px]">
      <img src="{{ asset('img/Eliud/grafica.jpg') }}" alt="Gráfica de Barras" class=" rounded-lg shadow-md mr-2">




        <!-- Cuadro de Documentos -->
        <div class="">
            <div class="bg-white rounded-lg shadow-md w-[300px] h-[440px] ">
                <div class="  border-b-2 border-gray-2  00">
                    <h1 class="text-xl font-bold opacity-30 mb-4">Reporte</h1>

                </div>
                <p class="p-4">Haz seleccionado actualizar reporte con el título (reporte) Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="mt-4 flex flex-col justify-center items-center">
                    <input type="text" placeholder="Nuevo código..." class="border rounded-md px-3 py-2 mb-2 w-[247px] h-[32px] bg-gray-100 mt-2">
                    <input type="text" placeholder="Nueva fecha de revisión..." class="border rounded-md px-3 py-2 mb-2 w-[247px] h-[32px] bg-gray-100 mt-2">
                    <button class="bg-[#02ab82] text-white w-[120px] h-[35px] rounded hover:bg-blue-600 mt-2">Actualizar</button>
                </div>


            </div>
        </div>
    </div>


@endsection

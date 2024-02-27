@extends('templates.administratorTemplate')
@section('titulo')
    CRUD CARRERAS
@endsection
@section('contenido')


<div class='flex-col justify-center'>
    <!-- PRIMERA FILA -->
    <div class="align-middle flex justify-between py-[5%] sm:h-2 md:h-4 w-[90%] pt-2">
        <h1 class=" font:bold font-roboto text-2xl">Asesores empresariales</h1>
            <input class="border-2 border-green-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
            type='search' name='search' placeholder="Search">
            <button type='submit' class='absolute right-0 top-0 mt-5 mr-4'>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">

                </svg>
            </button>
   
        <!-- Boton agregar nuevo asesor -->
        <button class="text-sm bg-emerald-400 text-white hover:rounded-sm rounded-none hover:bg-white hover:text-emerald-400"></button>
    </div>
    <!-- TABLA CRUD -->
    <!-- TODO: Mapearlo -->
    <div>
        <table class="table-auto w-[90%] justify-center text-center">
            <thead>
                <tr class="text-gray-300">
                    <th>Nombre</th>
                    <th>Correo Electronico</th>
                    <th>Celular</th>
                    <th>Grado Academico</th>
                    <th>Departamento</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody class="font-bold font-roboto">
                <tr>
                    <td>Karthi</td>
                    <td>karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
                    <td>
                        <button class="bg-white text-emerald-400">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Del</button>
                    </td>
                </tr>
                <tr>
                    <td>Karthi</td>
                    <td>karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
                    <td>
                        <button class="bg-white text-emerald-400">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Del</button>
                    </td>
                </tr>
                <tr>
                    <td>Karthi</td>
                    <td>karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
                    <td>
                        <button class="bg-white text-emerald-400">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Del</button>
                    </td>
                </tr>
                <tr>
                    <td>Karthi</td>
                    <td>karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
                    <td>
                        <button class="bg-white text-emerald-400">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Del</button>
                    </td>
                </tr>
                <tr>
                    <td>Karthi</td>
                    <td>karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
                    <td>
                        <button class="bg-white text-emerald-400">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Del</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
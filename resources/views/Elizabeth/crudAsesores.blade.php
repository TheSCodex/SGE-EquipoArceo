@extends('templates.administratorTemplate')
@section('titulo')
    CRUD CARRERAS
@endsection
@section('contenido')
<div class='flex justify-center w-full'>
    <div class='pt-4 sm:w-[90%] px-4 flex-col'>
        <!-- PRIMERA FILA -->
        <div class="flex-row py-[1%] w-full justify-center">
            <!-- Titulo -->
            <div class="align-center">
            <span class="text-center font-bold align-middle font-roboto text-xl">Asesores empresariales</span>
            </div>
            <!-- SearchBar -->
            <div class="justify-items-end mx-auto shrink text-emerald-400 border-emerald-400">
                <input class="border-2 placeholder-emerald-400 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type='search' name='search' placeholder="Search...">
                <button type='submit' class='absolute right-0 top-0 mt-5 mr-4'>
                    <img class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" src="{{ asset('img/buscador.png') }} " alt="Icono Lupa Buscador"> </img>
                </button>
            </div>
            
            <!-- Imagen flecha (sepa para que sirva, que me digan porfa. - Ethan) -->
            <!-- Boton agregar nuevo asesor -->
            <button class="shrink-0 justify-items-end bg-emerald-400 text-white hover:bg-white hover:text-emerald-400 border-emerald-400 border-2 transition-colors duration-300 hover:rounded-sm px-4 py-2 align-middle">
                Agregar nuevo asesor empresarial
        
        </div>
        <!-- TABLA CRUD -->
        <!-- TODO: Mapearlo -->
        <div class="justify-center flex">
            <table class="table-auto w-[90%] text-center">
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
                            <div class="flex gap-4">
                            <button class="bg-white text-emerald-400">Edit</button>
                            <button class="bg-red text-white py-2 px-4">Del</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('templates.administratorTemplate')
@section('titulo')
  CRUD CARRERAS
@endsection
@section('contenido')
    <div class="px-[7%] my-[3%] flex justify-between  ">
        <h1 class="font-bold text-2xl  ">Carreras y Divisiones</h1>
        <div class="flex">
          <input class="border-[#02AB82] border-2 mx-[10%] px-2" type="text" name="q" placeholder="Buscar..."> 
        <button class="bg-[#02AB82] border-2 border-[#02AB82] text-white font-bold w-[26vw] h-[5vh] rounded-md">Agregar nueva carrera/division</button>
        </div>
    </div>

@endsection
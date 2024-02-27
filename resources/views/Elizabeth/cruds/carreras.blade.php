@extends('templates.administratorTemplate')
@section('titulo')
    CRUD CARRERAS
@endsection
@section('contenido')
    <div class="px-[7%] my-[3%] flex justify-center  w-full">
      <div class="w-[95%] flex justify-between  border-b border-[#E5E5E5]">
        <h1 class="font-bold text-2xl  ">Carreras y Divisiones</h1>
        <div class="flex">
            <input class="border-[#02AB82] placeholder-[#02AB82] h-[5vh] border-b border mx-[10%] rounded-md px-2" type="text" name="q" placeholder="Buscardor...">
            <img src="{{ asset('iconosEli/sort.png') }}" alt="sort" />
            <button class="bg-[#02AB82] border-2 border-[#02AB82] text-white font-bold w-[29vw] h-[5vh] rounded-md">Agregar
                nueva carrera/division</button>
        </div>
      </div>
    </div>
    <div class="w-full flex flex-row space-x-4">
      <table class="table-auto text-sm text-[#ACACAC] w-[81vw] ml-[10%] mt-[3%]">
      <thead style="border-bottom: 25px solid transparent">
        <tr class="py-[2%] px-[3%] text-[#ACACAC]" >
          <td >Carrera</td>
          <td>Director</td>
          <td>Division</td>
          <td>Nivel</td>
          <td>Clave</td>
          <td>hey</td>
      </tr>
    </thead> 
    <tbody>
        <tr class="px-[3%] py-[2%] text-black ">
            <td class="py-[2%]">Tecnologia</td>
            <td>Juan Perez</td>
            <td >Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>hey</td>
        </tr> 
        <tr class=" px-[3%] py-[2%] text-black" >
            <td class="py-[2%]">Tecnologia</td>
            <td>Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>hey</td>
        </tr> 
        <tr class=" px-[3%] py-[2%] text-black" >
            <td class="py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>hey</td>
        </tr> 
        <tr class=" px-[3%] py-[2%] text-black" >
            <td class="py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>hey</td>
        </tr> 
        <tr class=" px-[3%] py-[2%] text-black" >
            <td class="py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>hey</td>
        </tr> 
        <tr class=" px-[3%] py-[2%] text-black" >
            <td class="py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>hey</td>
        </tr> 
      </tbody>
      </table>
    </div>
  
@endsection

@extends('templates.administratorTemplate')
@section('titulo')
    CRUD CARRERAS
@endsection
@section('contenido')
<div class="text-xs md:text-base md:px-[7%]  flex justify-center  md:w-full">
  <div class="text-xs md:text-base w-full lg:h-3/3 flex items-center md:justify-between  border-b border-[#E5E5E5] md:py-[1%]  flex-col md:flex-row">
    <div class="text-xs md:text-base flex justify-between mb-3 items-center">
        <h1 class=" md:text-2xl font-bold">Carreras y Divisiones</h1>
    </div>
  <div class="text-xs md:text-base flex flex-wrap justify-around mb-2 items-center md:w-[36vw] w-full">
    <div>
        <div class=" text-xs md:text-base flex items-center relative" >
            <img src="{{ asset('img/iconosEli/search 1 (1).png')}}" alt="sort" class=" right-[12%] absolute">
            <input class="border-[#02AB82] placeholder-[#02AB82] border-b border rounded-md " type="search" placeholder="Buscar...." style="color: green;">
        </div>
    </div>

        <img src="{{ asset('img/iconosEli/sort 1 (1).png')}}" alt="sort" class="md:w-[1vw] md:h-[4vh]  text-xs md:text-base">
        <button class="md:py-[0.5%] bg-[#02AB82] text-xs md:text-base  text-white  rounded-lg">Agregar nueva Carrera y Division</button>
    </div>
      </div>
    </div>
    <div class="text-xs md:text-base w-full flex flex-col overflow-hidden justify-center">
      <table class="min-w-full table-auto text-sm md:text-base text-[#ACACAC] md:w-[81vw] md:ml-[10%] ">
        <thead style="text-xs md:text-base border-bottom: 25px solid transparent">
          <tr class="text-xs md:text-base font-bold md:px-[3%] text-[#ACACAC]" >
            <td >Carrera</td>
            <td>Director</td>
            <td>Division</td>
            <td>Nivel</td>
            <td>Clave</td>
            <td>
              
            </td>
            
        </tr>
      </thead> 
    <tbody >
        <tr class="text-xs md:text-base md:px-[3%] md:py-[2%] text-black font-bold  ">
            <td class="md:py-[2%]">Tecnologia</td>
            <td>Juan Perez</td>
            <td >Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>
                <button>
                    <img src="{{ asset('img/iconosEli/Vector (2).png')}}" alt="Edit" class="md:w-[1vw] md:h-[2vh]"  />
                </button>
                <button class="md:px-[3%]">
                    <img src="{{ asset('img/iconosEli/trash 1.png')}}" alt="Delete" class="md:w-[1vw] md:h-[2vh] "  />
                </button>
            </td>
        </tr> 
        <tr class="text-xs md:text-base md:px-[3%] md:py-[2%] text-black font-bold" >
            <td class="md:py-[2%]">Tecnologia</td>
            <td>Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>
                <button>
                    <img src="{{ asset('img/iconosEli/Vector (2).png')}}" alt="Edit" class=" md:w-[1vw] md:h-[2vh]"  />
                </button>
                <button class="md:px-[3%]">
                    <img src="{{ asset('img/iconosEli/trash 1.png')}}" alt="Delete" class=" md:w-[1vw] md:h-[2vh] "  />
                </button>
            </td>
        </tr> 
        <tr class="text-xs md:text-base md:px-[3%] md:py-[2%] text-black font-bold" >
            <td class="text-xs md:text-base md:py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>
              <button>
                <img src="{{ asset('img/iconosEli/Vector (2).png')}}" alt="Edit" class=" md:w-[1vw] md:h-[2vh]"  />
              </button>
              <button class="md:px-[3%]">
                <img src="{{ asset('img/iconosEli/trash 1.png')}}" alt="Delete" class=" md:w-[1vw] md:h-[2vh] "  />
              </button>
            </td>
        </tr> 
        <tr class=" text-xs md:text-base md:px-[3%] md:py-[2%] text-black font-bold" >
            <td class="text-xs md:text-base md:py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>
              <button>
                <img src="{{ asset('img/iconosEli/Vector (2).png')}}" alt="Edit" class="md:w-[1vw] md:h-[2vh]"  />
              </button>
              <button class="md:px-[3%]">
                <img src="{{ asset('img/iconosEli/trash 1.png')}}" alt="Delete" class="md:w-[1vw] md:h-[2vh] "  />
              </button>
            </td>
        </tr> 
        <tr class="text-xs md:text-base md:px-[3%] md:py-[2%] text-black font-bold" >
            <td class="text-xs md:text-base md:py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>
              <button>
                <img src="{{ asset('img/iconosEli/Vector (2).png')}}" alt="Edit" class="md:w-[1vw] md:h-[2%]"  />
              </button>
              <button class="text-xs md:text-basemd:px-[3%]">
                <img src="{{ asset('img/iconosEli/trash 1.png')}}" alt="Delete" class=" md:w-[1vw] md:h-[2%] "  />
              </button>
            </td>
        </tr> 
        <tr class="text-xs md:text-base md:px-[3%] md:py-[2%] text-black font-bold" >
            <td class="text-xs md:text-base md:py-[2%]" >Tecnologia</td>
            <td >Juan Perez</td>
            <td>Software</td>
            <td>TSU</td>
            <td>7305477760</td>
            <td>
              <button>
                <img src="{{ asset('img/iconosEli/Vector (2).png')}}" alt="Edit" class="md:w-[1vw] md:h-[2%]"  />
              </button>
              <button class="text-xs md:text-basemd:px-[3%]">
                <img src="{{ asset('img/iconosEli/trash 1.png')}}" alt="Delete" class=" md:w-[1vw] md:h-[2%] "  />
              </button>
            </td>
        </tr> 
      </tbody>
      </table>
    </div>
  
@endsection

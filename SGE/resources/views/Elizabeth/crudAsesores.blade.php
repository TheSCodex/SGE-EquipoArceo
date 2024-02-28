@extends('templates.administratorTemplate')
@section('titulo')
    CRUD CARRERAS
@endsection
@section('contenido')
    <div class='flex-col justify-center w-full px-[7%] my-[3%]'>
        <div class='pt-4 sm:w-[90%] px-4 flex-col'>
            <!-- PRIMERA FILA -->
            <div class="w-[95%] flex justify-between gap-2 border-b border-[#E5E5E5] py-[1%]">
                <!-- Titulo -->
                <div class="flex justify-between mb-3">
                    <h1 class="text-2xl font-bold">Asesores Empresariales</h1>
                </div>
                <!-- SearchBar -->
                <div class="flex justify-around mb-2 items-center w-[36vw]">
                    <div>
                        <div class="flex items-center relative">
                            <img src="{{ asset('img/iconosEli/search 1 (1).png') }}" alt="sort"
                                class=" right-[12%] absolute">
                            <input class="border-[#02AB82] placeholder-[#02AB82] border-b border rounded-md " type="search"
                                placeholder="Buscar...." style="color: green;">
                        </div>
                    </div>

                    <img src="{{ asset('img/iconosEli/sort 1 (1).png') }}" alt="sort" class="w-[1vw] h-[4vh]">
                    <button class="py-[1.5%] px-[1%] bg-[#02AB82] text-white rounded-lg">Agregar nuevo Asesor Empresarial</button>
                </div>
            </div>
        </div>
        <!-- TABLA CRUD -->
        <!-- TODO: Mapearlo -->
        <div class="text-xs md:text-base w-full flex flex-col overflow-hidden justify-center">
            <table class="min-w-full table-auto text-sm md:text-base text-[#ACACAC] md:w-[81vw] md:ml-[4%] ">
                <thead style="text-xs md:text-base border-bottom: 25px solid transparent">
                    <tr class="text-xs md:text-base font-bold md:px-[3%] text-[#ACACAC]" >
                    <td >Nombre</td>
                    <td>Correo Electronico</td>
                    <td>Celular</td>
                    <td>Grado Academico</td>
                    <td>Departamento</td>
                    <td>
                    
                    </td>
                </tr>
                </thead> 
            <tbody >
                <tr class="text-xs md:text-base md:px-[3%] md:py-[2%] text-black font-bold" >
                    <td class="text-xs md:text-base md:py-[2%]" >Karthi</td>
                    <td >karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
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
                    <td class="text-xs md:text-base md:py-[2%]" >Karthi</td>
                    <td >karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
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
                    <td class="text-xs md:text-base md:py-[2%]" >Karthi</td>
                    <td >karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
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
                    <td class="text-xs md:text-base md:py-[2%]" >Karthi</td>
                    <td >karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
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
                    <td class="text-xs md:text-base md:py-[2%]" >Karthi</td>
                    <td >karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
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
                    <td class="text-xs md:text-base md:py-[2%]" >Karthi</td>
                    <td >karthi@gmail.com</td>
                    <td>7305477760</td>
                    <td>Ingenieria</td>
                    <td>Desarrollo</td>
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
        </div>
    </table>
    </div>
    </div>
@endsection

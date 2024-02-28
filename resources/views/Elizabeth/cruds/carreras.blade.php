@extends('templates.administratorTemplate')
@section('titulo')
    CRUD CARRERAS
@endsection
@section('contenido')
    <div class="px-[7%] my-[3%] flex justify-center  w-full">
        <div class="w-[95%] flex justify-between  border-b border-[#E5E5E5] py-[1%]">
            <div class="flex justify-between mb-3">
                <h1 class="text-2xl font-bold">Carreras y Divisiones</h1>
            </div>
            <div class="flex flex-wrap justify-around mb-2 items-center w-[36vw]">
                <div>
                    <div class="flex items-center relative">
                        <img src="{{ asset('img/iconosEli/search 1 (1).png') }}" alt="sort" class=" right-[12%] absolute">
                        <input class="border-[#02AB82] placeholder-[#02AB82] border-b border rounded-md " type="search"
                            placeholder="Buscar...." style="color: green;">
                    </div>
                </div>

                <img src="{{ asset('img/iconosEli/sort 1 (1).png') }}" alt="sort" class="w-[1vw] h-[4vh]">
                <button class="py-[0.5%] bg-[#02AB82]  text-white  rounded-lg">Agregar nueva Carrera y Division</button>
            </div>




        </div>
    </div>
    <div class="w-full flex flex-row space-x-4">
        <table class="table-auto text-sm text-[#ACACAC] w-[81vw] ml-[10%] ">
            <thead style="border-bottom: 25px solid transparent">
                <tr class=" font-bold px-[3%] text-[#ACACAC]">
                    <td>Carrera</td>
                    <td>Director</td>
                    <td>Division</td>
                    <td>Nivel</td>
                    <td>Clave</td>
                    <td>

                    </td>

                </tr>
            </thead>
            <tbody>
                <tr class="px-[3%] py-[2%] text-black font-bold ">
                    <td class="py-[2%]">Tecnologia</td>
                    <td>Juan Perez</td>
                    <td>Software</td>
                    <td>TSU</td>
                    <td>7305477760</td>
                    <td>
                        <button>
                            <img src="{{ asset('img/iconosEli/Vector (2).png') }}" alt="Edit" class="w-[1vw] h-[2vh]" />
                        </button>
                        <button class="px-[3%]">
                            <img src="{{ asset('img/iconosEli/trash 1.png') }}" alt="Delete" class="w-[1vw] h-[2vh] " />
                        </button>
                    </td>
                </tr>
                <tr class=" px-[3%] py-[2%] text-black font-bold">
                    <td class="py-[2%]">Tecnologia</td>
                    <td>Juan Perez</td>
                    <td>Software</td>
                    <td>TSU</td>
                    <td>7305477760</td>
                    <td>
                        <button>
                            <img src="{{ asset('img/iconosEli/Vector (2).png') }}" alt="Edit" class="w-[1vw] h-[2vh]" />
                        </button>
                        <button class="px-[3%]">
                            <img src="{{ asset('img/iconosEli/trash 1.png') }}" alt="Delete" class="w-[1vw] h-[2vh] " />
                        </button>
                    </td>
                </tr>
                <tr class=" px-[3%] py-[2%] text-black font-bold">
                    <td class="py-[2%]">Tecnologia</td>
                    <td>Juan Perez</td>
                    <td>Software</td>
                    <td>TSU</td>
                    <td>7305477760</td>
                    <td>
                        <button>
                            <img src="{{ asset('img/iconosEli/Vector (2).png') }}" alt="Edit" class="w-[1vw] h-[2vh]" />
                        </button>
                        <button class="px-[3%]">
                            <img src="{{ asset('img/iconosEli/trash 1.png') }}" alt="Delete" class="w-[1vw] h-[2vh] " />
                        </button>
                    </td>
                </tr>
                <tr class=" px-[3%] py-[2%] text-black font-bold">
                    <td class="py-[2%]">Tecnologia</td>
                    <td>Juan Perez</td>
                    <td>Software</td>
                    <td>TSU</td>
                    <td>7305477760</td>
                    <td>
                        <button>
                            <img src="{{ asset('img/iconosEli/Vector (2).png') }}" alt="Edit" class="w-[1vw] h-[2vh]" />
                        </button>
                        <button class="px-[3%]">
                            <img src="{{ asset('img/iconosEli/trash 1.png') }}" alt="Delete" class="w-[1vw] h-[2vh] " />
                        </button>
                    </td>
                </tr>
                <tr class=" px-[3%] py-[2%] text-black font-bold">
                    <td class="py-[2%]">Tecnologia</td>
                    <td>Juan Perez</td>
                    <td>Software</td>
                    <td>TSU</td>
                    <td>7305477760</td>
                    <td>
                        <button>
                            <img src="{{ asset('img/iconosEli/Vector (2).png') }}" alt="Edit"
                                class="w-[1vw] h-[2vh]" />
                        </button>
                        <button class="px-[3%]">
                            <img src="{{ asset('img/iconosEli/trash 1.png') }}" alt="Delete" class="w-[1vw] h-[2vh] " />
                        </button>
                    </td>
                </tr>
                <tr class=" px-[3%] py-[2%] text-black font-bold">
                    <td class="py-[2%]">Tecnologia</td>
                    <td>Juan Perez</td>
                    <td>Software</td>
                    <td>TSU</td>
                    <td>7305477760</td>
                    <td>
                        <button>
                            <img src="{{ asset('img/iconosEli/Vector (2).png') }}" alt="Edit"
                                class="w-[1vw] h-[2vh]" />
                        </button>
                        <button class="px-[3%]">
                            <img src="{{ asset('img/iconosEli/trash 1.png') }}" alt="Delete" class="w-[1vw] h-[2vh] " />
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

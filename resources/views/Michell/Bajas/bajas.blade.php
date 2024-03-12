@extends('templates.directorsAssistantTemplate')

@section('titulo')
    Bajas
@endsection

@section('contenido')
    <div class="md:w-full md:h-[80%] md:flex justify-center md:mt-20">
        <section class="">
            <div class=" font-montserrat md:flex items-center justify-between border-b pb-3">
                <h1 class="text-[22px] font-bold">Lista de bajas</h1>
                <div class="flex items-center">
                    <div class="flex items-center border border-primaryColor rounded-md px-3 py-2">
                        <input type="text" id="bajaSearch" name="searchEngine" placeholder="Buscar"
                            class="text-sm font-bold placeholder-primaryColor outline-none text-[#888]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-primaryColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <button>
                        <svg class="w-[30px] h-[30px] text-primaryColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="m8 10 4-6 4 6H8Zm8 4-4 6-4-6h8Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <section class=" font-roboto mt-10">
                <table class=" divide-y divide-[#999] h-[50%]">
                    <thead class="text-[#555] text-xl">
                        <tr>
                            <th scope="col" class="pr-[10rem] pb-4">Nombre de estudiantes</th>
                            <th scope="col" class="pr-[10rem] pb-4">Carrera</th>
                            <th scope="col" class="pr-[10rem] pb-4">Asesor academico</th>
                            <th scope="col" class="pr-[10rem] pb-4">Division</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border-b border-[#999]">
                            <td class="py-4">Kevin Bello</td>
                            <td class="py-4">TSU desarrollo de software</td>
                            <td class="py-4">Elsa Luz Rios</td>
                            <td class="py-4">Ingenieria</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>

    </div>
@endsection

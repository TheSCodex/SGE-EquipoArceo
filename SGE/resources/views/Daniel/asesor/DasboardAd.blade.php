@extends('templates/authTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('Contenido')
    <div class="flex flex-col justify-center items-center bg-[#F3F5F9]">
        <div class="sm:p-8 text-left w-[90%]">
            <div class="sm:w-[30%] h-[82%] sm:h-full flex flex-wrap sm:flex-col justify-between mt-[1%] sm:mt-0">
                <div
                    class="w-full bg-white px-[2%] py-[1.6%] rounded-sm font-semibold sm:font-bold text-sm mb-[.5%] mt-[2%] sm:mt-0 sm:mb-0">
                    <h3>Estado del proyecto</h3>
                </div>
                <div
                    class=" w-full h-fit my-[1%] sm:m-0 bg-white px-[2%] py-[.8%] rounded-sm font-semibold sm:h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center ">
                    <div class="w-[80%] flex flex-wrap items-center h-full gap-[10%] ">
                        <img src="{{ asset('img/iconosDaniel/estado.svg') }}" class="w-[15%]" />
                        <p class="w-[70%]">El proyecto no cuenta con comentarios ni votos</p>
                    </div>
                </div>
                <div
                    class=" w-full bg-white px-[2%] py-[.8%] rounded-sm font-semibold h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center">
                    <div class="w-[80%] flex flex-wrap items-center h-full gap-[10%]">
                        <img src="{{ asset('img/iconosDaniel/votos.svg') }}" class="w-[15%]" />
                        <p>Aun no tienes votos</p>
                    </div>
                </div>
                <div class="w-full bg-white px-[2%] py-[.8%] rounded-sm font-semimbold sm:font-bold text-sm">
                    <h3>Observaciones</h3>
                </div>
                <div
                    class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[55%]  flex justify-center items-center text-xl">
                    <p class=' text-center'>Este proyecto aun no tiene
                        alguna observacion</p>
                </div>
            </div>
        </div>
    </div>
@endsection

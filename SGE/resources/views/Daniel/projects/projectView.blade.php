@extends('./templates/studenTemplate')

@section('titulo')
Bienvenido
@endsection

@section('contenido')

<section class="flex flex-col justify-center items-center bg-[#F3F5F9] min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        <h1 class="text-2xl font-bold text-green-500 mb-[4%] sm:mb-[3%] border-b py-[1%] px-[1%] border-slate-700  ">
            Mi Anteproyecto 
        </h1>

        <div class="w-[91w] sm:w-[85vw] sm:min-h-[78vh] items-center flex flex-wrap sm:justify-between flex-grow ">

            <div
                class="w-full sm:w-[68%] min-h-[50vh] sm:h-full flex flex-wrap lg-flex-col justify-between gap-[.5vh] md:gap-[1vh]">
                <div
                    class="w-full bg-white px-[2%] sm:py-[.5%] flex-col rounded-sm font-semibold sm:font-bold my-[1%] sm:my-0">
                    <h3>Nombre del proyecto</h3>
                </div>

                <div
                    class="w-full min-h-[92.5%] bg-white px-[2%] py-[.5%] rounded-sm font-bold flex flex-wrap items-center flex-col">
                    <div class="w-full px-[3%] self-start">



                        <div
                            class="w-full sm:min-h-[71vh] bg-white px-[2%] py-[.5%] rounded-sm font-bold flex flex-wrap justify-center items-center flex-col">
                            <p class=" w-[80%] sm:w-[38%] text-lg sm:text-2xl text-center">Aun no tienes un
                                Anteproyecto. Empieza a trabajarlo ahora</p>
                            <a href="/Form-anteproyecto"
                                class="block bg-[#02AB82] rounded-md px-[2%] py-[1%] m-[2%] font-normal text-white text-center text-sm">Crea
                                uno ahora</a>
                        </div>
                    </div>

                </div>
            </div>



            <div
                class="sm:w-[31%] h-[82%] sm:h-full flex flex-wrap sm:flex-col justify-between mt-[1%] sm:mt-0 self-center gap-[1vh]">
                <div
                    class="w-full bg-white px-[2%] py-[1.6%] rounded-sm font-semibold sm:font-bold text-sm mb-[.5%] mt-[2%] sm:mt-0 sm:mb-0">
                    <h3>Estado del proyecto</h3>
                </div>

                <div
                    class=" w-full h-fit min-h-[12vh] my-[1%] sm:m-0 bg-white px-[2%] py-[.8%] rounded-sm font-semibold sm:h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center ">
                    <div class="w-[80%] flex flex-wrap items-center gap-[10%] ">
                        <img src="{{ asset('img/iconosDaniel/estado.svg') }}" class="w-[15%]" />
                        <p class="w-[70%]">Tu proyecto esta guardado como borrador</p>
                    </div>
                </div>


                <div
                    class=" w-full min-h-[12vh] bg-white px-[2%] py-[.8%] rounded-sm font-semibold h-[14%] text-black text-opacity-[50%] flex flex-wrap justify-center items-center">
                    <div class="w-[80%] flex flex-wrap items-center h-full gap-[10%]">
                        <img src="{{ asset('img/iconosDaniel/votos.svg') }}" class="w-[15%]" />
                        <div class=" flex justify-between flex-wrap flex-row-reverse">
                            <p>Aun no tienes votos</p>
                        </div>
                    </div>
                </div>

                <div class="w-full bg-white px-[2%] py-[.8%] rounded-sm font-semimbold sm:font-bold text-sm">
                    <h3>Observaciones</h3>
                </div>

                <div
                    class="w-full bg-white px-[10%] py-[.8%] rounded-sm font-bold h-[41.5vh]  flex justify-center items-center text-xl overflow-y-auto">
                    <p class=' text-center text-black opacity-[60%]'>Aun no tienes un anteproyecto Empieza a trabajarlo
                        ahora</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
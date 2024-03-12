@extends('./templates/academicAdvisorTemplate')

@section('titulo')
    Bienvenido
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center bg-[#F3F5F9] ">
        <div class="sm:p-8 text-left w-[90%]">
            <h1 class="text-2xl font-bold text-green-500 mb-[4%] sm:mb-[3%] border-b py-[1%] px-[1%] border-slate-700  ">
                Anteproyecto del Alumno: </h1>
            <div class="w-[91w] sm:w-[85vw] h-[80vh] flex flex-wrap sm:justify-between">

                <div class="w-full sm:w-[68%] h-fit  sm:h-full flex flex-wrap flex-col justify-between">
                    <div
                        class="w-full bg-white px-[2%] sm:py-[.5%] flex-col rounded-sm font-semibold sm:font-bold my-[1%] sm:my-0">
                        <h3>Titulo del anteproyecto: </h3>
                    </div>

                    <div class="w-full sm:h-[92.5%] bg-white px-[2%] py-[.5%] rounded-sm font-bold flex flex-wrap flex-col">
                        <h3 class="font-roboto mt-4 text-xl font-semibold justify-start ">Nombre de la empresa</h3>
                        <h3 class="font-roboto mt-4 text-xl font-semibold justify-start ">Asesor Empresarial</h3>
                        <h3 class="font-roboto mt-4 text-xl font-semibold justify-start ">Area de desempeño</h3>

                        <div class="justify-center items-center">
                            {{-- 1 --}}
                            <h3 class="font-roboto mt-4 text-xl font-semibold text-center ">Objetivo General</h3>
                            <h3 class="font-roboto mt-4 text-md font-medium text-center ">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.
                                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,
                                cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una
                                galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</h3>
                        </div>
                        <div class="justify-center items-center">
                            {{-- 1 --}}
                            <h3 class="font-roboto mt-4 text-xl font-semibold text-center ">Objetivo General</h3>
                            <h3 class="font-roboto mt-4 text-md font-medium text-center ">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.
                                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,
                                cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una
                                galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</h3>
                        </div>
                        
                    </div>
                </div>



                <div class="sm:w-[30%] h-[82%] sm:h-full flex flex-wrap sm:flex-col justify-between mt-[1%] sm:mt-0 ">
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
    </section>
@endsection

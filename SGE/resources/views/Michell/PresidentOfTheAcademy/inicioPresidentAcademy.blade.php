@extends('templates.authTemplate')
@section('contenido')
    <div class="bg-[#F3F5F9] grid grid-cols-1 lg:grid-cols-3 lg:gap-5 p-5">

        <section class="col-span-2 flex flex-col flex-1 gap-3">

            <div class="bg-white rounded-md py-2">
                <h1 class="text-base md:text-lg font-bold font-kanit ml-6">¡Bienvenido, Presidente de academia!</h1>
            </div>

            <div class="font-kanit grid grid-cols-2 gap-4 h-96">
                <div class=" bg-primaryColor text-white  h-full rounded-md flex flex-col justify-center items-center py-7  gap-5">
                    <h3 class="font-semibold text-lg md:text-2xl lg:text-3xl text-center">Anteproyectos</h3>
                    <a href="{{ route('anteproyectos-presidente')}}"
                        class="text-[#555] bg-white hover:bg-[#eee] py-1 md:py-2 px-5 md:px-10 font-semibold font-roboto rounded-md text-center text-sm md:text-base">
                        Ver todo
                    </a>
                </div>

                <div class=" bg-primaryColor text-white rounded-md flex h-full flex-col justify-center items-center py-7 gap-5">
                    <h3 class="font-semibold text-lg md:text-2xl lg:text-3xl text-center">Asesores académicos</h3>
                    <a href="{{ route('lista-asesores')}}"
                        class="text-[#555] bg-white hover:bg-[#eee] py-1 md:py-2 px-5 md:px-10 font-semibold font-roboto rounded-md text-center text-sm md:text-base">
                        Ver todo
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white font-kanit flex rounded-md items-center gap-6 px-5 py-5">
                    <div class=" bg-primaryColor rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-auto" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-3xl">{{ $votes }}</p>
                        <p class="text-base text-black opacity-50">Votos</p>
                    </div>
                </div>

                <div class="bg-white font-kanit flex rounded-md h-56 items-center gap-6 px-5 py-5">
                    <div class=" bg-primaryColor rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-auto" fill="none" viewBox="0 0 24 24"
                            stroke="white" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-3xl">2</p>
                        <p class="text-base text-black opacity-50">Comentarios de alumnos</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="col-span-1 flex flex-col flex-1 gap-3 mt-5 lg:mt-0">
            <div>
                <div class="bg-white rounded-md py-1">
                    <h3 class="text-lg font-medium font-kanit ml-6">Alumnos sin proyectos</h3>
                </div>
            </div>

            <div class="bg-white rounded-md p-5 grow flex flex-col gap-5">
                {{-- cambien el numero si quieres mostrar mas --}}
                @foreach ($dataStudents->take(10) as $data)
                    {{-- @unless ($data->academicAdvisor) --}}
                        <div class="flex gap-3 items-center">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="17.5" cy="17.5" r="17.5" fill="#02AB82" />
                                <path
                                    d="M21.7784 13.0278C21.7784 14.0592 21.3687 15.0484 20.6394 15.7777C19.9101 16.507 18.9209 16.9167 17.8895 16.9167C16.8581 16.9167 15.869 16.507 15.1397 15.7777C14.4104 15.0484 14.0007 14.0592 14.0007 13.0278C14.0007 11.9964 14.4104 11.0073 15.1397 10.2779C15.869 9.54864 16.8581 9.13892 17.8895 9.13892C18.9209 9.13892 19.9101 9.54864 20.6394 10.2779C21.3687 11.0073 21.7784 11.9964 21.7784 13.0278ZM17.8895 19.8334C16.0846 19.8334 14.3536 20.5504 13.0773 21.8267C11.801 23.103 11.084 24.834 11.084 26.6389H24.6951C24.6951 24.834 23.9781 23.103 22.7018 21.8267C21.4255 20.5504 19.6945 19.8334 17.8895 19.8334Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="font-semibold">{{ $data->name }}</p>
                        </div>
                    {{-- @endunless --}}
                @endforeach
            </div>
    </div>
    </div>
    </section>
    </div>
@endsection

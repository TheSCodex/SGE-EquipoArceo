@extends('templates/authTemplate')
@section('contenido')
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        @if(session('errorFecha'))
            <div class=" w-full bg-[#B31312] rounded-xl flex flex-col justify-center align-middle">
                <h1 class=" text-lg text-white font-montserrat py-3 ml-3">&bull; {{session('errorFecha')}}</h1>
            </div>
        @endif
        <div class="w-full md:px-[7em] md:my-[2em] flex bg-white">
                <form method="POST" action="{{route('actividades.store')}}" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0  ">
                    <div class="w-full h-fit flex justify-center md:justify-start">
                        <h1 class="text-3xl font-bold">Añadir actividad</h1>
                        @csrf
                    </div>
                    <div class="w-full flex flex-col space-y-1">
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">¿Con quien desea la cita?:</p>
                                <select type="text" id="receiver_id" name="receiver_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce la persona con quien desea la cita">
                                    @foreach ($internsWithUser as $internWithUser)
                                        <option value="{{$internWithUser['id']}}">{{$internWithUser['user']['name']}} {{$internWithUser['user']['last_name']}}</option>
                                    @endforeach
                                </select>
                                @error('receiver_id')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm">Titulo:</p>
                                <input type="text" id="title" name="title" value="{{ old('title') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el titulo de la actividad">
                                @error('title')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Tipo de actividad:</p>
                                <select type="text" id="eventType" name="eventType" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Introduce el tipo de actividad">
                                    <option value="Planificación de practica">Planificación de proyecto</option>
                                    <option value="Revisión de memoria">Revisión de memoria</option>
                                    <option value="Asesoria">Asesoria</option>
                                    <option value="Liberación de documento">Liberación de documento</option>
                                    <option value="Sanción">Sanción</option>
                                </select>
                                @error('eventType')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Descripción:</p>
                                <input id="description" name="description" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" rows="3" placeholder="Describe brevemente de que tratara la actividad" value="{{ old('description') }}">
                                @error('description')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Ubicación de la actividad:</p>
                                <input type="text" id="location" name="location" value="{{ old('location') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica donde se llevara a cabo la actividad">
                                @error('location')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Fecha y hora de inicio de la actividad:</p>
                                <input type="datetime-local" id="date_start" name="date_start" value="{{ old('date_start') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica la hora de la actividad">
                                @error('date_start')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4 lg:mx-5 pb-10">
                                <p class="text-sm space-y-2">Fecha y hora de fin de la actividad:</p>
                                <input type="datetime-local" id="date_end" name="date_end" value="{{ old('date_end') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica la hora de la actividad">
                                @error('date_end')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4 lg:mx-5">
                                <p class="text-sm space-y-2">Estatus de la actividad:</p>
                                <select type="text" id="status" name="status" value="{{old('status')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Indica el estatus de la actividad">
                                    <option value='Programada' selected>Programada</option>
                                </select>                                
                                @error('status')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                    <button type="submit" class="p-2 self-center bg-primaryColor w-[18rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen">Añadir actividad</button>

                    
                </form>
            </div>
    </div>
</section>
@endsection
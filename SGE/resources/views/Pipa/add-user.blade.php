@extends('templates.administratorTemplate')
@section('contenido')
<section class="flex flex-col justify-center items-center  min-h-full flex-grow">
    <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
        {{-- <main class="bg-white rounded-xl py-6 shadow-2xl border-2 border-secondaryColor "> --}}

            <div class="w-full md:px-[7em] md:my-[2em] flex bg-white">
                
                <form action="{{url('panel-users')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0  ">
                    <div class="w-full h-fit flex justify-center md:justify-start">
                        <h1 class="text-3xl font-bold">Añadir usuario</h1>
                        @csrf
                    </div>
                    <div class="w-full flex flex-col space-y-2">
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class="space-y-2 mb-4">
                                <p class="text-sm">Nombre</p>
                                <input type="text" name="name" value="{{ old('name') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                                @error('name')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4">
                                <p class="text-sm">Apellidos</p>
                                <input type="text" name="last_name" value="{{old('last_name')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Apellidos">
                                @error('last_name')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4">
                                <p class="text-sm space-y-2">Correo</p>
                                <input type="text" name="email" value="{{old('email')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Correo">
                                @error('email')
                                <p class="text-[#ff0000] text-sm">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4">
                                <p class="text-sm">Rol</p>
                                <select name="rol_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->title }}</option>
                                    @endforeach
                                </select>
                                @error('rol_id')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col items-center md:items-start justify-around">
                            <div class=" space-y-2 mb-4">
                                <p class="text-sm">Nómina o matrícula</p>
                                <input type="text" name="identifier" value="{{old('identifier')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nomina">
                                @error('identifier')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class=" space-y-2 mb-4">
                                <p class="text-sm">Especialidad</p>
                                <select name="career_academy_id" value="{{old('career_academy_id')}}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Especialidad">
                                    @foreach($careers as $career)
                                        <option value="{{$career->id}}">{{$career->name}}</option>
                                    @endforeach
                                </select>
                                    @error('career_academy_id')
                                    <p class="text-[#ff0000] text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror
                                </div>
                            </div>

                    </div>

                    <button type="submit" class="p-2 self-center bg-primaryColor w-[18rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen">Añadir usuario</button>

                    
                </form>
            </div>
        {{-- </main> --}}
    </div>
</section>
@endsection('contenido')
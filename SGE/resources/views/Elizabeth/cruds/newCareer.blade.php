@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">

    <form action="{{ route('panel-companies.store') }}" method="POST" class="flex flex-col font-montserrat mx-30 space-y-5 lg:w-[40vw] sm:w-[90vw]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h3 class="text-3xl font-bold">Añadir Carrera y Academia</h3>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
        
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la Carrera</p>
                <input type="text" name="name" value="{{ old('name') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Nombre de la carrera">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la división </p>
                <input type="text" name="phone" value="{{ old('phone') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Nombre de la división">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la Academia</p>
                <input type="text" name="email" value="{{ old('email') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Nombre de la academia">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Presidenta de la academia</p>
                <input type="text" name="registration_date" value="{{ old('registration_date') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Presidenta de la academia">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
          
          
        <button type="submit" class="p-[3%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Añadir empresa</button>
    </form>
</div>
    
</div>
@endsection('contenido')
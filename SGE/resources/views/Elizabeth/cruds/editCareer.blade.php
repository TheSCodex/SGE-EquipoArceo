@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">

    <form action="{{ route('panel-careers.update', $career->id_career) }}" method="POST" class="flex flex-col font-montserrat mx-30 space-y-5 lg:w-[40vw] sm:w-[90vw]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h3 class="text-3xl font-bold">Editar Empresa</h3>
            @csrf
            @method('PUT') {{-- Este método indica que se utilizará el método PUT para actualizar la empresa --}}
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
        
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la empresa</p>
                <input type="text" name="name" value="{{ $career->career_name }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Nombre">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la division</p>
                <input type="text" name="email" value="{{ $career->division_name }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Correo">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la academia</p>
                <input type="text" name="phone" value="{{ $career->academy_name }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Celular">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la presidenta</p>
                <input type="text" name="registration_date" value="{{ $career->president_name }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="fecha de registro">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
           
        <button type="submit" class="p-[3%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Actualizar empresa</button>
    </form>
    
</div>
@endsection('contenido')

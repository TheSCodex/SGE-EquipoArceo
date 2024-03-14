@extends('templates.administratorTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">

    <form action="{{ route('panel-companies.store') }}" method="POST" class="flex flex-col font-montserrat mx-30 space-y-5 lg:w-[40vw] sm:w-[90vw]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h3 class="text-3xl font-bold">Añadir Empresa</h3>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la empresa</p>
                <input type="text" name="name" value="{{ old('name') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Nombre">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Correo Electrónico</p>
                <input type="email" name="email" value="{{ old('email') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Correo">
                @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Celular </p>
                <input type="number" name="phone" value="{{ old('phone') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="Celular">
                @error('phone')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Fecha de registro</p>
                <input type="date" name="registration_date" value="{{ old('registration_date') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="fecha de registro">
                @error('registration_date')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Dirección </p>
                <input type="text" name="address" value="{{ old('address') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="direccion">
                @error('address')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">RFC</p>
                <input type="text" name="rfc" value="{{ old('rfc') }}" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]" placeholder="RFC">
                @error('rfc')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="business_sector_id">Sector Empresarial</label>
                <select class="form-control" id="business_sector_id" name="business_sector_id">
                    @foreach($businessSector as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->title }}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="p-[3%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Añadir empresa</button>
    </form>
    
</div>
@endsection('contenido')
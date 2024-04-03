@extends('templates/authTemplate')
@section('contenido')
<div class="w-full py-2 sm:h-screen flex justify-center items-center bg-white">

    <form action="{{ route('panel-companies.update', $company->id) }}" method="POST" class="flex flex-col font-montserrat mx-30 space-y-5 lg:w-[80vw] sm:w-[90vw]">
        <div class="w-full h-fit flex justify-center md:justify-start">
            <h3 class="text-3xl font-bold">Editar Empresa</h3>
            @csrf
            @method('PUT') {{-- Este método indica que se utilizará el método PUT para actualizar la empresa --}}
        </div>
        <div class="w-full gap-4 sm:grid grid-cols-2 space-y-2">
            <div class=" space-y-2">
                <p class="text-sm">Nombre de la empresa</p>
                <input type="text" name="name" value="{{ $company->name }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3   w-full" placeholder="Nombre">
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full">
                <p class="text-sm">Correo Electrónico</p>
                <input type="email" name="email" value="{{ $company->email }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="Correo">
                @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Celular </p>
                <input type="number" name="phone" value="{{ $company->phone }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="Celular">
                @error('phone')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Fecha de registro</p>
                <input type="date" name="registration_date" value="{{ $company->registration_date }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="fecha de registro">
                @error('registration_date')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Dirección </p>
                <input type="text" name="address" value="{{ $company->address }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="direccion">
                @error('address')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">RFC</p>
                <input type="text" name="rfc" value="{{ $company->rfc }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="RFC">
                @error('rfc')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="business_sector_id">Sector Empresarial</label>
                <select class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" id="business_sector_id" name="business_sector_id">
                    @foreach($businessSector as $sector)
                        <option value="{{ $sector->id }}" @if($sector->id == $company->business_sector_id) selected @endif>{{ $sector->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor w-full  rounded-md text-white">Actualizar empresa</button>
    </form>
    
</div>
@endsection('contenido')

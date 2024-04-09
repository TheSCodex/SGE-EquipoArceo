@extends('templates/authTemplate')
@section('contenido')
    <div class="w-full  flex flex-col sm:h-screen space-y-5 items-center    max-sm:px-10  pb-10  bg-white">
        <div class="w-full h-fit flex     max-sm:justify-center mt-8">
            <h3 class="text-3xl text-left md:ml-32 max-sm:text-center font-bold">Añadir Empresa</h3>
        </div>
        <div class="font-montserrat mx-30 space-y-5 lg:w-[80vw] sm:w-[90vw]">

            <form action="{{ route('panel-companies.store') }}" method="POST">
                @csrf
                <div class="w-full  gap-4 sm:grid grid-cols-2 ">

                    <div class="">
                        <p class="text-sm">Nombre de la empresa</p>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="text-sm rounded-md border-lightGray border-2 px-4 py-3   w-full" placeholder="Nombre">
                        @error('name')
                            <p class="text-[#ff0000] text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full s">
                        <p class="text-sm">Correo Electrónico</p>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="Correo">
                        @error('email')
                            <p class="text-[#ff0000] text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full space-y-2">
                        <p class="text-sm">Celular </p>
                        <input type="number" maxlength="10" name="phone" value="{{ old('phone') }}"
                            class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="Celular">
                        @error('phone')
                            <p class="text-[#ff0000] text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full space-y-2">
                        <p class="text-sm">Fecha de registro</p>
                        <input type="date" name="registration_date" value="{{ old('registration_date') }}"
                            class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full"
                            placeholder="fecha de registro">
                        @error('registration_date')
                            <p class="text-[#ff0000] text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full space-y-2">
                        <p class="text-sm">Dirección </p>
                        <input type="text" name="address" value="{{ old('address') }}"
                            class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="direccion">
                        @error('address')
                            <p class="text-[#ff0000] text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full space-y-2">
                        <p class="text-sm">RFC</p>
                        <input type="text" name="rfc" value="{{ old('rfc') }}"
                            class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full" placeholder="RFC">
                        @error('rfc')
                            <p class="text-[#ff0000] text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="business_sector_id">Sector Empresarial</label>
                        <select class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-full"
                            id="business_sector_id" name="business_sector_id">
                            <option value="" selected disabled>Seleccionar giro empresarial</option>
                            @foreach ($businessSector as $sector)
                                <option value="{{ $sector->id }}" @if (old('business_sector_id') == $sector->id) selected @endif>
                                    {{ $sector->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="p-2 mt-2 bg-primaryColor w-full  rounded-md text-white">Añadir empresa</button>
            </form>
            <a  href="/panel-companies" class="p-2 block text-center  bg-slate-300 w-full  rounded-md text-white">Cancelar</a>


        </div>

    </div>
@endsection(contenido)

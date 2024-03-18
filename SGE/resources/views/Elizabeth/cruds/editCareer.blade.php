@extends('templates/authTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <form action="{{url('panel-empresas.store')}}" method="POST" class="flex flex-col font-montserrat mx-10 space-y-5 lg:w-[40vw] sm:w-[60vw]">
        <div class="w-full h-fit flex justify-center mt-4">
            <h1 class="text-3xl font-bold">Editar Carrera y División</h1>
            @csrf
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Carrera</p>
                <input type="text" name="" value="{{ old('') }}" class="text-sm  w-full rounded-md border-lightGray border-2 px-[2%] py-[3%]" placeholder="Carrera">
                @error('')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la division</p>
                <select name="division_id" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]">
                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre de la academia</p>
                <select name="academy_id" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]">
                    @foreach($academies as $academy)
                        <option value="{{ $academy->id }}">{{ $academy->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="w-full space-y-2">
                <p class="text-sm">Nombre del presidente</p>
                <select name="academy_id" class="text-sm w-full rounded-md border-lightGray border px-[2%] py-[1%]">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>

           
        <button type="submit" class="p-[1%] bg-primaryColor lg:w-[40vw] rounded-md text-white">Editar carrera y división</button>
    </form>
</div>
</div>
@endsection('contenido')
@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-screen flex bg-white">
    <form action="{{url('panel-groups')}}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        <div class="w-full h-fit flex justify-center md:justify-start md:px-20">
            <h1 class="text-3xl font-bold">Añadir grupo</h1>
            @csrf
        </div>
        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Nombre del grupo</p>
                    <input type="text" name="name" value="{{ old('name') }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre del grupo">
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Carrera</p>
                    <select name="career_id" value="{{ old('career_id') }}"  class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        <option disabled selected>Seleccionar una carrera</option>
                        @foreach($careers as $career)
                            @if($career->name !="Sin especialidad"){
                                <option value="{{ $career->id }}" @if(old('career_id') == $career->id) selected @endif>{{ $career->name }}</option>
                            }
                            @endif
                        @endforeach
                    </select>
                    @error('career_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="p-5 flex justify-center">
                <button type="submit" class="p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Añadir grupo</button>
            </div>
    </form>
</div>

@endsection('contenido')
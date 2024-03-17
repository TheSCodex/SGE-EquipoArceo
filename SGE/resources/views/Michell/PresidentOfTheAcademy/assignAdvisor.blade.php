@extends('templates.presidentOfTheAcademyTemplate')

@section('titulo')
    {{ $student->user->name }}
@endsection

@section('contenido')
    <section class="flex flex-col justify-center items-center  min-h-full flex-grow">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0">
            <div class="w-full md:h-full md:px-[7em] md:my-[2em] flex justify-center items-center">
                <form action="{{ route('presidente.update', $student->id) }}" class=" font-montserrat space-y-5" novalidate
                    method="POST">
                    @csrf
                    @method('PUT')
                    <h1 class="text-3xl font-bold">Asignar asesor academico</h1>
                    <div class="text-sm w-full space-y-2">
                        <label for="" class="">Nombre del alumno</label>
                        <div class=" border rounded-md border-lightGray p-3">
                            <p class="font-bold ">{{ $student->user->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col text-sm w-full justify-end space-y-2">
                        <label for="" class="">Asesor academico</label>
                        <select name="academic_advisor_id" id="academic_advisor_id" class=" rounded-md border-lightGray">
                            <option value="">-- Selecciona un asesor --</option>
                            @foreach ($advisors as $advisor)
                                <option value="{{ $advisor->id }}">{{ $advisor->user->name }}</option>
                            @endforeach
                        </select>
                        @error('academic_advisor_id')
                        <p class=" text-red text-sm">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <button class=" bg-primaryColor rounded-md py-2 font-bold text-white w-full">Asignar</button>
                </form>
            </div>
        </div>
    </section>
@endsection

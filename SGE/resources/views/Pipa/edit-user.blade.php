@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="w-full md:px-[7em] md:mt-[2em] h-fit flex bg-white">
    <form action="{{ url('panel-users/' . $user->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-center md:justify-start">
            <h1 class="text-3xl font-bold">Editar usuario</h1>
        </div>
        @if(session('error'))
        <script>
            Swal.fire({
                title: '¡Error!',
                text: '{{ session("error") }}',
                icon: 'error'
            });
        </script>
        @endif
        <div class="w-full flex flex-col space-y-2 ">
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class="space-y-2">
                    <p class="text-sm">Nombre</p>
                    <input type="text" name="name" value="{{ $user->name }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Apellidos</p>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Apellidos">
                    @error('last_name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm space-y-2">Correo</p>
                    <input type="text" name="email" value="{{ $user->email }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Correo">
                    @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Rol</p>
                    <select name="rol_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->rol_id == $role->id ? 'selected' : '' }}>{{ $role->title }}</option>
                        @endforeach
                    </select>
                    @error('rol_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="flex md:flex-row flex-col items-center md:items-start justify-around">
                <div class=" space-y-2">
                    <p class="text-sm">Nómina o matrícula</p>
                    <input type="text" name="identifier" value="{{ $user->identifier }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nomina">
                    @error('identifier')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <p class="text-sm">Especialidad</p>
                    <select name="career_id" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]">
                        @foreach($careers as $career)
                            <option value="{{ $career->id }}" {{ $user->career_id == $career->id ? 'selected' : '' }}>{{ $career->name }}</option>
                        @endforeach
                    </select>
                    @error('career_id')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="p-2 self-center bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Editar usuario</button>

    </form>
</div>

@endsection('contenido')

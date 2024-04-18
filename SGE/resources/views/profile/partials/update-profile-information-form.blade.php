@extends('templates/authTemplate')
@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="w-full md:px-[7em] md:mt-[2em] h-fit flex bg-white mb-8 md:h-screen">
    <form method="post" action="{{ route('profile.update') }}" 
    class="min-h-screen flex flex-col font-montserrat space-y-5 w-full mt-4 md:mt-0 md:w-full ">
    @csrf
        @method('patch')
        <div class="w-full flex justify-center items-center">
            <div class="w-[80%] md:w-full h-fit flex justify-center md:justify-start md:px-20 text-center md:text-start">
                <h1 class="text-3xl font-bold">Editar información del perfil</h1>
            </div>
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
                    <p class="space-y-2">Nombre</p>
                    <input type="text" name="name" value="{{ $user->name }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nombre">
                    @error('name')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="space-y-2">
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
                    <p class="text-sm space-y-2">Nómina o matrícula</p>
                    <input type="text" name="identifier" value="{{ $user->identifier }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Nomina">
                    @error('identifier')
                        <p class="text-[#ff0000] text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div class=" space-y-2">
                    <p class="text-sm space-y-2">Correo</p>
                    <input type="text" name="email" value="{{ $user->email }}" class="text-sm rounded-md border-lightGray border-2 px-4 py-3 w-[20em] md:w-[35em]" placeholder="Correo">
                    @error('email')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="p-5 flex justify-center">
                <button type="submit" class="p-2 self-center bg-primaryColor w-[17.5em] md:w-[30rem] rounded-md text-white hover:bg-darkgreen" id="submitBtn">Guardar</button>
            </div>
            <div class="flex items-center gap-4">    
                @if (session('status') === 'profile-updated')
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: "La información del perfil ha sido actualizada",
                    });
                </script>
                @endif
            </div>
        </div>
    </form>
</section>

@endsection('contenido')

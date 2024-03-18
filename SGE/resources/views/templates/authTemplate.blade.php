<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>@yield('titulo') | Sistema Gestor de Estadias</title>
    @vite('resources/css/app.css')

</head>
<body>
    @php
        $user = auth()->user();
    @endphp
    {{-- Con el siguiente código puedes obtener los permisos que tiene el usuario y con ellos hacer la 
        lógica en el header para poder presentar accesos directos segun sus permisos  --}}
    {{-- @php
        use App\Models\User;
        use App\Models\Role;
        $user = auth()->user();
        $userData = User::find($user->id);
        $userDataRole = Role::find($userData->rol_id);
    @endphp --}}
    
    <header class="p-1 md:p-5 grid grid-cols-3 gap-10 border-b-[1px] border-secondaryColor">
        {{-- {{$userDataRole}} --}}
        <a href="#" class=" text-center flex justify-center">
            <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
        </a>
        <ul class="hidden md:flex gap-6 justify-center items-center">
            @if($user->rol_id === 1) {{-- Rol de estudiante --}}
                <li>
                    <a href="{{ route('inicio-estudiante') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('anteproyecto') }}">Proyectos</a>
                </li>
                <li>
                    <a href="/estudiante/calendario">Calendario</a>
                </li>
                @elseif($user->rol_id === 2) {{-- Rol de asesor académico --}}
                <li>
                    <a href="/estudiante">Estudiantes</a>
                </li>
                <li>
                    <a href="{{ route('anteproyectos-asesor') }}">Anteproyectos</a>
                </li>
                <li>
                    
                    <a href="{{ route('events.calendar') }}">Calendario</a>
                </li>
                @elseif($user->rol_id === 3) {{-- Rol de Presidente de academia --}}
                <li>
                    <a href="{{ route('inicio-presidente') }}">Inicio</a>
                </li>
                <li>
                    <a href="#">Estudiantes</a>
                </li>
                <li>
                    <a href="{{ route('anteproyectos-presidente') }}">Anteproyectos</a>
                </li>
                @elseif($user->rol_id === 4) {{-- Rol de Directora --}}
                <li>
                    <a href="{{ route('inicio-director') }}">Inicio</a>
                </li> 
                <li>
                    <a href="#">Estudiantes</a>
                </li>
                <li>
                    <a href="#">Anteproyectos</a>
                </li>
                <li>
                    <a href="{{ route('reportes-director') }}">Reportes</a>
                </li>
                <li>
                    <a href="{{ route('documentos-director.index') }}">Documentos</a>
                </li>

                @elseif($user->rol_id === 5) {{-- Rol de Asistente de directora --}}
                <li>
                    <a href="{{ route('inicio-asistente') }}">Inicio</a>
                </li>    
                <li>
                    <a href="{{ route('estudiantes-asistente') }}">Estudiantes</a>
                </li>
                <li>
                    <a href="#">Anteproyectos</a>
                </li>
                <li>
                    <a href="{{ route('reportes-asistente.index') }}">Reportes</a>
                </li>
                <li>
                    <a href="{{ route('documentos-asistente.index') }}">Documentos</a>
                </li>
                <li>
                    <a href="{{ route('libros-asistente.index') }}" class="hover:border-b-2 hover:border-primaryColor">Libros</a>
                </li>
                @elseif($user->rol_id === 6) {{-- Rol de Administrador --}}
                <li>
                    <a href="{{ route('admin.index') }}">Inicio</a>
                </li>    
                <li>
                    <a href="{{ route('panel-users.index') }}">Usuarios</a>
                </li>
                <li>
                    <a href="{{ route('panel-roles.index') }}" class="text-nowrap">Roles y permisos</a>
                </li>
                {{-- <li>
                    <a href="{{ route('panel-companies.index') }}">Empresas</a>
                </li> --}}
                <li>
                    <a href="{{ route('panel-advisors.index') }}" class="text-nowrap">Asesores empresariales</a>
                </li>
                <li>
                    <a href="{{ route('panel-careers.index') }}" class="text-nowrap">Carreras y divisiones</a>
                </li>
            @endif

        </ul>

        <ul class="hidden md:flex gap-6 justify-center">
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex justify-center items-center px-4 p-2 transition duration-300 pr-2 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="/img/logos/cerrar-sesion.svg">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
        </ul>
    </header>

    <main class="min-h-screen h-full">
        @yield('contenido')
    </main>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
    @yield('scripts-event')
</body>
</html>

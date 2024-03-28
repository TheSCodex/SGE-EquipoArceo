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
        <a href="/#" class=" text-center flex justify-center">
            <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
        </a>
        <!--Boton hamburguesa--->
        <button id="toggleMenu" class="lg:hidden flex items-center justify-end">
                    <svg class="w-6 h-6 text-primaryColor" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>
    <!-- Menú de navegación -->
        <ul class="hidden md:flex gap-6 justify-center items-center">

            {{-- inicios de los roles --}}

            
            @if($user->rol_id === 1) {{-- ! Rol de estudiante --}}
                <li>
                    <a href="{{ route('inicio-estudiante') }}" class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                </li>
            @elseif($user->rol_id === 2) {{-- ! Rol de asesor académico --}}
                <li>
                    <a href="{{ route('inicio-asesor') }}" class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                </li>

                @elseif($user->rol_id === 3) {{-- ! Rol de Presidente de academia --}}

                <li>
                    <a href="{{ route('inicio-presidente') }}" class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                </li>

                @elseif($user->rol_id === 4) {{-- ! Rol de Directora --}}
                <li>
                    <a href="{{ route('inicio-director') }}" class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                </li> 

                @elseif($user->rol_id === 5) {{-- ! Rol de Asistente de directora --}}
                <li>
                    <a href="{{ route('inicio-asistente') }}" class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                </li>    

                <li>
                    <a href="#" class="hover:border-b-2 hover:border-primaryColor">Anteproyectos</a>
                </li>


                @elseif($user->rol_id === 6) {{-- ! Rol de Administrador --}}
                <li>
                    <a href="{{ route('admin.index') }}" class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                </li>    

            @endif

            {{-- Permisos --}}

            @can('crear-anteproyecto')
                <li>
                    <a href="{{ route('anteproyecto') }}" class="hover:border-b-2 hover:border-primaryColor">Anteproyecto</a>
                </li>
            @endcan
            @can('leer-observaciones')
                <li>
                    <a  href="{{ route('observationsAnteproyectoA') }}" class="hover:border-b-2 hover:border-primaryColor">Observaciones</a>
                </li>
            @endcan
            @can('leer-calendario')
                <li>
                    <a href="{{route('events.calendar')}}" class="hover:border-b-2 hover:border-primaryColor">Calendario</a>
                </li>
            @endcan
            @can('leer-estudiantes-asignados')
                <li>
                    <a href="{{route('asesorados')}}" class="hover:border-b-2 hover:border-primaryColor">Estudiantes</a>
                </li>
            @endcan
            @can('leer-anteproyectos-asignados')
                <li>
                    <a href="{{ route('anteproyectos-asesor') }}" class="hover:border-b-2 hover:border-primaryColor">Anteproyectos</a>
                </li>
            @endcan
            @can('leer-estudiantes')
                <li>
                    <a href="{{route('presidente.index')}}" class="hover:border-b-2 hover:border-primaryColor">Estudiantes</a>
                </li>
            @endcan
            @can('leer-asesores-academicos')
                <li>
                    <a href="{{ route('lista-asesores')}}" class="hover:border-b-2 hover:border-primaryColor">Asesores Académicos</a>
                </li>
            @endcan
            @can('leer-anteproyectos-division')
                <li>
                    <a href="{{ route('anteproyectos-presidente')}}" class="hover:border-b-2 hover:border-primaryColor">Anteproyectos</a>
                </li>
            @endcan
            @can('generar-reportes-documentos')
                <li>
                    <a href="{{ route('reportes-asistente') }}" class="hover:border-b-2 hover:border-primaryColor">Reportes</a>
                </li>
            @endcan
            @can('gestionar-documentos')
                <li>
                    <a href="{{ route('documentos-director.index') }}" class="hover:border-b-2 hover:border-primaryColor">Documentos</a>
                </li>
            @endcan
            @can('leer-lista-libros')
                <li>
                    <a href="{{ route('libros-asistente.index') }}" class="hover:border-b-2 hover:border-primaryColor">Libros</a>
                </li>
            @endcan
            @can('crud-usuarios')
                <li>
                    <a href="{{ route('panel-users.index') }}" class="hover:border-b-2 hover:border-primaryColor">Usuarios</a>
                </li>
            @endcan
            @can('crud-roles-permisos')
                <li>
                    <a href="{{ route('panel-roles.index') }}" class="text-nowrap hover:border-b-2 hover:border-primaryColor">Roles y permisos</a>
                </li>
            @endcan
            @can('crud-empresas')
                <li>
                    <a href="{{ route('companies.index') }}" class="hover:border-b-2 hover:border-primaryColor">Empresas</a>
                </li>
            @endcan
            @can('crud-asesores')
                <li>
                    <a href="{{ route('panel-advisors.index') }}" class="text-nowrap hover:border-b-2 hover:border-primaryColor">Asesores empresariales</a>
                </li>
            @endcan
            @can('crud-carreras-divisiones')
                <li>    
                    <a href="{{ route('panel-careers.index') }}" class="text-nowrap hover:border-b-2 hover:border-primaryColor">Carreras y divisiones</a>
                </li>
            @endcan

            </ul>
        </ul>

        <ul class="hidden md:flex gap-6 justify-center">
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex justify-center items-center px-4 p-2 transition duration-300 pr-2 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="/img/logos/cerrar-sesion.svg" class="mr-2">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
        </ul>
    </header>

    <main class="h-full">
        @yield('contenido')

    </main>
    <script src="{{ mix('resources/js/app.js') }}"></script>
    
<script>
    // para mostrar/ocultar el menú en dispositivos móviles
    const toggleMenu = document.getElementById('toggleMenu');
    const navMenu = document.getElementById('navMenu');

    toggleMenu.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });
</script>
    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
    @yield('scripts-event')
    @yield('scripts-book')
</body>
</html>

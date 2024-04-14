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

    <header class="bg-white px-10 py-5 flex justify-between w-full items-center border-b border-secondaryColor relative">

        <!-- LOGO -->
        <a href="/#" class="text-center flex justify-center">
            <img src="/img/logos/logo-utCancún.png" class="w-28" alt="">
        </a>

        <!-- NAVEGACION RESPONSIVA -->
        <div>
            <button id="toggleDropdown" class="lg:hidden md:flex items-center">
                <svg class="w-6 h-6 text-primaryColor" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>

            <nav id="dropdownMenu"
                class="hidden lg:flex absolute right-5 z-50 mt-3 rounded-md border-primaryColor shadow border px-5 py-3 bg-white lg:shadow-none lg:static lg:border-none lg:mt-0 lg:justify-center lg:px-0 lg:py-0 lg:items-center">
                <ul class="flex flex-col lg:flex-row gap-2 lg:gap-6">

                    {{-- inicios de los roles --}}

                    @if ($user?->rol_id === 1)
                        {{-- ! Rol de estudiante --}}
                        <li>
                            <a href="{{ route('inicio-estudiante') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                        </li>
                    @elseif($user?->rol_id === 2)
                        {{-- ! Rol de asesor académico --}}
                        <li>
                            <a href="{{ route('inicio-asesor') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                        </li>
                    @elseif($user?->rol_id === 3)
                        {{-- ! Rol de Presidente de academia --}}

                        <li>
                            <a href="{{ route('inicio-presidente') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                        </li>
                    @elseif($user?->rol_id === 4)
                        {{-- ! Rol de Directora --}}
                        <li>
                            <a href="{{ route('inicio-director') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                        </li>
                    @elseif($user?->rol_id === 5)
                        {{-- ! Rol de Asistente de directora --}}
                        <li>
                            <a href="{{ route('inicio-asistente') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                        </li>

                        <!-- <li>
                    <a href="#" class="hover:border-b-2 hover:border-primaryColor">Anteproyectos</a>
                </li> -->
                    @elseif($user?->rol_id === 6)
                        {{-- ! Rol de Administrador --}}
                        <li>
                            <a href="{{ route('admin.index') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Inicio</a>
                        </li>
                    @endif

                    {{-- Permisos --}}

                    @can('crear-anteproyecto')
                        <li>
                            <a href="{{ route('anteproyecto') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Anteproyecto</a>
                        </li>
                    @endcan
                    @can('leer-observaciones')
                        <li>
                            <a href="{{ route('observationsAnteproyecto') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Observaciones</a>
                        </li>
                    @endcan
                    @can('leer-calendario')
                        <li>
                            <a href="{{ route('events.calendar') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Calendario</a>
                        </li>
                    @endcan
                    @can('leer-estudiantes-asignados')
                        <li>
                            <a href="{{ route('asesorados') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Estudiantes</a>
                        </li>
                    @endcan
                    @can('leer-anteproyectos-asignados')
                        <li>
                            <a href="{{ route('anteproyectos-asesor') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Anteproyectos</a>
                        </li>
                    @endcan
                    @can('leer-estudiantes')
                        <li>
                            <a href="{{ route('presidente.index') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Estudiantes</a>
                        </li>
                    @endcan
                    @can('leer-asesores-academicos')
                        <li>
                            <a href="{{ route('lista-asesores') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Asesores Académicos</a>
                        </li>
                    @endcan
                    @can('leer-anteproyectos-division')
                        <li>
                            <a href="{{ route('anteproyectos-presidente') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Anteproyectos</a>
                        </li>
                    @endcan
                    @can('generar-reportes-documentos')
                        @if (auth()->user()->role->title == 'director')
                            <li>
                                <a href="{{ route('reportes-director') }}"
                                    class="hover:border-b-2 hover:border-primaryColor">Formatos</a>
                            </li>
                        @endif
                    @endcan

                    @can('gestionar-documentos')
                        <li>
                            <a href="{{ route('documentos-director.index') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Documentos</a>
                        </li>
                    @endcan
                    @can('leer-lista-libros')
                        <li>
                            <a href="{{ route('libros-asistente.index') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Libros</a>
                        </li>
                    @endcan
                    @can('crud-usuarios')
                        <li>
                            <a href="{{ route('panel-users.index') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Usuarios</a>
                        </li>
                    @endcan
                    @can('crud-usuarios')
                        <li>
                            <a href="{{ route('panel-groups.index') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Grupos</a>
                        </li>
                    @endcan
                    @can('crud-roles-permisos')
                        <li>
                            <a href="{{ route('panel-roles.index') }}"
                                class="text-nowrap hover:border-b-2 hover:border-primaryColor">Roles y permisos</a>
                        </li>
                    @endcan
                    @can('crud-empresas')
                        <li>
                            <a href="{{ route('companies.index') }}"
                                class="hover:border-b-2 hover:border-primaryColor">Empresas</a>
                        </li>
                    @endcan
                    @can('crud-asesores')
                        <li>
                            <a href="{{ route('panel-advisors.index') }}"
                                class="text-nowrap hover:border-b-2 hover:border-primaryColor">Asesores empresariales</a>
                        </li>
                    @endcan
                    @can('crud-carreras-divisiones')
                        <li>
                            <a href="{{ route('panel-careers.index') }}"
                                class="text-nowrap hover:border-b-2 hover:border-primaryColor">Carreras y divisiones</a>
                        </li>
                    @endcan

                    @if (
                        $user?->rol_id === 1 ||
                            $user?->rol_id === 2 ||
                            $user?->rol_id === 3 ||
                            $user?->rol_id === 4 ||
                            $user?->rol_id === 5 ||
                            $user?->rol_id === 6)
                        <li>
                            <a href="/profile" class="text-nowrap hover:border-b-2 hover:border-primaryColor">Perfil</a>
                        </li>
                        <!-- CERRAR SESION RESPONIVE -->
                        <hr class="lg:hidden w-full border-[0.3px] border-gray-500 mt-2">
                        <li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                class="flex lg:hidden">
                                @csrf
                                <button type="submit" class="hover:text-red font-medium"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </button>
                            </form>
                        </li>

                </ul>
            </nav>
        </div>



        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden lg:flex">
            @csrf
            <button type="submit"
                class="flex justify-center items-center px-4 p-2 transition duration-300 ease-in-out rounded-full text-red-600 font-light text-white bg-[#999999]"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img src="/img/logos/cerrar-sesion.svg" class="mr-2">
                {{ __('Cerrar sesión') }}
            </button>
        </form>
        @endif

    </header>

    <main class="h-full">
        @yield('contenido')
    </main>

    <footer class="bg-white border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>

    <!-- SCRIPT PARA MENU HAMBURGUESA -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            if (toggleButton && dropdownMenu) {
                toggleButton.addEventListener('click', function() {
                    if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
                        dropdownMenu.style.display = 'block';
                    } else {
                        dropdownMenu.style.display = 'none';
                    }
                });
            }
        });
    </script>

    @yield('scripts-event')
    @yield('scripts-book')
</body>

</html>

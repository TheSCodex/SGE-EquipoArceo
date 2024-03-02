@extends('./templates/guestTemplate')

@section('titulo')
    Observaciones
@endsection

@section('contenido')
<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col">
        <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            Proyectos - Observaciones
        </h2>
        </div>
        <div class="mt-8">
        <div class="bg-green shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Observaciones
            </h3>
            <p class="mt-1 text-sm text-gray-500">
                Última actualización el 20/01/2024 a las 14:53 pm
            </p>
            </div>
            <div class="border-t border-gray-200">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-col">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.634a3.75 3.75 0 01-1.879-1.493L0.178 13.32A3.75 3.75 0 013.75 9.375h16.5a3.75 3.75 0 013.75 3.75l-4.437 4.437a3.75 3.75 0 01-1.879 1.493m-7.25-7.25L12 15.375" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-base font-medium text-gray-900">
                        Elsa Luz Ríos
                        </h4>
                        <p class="text-sm text-gray-500">
                        20/01/2024 a las 14:52 pm
                        </p>
                    </div>
                    </div>
                    <div class="flex items-center">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Resuelto y mandar a revision
                    </button>
                    </div>
                </div>
                <!-- Contenido adicional va aquí -->
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
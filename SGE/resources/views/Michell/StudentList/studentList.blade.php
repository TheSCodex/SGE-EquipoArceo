<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Home</title>
</head>
<body>
@extends('templates.studenTemplate')
@section('contenido')

<div class="bg-[#F3F5F9] min-h-screen flex flex-col justify-center items-center">
<section class="w-full p-4 flex items-center">
    <h1 class="text-2xl font-bold font-kanit ml-4">Estudiantes asesorados</h1>
    {{-- buscador --}}
    <div class="w-[50%] flex justify-evenly ml-auto">
        <input placeholder="Buscador" type="search" name="d" id="" class="w-[50%] placeholder:text-green placeholder:px-3 rounded-md mb-4 border-2 border-green focus:outline-none px-3">
        <svg width="28" height="38" viewBox="0 0 14 22" class="mt-3"  fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_641_2165)">
                <path d="M12.6056 12.3749H1.4056C0.163097 12.3749 -0.466904 13.8573 0.416847 14.721L6.01685 20.221C6.56372 20.7581 7.45185 20.7581 7.99872 20.221L13.5987 14.721C14.4737 13.8573 13.8481 12.3749 12.6056 12.3749ZM7.0056 19.2499L1.4056 13.7499H12.6056L7.0056 19.2499ZM1.4056 9.6249H12.6056C13.8481 9.6249 14.4781 8.14248 13.5943 7.27881L7.99435 1.77881C7.44747 1.2417 6.55935 1.2417 6.01247 1.77881L0.412472 7.27881C-0.462528 8.14248 0.163097 9.6249 1.4056 9.6249ZM7.0056 2.7499L12.6056 8.2499H1.4056L7.0056 2.7499Z" fill="#02AB82"/>
            </g>
            <defs>
                <clipPath id="clip0_641_2165">
                    <rect width="14" height="22" fill="white" transform="translate(0.00585938)"/>
                </clipPath>
            </defs>
        </svg>
    </div>
</section>

    <section class="w-full flex-grow">
    <div class="mx-8 my-5">
        <table class="w-full min-w-[600px] divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre de estudiante</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penalizacion</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hrs de servicio</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ( $interns as $intern )
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $intern->user->name }} {{ $intern->user->last_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $intern->studentStatus->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">20 hrs</td>
                        <td>
                            <div class="flex gap-3 justify-center">
                                <button class="bg-green text-white px-5 py-1 text-sm rounded-md">
                                    Editar
                                </button>

                                <form action="{{ route('studentL.destroy', ['studentL' => $intern->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')" class="bg-rose-500 text-white px-5 py-1 rounded-md text-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

</div>
@endsection
</body>
</html>

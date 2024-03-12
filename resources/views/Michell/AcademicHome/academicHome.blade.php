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

<div class="bg-[#F3F5F9] h-screen flex flex-col justify-center items-center  mb-10 border-b-2">
<section class="w-full p-4 flex items-center">
    <h1 class="text-2xl font-bold font-kanit ml-4">Asesores académicos</h1>
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
    <div class="mx-8">
        <table class="w-full min-w-[600px] divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre estudiantes</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penalizacion</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hrs de servicio</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Elsa Luz Rios</td>
                    <td class="px-6 py-4 whitespace-nowrap">en curso</td>
                    <td class="px-6 py-4 whitespace-nowrap">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">20 hrs</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Elsa Luz Rios</td>
                    <td class="px-6 py-4 whitespace-nowrap">en curso</td>
                    <td class="px-6 py-4 whitespace-nowrap">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">20 hrs</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Elsa Luz Rios</td>
                    <td class="px-6 py-4 whitespace-nowrap">en curso</td>
                    <td class="px-6 py-4 whitespace-nowrap">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">20 hrs</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Elsa Luz Rios</td>
                    <td class="px-6 py-4 whitespace-nowrap">en curso</td>
                    <td class="px-6 py-4 whitespace-nowrap">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">20 hrs</td>
                </tr>
            </tbody>
        </table>
    </section>
    <div class="flex justify-between">
    <div class="bg-white mt-5 rounded-md font-kanit py-8 w-1/2">
        <h3 class="font-semibold ml-10">Observaciones recientes</h3>
        <div class="mx-10 flex flex-col h-full justify-between">
            <div>
                <div class="flex items-center space-x-4 mt-4">
                    <div>
                        <p class="text-xl text-[#555]">Asesor</p>
                        <p class="text-[#888] w-3/4 line-clamp-3">La estructura de tu propuesta es correcta pero necesito que expandas tu justificación e incluyas referencias para tus argumentos</p>
                    </div>
                    <button class="bg-primaryColor rounded-md text-white py-1 w-[38%]">Ampliar observación</button>
                </div>
                <div class="flex items-center space-x-8 mt-7">
                    <div>
                        <p class="text-xl text-[#555]">Asesor</p>
                        <p class="text-[#888] w-3/4 line-clamp-3">La estructura de tu propuesta es correcta pero necesito que expandas tu justificación e incluyas referencias para tus argumentos</p>
                    </div>
                    <button class="bg-primaryColor rounded-md text-white py-1 w-[38%]">Ampliar observación</button>                        </div>
                    </div>
                    <a href="#" class="flex w-full justify-end items-end text-[#888] text-sm">Ver todo</a>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center bg-white w-full md:w-3/4 lg:w-1/2 xl:w-2/5">
    <div class="flex mt-2 space-m-10 mb-1">
                    <h3 class="text-lg font-medium font-kanit ml-2">Eventos importantes</h3>
                </div>
                <div class="flex flex-col justify-center items-center bg-white">
                    <div class="flex mt-3 space-x-10 mb-5">
                        <div>
                            <h3 class="text-darkBlue text-sm font-bold">Hoy 15/02/2024</h3>
                            <ol class="border-l border-dashed border-primaryColor font-roboto">
                                <li>
                                    <div class="flex-start flex items-center pt-3">
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                        </div>
                                        <h4 class="text-sm font-semibold">Revision de memoria</h4>
                                    </div>
                                    <div class="ml-4">
                                        <time class="text-[#888] text-sm">
                                            8:40 a 9:30
                                        </time>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex-start flex items-center pt-3">
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                        </div>
                                        <h4 class="text-sm font-semibold">Reunión con Mario Hugo</h4>
                                    </div>
                                    <div class="ml-4">
                                        <time class="text-[#888] text-sm">
                                            10:50 a 11:40
                                        </time>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div>
                            <h3 class="text-darkBlue font-bold text-sm">Martes 20/02/2024</h3>
                            <ol class="border-l border-dashed border-primaryColor font-roboto">
                                <li>
                                    <div class="flex-start flex items-center pt-3">
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                        </div>
                                        <h4 class="text-sm font-semibold">Revision de memoria</h4>
                                    </div>
                                    <div class="ml-4">
                                        <time class="text-[#888] text-sm">
                                            8:40 a 9:30
                                        </time>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex-start flex items-center pt-3">
                                        <div
                                            class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor">
                                        </div>
                                        <h4 class="text-sm font-semibold">Reunión con Mario Hugo</h4>
                                    </div>
                                    <div class="ml-4">
                                        <time class="text-[#888] text-sm">
                                            10:50 a 11:40
                                        </time>
                                    </div>
                                </li>
                            </ol>
                        </div>

                    </div>
                    <a href="#" class="bg-primaryColor text-white px-14 font-bold text-sm py-1 rounded-md mb-3">Ver
                        más</a>
                </div>
            </div>
@endsection
</body>
</html>

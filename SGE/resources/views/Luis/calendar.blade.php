<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    @vite('resources/css/app.css')
    

</head>
<body>
<header class="p-1 md:p-1 grid grid-cols-3 gap-10">
    <a href="#" class=" text-center flex justify-center">
        <img src="http://www.utcancun.edu.mx/wp-content/uploads/2016/06/1200px-LogoBIS-01.png" class="w-28" alt="">
    </a>

    <ul class="hidden md:flex gap-6 justify-center">

    </ul>

    <ul class="hidden md:flex gap-6 justify-center">
        <button class="p-2 px-2 text-red-600 font-light text-white transition duration-300 ease-in-out rounded-full bg-lightGray">
            <a href="#">Sign Out</a>
        </button>
    </ul>
</header>

<main class="w-full h-full overflow-auto ">
    <div class="flex h-[1020px] w-full ">
        <!-- Lado izquierdo -->
        <div class=" w-72 bg-green">
            <div class=" justify-between items-center p-4 ">
                <div>
                <button class=" bg-[#57c0b4] text-white rounded px-2 pb-1 mb-4 font-bold">+</button>
                </div>
                <div class="flex ">
                    <h2 class="text-lg text-white font-roboto">Febrebro <span class=" text-[#054759]"> 2024 </span> </h2>
                <div class="ml-12">
                    <button class="text-white text-lg mr-2 font-bold">&lt;</button>
                    <button class="text-white text-lg font-bold">&gt;</button>
                </div>
                </div>
            </div>
            <!-- Calendario -->
            <div class=" px-4 py-2 ">
                <!-- Inserta tu calendario aquí -->
                <table class="w-full">
                    <thead>
                        <tr class=" text-sm text-white font-mono">
                            <th class="text-left">Dom</th>
                            <th class="text-left">Lun</th>
                            <th class="text-left">Mar</th>
                            <th class="text-left">Mié</th>
                            <th class="text-left">Jue</th>
                            <th class="text-left">Vie</th>
                            <th class="text-left">Sab</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Inserta los días del mes aquí -->
                        <tr class="text-white text-sm">
                            <td>
                                1 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                2 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                3 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                4 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                5 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                6 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                7 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                        </tr>
                        <tr class="text-white text-sm">
                            <td>
                                8 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                9 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                10 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                11 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                12 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                13 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                14 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                        </tr>
                        <tr class="text-white text-sm">
                            <td>
                                15 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                16 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                17 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                18 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                19 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                20 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                21 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                        </tr>
                        <tr class="text-white text-sm">
                            <td>
                                22 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                23 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                24 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                25 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                26 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                27 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                28 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                        </tr>
                        <tr class="text-white text-sm">
                            <td>
                                29 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                30 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                            <td>
                                31 <br>
                                <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-purple-500"></span>
                                <span class="inline-block w-1 h-1 rounded-full bg-emerald-900"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Línea gris -->
            <hr class="border-white my-4 w-5/4 m-4">
            <!-- Hoy y fecha -->
            <div class="px-4 mb-2">
                <p class="font-bold text-[#193c45]">Hoy <span class="text-sm text-[#054759]"> 27/02/2024</span></p>
            </div>
            <!-- Eventos -->
            <div class="px-4 text-white text-sm">
                <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                <p class=" ml-6">Reunion con Jose Roberto</p>
            </div>
            <div class="px-4 mt-4 text-white text-sm">
                <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                <p class=" ml-6">Revision De Documentacion</p>
            </div>

            <hr class="border-white my-4 w-5/4 m-4">
            <!-- Mañana -->
            <div class="px-4 mb-2 ">
                <p class="  text-white">Mañana <span class="text-sm"> 27/02/2024</span></p>
            </div>
            <!-- Eventos -->
            <div class="px-4 text-white text-sm">
                <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                <p class=" ml-6">Reunion con Jose Roberto</p>
            </div>
            <div class="px-4 mt-4 text-white text-sm">
                <p><span class="inline-block w-4 h-4 rounded-full bg-white mr-2"></span>8:00 - 9:00 AM</p>
                <p class=" ml-6">Reunion con Jose Roberto</p>
            </div>

            <hr class="border-white my-4 w-5/4 m-4">
        </div>
        <!-- Lado derecho -->
        <div class="overflow-x-auto w-full">
            <table class="w-full text-sm text-left   border-t-2  border-[#cbeae4]">
                <thead class="text-xs  uppercase">
                    <tr>
                        <th class="px-6 p-2"></th>
                        <th class="px-6 py-3 border text-gray-500 bg-gray-100">Dom <br> <p class=" text-lg text-black">21</p></br></th>
                        <th class="px-6 py-3 border text-gray-500">Lun <br><p class=" text-lg text-black">22</p></br></th>
                        <th class="px-6 py-3 border text-gray-500">Mar <br><p class=" text-lg text-black">23</p></br></th>
                        <th class="px-6 py-3 border text-gray-500">Mié <br><p class=" text-lg text-black">24</p></br></th>
                        <th class="px-6 py-3 border text-gray-500 bg-blue-100">Jue <br><p class=" text-lg text-black">25</p></br></th>
                        <th class="px-6 py-3 border text-gray-500">Vie <br><p class=" text-lg text-black">26</p></br></th>
                        <th class="px-6 py-3 border text-gray-500 bg-gray-100">Sab <br><p class=" text-lg text-black">27</p></br></th>
                        <th class="px-2 py-2 text-gray-500">EST <br>GMT-5</br></th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Repeat the above row for each hour -->
        
                    <!-- Your data rows -->
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">7 AM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">7 AM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">8 AM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">8 AM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">9 AM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">9 AM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">10 AM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">10 AM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">11 AM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">11 AM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">12 AM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">12 AM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">1  PM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">1 PM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">2  PM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">2  PM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">3  PM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">3  PM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">4  PM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">4  PM</td>
                    </tr>
                    <tr class="bg-white">
                        <th class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">5  PM</th>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-blue-100"></td>
                        <td class="px-6 py-4 border "></td>
                        <td class="px-6 py-4 border bg-gray-100"></td>
                        <td class="px-2 py-8 border  font-medium text-gray-500 whitespace-nowrap">5  PM</td>
                    </tr>
                    <!-- Repeat the above row for each data entry -->
                </tbody>
            </table>
        </div>
        
        {{-- <div class="flex-1 bg-gray-200 flex justify-between">
            <table>
                <thead class="">
                    <tr>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>hola</td>
                        <td>hola2</td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
        {{-- <div class="flex-1 bg-gray-200 flex justify-between">
            <!-- Horas de 8 am a la izquierda -->
            <div class="flex flex-col justify-between mt-14">
                <div class="py-2">8:00 am</div>
                <div class="py-2">9:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">11:00 am</div>
                <div class="py-2">12:00 pm</div>
                <div class="py-2">01:00 pm</div>
                <div class="py-2">02:00 pm</div>
                <div class="py-2">03:00 pm</div>
                <div class="py-2">04:00 pm</div>
                <div class="py-2">05:00 pm</div>
                <!-- Agrega todas las horas necesarias aquí -->
            </div>
            <!-- Días de la semana -->
            <div class="text-center grid grid-cols-7">
                <div class="py-2 ml-10">Lunes <br>21</br></div>
                <div class="py-2">Martes <br>22</br></div>
                <div class="py-2">Miércoles <br>23</br></div>
                <div class="py-2">Jueves <br>24</br></div>
                <div class="py-2">Viernes <br>25</br></div>
                <div class="py-2">Sábado <br>26</br></div>
                <div class="py-2">Domingo <br>27</br></div>
            </div> --}}
            <!-- Horas de 12 pm a 11 pm a la derecha -->
            {{-- <div class="flex flex-col justify-between mt-14">
                <div class="py-2">8:00 am</div>
                <div class="py-2">9:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">10:00 am</div>
                <div class="py-2">10:00 am</div>
                <!-- Agrega todas las horas necesarias aquí -->
            </div> --}}
        </div>
    </div>
</main>

    <footer class="border-t border-secondaryColor text-black text-center p-5">
        Copyright © 2024. SM51
    </footer>
</body>
</html>

@extends('templates.presidentOfTheAcademyTemplate')

@section('titulo')
Proyectos
@endsection

@section('contenido')
<div class="bg-[#F3F5F9] ">
    <div class="sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center ">
                <h2 class="text-xl leading-6 font-medium text-gray-900 mr-4">
                    Anteproyectos de asesorados
                </h2>
                <label for="search" class="ml-auto block text-sm font-medium text-gray-600 ">
                    <input type="text" id="search" class="p-2 border border-green-500 rounded-md bg-green-500 text-black" placeholder="Buscar...">
                </label>


            </div>
        </div>
        <div class="border-t-2 border-gray-400"></div>
        <div class="flex" id="projectList">
            <div class="px-4 py-5 sm:grid sm:gap-4 sm:px-6">
                <div class="bg-white text-sm font-medium text-dark-500">
                    <h2 class="text-xl">Proyecto 1</h2>
                    <div class="border-t-2 border-gray-900 mx-auto"></div>
                    <div class="bg-white p-4">
                        <p class="font-semibold text-gray-600">Objetivo del proyecto, osea de que se va a tratar el proyecto vaya xd</p><br><br>
                        <p class="font-semibold text-gray-600">Rodrigo Bojorquez</p>
                        <p class="font-semibold text-gray-600">Juanpa Zurita</p>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:grid sm:gap-4 sm:px-6">
                <div class="bg-white text-sm font-medium text-dark-500">
                    <h2 class="text-xl">Proyecto 2</h2>
                    <div class="border-t-2 border-gray-900 mx-auto"></div>
                    <div class="bg-white p-4">
                        <p class="font-semibold text-gray-600">Objetivo del proyecto, osea de que se va a tratar el proyecto vaya xd</p><br><br>
                        <p class="font-semibold text-gray-600">Rodrigo Bojorquez 1</p>
                        <p class="font-semibold text-gray-600">Juanpa Zurita 1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const projects = document.querySelectorAll('.bg-white.text-sm.font-medium.text-dark-500');

            projects.forEach(project => {
                const projectName = project.querySelector('h2').innerText.toLowerCase();
                project.style.display = projectName.includes(searchTerm) ? 'block' : 'none';
            });
        });
    </script>

<div class="mt-8 overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Proyectos de la división
        </h3>
    </div>
    <div class="border-t-2 border-gray-400"></div>
    <div class="rounded-md shadow-md overflow-x-auto sm:-mx-2">
        <div class="inline-block min-w-full overflow-hidden sm:px-6 lg:px-8">
            <div class="rounded-md">
                <table class="min-w-full mx-auto text-left text-lg font-light text-gray-900 rounded-md"
                style="border-collapse: separate; border-spacing: 22px; border-radius: 15px;">
                    <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4 ">
                                    Estudiante designado
                                </th>
                                <th scope="col" class="px-6 py-4 ">
                                    Nombre del proyecto
                                </th>
                                <th scope="col" class="px-6 py-4 ">
                                    Votos recibido
                                </th>
                                <th scope="col" class="px-6 py-4 ">
                                    Asesor Academico
                                </th>
                                <th scope="col" class="px-6 py-4 ">
                                    Fecha de publicacion
                                </th>
                                <th scope="col" class="px-6 py-4 ">
                                    Estado
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="rounded-[1.375rem]  my-2 mx-2">
                                <td class="whitespace-nowrap px-6 py-4 text-black ">karti</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">Proyecto nombre</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">2</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">juanito alcachofas</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">08-Dec,2021</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">Aprobado</td>
                            </tr>
                            <tr class="bg-white rounded-[1.375rem] my-2 mx-2">
                                <td class="whitespace-nowrap px-6 py-4 text-black">karti</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">Proyecto nombre</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">1</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">juanito alcachofas</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">08-Dec,2021</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">En resolucion</td>
                            </tr>
                            <tr class="bg-white  rounded-[1.375rem] my-2 mx-2">
                                <td class="whitespace-nowrap px-6 py-4 text-black">karti</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">Proyecto nombre</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">0</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">juanito alcachofas</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">08-Dec,2021</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">En espera</td>
                            </tr>
                            <tr class="bg-white rounded-[1.375rem]  my-2 mx-2">
                                <td class="whitespace-nowrap px-6 py-4 text-black">karti</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">Proyecto nombre</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">1</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">juanito alcachofas</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">08-Dec,2021</td>
                                <td class="whitespace-nowrap px-6 py-4 text-black">Aprobado</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

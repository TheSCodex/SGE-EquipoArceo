@extends('./templates/guestTemplate')

@section('titulo')
    Observaciones
@endsection

@section('contenido')
<div class="bg-gray-100">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Observaciones
        </h3>
        <p class="mt-1 text-sm text-gray-500">
            Última actualización el 20/01/2024 a las 14:53 pm
        </p>
    </div>
    <div class="border border-black"></div> 
    <div class="h-64 flex">
        <div class="border-t border-gray-200 bg-white border w-2/3 h-64 p-4">
            <div class="flex flex-col h-full">
                <div class="flex items-center">
                    <div class="ml-4">
                        <h4 class="text-base font-medium text-gray-900">
                            Elsa Luz Ríos
                        </h4>
                        <p class="text-sm text-gray-500">
                            20/01/2024 a las 14:52 pm
                        </p>
                        <p class="text-base text-gray-600">
                            Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-green w-1/3 h-64 p-4 flex flex-col justify-between items-center text-center">
            <div>
                <h4 class="text-lg font-medium text-white">
                    Resolver
                </h4>
                <p class="text-base text-white">
                    Comentario... (Explica a tu asesor cómo resolviste su observación brevemente)
                </p>
            </div>
            <button class="bg-darkGreen border-t border-black text-white px-3 py-2 rounded-md shadow-sm hover:bg-green-dark" type="submit">
                Marcar como resuelto y enviar a revisión
            </button>
        </div>
    </div>

    <div class="flex">
        <div class="w-1/2 h-64 flex p-5">
            <div class="border-t border-gray-200 bg-white border w-full h-64 p-4">
                <div class="flex flex-col h-full">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <h4 class="text-base font-medium text-gray-900">
                                Elsa Luz Ríos
                            </h4>
                            <p class="text-sm text-gray-500">
                                20/01/2024 a las 14:52 pm
                            </p>
                            <p class="text-base text-gray-600">
                                Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-green w-full h-64 p-4 flex flex-col justify-between items-center text-center ">
                <div>
                    <h4 class="text-lg font-medium text-white">
                        Resolver
                    </h4>
                    <p class="text-base text-white">
                        Comentario...
                    </p>
                </div>
                <button class="bg-darkGreen border-t border-black text-white px-3 py-2 rounded-md shadow-sm hover:bg-green-dark" type="submit">
                    Resolver
                </button>
            </div>
        </div>

        <div class="w-1/2 h-64 flex p-5">
            <div class="border-t border-gray-200 bg-white border w-full h-64 p-4">
                <div class="flex flex-col h-full">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <h4 class="text-base font-medium text-gray-900">
                                Elsa Luz Ríos
                            </h4>
                            <p class="text-sm text-gray-500">
                                20/01/2024 a las 14:52 pm
                            </p>
                            <p class="text-base text-gray-600">
                                Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-green w-full h-64 p-4 flex flex-col justify-between items-center text-center">
                <div>
                    <h4 class="text-lg font-medium text-white">
                        Resolver
                    </h4>
                    <p class="text-base text-white">
                        Comentario...
                    </p>
                </div>
                <button class="bg-darkGreen border-t border-black text-white px-3 py-2 rounded-md shadow-sm hover:bg-green-dark" type="submit">
                    Resolver
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

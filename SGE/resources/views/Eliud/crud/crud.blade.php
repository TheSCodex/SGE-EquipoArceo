@extends('templates.directorsAssistantTemplate')
@section('titulo')
    CRUD
@endsection
@section('contenido')
    <div class="flex justify-between mx-36 mt-10">
        <h1 class="font-bold text-2xl">CRUD Documentos</h1>
        <div class="flex items-center">
            <div class="flex items-center relative">
                <img src="{{ asset('img/Eliud/busqueda.png') }}" alt="busqueda" class=" right-12 absolute" />
                <input type="text" placeholder="Buscar..."
                    class="border-[#02AB82] border-2 rounded-md font-bold focus:outline-none py-1 pl-3 pr-8 placeholder-[#02AB82] text-[#02AB82] mr-8 w-52" />
            </div>
            <button>
                <img src="{{ asset('img/Eliud/dobleFlecha.png') }}" class="mr-8" />
            </button>
            <button class="bg-[#02AB82] text-[#fff] rounded-[4px] px-6 py-2">AÑADIR FORMATO</button>
        </div>
    </div>
    <div class="bg-[#E5E5E5] border-2 mx-36 mt-4"></div> <!-- Linea separador -->
    <div class="w-full">
        <table class="table-auto text-sm text-[#ACACAC] w-[81%] ml-40 mt-5">
            <thead style="border-bottom: 25px solid transparent">
                <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Destinatario</th>
                    <th>Origen</th>
                </tr>
            </thead>
            <tbody class="text-black">
                <tr>
                    <th class="py-8">Reporte de Estadias</th>
                    <th>El alumno Kevin Bello...</th>
                    <th>raceo@utcancun.mx</th>
                    <th>Ely Lus Rios</th>
                    <th><button><img src="{{ asset('img/Eliud/lapiz.png') }}" alt="lapiz" class="mr-4" /></button></th>
                    <th><button><img src="{{ asset('img/Eliud/basura.png') }}" alt="basura" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/descarga.png') }}" alt="descarga" class="mr-4" /></button>
                    </th>
                </tr>
                <tr>
                    <th class="py-8">Reporte de Egresados</th>
                    <th>El siguiente es el...</th>
                    <th>servicios@utcancun.mx</th>
                    <th>Norma Hernández</th>
                    <th><button><img src="{{ asset('img/Eliud/lapiz.png') }}" alt="lapiz" class="mr-4" /></button></th>
                    <th><button><img src="{{ asset('img/Eliud/basura.png') }}" alt="basura" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/descarga.png') }}" alt="descarga" class="mr-4" /></button>
                    </th>
                </tr>

                <tr>
                    <th class="py-8">Reporte de Estadias</th>
                    <th>El alumno Kevin Bello...</th>
                    <th>raceo@utcancun.mx</th>
                    <th>Ely Lus Rios</th>
                    <th><button><img src="{{ asset('img/Eliud/lapiz.png') }}" alt="lapiz" class="mr-4" /></button></th>
                    <th><button><img src="{{ asset('img/Eliud/basura.png') }}" alt="basura" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/descarga.png') }}" alt="descarga" class="mr-4" /></button>
                    </th>
                </tr>
                <tr>
                    <th class="py-8">Reporte de Egresados</th>
                    <th>El siguiente es el...</th>
                    <th>servicios@utcancun.mx</th>
                    <th>Norma Hernández</th>
                    <th><button><img src="{{ asset('img/Eliud/lapiz.png') }}" alt="lapiz" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/basura.png') }}" alt="basura" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/descarga.png') }}" alt="descarga" class="mr-4" /></button>
                    </th>
                </tr>

                <tr>
                    <th class="py-8">Reporte de Estadias</th>
                    <th>El alumno Kevin Bello...</th>
                    <th>raceo@utcancun.mx</th>
                    <th>Ely Lus Rios</th>
                    <th><button><img src="{{ asset('img/Eliud/lapiz.png') }}" alt="lapiz" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/basura.png') }}" alt="basura" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/descarga.png') }}" alt="descarga" class="mr-4" /></button>
                    </th>
                </tr>
                <tr>
                    <th class="py-8">Reporte de Egresados</th>
                    <th>El siguiente es el...</th>
                    <th>servicios@utcancun.mx</th>
                    <th>Norma Hernández</th>
                    <th><button><img src="{{ asset('img/Eliud/lapiz.png') }}" alt="lapiz" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/basura.png') }}" alt="basura" class="mr-4" /></button>
                    </th>
                    <th><button><img src="{{ asset('img/Eliud/descarga.png') }}" alt="descarga" class="mr-4" /></button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

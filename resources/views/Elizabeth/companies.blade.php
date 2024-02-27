@extends('templates.administratorTemplate')
@section('titulo')
  CRUD CARRERAS
@endsection
@section('contenido')
    @vite('resources/css/app.css')


<body class=" ">
    <main class=" m-12  ml-24 mr-24">
        <div class=" mt-3">
            <div class=" flex  justify-between mb-3">
                <h1 class="text-2xl font-bold ">Empresas</h1>
                <div>
                    <input type="search" placeholder="Buscar...." class="px-2 py-[3px] w-52 border-green border-2 rounded-lg" style="color: green;">
                    <button class="  px-2 py-1 bg-green text-white rounded-lg">Agregar nueva Empresa</button>
                </div>
            </div>
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="  text-gray-400 border-t border-gray-400">
                    <tr>
                        <th class=" px-6 text-left">Nombre</th>
                        <th class=" px-6 text-left">Correo Electrónico</th>
                        <th class=" px-6 text-left">Celular</th>
                        <th class=" px-6 text-left">Registro</th>
                        <th class=" px-6 text-left">Dirección</th>
                        <th class=" px-6 text-left">RFC</th>
                        <th class=" px-6 text-left">Sector Comercial</th>
                        <th class=" px-6 text-left"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($companies as $company)
                    <tr class=" font-bold">
                        <td class=" px-3">{{ $company->name }}</td>
                        <td class=" px-3">{{ $company->email }}</td>
                        <td class=" px-3">{{ $company->phone }}</td>
                        <td class=" px-3">{{ $company->registration_date }}</td>
                        <td class="  p-1">{{ $company->address }}</td>
                        <td class=" px-3">{{ $company->rfc }}</td>
                        <td class=" px-3">{{ $company->businessSector ? $company->businessSector->title : 'Hoteleria' }}</td>
                        <td >
                            <div class=" flex flex-row">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1DAF90" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1DAF90" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                    <path d="M13.5 6.5l4 4" />
                                    
                                  </svg>
                            </div>
                     
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
   
    
</body>
@endsection


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Compañías</title>
    @vite('resources/css/app.css')
</head>

<body class="">

    <div class="max-w-7xl  mx-10 mt-3">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>

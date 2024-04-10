@extends('templates/authTemplate')

@section('titulo')
    Bajas
@endsection

@section('contenido')
    <div class="flex flex-col justify-start items-center h-screen">
        <div class="sm:p-8 text-left w-[90%] mb-[2vh] sm:mb-0 ">
            <div class="md:w-full md:h-[80%] md:flex justify-center md:mt-3">
                <section class="">
                    <div class=" font-montserrat md:flex items-center justify-between max-md:space-y-2 border-b pb-3">
                        <h1 id="tableTitle" class="text-xl font-bold">Lista de bajas</h1>
                        <div class="flex items-center">
                            <div class="flex items-center border border-primaryColor rounded-md px-4">
                                <input type="text" id="bajaSearch" name="bajaSearch" placeholder="Buscardor"
                                    class="text-sm font-bold placeholder-primaryColor border-none rounded-md focus:ring-0 text-[#888]">
                            </div>

                        </div>
                    </div>
                    <section class=" font-montserrat mt-5">
                        <table id="dataTable" class=" divide-y divide-[#999] h-full">
                            <thead id="tableHeader" class="text-[#555] text-base">
                                <tr>
                                    <th scope="col" class="pr-[8rem] pb-4">Nombre de estudiantes</th>
                                    <th scope="col" class="pr-[20rem] pb-4 mr-32">Carrera</th>
                                    <th scope="col" class="pr-[15rem] pb-4">Asesor academico</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($dataStudents as $data)
                                    <tr
                                        class="w-full transition duration-100 ease-in-out hover:bg-lightGray/20 border-b-gray-200 border-b-[0.5px]">
                                        <td class="py-4">{{ $data->name }} {{ $data->lastname }}
                                        </td>
                                        <td class="py-4">
                                            {{ \Illuminate\Support\Str::limit($data->careers, 40, $end = '...') }}</td>
                                        <td class="py-4">{{ $data->advisor_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p id="noDataMessage"
                            class="mt-4 text-red-500 hidden text-center text-lightGray font-bold text-2xl">Datos no
                            encontrados</p>
                    </section>
                    <div class=" my-3">
                        {{ $dataStudents->links() }}
                    </div>
                </section>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('bajaSearch');
            const rows = document.querySelectorAll('.data-row');
            const noDataMessage = document.getElementById('noDataMessage');
            const tableTitle = document.getElementById('tableTitle');
            const tableHeader = document.getElementById('tableHeader');

            searchInput.addEventListener('keyup', function() {
                const searchText = this.value.trim().toLowerCase();
                let foundData = false;

                rows.forEach(row => {
                    let found = false;
                    row.querySelectorAll('td').forEach(cell => {
                        const cellText = cell.innerText.trim().toLowerCase();
                        if (cellText.includes(searchText)) {
                            found = true;
                            foundData = true;
                        }
                    });

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (!foundData) {
                    noDataMessage.style.display = 'block';
                    tableHeader.style.color = 'white';
                } else {
                    noDataMessage.style.display = 'none';
                    tableTitle.style.color = '';
                    tableHeader.style.color = '';
                }
            });
        });
    </script>
@endsection

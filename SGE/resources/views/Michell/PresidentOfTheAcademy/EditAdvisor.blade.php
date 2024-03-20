<section>
    <!-- en la vista blade -->
    <div id="editStudentModal{{$student->id}}" tabindex="-1" role="dialog" aria-describedby="myModalLabel" aria-hidden="true" class="myModal2 fade absolute hidden inset-0 h-[115%] w-full justify-center items-center bg-black bg-opacity-50">
        <div  role="document">
            <div class="modal-content d-flex w-[150%]">
                <div class="bg-white flex justify-between items-center font-bold rounded-tl-2xl rounded-tr-2xl">
                    <h5 class="ml-2" id="modalAgregarEstudianteLabel">Agregar Estudiante</h5>
                    <button type="button" class="close m-2 bg-red-500 text-white rounded-full px-2" id="clo" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="bg-white p-3 rounded-bl-2xl rounded-br-2xl">
                    <form action="{{ route('student.update', $data->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="flex justify-between">
                            <label for="name">Nombre:</label>
                            <input type="text" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="name" name="name" value="{{ $student->name }}" required>
                            @error('name')
                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-between  mt-2">
                            <label for="lastName">Apellido:</label>
                            <input type="text" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="lastName" name="lastName" value="{{ $student->lastName }}" required>
                            @error('lastName')
                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-between  mt-2">
                            <label for="average" class="mr-2">Cuatrimestre: </label>
                            <input type="number" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="average" name="average" value="{{ $student->average }}" required>
                            @error('average')
                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-between  mt-2">
                            <label for="career">Carrera:</label>
                            <input type="text" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="career" name="career" value="{{ $student->career }}" required>
                            @error('career')
                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-between  mt-2">
                            <label for="group">Grupo:</label>
                            <input type="text" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="group" name="group" value="{{ $student->group }}" required>
                            @error('group')
                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-between  mt-2">
                            <label for="email">Correo:</label>
                            <input type="email" class="rounded-lg w-1/2 border-1 border-[#00AB84]" id="email" name="email" value="{{ $student->email }}" required>
                            @error('email')
                                <p class="text-red-500 font-bold text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-[#00AB84] w-full my-3 rounded-lg py-1 text-white">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
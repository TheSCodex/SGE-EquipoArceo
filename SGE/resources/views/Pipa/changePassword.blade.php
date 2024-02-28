@extends('../templates/guestTemplate')
@section('titulo')
    Cambiar Contraseña
@endsection
@section('contenido')
<div class="flex items-center justify-center h-screen font-montserrat">
  <div class="bg-white rounded-lg p-8 max-w-md mx-auto" style="width: 90%;">
    <h2 class="text-2xl font-bold mb-4">Cambiar Contraseña</h2>
    <form action="{{url('changepassword')}}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="new_password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
        <div class="relative">
            <input type="password" id="new_password" name="new_password" value="{{old('new_password')}}"  placeholder="Contraseña" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <img src="/img/ojo.png" id="togglePasswordVisibility" class="w-4 cursor-pointer" alt="">
            </div>
        </div>
        @error('new_password')
        <p class="text-sm text-red">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="confirmed_password" class="block text-gray-700 font-bold mb-2">Confirmar Contraseña</label>
        <div class="relative">
            <input type="password" id="confirmed_password" name="confirmed_password" value="{{old('confirmed_password')}}" placeholder="Confirmar contraseña" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            <div class="absolute inset-y-0  right-0 pr-3 flex items-center">
                <img src="/img/ojo.png" id="toggleConfirmPasswordVisibility" class="w-4 cursor-pointer" alt="">
              </div>
        </div>
        @error('confirmed_password')
        <p class="text-sm text-red">{{$message}}</p>
        @enderror
    </div>
      <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
        Guardar
      </button>
    </form>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("togglePasswordVisibility").addEventListener("click", function() {
      var passwordInput = document.getElementById("new_password");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    });

    document.getElementById("toggleConfirmPasswordVisibility").addEventListener("click", function() {
      var confirmPasswordInput = document.getElementById("confirmed_password");
      if (confirmPasswordInput.type === "password") {
        confirmPasswordInput.type = "text";
      } else {
        confirmPasswordInput.type = "password";
      }
    });
  });
</script>
@endsection

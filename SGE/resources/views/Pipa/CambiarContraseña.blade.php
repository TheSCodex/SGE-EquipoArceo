@extends('../templates/guestTemplate')
@section('titulo')
    Cambiar Contraseña
@endsection
@section('contenido')
<div class="flex items-center justify-center h-screen">
  <div class="bg-white rounded-lg p-8 max-w-md mx-auto" style="width: 90%;">
    <h2 class="text-2xl font-bold mb-4">Cambiar Contraseña</h2>
    <form>
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
        <div class="relative">
            <input type="password" id="password" name="password" placeholder="Contraseña" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <img src="/img/ojo.png" id="togglePasswordVisibility" class="w-4 cursor-pointer" alt="">
              </div>
        </div>
      </div>
      <div class="mb-6">
        <label for="confirm-password" class="block text-gray-700 font-bold mb-2">Confirmar Contraseña</label>
        <div class="relative">
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar contraseña" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <img src="/img/ojo.png" id="toggleConfirmPasswordVisibility" class="w-4 cursor-pointer" alt="">
              </div>
        </div>
    </div>
      <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
        Guardar
      </button>
    </form>
  </div>  </div>

  <script>
    document.getElementById("togglePasswordVisibility").addEventListener("click", function() {
      var passwordInput = document.getElementById("password");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    });

    document.getElementById("toggleConfirmPasswordVisibility").addEventListener("click", function() {
      var confirmPasswordInput = document.getElementById("confirm-password");
      if (confirmPasswordInput.type === "password") {
        confirmPasswordInput.type = "text";
      } else {
        confirmPasswordInput.type = "password";
      }
    });
  </script>
  @endsection

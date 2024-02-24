<div class="bg-white rounded-lg p-8 max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Inicio de Sesión</h2>
    <form>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
        <input type="email" id="email" name="email" placeholder="usuario@gmail.com" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
      </div>
      <div class="mb-6">
        <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
        <div class="relative">
          <input type="password" id="password" name="password" placeholder="Contraseña" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <img src="/img/ojo.png" id="togglePasswordVisibility" class="w-4 cursor-pointer" alt="">
          </div>
        </div>
        <a class="mt-2 inline-block align-baseline font-bold text-sm" href="#">¿Olvidaste tu contraseña?</a>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Iniciar Sesión</button>
      </div>
    </form>
  </div>

<script>
  document.getElementById("togglePasswordVisibility").addEventListener("click", function() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  });
</script>
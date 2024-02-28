@extends('../templates/guestTemplate')
@section('titulo')
    Iniciar Sesión
@endsection
@section('contenido')
<div class="flex items-center justify-center h-screen ">
<div class="bg-white rounded-lg p-8 max-w-md mx-auto font-montserrat" style="width: 90%;">
    <h2 class="text-2xl font-bold mb-4">Inicio de Sesión</h2>
    <form action="{{url('login')}}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="user_email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
        <input type="email" id="user_email" name="user_email" value="{{old('user_email')}}" placeholder="usuario@gmail.com" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
        @error('user_email')
            <p class="text-sm text-red">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="user_password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
        <div class="relative">
          <input type="password" id="user_password" name="user_password" value="{{old('user_password')}}" placeholder="Contraseña" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <img src="/img/ojo.png" id="togglePasswordVisibility" class="w-4 cursor-pointer" alt="">
          </div>
        </div>
        @error('user_password')
        <p class="text-sm text-red">{{$message}}</p>
        @enderror
        <a class="mt-2 inline-block align-baseline font-bold text-sm" href="RecuperarContraseña">¿Olvidaste tu contraseña?</a>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Iniciar Sesión</button>
      </div>
    </form>

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
</div></div>

@endsection

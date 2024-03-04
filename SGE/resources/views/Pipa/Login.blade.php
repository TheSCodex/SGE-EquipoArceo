@extends('../templates/guestTemplate')

@section('title')
    Log In
@endsection

@section('contenido')
<div class="flex items-center justify-center h-screen -mt-20 font-montserrat">
  <div class="bg-white rounded-lg p-10 max-w-md mx-auto" style="width: 95%;">
    <h2 class="text-3xl font-bold mb-6">Iniciar sesión</h2>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="user_email" class="block text-lg font-semibold text-gray-800 mb-2">Correo electrónico</label>
                <input type="email" id="user_email" name="user_email" value="{{ old('user_email') }}" placeholder="user@gmail.com" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-800 leading-tight focus:outline-none focus:shadow-outline font-montserrat">
                @error('user_email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="user_password" class="block text-lg font-semibold text-gray-800 mb-2">Contraseña</label>
                <div class="relative">
                    <input type="password" id="user_password" name="user_password" value="{{ old('user_password') }}" placeholder="Contraseña" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-800 leading-tight focus:outline-none focus:shadow-outline font-montserrat">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <img src="/img/eye.png" id="togglePasswordVisibility" class="w-6 cursor-pointer" alt="">
                    </div>
                </div>
                @error('user_password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
                <a class="mt-3 inline-block align-baseline font-semibold text-lg hover:text-primaryColor" href="recuperar-contraseña">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-lg text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline font-montserrat">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("togglePasswordVisibility").addEventListener("click", function() {
        var passwordInput = document.getElementById("user_password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
</script>
@endsection

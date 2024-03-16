@extends('../templates/guestTemplate')

@section('title')
    Cambiar contraseña
@endsection

@section('contenido')
<div class="flex items-center justify-center h-screen -mt-20 font-montserrat">
  <div class="bg-white rounded-lg p-10 max-w-md mx-auto" style="width: 95%;">
    <h2 class="text-3xl font-bold mb-6">Cambiar contraseña</h2>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-6">
          <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Email</label>
          <div class="relative">
              <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Email" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autofocus autocomplete="username">
          </div>
          @error('email')
              <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
          @enderror
      </div>
      

        <!-- New Password -->
        <div class="mb-6">
            <label for="password" class="block text-lg font-semibold text-gray-700 mb-2">Contraseña</label>
            <div class="relative">
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Contraseña" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <img src="/img/invisible.png" id="togglePasswordVisibility" class="w-6 cursor-pointer" alt="">
                </div>
            </div>
            @error('password')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-lg font-semibold text-gray-700 mb-2">Confirmar contraseña</label>
            <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmar contraseña" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <img src="/img/invisible.png" id="toggleConfirmPasswordVisibility" class="w-6 cursor-pointer" alt="">
                </div>
            </div>
            @error('password_confirmation')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-lg text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline font-montserrat">
                Guardar
            </button>
        </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("togglePasswordVisibility").addEventListener("click", function() {
          var passwordInput = document.getElementById("password");
          var passwordImg = document.getElementById("togglePasswordVisibility");

          if (passwordInput.type === "password") {
              passwordInput.type = "text";
              passwordImg.src = "/img/visible.png";
          } else {
              passwordInput.type = "password";
              passwordImg.src = "/img/invisible.png";
          }
      });

      document.getElementById("toggleConfirmPasswordVisibility").addEventListener("click", function() {
          var confirmPasswordInput = document.getElementById("password_confirmation");
          var confirmPasswordImg = document.getElementById("toggleConfirmPasswordVisibility");

          if (confirmPasswordInput.type === "password") {
              confirmPasswordInput.type = "text";
              confirmPasswordImg.src = "/img/visible.png";
          } else {
              confirmPasswordInput.type = "password";
              confirmPasswordImg.src = "/img/invisible.png";
          }
      });
  });
</script>


@endsection

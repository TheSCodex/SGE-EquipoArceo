@extends('../templates/guestTemplate')
@section('title')
Recover Password
@endsection
@section('contenido')
<div class="flex items-center justify-center h-screen -mt-20 font-montserrat">
  <div class="bg-white rounded-lg p-10 max-w-md mx-auto" style="width: 95%;">
    <h2 class="text-3xl font-bold mb-6">Recuperar contraseña</h2>
    <p class="mb-6">Ingresa tu correo electrónico asociado a tu cuenta y te enviaremos instrucciones para restablecer tu contraseña.</p>
    <form action="{{url('recover')}}" method="POST">
      @csrf
      <div class="mb-6">
        <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Correo Electrónico</label>
        <input type="email" id="email" name="email_user" value="{{old('email_user')}}" placeholder="user@gmail.com" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
        @error('email_user')
            <p class="text-red-600 text-sm">
              {{$message}}
            </p>
        @enderror
      </div>
      <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-lg text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline font-montserrat">
        Enviar
      </button>
    </form>
  </div>
</div>
@endsection

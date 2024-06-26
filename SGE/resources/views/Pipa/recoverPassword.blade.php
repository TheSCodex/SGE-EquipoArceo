@extends('../templates/guestTemplate')
@section('titulo')
Recuperar Contraseña
@endsection
@section('contenido')
<div class="flex items-center justify-center h-screen font-montserrat">
  <div class="bg-white rounded-lg p-8 max-w-md mx-auto" style="width: 90%;">
    <h2 class="text-2xl font-bold mb-4">Recuperar Contraseña</h2>
    <p class="mb-6">Ingresa tu correo electrónico asociado a tu cuenta y te enviaremos instrucciones para restablecer tu contraseña.</p>
    <form action="{{url('recover')}}" method="POST">
      @csrf
      <div class="mb-6">
        <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
        <input type="email" id="email" name="email_user" value="{{old('email_user')}}" placeholder="usuario@gmail.com" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
        @error('email_user')
            <p class="text-red text-sm">
              {{$message}}
            </p>
        @enderror
      </div>
      <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
        Enviar
      </button>
    </form>
  </div></div>


@endsection

@extends('../templates/guestTemplate')
@section('title')
    Change Password
@endsection
@section('contenido')
<div class="flex items-center justify-center h-screen -mt-20 font-montserrat">
  <div class="bg-white rounded-lg p-10 max-w-md mx-auto" style="width: 95%;">
    <h2 class="text-3xl font-bold mb-6">Change Password</h2>
    <form action="{{url('changepassword')}}" method="POST">
      @csrf
      <div class="mb-6">
        <label for="new_password" class="block text-lg font-semibold text-gray-700 mb-2">Password</label>
        <div class="relative">
            <input type="password" id="new_password" name="new_password" value="{{old('new_password')}}"  placeholder="Password" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <img src="/img/eye.png" id="togglePasswordVisibility" class="w-6 cursor-pointer" alt="">
            </div>
        </div>
        @error('new_password')
        <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="confirmed_password" class="block text-lg font-semibold text-gray-700 mb-2">Confirm Password</label>
        <div class="relative">
            <input type="password" id="confirmed_password" name="confirmed_password" value="{{old('confirmed_password')}}" placeholder="Confirm password" class="appearance-none border rounded-lg w-full py-3 px-4 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <img src="/img/eye.png" id="toggleConfirmPasswordVisibility" class="w-6 cursor-pointer" alt="">
            </div>
        </div>
        @error('confirmed_password')
        <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>
      <button type="submit" class="bg-primaryColor hover:bg-darkGreen w-full text-lg text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline font-montserrat">
        Save
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

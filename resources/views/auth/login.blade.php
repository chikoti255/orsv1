<x-guest-layout>
  <style>
  body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('/images/library2.jpeg'); /* Replace 'background-image.jpg' with the path to your image */
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
  }
  .container {
      /*opacity: 0;*/
      transition: opacity 0.5s ease-in-out;
      background: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
  }

  h2 {
      text-align: center;
      margin-bottom: 20px;
  }
  input[type="text"],
  input[type="email"],
  input[type="password"], select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      margin-left: -10px;
      border: 1px solid #ccc;
      border-radius: 5px;
  }

  </style>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
      <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div> -->

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
      </div>

</x-guest-layout>

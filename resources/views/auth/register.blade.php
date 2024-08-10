<x-guest-layout>
    <style>
    body {
        margin: 0;
        padding: 0;
        outline: 0;
        font-family: Arial, sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }
    .background-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-image: url('/images/library2.jpeg'); /* Replace 'background-image.jpg' with the path to your image */
        background-size: cover;
        background-position: center;
        animation: image-zoom 30s infinite alternate;
    }
    @keyframes image-zoom {
        0% {
            transform: scale(1);
        }
        50% {
          transform: scale(1.2);
        }
        100% {
          transform: scale(1);
        }
    }
    .container {
        /*opacity: 0;*/
        position: relative;

        display: flex;
        flex-direction: column;
        align-items: center;
        width: 400px;
        margin: auto;
        transition: opacity 0.5s ease-in-out;
        background: rgba(255, 255, 255, 0.8);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 90%;
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

      <div class="background-container"></div>
        <div class="container" id="registrationContainer">
                <h2>Registration Form</h2>

          <form method="POST" action="{{ route('register') }}">
              @csrf

              <!--first Name -->

              <div>
                <!--  <x-input-label for="first_name" :value="__('Name')" />-->
                  <x-text-input id="fist_name" class="block mt-1 w-full" placeholder="First Name" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" />
                  <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
              </div>

              <!-- last Name-->
              <div>
                <!--  <x-input-label for="last_name" :value="__('Name')" />-->
                  <x-text-input id="last_name" class="block mt-1 w-full" type="text" placeholder="Last Name" name="last_name" :value="old('last_name')" required autofocus autocomplete="name" />
                  <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
              </div>

              <!-- Email Address -->
              <div class="mt-4">

                  <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" :value="old('email')" required autocomplete="username" />
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>



              <!-- Organization -->
              <div class="mt-4">

                  <x-text-input id="organization" class="block mt-1 w-full" type="text" placeholder="Organization your from..." name="organization" :value="old('organization')" required autocomplete="username" />
                  <x-input-error :messages="$errors->get('organization')" class="mt-2" />
              </div>

              <!--country -->
              <div class="mt-4">

                <select id="countryList" name="country" class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" :value="old('country')" required>
                   <!--populated options though javascript -->
              </select>
                  <x-input-error :messages="$errors->get('country')" class="mt-2" />
              </div>

              <div class="flex items-center justify-end mt-4">
                  <a class="underline text-sm text-gray-600 hover:text-gra y-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                      {{ __('Already registered?') }}
                  </a>

                  <x-primary-button class="ms-4">
                      {{ __('Register') }}
                  </x-primary-button>
              </div>
          </form>
        </div>

        <script src="{{ asset('js/countries.js') }}"></script>
</x-guest-layout>

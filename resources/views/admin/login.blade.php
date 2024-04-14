<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @php
        use Illuminate\Support\Facades\Session;
    @endphp
  <style>
      body {
        margin: 0;
        padding: 0;
        outline: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;

      }
      .loader {
          /*width: 100vw;
          height: 100vh;*/
          top: 0;
          left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          background-color: #333333;
          transition: opacity 0.75s, visibility 0.75s;
      }
      .loader::after {
          content: "";
          width: 70px;
          height: 70px;
          border: 10px solid #dddddd;
          border-top-color: #3399cc;
          border-radius: 50%;
          animation: loading 0.75s ease infinite;
      }
      .loader--hidden {
        opacity: 0;
        visibility: hidden;
      }
      @keyframes loading {
          from{ transform: rotate(0turn) }
          to{ transform: rotate(1turn) }
      }

      #login-form {
   animation: fadeInFromTop 1s ease-out forwards;
   max-width: 400px;
   width: 100%;

 }

 @keyframes fadeInFromTop {
   0% {
     opacity: 0;
     transform: translateY(-90px);
   }
   100% {
     opacity: 1;
     transform: translateY(0);
   }
 }
  </style>
</head>
<body>
  <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="loader loader--hidden"></div>

      <div class="flex justify-center items-center">
          <div id="login-form" class="bg-white rounded-lg shadow-md px-10 py-8 mx-auto w-full max-w-md">
                 <h1 class="text-center text-2xl font-bold mb-6">Welcome Back!</h1>
                 <h2 class="text-center text-xl mb-6">Please Sign in to continue</h2>

                 @if(Session::has('admin_login_error'))
                         <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <span><i class="bi bi-exclamation-triangle"></i></span>
                              <strong>{{ session::get('admin_login_error') }}</strong>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                @elseif(Session::has('admin_login_failed'))
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                 <span><i class="bi bi-exclamation-triangle"></i></span>
                               <strong>{{ session::get('admin_login_failed') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                 @endif



             <form method="POST" action="{{ route('admin.login.submit') }}" class="mb-4">
                @csrf

                   <div class="flex flex-col mb-4">
                     <label for="email" class="text-gray-700 mb-1 font-bold">Email</label>
                     <input
                       type="email"
                       name="email"
                       id="email"
                       class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500"
                       placeholder="example@mail.com"
                       required
                     />
                   </div>
                   <div class="flex flex-col mb-6">
                     <label for="password" class="text-gray-700 mb-1 font-bold">Password</label>
                     <input
                        name="password"
                       type="password"
                       id="password"
                       class="px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500"
                       placeholder="Password"
                       required
                     />
                   </div>
                       <div class="flex items-center mb-4">
                         <input type="checkbox" id="remember" class="mr-2" />
                         <label for="remember" class="text-gray-700 text-sm">Remember me</label>
                         <a href="#" class="text-blue-500 text-sm ml-auto hover:underline">Forgot Password?</a>
                       </div>
               <button
                 type="submit"
                 class="block w-full px-3 py-2 rounded-md bg-blue-500 text-white font-bold hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500"
               >
                 Login
               </button>
             </form>
             <p class="text-center text-gray-500 text-sm">Not a member? <a href="#" class="text-blue-500 hover:underline">Register Now</a></p>
           </div>

         </div>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
            const loader= document.querySelector('.loader');

                  loader.addEventListener('transitionend', () => {
                        document.body.removeChild(loader);
                  });

                    setTimeout(() => {
                          loader.classList.add('loader--hidden');
                    }, 1000);
      });
  </script>
</body>
</html>

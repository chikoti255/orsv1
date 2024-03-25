<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        /*.container.show {
          opacity: 1;
        }*/
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
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        select {
          width: 106%;
        }
        .spinner {
            width: 60px;
            height: 60px;
            border: 8px solid #f3f3f3; /* Adjust border color as needed */
            border-radius: 50%;
            border-top-color: #3498db; /* Color of the spinning element */
            animation: spin 1s linear infinite;
          }

        @keyframes spin {
          from { transform: rotate(0deg); }
          to { transform: rotate(360deg); }
        }

    </style>
</head>
<body>
    <div class="container" id="registrationContainer">
          <div id="registration-form">
            <h2>Registration Form</h2>
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                  <input type="hidden" name="token" value="{{ $token }}" />

                <input type="text" name="first_name" placeholder="First Name" id="firstName" required>
                <input type="text" name="last_name" placeholder="Last Name" id="lastName" required>
                <input type="text" name="email" placeholder="Email Address" id="email" required>

                <input type="text" name="organization" placeholder="Enter organization you are from.." required/>
                <select id="countryList" name="country" required>
                   <!--populated options though javascript -->
              </select>

              <input id="submitButton" type="submit" value="Register">
            </form>
          </div>
    </div>

      <script src="{{ asset('js/countries.js') }}"></script>
      <script src="{{ asset('js/validation+styles/validation+styles.js') }}"></script>
      <script src="{{ asset('js/validation+styles/submit.js')}}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
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



    <div class="loader loader--hidden"></div>

        <div>Admin Dashboard </div>


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

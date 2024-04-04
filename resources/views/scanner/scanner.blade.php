<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner</title>
    <style>

        body {
          font-family: sans-serif;
        }

        #result {
          font-weight: bold;
          margin-top: 20px;
        }
        .success-message{
          border: 0px solid black;
          background: #5cb85c;
          padding: 5px;
          border-radius: 10px;
          display: inline;
          margin-top: 20px;
          position: fixed;
          transform: translateY(-70px);
          left: 43%;
          color: white;
          display: flex;
          flex-direction: row;
          align-items: center;
          gap: 0.6em;
        }
        .material-symbols-outlined {
          font-variation-settings:
          'FILL' 0,
          'wght' 400,
          'GRAD' 0,
          'opsz' 24
        }
        #tick {
          display: none;
          position: absolute;

          left: 50%;
          /*transform: translate(-50%,-40%);*/
          transform: translate(-50%, 20%);
        }
        #tick.success {
          display: block;
        }
    </style>

</head>
<body>
      <div class="scanner-container">
          <div class="box">
              <div id="reader" style="height: 500px;"></div>
          </div>

            <!--<div id="tick" class="success">
                <span class="material-symbols-outlined" style="font-size: 50px">
                check_circle
                </span>
            </div>-->

          <div id="result"></div>
          <audio id="scan-sound" src="{{ asset('sounds/scanner_sound.mp3') }}" preload="auto"></audio>
      </div>
      <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script src="{{ asset('js/scanner.js') }}"></script>

    <script>
(function() {
// Check if the library is loaded using a self-invoking function
if (typeof Html5Qrcode === 'undefined') {
console.error('html5-qrcode library not found. Please ensure it is included correctly.');
return; // Exit the function if not found
}

console.log(`html5-qrcode library found!, ${Html5QrcodeScanner}`);

})();
</script>

</x-app-layout>

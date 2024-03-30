
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner</title>
    <style>

        body {
          font-family: sans-serif;
        }
      /*#reader {
          width: 99vw;
          height: 82vh;
        }*/
        #result {
          font-weight: bold;
          margin-top: 20px;
        }
        h2 {
          border: 0px solid black;
          background: #5cb85c;
          padding: 5px;
          border-radius: 10px;
          display: inline;
          margin-top: 20px;
        }
    </style>

</head>
<body>
      <div class="scanner-container">
          <div class="box">
              <div id="reader"></div>
          </div>

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

</body>
</html>

@extends('admin.admin')

@section('content')
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        .scanner-container {
          position: relative;
          top: 20%;
          left: 30%;
        }

    </style>

</head>
<body>
      <div class="scanner-container" style="width: 700px; height: 700px;">
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


@endsection

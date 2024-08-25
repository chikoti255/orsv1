@extends('admin.admin')

@section('content')
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/scanner.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com"></script>
    <title>Scanner</title>


</head>
<body>
      <div class="scanner">
              <div class="scanner-container" style="width: 700px; height: 700px;">
                  <div class="box">
                      <div id="reader" style="height: 500px;"></div>
                  </div>



                  <audio id="scan-sound" src="{{ asset('sounds/scanner_sound.mp3') }}" preload="auto"></audio>
              </div>


                      <div id="result">
                          <!-- Scanned attendees will be appended here -->
                      </div>

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

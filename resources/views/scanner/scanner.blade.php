
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner</title>
    <style>

</style>

</head>
<body>
      <div class="scanner-container">
          <div class="box">
              <div id="reader"></div>
          </div>

          <div id="result"></div>
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

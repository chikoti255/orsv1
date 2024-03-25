<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QrCode</title>
    <style>

    </style>
</head>
<body>
    <div class="container">

            <h2>qr code</h2>
              <img src="data:image/png;base64, {{ base64_encode($qr_code_image) }}" alt="QR Code" />
    </div>
</body>
</html>

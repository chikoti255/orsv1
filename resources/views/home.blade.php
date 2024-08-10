<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orsv1</title>
    <style>
        body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        }

        .hero-image {
        background-image: url("/images/library.jpg");
        background-color: #cccccc;
        background-repeat: repeat-x;
        height: 900px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        }

        .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
}
.button {
  background-color: #04AA6D; /* Green */
  border-radius: 12px;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

</head>
<body>
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">The 14th East African Communication Association (EACA)</h1>
            <h3>Conference 2024</h3>
            <a href="{{ route('register') }}" class="button button4" >Get Started</a>
        </div>
    </div>
</body>
</html>
</x-layout>

@extends('admin.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/scan-cont.css') }}" />
<script src="https://cdn.lordicon.com/lordicon.js"></script>


<div class="container position-relative">
  <div class="left-container">

        <div class="words">
            <h2 style="font-size: 50px">Welcome to the Meeting</h2>
              <h3 style="font-size: 20px">Scan the Qr Code here to begin</h3>
        </div>


      <div class="lordicon">
        <lord-icon
            src="https://cdn.lordicon.com/fumyyjbn.json"
            trigger="loop"
            state="loop-line"
            style="width:330px; height:400px">
        </lord-icon>

        <div class="qr-button">
            <a style="text-decoration: none;" class="button" href="{{ route('scanner') }}">Start Scan</a>
        </div>
      </div>

  </div>
  <div class="right-container">
      
    <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
          <defs></defs>
          <path style="fill: rgb(137,204,255); stroke: rgb(137,204,255);" d="M 101.732 59.524 C 74.744 32.027 38.94 120.283 87.121 169.373 C -72.533 272.327 113.215 304.268 131.494 272.186 C 122.173 411.994 281.05 398.974 293.29 215.368 C 521.272 356.328 582.944 -30.968 306.819 66.559 C 342.253 -61.578 166.109 125.154 191.017 16.234 C 183.692 -2.811 87.858 23.451 101.732 59.524 Z"></path>
    </svg>

    <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
  <defs></defs>
  <path style="fill: rgb(137,204,255); stroke: rgb(137,204,255);" d="M 350.108 0.54 C 227.847 16.057 273.77 272.205 116.883 236.473 C -15.343 300.334 -34.773 357.594 126.082 386.364 C -41.22 446.524 58.367 466.078 97.945 452.921 C 85.593 531.522 322.683 511.053 324.675 498.377"></path>
</svg>


  <div class="image">
      <img src="{{ asset('images/scan-illustrator.png') }}" alt="Qr code image illustration" />
  </div>


  </div>
</div>


<script src="https://cdn.lordicon.com/lordicon.js"></script>

@endsection


const scanner= new Html5QrcodeScanner('reader', {
  qrbox: {
    width: 250,
    height: 250,
  },
  fps: 20,
});

  scanner.render(success, error);

//if the success happens
    function success(result) {
        document.getElementById('result').innerHTML=
          `<h2>Success</h2>
              <p>
                <a href="${result}">${result}</a>
              </p>`;

              scanner.clear();
              document.getElementById('reader').remove();
    }

    //for the error functoin of scanner
      function error(error) {
        console.error(error);
      }

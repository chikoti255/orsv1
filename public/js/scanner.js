
const scanner= new Html5QrcodeScanner('reader', {
  qrbox: {
    width: 250,
    height: 250,
  },
  fps: 120,
});


  scanner.render(success, error);

//if the success happens
    function success(result) {

          const resultContainer= document.getElementById('result');
              resultContainer.innerHTML =
            `<div class="success-message">
                  <p>Success</p>
                  <p>
                      <span class="material-symbols-outlined" style="font-size: 50px">
                      check_circle
                      </span>
                  </p>
            </div>
                <p>
                  <a href="${result}">${result}</a>
                </p>`;


                resultContainer.style.display= "block";

                const scanSound= document.getElementById('scan-sound');
                  //scanSound.play();

                setTimeout(() => {
                  resultContainer.style.display= "none";
                }, 3000);

    }

    //for the error functoin of scanner
      function error(error) {
        console.error(error);
      }


const scanner= new Html5QrcodeScanner('reader', {
  qrbox: {
    width: 250,
    height: 250,
  },
  fps: 120,
});

const scannedCode= null;

const scanSound= document.getElementById('scan-sound');

  scanner.render(success, error);


const observer= new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting && entry.target == Swal.getContainer()) {
                console.log("SweetAlert is visible");
                return;
            }
        });
const scanner= new Html5QrcodeScanner('reader', {
  qrbox: {
    width: 250,
    height: 250,
  },
  fps: 120,
});

const scannedCode= null;

const scanSound= document.getElementById('scan-sound');

  scanner.render(success, error);


const observer= new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting && entry.target == Swal.getContainer()) {
                console.log("SweetAlert is visible");
                return;
            }
        });
});

      //observe sweet alert using swal getContainer
    observer.observe(Swal.getContainer());

//if the success happens
    function success(result) {
          const resultContainer= document.getElementById('result');

          if(observer.takeRecords().some(record => record.isIntersecting)) {
              return; // to not proceed if sweet alert is visible
          }

          if(result !== scannedCode) {
              Swal.fire({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success"
                  }).then(() => {
                      resultContainer.innerHTML= `<p>
                              <a href="${result}">${result}</a>
                      </p>`;

                      resultContainer.style.display= "block";

                      scanSound.play();

                      setTimeout(() => {
                      resultContainer.style.display= "none";
                    }, 5000);

                  });
          }
          else {
              console.log("This Qr code has already been scanned.");
          }


                onScanned(`${result}`);

    }

    //for the error functoin of scanner
      function error(error) {
        console.error(error);
      }

      function onScanned(scanned_data) {
        fetch('/handleScanned', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json'
            },
            body: JSON.stringify({scanned_data: scanned_data})
        })
          .then(response => response.json())
          .then(data => {
                if(data.scanned_data) {
                    const parts= data.scanned_data.original_data.split(`|`);

                    console.log(data.scanned_data);
                }
          });
      }

});

      //observe sweet alert using swal getContainer
    observer.observe(Swal.getContainer());

//if the success happens
    function success(result) {
          const resultContainer= document.getElementById('result');

          if(observer.takeRecords().some(record => record.isIntersecting)) {
              return; // to not proceed if sweet alert is visible
          }

          if(result !== scannedCode) {
              //  scannedCode = result; //updating only if its new scan

              Swal.fire({
                    title: "Welcome!",
                    text: `${result}`,
                    icon: "success"
                  }).then(() => {
                      resultContainer.innerHTML= `<p>
                              <a href="${result}">${result}</a>
                      </p>`;

                      resultContainer.style.display= "block";

                      scanSound.play();

                      setTimeout(() => {
                      resultContainer.style.display= "none";
                    }, 5000);

                  });
          }
          else {
              console.log("This Qr code has already been scanned.");
          }


                onScanned(`${result}`);

    }

    //for the error functoin of scanner
      function error(error) {
        console.error(error);
      }

      function onScanned(scanned_data) {
        fetch('/handleScanned', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json'
            },
            body: JSON.stringify({scanned_data: scanned_data})
        })
          .then(response => response.json())
          .then(data => {
                if(data.scanned_data) {
                    const parts= data.scanned_data.original_data.split(`|`);

                    console.log(data.scanned_data);
                }
          });
      }

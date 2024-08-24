const scanner = new Html5QrcodeScanner('reader', {
  qrbox: {
    width: 250,
    height: 250,
  },
  fps: 120,
});



const scanSound = document.getElementById('scan-sound');

scanner.render(success, error);

const alertShown = false;



function error(error) {
  console.error(error);

}


//for the server request data
async function onScanned(scanned_data) {
  let csrfToken= null;
  const csrfMeta = document.head.querySelector('meta[name="csrf-token"]');
        csrfToken = csrfMeta ? csrfToken.getAttribute('content') : null;

    const request= new Request('/handleScanned', {
      method: "POST",
      body: JSON.stringify({ scanned_data: scanned_data }),
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken, //it is put but not verified

      },
    });

    try {
        const response= await fetch(request);
          if(!response.ok) {
              console.log(`Response status: ${response.status}`);

              const errorMessage= await response.text();

              Swal.fire({
                title: 'Error!',
                text: `There was an error processing the Qr Code: ${error.message}`,
                icon: 'error'
              });

              return; //handling error scenario
          }

          const data = await response.json();
          console.log(data);



          /*if(data.success || data.message) {
            Swal.fire({
              title: 'Success!',
              text: data.message,
              icon: 'success'
            });*
          }*/


    } catch(error){
      console.error(error.message);

        Swal.fire({
          title: 'Error!',
          text: 'An unexpected error occurred',
          icon: 'error'
        });
    }
}



function success(result) {
  const resultContainer = document.getElementById('result');

  Swal.fire({
    title: "Welcome!",
    text: `${result}`,
    icon: "success"
  }).then(() => {
    // Check if the result already exists in the container
    const existingResult = Array.from(resultContainer.children).find(child => child.textContent.trim() === result.trim());

    if (!existingResult) {
      // Create a new element for the result
      const newResult = document.createElement('p');
      newResult.innerHTML = `<a class="text-center" href="#">${result}</a>`;

      // Append the new result to the container
      resultContainer.appendChild(newResult);

      // Play the scan sound
      scanSound.currentTime = 0; // Rewind to start
      scanSound.play();

      // Automatically scroll to the latest entry
      resultContainer.scrollTop = resultContainer.scrollHeight;

      // Optionally, hide the result after a certain time
    /*  setTimeout(() => {
        newResult.style.display = "none";
      }, 5000); */
    }
  });

  onScanned(`${result}`);
}

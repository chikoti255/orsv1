const scanner = new Html5QrcodeScanner('reader', {
  qrbox: {
    width: 250,
    height: 250,
  },
  fps: 120,
});

const scannedCode = null;
const scanSound = document.getElementById('scan-sound');

scanner.render(success, error);

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting && entry.target === Swal.getContainer()) {
      console.log("SweetAlert is visible!");
      return; // Exit the loop if SweetAlert is visible
    }
  });
});

observer.observe(Swal.getContainer());

function success(result) {
  const resultContainer = document.getElementById('result');

  // Check if a previous alert is displayed (using Intersection Observer)
  if (observer.takeRecords().some(record => record.isIntersecting)) {
    return; // Don't proceed if SweetAlert is visible
  }

  if (result !== scannedCode) {

    Swal.fire({
      title: "Welcome!",
      text: `${result}`,
      icon: "success"
    }).then(() => {

      resultContainer.innerHTML = `
      <p>
      <a href="${result}">${result}</a>
      </p>`;

      resultContainer.style.display = "block";

      scanSound.play();

      setTimeout(() => {
        resultContainer.style.display = "none";
      }, 5000);

    });
  } else {
    console.log("This QR code has already been scanned.");
  }

onScanned(`${result}`);

}

function error(error) {
  console.error(error);
}

// Optional: For potential server-side validation
function onScanned(scanned_data) {

  const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

  fetch('/handleScanned', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken // Include CSRF token in the request headers

    },
    body: JSON.stringify({ scanned_data: scanned_data })
  })
    .then(response => response.json())
    .then(data => {
      if (data.scanned_data) {
        const parts = data.scanned_data.original_data.split('|');
        console.log(data.scanned_data);
      }
    })
    .catch(error => console.error(error)); // Handle potential fetch errors
}

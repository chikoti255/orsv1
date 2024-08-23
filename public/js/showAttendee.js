
let attendeeData = null;

function viewUserDetails(attendeeId) {

    fetch(`/attendee/${attendeeId}`)
    .then(response => response.json())
    .then(data => {
          document.getElementById('modal-body').innerHTML = `
              <h3>${data.full_name}</h3>
              <p>Email: ${data.email}</p>
            `;

            document.getElementById('userModal').style.display= "block";

                attendeeData = data;
              console.log(attendeeData);

              const qrCodeContainer = document.getElementById('qrCodeContainer');
                  qrCodeContainer.innerHTML = 'Generating Qr code....';

          fetch(`/attendee/qr-code-image/${attendeeId}`)
            .then(response => response.json())
            .then(data => {
                if(data.image_url) {

                  qrCodeContainer.innerHTML= '';
                  
                  const qrCodeImage = document.createElement('img');
                     qrCodeImage.src = data.image_url;
                     qrCodeImage.alt = 'QR Code';
                     qrCodeImage.style.width = '200px'; // Adjust size if needed

                     // Append the image to the container
                     qrCodeContainer.appendChild(qrCodeImage);

                } else {
                  console.error('Qr code not found');
                }

            })
            .catch(error => console.error('Error fetching image: ', error));

    })
    .catch(error => console.error('Error fetching user details: ', error));


}



  function generateQrCode() {

      const data = {
            email: attendeeData.email
      };


              fetch(`/attendee/qr-code/${attendeeData.id}`, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(data)
              })
                  .then(response => response.json())
                  .then(data => {
                        console.log(data);
                            /*qrCodeElement.innerHTML = `<img src="{{ asset('storage/${data.qr_code_path}') }}" alt="Qr Code" />`;*/
                  })
                  .catch(error => {
                      console.error(`Error fetching Qr Code: `, error);
                  });


  }






function closeModal() {
  document.getElementById('userModal').style.display = "none";
}

function deleteAttendee() {
  const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
        },
        buttonsStyling: true
        });
  swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
      }).then((result) => {
      if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
      });
          } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
          ) {
          swalWithBootstrapButtons.fire({
            title: "Cancelled",
            text: "Your imaginary file is safe :)",
            icon: "error"
          });
          }
          });
}

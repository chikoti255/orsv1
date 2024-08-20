
function viewUserDetails(attendeeId) {

    fetch(`/attendee/${attendeeId}`)
    .then(response => response.json())
    .then(data => {
          document.getElementById('modal-body').innerHTML = `
              <h3>${data.full_name}</h3>
              <p>Email: ${data.email}</p>
            `;

            document.getElementById('userModal').style.display= "block";
    })
    .catch(error => console.error('Error fetching user details: ', error));

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

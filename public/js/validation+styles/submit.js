
const submitButton= document.getElementById('submitButton');

submitButton.addEventListener('click', function() {
  this.disabled= "true";

  this.classList.add= 'spinner';
});

// Assume your form has an id="myForm"
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formID");
    const submitButton = document.getElementById("submitButton");
  
    submitButton.onclick = function (event) {
        event.preventDefault(); // Prevent default form submission
        // Redirect to submitted.html
        window.location.href = "submitted.html";
      };
  });

document.getElementsById("formID").addEventListener("submit", function(event) {
        event.preventDefault(); // Stops the form from actually submitting
        window.location.href = "submitted.html"; // Redirects to your custom page
});




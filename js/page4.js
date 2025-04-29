// Assume your form has an id="myForm"
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("formID");
    const customer =document.getElementById("CustName");
    const address = document.getElementById("add");
    const phone = document.getElementById("PhnNumber");
    const email = document.getElementById("PerEmail");
    const department = document.getElementById("dept");
    const description = document.getElementById("dscption");

    
    
    form.addEventListener("submit", function (event) {
        const inputs = [customer, address, phone, email, department, description];

        // Basic XSS pattern check (this can be expanded)
        const xssPattern = /<script.*?>.*?<\/script>|javascript:|on\w+=/i;
        
        for(let input of inputs) {
            if(xssPattern.test(input.value)) {
                alert("Denied: Your input contains unsafe content.");
                event.preventDefault();
                return;
            } 
        }
        if(!validateForm()) {
            event.preventDefault(); // Cancel submission
            return;
        }
        // Safe to continue — either submit normally or redirect
        event.preventDefault();
        window.location.href = "submitted.html"; // optional
      });



      function validateForm() {
        const validation = [customer, email, description];
        const fieldNames = ["Customer Name", "Email", "Description"];
       
        for(let i = 0; i < validation.length; i++) {
            if (validation[i].value.trim() == "") {
                alert(`${fieldNames[i]} must be filled out`);
                return false;
            }
        }
        //If there is no problem, then return true
        return true;
    }

  });

 

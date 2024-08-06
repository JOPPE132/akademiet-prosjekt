document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email'); // Get the email input 
    const form = emailInput.closest('form'); // Find the closest parent form

    // Add a submit event listener to the form
    form.addEventListener('submit', function(event) {
        if (!validateEmail()) { // Prevent form submission if email is invalid
            event.preventDefault();
        }
    });

    /**
     * Validates the entered email address. Checks if the email address entered in the emailinput input 
     * matches a basic email address format using regular expressions.
     * @returns  boolean True if the email is valid, false otherwise.
     */
    function validateEmail() {
        const email = emailInput.value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Regex pattern for valid email address
        const isValid = emailPattern.test(email);
        const errorMessageElement = document.getElementById('email-error');

        if (!isValid) {
            if (!errorMessageElement) {
                const errorElement = document.createElement('div');
                errorElement.id = 'email-error';
                errorElement.style.color = 'red';
                errorElement.innerText = 'Vennligst benytt en ekte e-post addresse.';
                emailInput.parentNode.insertBefore(errorElement, emailInput.nextSibling);
            }
        } else {
            if (errorMessageElement) {
                errorMessageElement.remove();
            }
        }
        return isValid;
    }
});
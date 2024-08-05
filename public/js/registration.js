
/**
 * Validate e-mail input from client. If the e-mail does not meet the standard e-mail
 * format, the client will recieve a notification under the input.
 */
document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const form = emailInput.closest('form');

    form.addEventListener('submit', function(event) {
        if (!validateEmail()) {
            event.preventDefault();
        }
    });

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

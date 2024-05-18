document.addEventListener('DOMContentLoaded', () => {
    const signInButton = document.getElementById('signInButton');
    const signUpButton = document.getElementById('signUpButton');
    const container = document.getElementById('container');

    signInButton.addEventListener('click', () => {
        container.classList.remove("active");
    });

    signUpButton.addEventListener('click', () => {
        container.classList.add("active");
    });
});

        // Password policy validation function
        function validatePassword(password) {
            // Example password policy: At least 8 characters with at least one uppercase letter and one digit
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
            return passwordRegex.test(password);
        }

        // Example function to handle form submission and password policy validation
        function handleSignUpFormSubmission(event) {
            event.preventDefault();
            const passwordInput = document.querySelector('.sign-up-form input[name="password"]');
            const password = passwordInput.value;
            const passwordPolicyError = document.getElementById('signUpPasswordPolicy');

            if (!validatePassword(password)) {
                passwordPolicyError.textContent = "Password must be at least 8 characters long and contain at least one uppercase letter and one digit.";
                return;
            }

            // Reset password policy error message
            passwordPolicyError.textContent = "";

            // Handle reCAPTCHA verification
            const recaptchaResponse = grecaptcha.getResponse();
            if (!recaptchaResponse) {
                alert("Please complete the reCAPTCHA.");
                return;
            }

            // Proceed with form submission
            // Example: Submit the form data to the server
        }

        document.addEventListener('DOMContentLoaded', () => {
            const signUpForm = document.querySelector('.sign-up-form');
            signUpForm.addEventListener('submit', handleSignUpFormSubmission);
        });

document.addEventListener('DOMContentLoaded', () => {
    const signInForm = document.querySelector('.sign-in-form');
    signInForm.addEventListener('submit', handleSignInFormSubmission);
});

function handleSignInFormSubmission(event) {
    event.preventDefault();
    const usernameInput = document.querySelector('.sign-in-form input[name="user_name"]');
    const passwordInput = document.querySelector('.sign-in-form input[name="password"]');
    const username = usernameInput.value;
    const password = passwordInput.value;

    // Example: Check the username and password against the database
    // Simulate backend logic for demonstration purposes
    // Replace this with actual backend logic to verify the credentials
    const isUserValid = checkUserCredentials(username, password);

    if (!isUserValid) {
        // Display a message indicating that the user doesn't exist
        alert("The username or password is incorrect. Please try again.");
    } else {
        // Proceed with form submission
        signInForm.submit();
    }
}

// Example function to check user credentials (Replace with actual backend logic)
function checkUserCredentials(username, password) {
    // Example: Check if the username and password exist in the database
    // This is a placeholder function and should be replaced with actual backend logic
    // Return true if the user exists and the password is correct; otherwise, return false
    // In a real application, you would query your database to verify the credentials
    // For demonstration purposes, I'm using hardcoded values
    const validUsername = "exampleUser";
    const validPassword = "examplePassword";

    return username === validUsername && password === validPassword;
}
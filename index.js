function toggleMenu() {
    const menu = document.querySelector('nav ul');
    menu.classList.toggle('active');
}
        // Display the overlay when the login link is clicked
        document.getElementById('login-link').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('login-overlay').style.display = 'flex';
        });
        
        document.getElementById('start').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('login-overlay').style.display = 'flex';
        });
        // Close the overlay
        function closeLoginForm() {
            document.getElementById('login-overlay').style.display = 'none';
        }

        // Toggle between login and register forms
        function toggleForms() {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const formTitle = document.getElementById('form-title');
            const toggleToRegister = document.getElementById('toggle-to-register');
            const toggleToLogin = document.getElementById('toggle-to-login');

            if (loginForm.classList.contains('active-form')) {
                loginForm.classList.remove('active-form');
                registerForm.classList.add('active-form');
                formTitle.textContent = 'Register';
                toggleToRegister.style.display = 'none';
                toggleToLogin.style.display = 'block';
            } else {
                registerForm.classList.remove('active-form');
                loginForm.classList.add('active-form');
                formTitle.textContent = 'Login';
                toggleToRegister.style.display = 'block';
                toggleToLogin.style.display = 'none';
            }
        }

        // Validate login form
        function validateLoginForm() {
            const username = document.getElementById('login-username').value;
            const password = document.getElementById('login-password').value;

            if (!username || !password) {
                alert("Please fill in both fields.");
                return false;
            }

            return true;
        }

        // Validate register form
        function validateRegisterForm() {
            const username = document.getElementById('register-username').value;
            const email = document.getElementById('register-email').value;
            const phone = document.getElementById('register-phone').value;
            const district = document.getElementById('register-district').value;
            const password = document.getElementById('register-password').value;

            if (!username || !email || !phone || !district || !password) {
                alert("Please fill in all fields.");
                return false;
            }

            return true;
        }
        
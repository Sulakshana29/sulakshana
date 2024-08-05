// script.js
const images = [
  'url("./assests/background1.jpeg")',
  'url("./assests/background2.jpeg")',
  'url("./assests/background3.jpeg")',
  'url("./assests/background4.jpeg")'
];

let currentIndex = 0;

function changeBackgroundImage() {
  document.body.style.backgroundImage = images[currentIndex];
  currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeBackgroundImage, 3000); // Change image every 3 seconds
window.onload = changeBackgroundImage;

document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('loginForm');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const emailError = document.getElementById('emailError');
  const passwordError = document.getElementById('passwordError');

  form.addEventListener('submit', function(event) {
      let valid = true;

      // Clear previous error messages
      emailError.textContent = '';
      passwordError.textContent = '';

      // Email validation
      if (!emailInput.value.match(/^[\w-]+@([\w-]+\.)+[a-zA-Z]{2,7}$/)) {
          emailError.textContent = 'Please enter a valid email address.';
          valid = false;
      }

      // Password validation
      if (passwordInput.value.length < 8) {
          passwordError.textContent = 'Password must be at least 8 characters long.';
          valid = false;
      }

      if (!valid) {
          event.preventDefault(); // Prevent form submission if validation fails
      }
  });
});


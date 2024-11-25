// Background Image Slideshow

const images = [
  'url("../public/assets/images/pet-owner.jpg")',
  'url("../public/assets/images/wall/1.jpg")',
  'url("../public/assets/images/wall/2.jpg")',
  'url("../public/assets/images/wall/3.jpg")',
  'url("../public/assets/images/wall/4.jpg")',
  'url("../public/assets/images/wall/5.jpg")',
  'url("../public/assets/images/wall/6.jpg")',
  'url("../public/assets/images/wall/7.jpg")',
  'url("../public/assets/images/wall/8.jpg")',
  'url("../public/assets/images/wall/9.jpg")',
  'url("../public/assets/images/wall/10.jpg")',
  'url("../public/assets/images/wall/11.jpg")',
  'url("../public/assets/images/wall/12.jpg")',
  'url("../public/assets/images/wall/13.jpg")',
  'url("../public/assets/images/wall/14.jpg")',
  'url("../public/assets/images/wall/15.jpg")',
  'url("../public/assets/images/wall/16.jpg")',
  'url("../public/assets/images/wall/17.jpg")',
  'url("../public/assets/images/wall/18.jpg")'

];
// console.log("checking...");

let currentIndex = 0;

function changeBackgroundImage() {
  document.body.style.backgroundImage = images[currentIndex];
  currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeBackgroundImage, 3000); // Change image every 3 seconds
window.onload = changeBackgroundImage;

// Form Validation
// document.addEventListener('DOMContentLoaded', function() {
//   const form = document.getElementById('loginForm');
//   const emailInput = document.getElementById('email');
//   const passwordInput = document.getElementById('password');
//   const emailError = document.getElementById('emailError');
//   const passwordError = document.getElementById('passwordError');

//   form.addEventListener('submit', function(event) {
//       let valid = true;

//       // Clear previous error messages
//       emailError.textContent = '';
//       passwordError.textContent = '';

//       // Email validation
//       if (!emailInput.value.match(/^[\w-]+@([\w-]+\.)+[a-zA-Z]{2,7}$/)) {
//           emailError.textContent = 'Please enter a valid email address.';
//           valid = false;
//       }

//       // Password validation
//       if (passwordInput.value.length < 8) {
//           passwordError.textContent = 'Password must be at least 8 characters long.';
//           valid = false;
//       }

//       if (!valid) {
//           event.preventDefault(); // Prevent form submission if validation fails
//       }
//   });

//   // Show Additional Fields Based on User Type
//   const userTypeSelect = document.getElementById('user-type');
//   userTypeSelect.addEventListener('change', showAdditionalFields);
  
//   showAdditionalFields(); // Call once to initialize the correct fields
// });

// function showAdditionalFields() {
//     // Hide all additional fields by default
//     document.querySelectorAll('.additional-fields').forEach(function(field) {
//         field.style.display = 'none';
//     });

//     // Get the selected user type
//     const userType = document.getElementById('user-type').value;

//     // Show the fields specific to the selected user type
//     if (userType === 'petOwner') {
//         document.getElementById('petOwnerFields').style.display = 'block';
//     } else if (userType === 'veterinary') {
//         document.getElementById('veterinaryFields').style.display = 'block';
//     } else if (userType === 'petSitter') {
//         document.getElementById('petSitterFields').style.display = 'block';
//     } else if (userType === 'petCarecenter') {
//         document.getElementById('petCareCenterFields').style.display = 'block';
//     } else if (userType === 'pharmacy') {
//         document.getElementById('pharmacyFields').style.display = 'block';
//     }
// }

document.addEventListener('DOMContentLoaded', function() {
  // Get the modal
  const modal = document.getElementById("requestMedicineModal");
  
  // Get the button that opens the modal
  const btn = document.getElementById("requestMedicineBtn");
  
  // Get the <span> element that closes the modal
  const span = document.querySelector(".close");

  // When the user clicks the button, open the modal 
  if(btn) {
      btn.addEventListener('click', function() {
          modal.style.cssText = "display: block !important";
      });
  }

  // When the user clicks on <span> (x), close the modal
  if(span) {
      span.addEventListener('click', function() {
          modal.style.cssText = "display: none !important";
      });
  }

  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener('click', function(event) {
      if (event.target == modal) {
          modal.style.cssText = "display: none !important";
      }
  });
});
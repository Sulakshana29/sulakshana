<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="<?=ROOT?>/assets/images/happy-paws-logo.png">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/vetappoinment.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/footer.css">
</head>
<body>
    <?php include ('components/nav.php'); ?>

    <div class="dashboard-container">
        <div class="sidebar">
            <h3>Vet Dashboard</h3>
            <ul>
                <li><a href="<?=ROOT?>/vet/profile">My Profile</a></li>
                <li><a href="<?=ROOT?>/vet/confirmed-appointments">Upcoming Appointments</a></li>
                <li><a href="<?=ROOT?>/vet/received-appointments">Appointment Requests</a></li>    
                <li><a href="<?=ROOT?>/vet/view-patients">View Patients</a></li>
                <li><a href="<?=ROOT?>/vet/prescriptions">Prescriptions</a></li>
                <li><a href="<?=ROOT?>/vet/settings">Settings</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="overview-cards">
                <div class="appoinement-requests">
                    <h1>-----------------------------------Appointments-----------------------------------</h1>
                    
                    <!-- Each card will have its own appointment details -->
                    <div class="card" id="appointment1">
                        <h3>Appointment 1</h3>
                        <button class="btn-dashboard" onclick="openPopup('Max', '2024-11-20', '10:00 AM', 'appointment1')">View Details</button>
                    </div>

                    <div class="card" id="appointment2">
                        <h3>Appointment 2</h3>
                        <button class="btn-dashboard" onclick="openPopup('Bella', '2024-11-21', '2:00 PM', 'appointment2')">View Details</button>
                    </div>

                    <div class="card" id="appointment3">
                        <h3>Appointment 3</h3>
                        <button class="btn-dashboard" onclick="openPopup('Charlie', '2024-11-22', '4:00 PM', 'appointment3')">View Details</button>
                    </div>

                    <div class="card" id="appointment4">
                        <h3>Appointment 4</h3>
                        <button class="btn-dashboard" onclick="openPopup('Luna', '2024-11-23', '11:00 AM', 'appointment4')">View Details</button>
                    </div>


                    <!-- Popup structure -->
                    <div id="appointmentPopup" class="popup">
                        <div class="popup-content">
                            <h3>Appointment Details</h3>
                            <p><strong>Pet Name:</strong> <span id="petName">Max</span></p>
                            <p><strong>Appointment Date:</strong> <span id="appointmentDate">2024-11-20</span></p>
                            <p><strong>Time:</strong> <span id="appointmentTime">10:00 AM</span></p>
                            
                            <!-- Completed button in the popup -->
                            <button class="btn-completed" onclick="completeAppointment()">Completed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include ('components/footer.php'); ?>

    <script src="<?=ROOT?>/assets/js/script.js"></script>

    <script>
        let currentAppointmentId = null;

            // Function to open the popup with dynamic details
            function openPopup(petName, appointmentDate, appointmentTime, appointmentId) {
                document.getElementById("petName").textContent = petName;
                document.getElementById("appointmentDate").textContent = appointmentDate;
                document.getElementById("appointmentTime").textContent = appointmentTime;
                document.getElementById("appointmentPopup").style.display = "flex";

                currentAppointmentId = appointmentId; // Set the correct current appointment ID
            }

            function closePopup() {
                document.getElementById("appointmentPopup").style.display = "none";
            }

            function completeAppointment() {
                if (currentAppointmentId) {
                    const card = document.getElementById(currentAppointmentId);
                    if (card) {
                        card.remove(); // Remove the appointment card from the dashboard
                    }
                    closePopup(); // Close the popup after marking as completed
                }
            }

            // Optional: Close the popup when clicking outside the popup content
            window.onclick = function(event) {
                if (event.target == document.getElementById("appointmentPopup")) {
                    closePopup();
                }
            }

        
    </script>
</body>
</html>

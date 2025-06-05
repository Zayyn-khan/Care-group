<?php
include 'connect.php';

if(isset($_POST['submit'])){

        $regUsername = $_POST['regUsername'];
        $regEmail = $_POST['regEmail'];
        $regPhone = $_POST['regPhone'];
        $regPassword = $_POST['regPassword'];

        $sql =  "insert into `dashboarddesign`.`userprofile` (regUsername, regEmail, regPhone, regPassword) 
        values ('$regUsername', '$regEmail', '$regPhone', '$regPassword')";

        $result = mysqli_query($connect, $sql);

        if($result){
            header('location: dashboard.php');
        }

    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background-color: #f0f4f8;
    }

    .form-container {
      border: 3px solid #1C39BB; /* main theme border */
      border-radius: 15px;
      padding: 2rem;
      background-color: white;
      box-shadow: 0 0 10px rgba(147, 232, 190, 0.3); /* soft teal glow */
      transition: all 0.3s ease-in-out;
    }

    .form-container:hover {
      box-shadow: 0 0 20px rgba(147, 232, 190, 0.5);
    }

    .btn-theme {
      background-color: #1C39BB;
      color: white;
    }

    .btn-theme:hover {
      background-color: #93E9BE;
    }

    .text-theme {
      color: #1C39BB;
    }

    .form-control:focus {
      border-color: #93E8BE;
      box-shadow: 0 0 0 0.2rem rgba(147, 232, 190, 0.25);
    }

    label {
      color: #808080;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="form-container w-100" style="max-width: 500px;">
    <h3 class="text-center text-theme mb-4" style="font-size: 36px;">Register</h3>
    <form id="registerForm" onsubmit="return validateRegister()">
      
      <div class="mb-3">
        <label for="regUsername" class="form-label">Username</label>
        <input type="text" name="regUsername" class="form-control" id="regUsername" required>
      </div>

      <div class="mb-3">
        <label for="regEmail" class="form-label">Email</label>
        <input type="email" name="regEmail" class="form-control" id="regEmail" required>
      </div>

      <div class="mb-3">
        <label for="regPhone" class="form-label">Phone</label>
        <input type="tel" name="regPhone" class="form-control" id="regPhone" pattern="[0-9]{10}" required placeholder="10-digit number">
      </div>

      <div class="mb-3">
        <label for="regPassword" class="form-label">Password</label>
        <input type="password" name="regPassword" class="form-control" id="regPassword" required>
      </div>

      <a href="login.php"><button type="submit" name="submit" class="btn btn-theme w-100">Register</button></a>
    </form>

    <div class="text-center mt-3">
      <a href="login.php" class="text-decoration-none text-theme">Already have an account? Login</a>
    </div>
  </div>
</div>

<script>
  function validateRegister() {
    const username = document.getElementById('regUsername').value.trim();
    const email = document.getElementById('regEmail').value.trim();
    const phone = document.getElementById('regPhone').value.trim();
    const password = document.getElementById('regPassword').value;

    if (!username || !email || !phone || !password) {
      alert("Please fill all fields.");
      return false;
    }

    if (!/^[0-9]{10}$/.test(phone)) {
      alert("Phone number must be 10 digits.");
      return false;
    }

    if (password.length < 6) {
      alert("Password must be at least 6 characters.");
      return false;
    }

    return true;
  }
</script>
</body>
</html>

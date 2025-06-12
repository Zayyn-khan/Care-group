
<?php
    include 'connect.php';

    if(isset($_POST['submit'])){

        $regUsername = $_POST['regUsername'];
        $regEmail = $_POST['regEmail'];
        $regPhone = $_POST['regPhone'];
        $regPassword = $_POST['regPassword'];

        $sql =  "insert into `caregroup`.`register` (regUsername, regEmail, regPhone, regPassword) 
        values ('$regUsername', '$regEmail', '$regPhone', '$regPassword')";

        $result = mysqli_query($connect, $sql);

        if($result){
            header('location: login.php');
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
      border: 3px solid #1C39BB;
      border-radius: 15px;
      padding: 2rem;
      background-color: white;
      box-shadow: 0 0 10px rgba(147, 232, 190, 0.3);
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

    .error-border {
      border-color: red !important;
    }

    .error-message {
      color: red;
      font-size: 0.875rem;
      display: none;
    }
  </style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['register_success'])) {
    echo "<script>alert('{$_SESSION['register_success']}');</script>";
    unset($_SESSION['register_success']);
}
if (isset($_SESSION['register_error'])) {
    echo "<script>alert('{$_SESSION['register_error']}');</script>";
    unset($_SESSION['register_error']);
}
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="form-container w-100" style="max-width: 500px;">
    <h3 class="text-center text-theme mb-4" style="font-size: 36px;">Register</h3>
    <form id="registerForm" method="POST" onsubmit="return validateRegister()">
      
      <div class="mb-3">
        <label for="regUsername" class="form-label">Username</label>
        <input type="text" name="regUsername" class="form-control" id="regUsername">
        <div id="usernameError" class="error-message">Username is required.</div>
      </div>

      <div class="mb-3">
        <label for="regEmail" class="form-label">Email</label>
        <input type="email" name="regEmail" class="form-control" id="regEmail">
        <div id="emailError" class="error-message">Enter a valid email address.</div>
      </div>

      <div class="mb-3">
        <label for="regPhone" class="form-label">Phone</label>
        <input type="tel" name="regPhone" class="form-control" id="regPhone" placeholder="10-digit number">
        <div id="phoneError" class="error-message">Phone number must be 10 digits.</div>
      </div>

      <div class="mb-3">
        <label for="regPassword" class="form-label">Password</label>
        <input type="password" name="regPassword" class="form-control" id="regPassword">
        <div id="passwordError" class="error-message">Password must be at least 6 characters.</div>
      </div>

      <button type="submit" name="submit" class="btn btn-theme w-100">Register</button>
    </form>

    <div class="text-center mt-3">
      <a href="login.php" class="text-decoration-none text-theme">Already have an account? Login</a>
    </div>
  </div>
</div>

<script>
  function validateRegister() {
    let isValid = true;

    // Get input fields
    const username = document.getElementById('regUsername');
    const email = document.getElementById('regEmail');
    const phone = document.getElementById('regPhone');
    const password = document.getElementById('regPassword');

    // Error elements
    const usernameError = document.getElementById('usernameError');
    const emailError = document.getElementById('emailError');
    const phoneError = document.getElementById('phoneError');
    const passwordError = document.getElementById('passwordError');

    // Reset previous errors
    [username, email, phone, password].forEach(input => input.classList.remove('error-border'));
    [usernameError, emailError, phoneError, passwordError].forEach(el => el.style.display = 'none');

    // Validate username
    if (username.value.trim() === '') {
      username.classList.add('error-border');
      usernameError.style.display = 'block';
      isValid = false;
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value.trim())) {
      email.classList.add('error-border');
      emailError.style.display = 'block';
      isValid = false;
    }

    // Validate phone
    const phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone.value.trim())) {
      phone.classList.add('error-border');
      phoneError.style.display = 'block';
      isValid = false;
    }

    // Validate password
    if (password.value.trim().length < 6) {
      password.classList.add('error-border');
      passwordError.style.display = 'block';
      isValid = false;
    }

    return isValid;
  }
</script>
</body>
</html>

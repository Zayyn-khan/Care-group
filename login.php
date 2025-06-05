<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

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

    label {
      color: #808080;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="form-container w-100" style="max-width: 400px;">
    <h3 class="text-center text-theme mb-4" style="font-size: 36px;">Login</h3>
    <form id="loginForm" onsubmit="return validateLogin()">
      <div class="mb-3">
        <label for="loginEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="loginEmail" required>
      </div>

      <div class="mb-3">
        <label for="loginPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="loginPassword" required>
      </div>

      <button type="submit" class="btn btn-theme w-100">Login</button>
    </form>

    <div class="text-center mt-3">
      <a href="registered.php" class="text-decoration-none text-theme">Don't have an account? Register</a>
    </div>
  </div>
</div>

<script>
  function validateLogin() {
    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('loginPassword').value.trim();

    if (!email || !password) {
      alert("Please fill all fields.");
      return false;
    }

    return true;
  }
</script>
</body>
</html>

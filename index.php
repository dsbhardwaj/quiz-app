<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN/SIGNUP</title>
  <!-- Add this inside <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
   * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #0f0f0f;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    form {
      background-color:rgb(88, 86, 86);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0, 255, 150, 0.2);
      width: 100%;
      max-width: 400px;
    }

    h1 {
      color: #fff;
      margin-bottom: 25px;
      text-align: center;
    }

    input[type="email"],
    input[type="password"] {
      
      width: 100%;
      padding: 12px 15px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background-color: #2a2a2a;
      color: white;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
      background-color: #00cc99;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #00b386;
    }

    .error {
      color: #ff4d4d;
      text-align: center;
      margin-top: 15px;
    }

    .placeholder {
      color: #aaa;
    }
    .password-container{
      position:relative;
    }
    .password-container input{
      padding-right:25px;
    }
    
.password-container i {
  position: absolute;
  right: 10px; /* Adjust positioning */
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}
  </style>
    
  </style>

</head>
<body>
    <div id = form>
      <form name = "form" action = "login.php" method ="POST" >
        <h1>LOGIN</h1>
      <label><box-icon type='logo' name='gmail'></box-icon>email ID</label>
      <input type="email" name = "email" placeholder="Enter Your Email"> <br>

      <label>password</label>
      <div class="password-container">
      <input type="password"  id="password" name = "password" required placeholder="Enter Your Password">
      <i class="far fa-eye" id="togglePassword"></i> <br>
       </div>
      <input type="submit" name="submit" value="login" >
     
      <p>Doesn't have a account?</p>
      <a  class = 'button' href="register.php">register?
      </a>
    </div>
    <script>const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('password');

togglePassword.addEventListener('click', function() {
  const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordField.setAttribute('type', type);
  // Optionally, change the eye icon between open and closed eye
  this.classList.toggle('fa-eye');
  this.classList.toggle('fa-eye-slash');
});</script>
</body>
</html>
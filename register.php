<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #0d0d0d;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #fff;
    }

    form {
      background: #1e1e1e;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
      width: 100%;
      max-width: 400px;
    }

    h1 {
      margin-bottom: 25px;
      color: #ffffff;
      font-size: 24px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background-color: #333;
      color: white;
      font-size: 14px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #00cc99;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 20px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #00b386;
    }

    ::placeholder {
      color: #aaa;
    }
  </style>
</head>
<body>

  <form action="register.php" method="POST">
    <h1> Hello New User! <br> Register Below</h1>

    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="password" name="cpass" placeholder="Retype your password" required>
    
    <input type="submit" name="submit" value="Register">
  </form>

</body>
</html>

<?php
include "connection.php";

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpass'];

  $sql = "SELECT * FROM admin WHERE email = '$email'";
  $result = mysqli_query($data, $sql);
  $count_email = mysqli_num_rows($result);

  if ($count_email == 0) {
    if ($password == $cpassword) {
      $sql = "INSERT INTO admin (name, email, password) VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($data, $sql);
      if ($result) {
        echo "<script>alert('Registration successful'); window.location.href='login.php';</script>";
      }
    } else {
      echo "<script>alert('Password mismatch');</script>";
    }
  } else {
    echo "<script>alert('Email already exists');</script>";
  }
}
?>

<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
</head>
<body>

<form action="login.php" method="POST">
  <h2> Login to Quiz Platform</h2>
  <input type="email" name="email" placeholder="Enter your email" required>
  <input type="password" name="password" placeholder="Enter your password" required>
  <input type="submit" name="submit" value="Login">
</form>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($data, $sql);

  if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if ($row["usertype"] == "user") {           /* important logic*/
      header("Location: user.php?id=" . $row['id']);
      exit();
    } elseif ($row["usertype"] == "admin") {
      header("Location: admin.php?id=" . $row['id']);
      exit();
    }
  } else {
    echo "<p class='error'>Username or password incorrect</p>";
  }
}
?>

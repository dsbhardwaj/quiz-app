 <?php 
  include "connection.php";
  if (isset($_GET['id']) && is_numeric($_GET['id']) && (int)$_GET['id'] > 0) {
    $id = (int) $_GET['id'];

} 

$sql = "select * from admin where id = '$id' ";
$result = $data -> query($sql);
if(!$result){
    die("invalid query!");
}
if($row=$result->fetch_assoc())
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #121212;
      color: white;
    }

    /* Navbar */
    .navbar {
      background-color: #1f1f1f;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    }

    .navbar .logo {
      font-size: 24px;
      color: #00cc99;
      font-weight: bold;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      margin-right: 20px;
      font-size: 16px;
    }

    .navbar a:hover {
      color: #00cc99;
    }

    .navbar form {
      display: inline;
    }

    .navbar button {
      background: none;
      border: none;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-left: 10px;
    }

    .navbar button:hover {
      color: #00cc99;
    }

    /* Dropdown */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropbtn {
      background-color: #2a2a2a;
      color: white;
      padding: 10px 16px;
      font-size: 14px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #333;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.3);
      z-index: 1;
      border-radius: 5px;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      border-bottom: 1px solid #444;
    }

    .dropdown-content a:hover {
      background-color: #00cc99;
      color: black;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #444;
    }

  </style>

</head>
<body>

 <?php 
  include "connection.php";
  if (isset($_GET['id']) && is_numeric($_GET['id']) && (int)$_GET['id'] > 0) {
    $id = (int) $_GET['id'];
} 

$sql = "select * from admin where id = '$id' ";
$result = $data -> query($sql);
if(!$result){
    die("invalid query!");
}
if($row=$result->fetch_assoc()) { ?>
  <div class="navbar">
    <div class="logo">Admin Panel</div>
    <div>
     <a href="profile.php?id=<?php echo $row['id'];?>">profile</a>
      <form action="logout.php" method="POST" style="display:inline;">
        <button type="submit" style="background:none; border:none; color:white; cursor:pointer;">Logout</button>
        <div class="dropdown">
      <button class = "dropbtn">EDIT QUESTIONS &#x25BC;</button>
      <div class = "dropdown-content">
        <a href="edit.php?subject=maths&id=<?php echo $row['id'];?>">Maths</a>
        <a href="edit.php?subject=english&id=<?php echo $row['id'];?>">English</a>
        <a href="edit.php?subject=physics&id=<?php echo $row['id'];?>">Physics</a>
       <a href="edit.php?subject=chemistry&id=<?php echo $row['id'];?>">Chemistry</a>
       <a href="edit.php?subject=reasoning&id=<?php echo $row['id'];?>">Reasoning</a>
</div>
      </form>
    </div>
  </div><br><br>
  <?php }
  ?>
</body>
</html>
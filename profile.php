
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hello</title>
  <style>
   body {
  background: #1e1e1e;
  color: white;
  text-align: center;
  padding: 40px 20px;
}

h1 {
  color: #00cc99;
  margin-bottom: 30px;
  font-size: 28px;
}

/* Table Styling */
table {
  border-collapse: collapse;
  margin: 0 auto;
  width: 80%;
  max-width: 800px;
  box-shadow: 0 0 10px rgba(0, 204, 153, 0.2);
}

thead {
  background-color: #00cc99;
  color: black;
}

thead th {
  padding: 14px;
  font-size: 18px;
}

tbody tr {
  background-color: #2d2d2d;
  transition: background-color 0.3s ease;
}

tbody tr:hover {
  background-color: #3e3e3e;
}

td {
  padding: 12px;
  font-size: 16px;
  border-bottom: 1px solid #444;
}

/* Responsive for small screens */
@media (max-width: 600px) {
  table {
    width: 100%;
  }

  thead {
    display: none;
  }

  tbody td {
    display: block;
    text-align: right;
    padding-left: 50%;
    position: relative;
  }

  tbody td::before {
    content: attr(data-label);
    position: absolute;
    left: 15px;
    width: 45%;
    font-weight: bold;
    text-align: left;
    color: #00cc99;
  }

  tbody tr {
    margin-bottom: 15px;
    display: block;
    border: 1px solid #444;
    border-radius: 10px;
    padding: 10px;
  }
  </style>
</head>
<body>
    <h1>USER'S PROFILE</h1>
    <tr>
          <table class="table"> 
       <thead>
    <tr>
            <th>ID</th>
         <th> NAME</th>
          <th> EMAIL</th>
        </tr>
    </thead>
    </tr>
<tbody>

<?php
include "connection.php";
if (isset($_GET['id']) && is_numeric($_GET['id']) && (int)$_GET['id'] > 0) {
    $id = (int) $_GET['id'];
} else {
    echo "Invalid or missing ID in URL.";
}
if ($id ) {
   $sql = "SELECT * FROM admin WHERE id = '$id'";
 
    $result = $data->query($sql);
    if (!$result) {
    die("Query error: " . $data->error);
} elseif ($result->num_rows === 0) {
    die("No records found for ID = $id");
} else {
   // echo "Query successful!";
}
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['name']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
        </tr>
        <?php
    }
} else {
    echo "No user selected.";
}
?>
</tbody>
  
</body>
</html>
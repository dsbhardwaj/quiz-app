<?php
include "connection.php";

$id = $_GET['id'] ?? '';

$query = "SELECT * FROM result WHERE user_id = $id";
$result = mysqli_query($data, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Scores</title>
    <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

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
}

    </style>
</head>
<body>
    <h1>Your Scores So Far!</h1>


<table border="1" cellpadding="10">
    <thead>
        <tr>
            
            <th>Subject</th>
            <th>Score</th>
              <th>Date</th>
        </tr>
    </thead>
     <br><br>
    
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['exam_name'];
            $correct = $row['correct_ques'];
            $total = $row['total_ques'];
            $scoreDisplay = "$correct / $total";
            $date = $row['submitted_on'];

            echo "<tr>
                  
                    <td>$subject</td>
                    <td>$scoreDisplay</td>
                    <td>$date</td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

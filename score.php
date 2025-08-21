<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>    * {
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
}</style>
</head>
<body>

<h1>YOUR RESULT</h1>

<?php
include "connection.php";

$id = $_GET['id'] ?? '';
$subject = $_GET['subject'] ?? '';
$answers = $_POST['answers'] ?? [];

$allowedSubjects = ['maths', 'english', 'physics', 'chemistry', 'reasoning'];
if (!in_array($subject, $allowedSubjects)) {
    die("Invalid subject.");
}

if (!empty($answers)) {
    $score = 0;
    $total = count($answers);
    $q_ids = implode(",", array_keys($answers));

    $query = "SELECT q_id, correct_answer FROM `$subject` WHERE q_id IN ($q_ids)";
    $result = mysqli_query($data, $query);

    $correct_answers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $correct_answers[$row['q_id']] = $row['correct_answer'];
    }

    foreach ($answers as $q_id => $user_answer) {
        if (isset($correct_answers[$q_id]) && $user_answer == $correct_answers[$q_id]) {
            $score++;
        }
    }

    // Insert result into database
    $insert = "INSERT INTO result (user_id, exam_name, correct_ques, total_ques)
               VALUES ('$id', '$subject', '$score', '$total')";
    mysqli_query($data, $insert);

    // Display result
    echo "<table border='1' cellpadding='10'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$id</td>
                    <td>$subject</td>
                    <td>$score / $total</td>
                </tr>
            </tbody>
          </table>";
} else {
    echo "<p>No answers submitted.</p>";
}
?>

</body>
</html>

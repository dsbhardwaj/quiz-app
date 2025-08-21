<?php
include 'connection.php';

$subject = $_GET['subject'] ?? '';
$allowedSubjects = ['maths', 'english', 'physics', 'chemistry', 'reasoning'];

if (!in_array($subject, $allowedSubjects)) {
    die("Invalid subject.");
}

$query = "SELECT * FROM `$subject`";
$result = mysqli_query($data, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($data));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Questions Individually</title>
  <div style="text-align: right; margin-bottom: 20px;">
  <a href="add.php?subject=<?php echo $subject; ?>" style="
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      display: inline-block;
  ">+ Add Question</a>
</div>

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      padding: 30px;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }
    .question-form {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      margin-bottom: 25px;
    }
    .question-form input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    .btns {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }
    .btns button {
      padding: 8px 16px;
      font-size: 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .update-btn {
      background-color: #2196F3;
      color: white;
    }
    .delete-btn {
      background-color: #f44336;
      color: white;
    }
  </style>
</head>
<body>

<h2>Edit or Delete Question</h2>

<?php
while ($row = mysqli_fetch_assoc($result)){
   echo "<form method='POST' action='question.php?subject=" . $subject . "&q_id=" . $row['q_id'] . "'>";
    echo "<input type='hidden' name='subject' value='" . htmlspecialchars($subject) . "'>";
    echo "<input type='hidden' name='q_id' value='" . htmlspecialchars($row['q_id']) . "'>";

    echo "<label>Question:</label>";
    echo "<input type='text' name='question' value='" . htmlspecialchars($row['question']) . "' required>";

    echo "<label>Option 1:</label>";
    echo "<input type='text' name='option1' value='" . htmlspecialchars($row['option_1']) . "' required>";

    echo "<label>Option 2:</label>";
    echo "<input type='text' name='option2' value='" . htmlspecialchars($row['option_2']) . "' required>";

    echo "<label>Option 3:</label>";
    echo "<input type='text' name='option3' value='" . htmlspecialchars($row['option_3']) . "' required>";

    echo "<label>Option 4:</label>";
    echo "<input type='text' name='option4' value='" . htmlspecialchars($row['option_4']) . "' required>";

    echo "<label>Correct Answer:</label>";
    echo "<input type='text' name='correct_answer' value='" . htmlspecialchars($row['correct_answer']) . "' required>";

    echo "<div class='btns'>";
    echo "<button type='submit' name='update' class='update-btn'>Update</button>";
    echo "<button type='submit' name='delete' class='delete-btn' >Delete</button>";
    echo "</div>";

    echo "</form>";
}
?>


</body>
</html>

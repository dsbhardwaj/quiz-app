<?php
include "connection.php";
$subject = $_GET['subject'];
$allowedSubjects = ['maths', 'english', 'physics', 'chemistry', 'reasoning'];
echo "<pre>";
  var_dump($_GET);
echo "</pre>";
if (!in_array($subject, $allowedSubjects)) {
    die("Invalid or missing subject.");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $question = $_POST['question'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'] ;
    $correct_answer = $_POST['correct_answer'] ?? '';

    }
       $sql = "INSERT INTO `$subject` (question, option_1, option_2, option_3, option_4, correct_answer) 
                VALUES ('$question', '$option_1', '$option_2', '$option_3', '$option_4', '$correct_answer')";
                $result= mysqli_query($data,$sql);

        if (mysqli_query($data, $sql)) {
         header("Location:edit.php?subject=$subject");
      }
       else {
            echo "Error: " . mysqli_error($data);
        }
    ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ADD QUESTION</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style> 
    #form {
      background-color:white;
      color: white;
      border:white;
      padding: 20px;
      width:100%;
      height:100%;
    }

    input[type="text"],
    input[type="email"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 5px;
      border: none;
    }

    input[type="submit"] {
      background-color: pink;
      color: black;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #ff9ecb;
    }

    h1 {
      text-align: center;
    }
  </style>
</head>

<body>
     <h1>ADD NEW QUESTION</h1>
  <div id="form">

    <form action="add.php?subject=<?php echo $subject; ?>" method="POST">
      <input type="text" id="ques" name="question" placeholder="Enter Question" required><br>
      <input type="text" id="opt" name="option_1" placeholder="OPTION 1" required><br>
      <input type="text" id="opt" name="option_2" placeholder="OPTION 2" required><br>
       <input type="text" id="opt" name="option_3" placeholder="OPTION 3" required><br>
        <input type="text" id="opt" name="option_4" placeholder="OPTION 4" required><br>
         <input type="text" id="opt" name="correct_option" placeholder="  CORRECT OPTION" required><br>
      <input type="submit" id="btn" value="Add New" name="submit">
    </form>
  </div>
</body>
</html>

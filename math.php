<?php
include "connection.php";
$id = $_GET['id'];
session_start();
if(isset($_SESSION['id'])){
  header("Location:login.php");
  exit;
}
$sql = "SELECT * from maths";
$result = mysqli_query($data,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MATH QUIZ</title>
  <style>
     * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: #1e1e1e;
      color: white;
      padding: 30px 10%;
    }

    h2 {
      text-align: center;
      color: #00cc99;
      margin-bottom: 30px;
      font-size: 28px;
    }

    .question-box {
      background: #2a2a2a;
      padding: 20px;
      margin-bottom: 25px;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0, 204, 153, 0.15);
    }

    .question-box p {
      font-size: 18px;
      margin-bottom: 10px;
      color: #ffffff;
    }

    label {
      display: block;
      padding: 8px 12px;
      margin-bottom: 8px;
      background-color: #3a3a3a;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    label:hover {
      background-color: #00cc99;
      color: black;
    }

    input[type="radio"] {
      margin-right: 10px;
    }

    button {
      display: block;
      margin: 30px auto;
      padding: 14px 28px;
      font-size: 16px;
      background-color: #00cc99;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #00b386;
    }

    @media (max-width: 600px) {
      body {
        padding: 20px;
      }

      h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>
  <h2>MATHS QUIZ</h2>
   <form method="POST" action="score.php?id=<?php echo $id; ?>&subject=maths">;
  <?php
  $qno = 1;
  while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='question-box'>";
        echo "<p><strong>Q$qno. {$row['question']}</strong></p>";
        echo "<label><input type='radio' name='answers[{$row['q_id']}]' value='A'> {$row['option_1']}</label><br>";
        echo "<label><input type='radio' name='answers[{$row['q_id']}]' value='B'> {$row['option_2']}</label><br>";
        echo "<label><input type='radio' name='answers[{$row['q_id']}]' value='C'> {$row['option_3']}</label><br>";
        echo "<label><input type='radio' name='answers[{$row['q_id']}]' value='D'> {$row['option_4']}</label><br>";
        echo "</div>";
        $qno++;
    }
  ?>
   <button type = "submit">submit</button>
  </form>
  
</body>
</html>
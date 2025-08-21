<?php
include "connection.php";
$id = $_GET['id'];
session_start();
if(isset($_SESSION['id'])){
  header("Location:login.php");
  exit;
}
$sql = "SELECT * from chemistry";
$result = mysqli_query($data,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MATH QUIZ</title>
  <style> body { font-family: Arial; background: #f0f0f0; padding: 20px; }
        .question-box { background: white; padding: 15px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
  <h2>CHEMISTRY</h2>
  <form method="POST" action="score.php?id=<?php echo $id; ?>&subject=chemistry">;
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
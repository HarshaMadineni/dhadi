<?php
require_once "pdo.php";
$stmt = $pdo->prepare("SELECT * FROM game".$_POST['gcode']." ORDER BY ID DESC LIMIT 1");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row !== false ) {
  if ( $row['Player']+0 !== $_POST['player']+0 ) {
    echo $row['TokenId'].",".$row['NewPosId'];
    exit();
  }
}
echo "waiting";
exit();
?>

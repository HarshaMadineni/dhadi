<?php
require_once "pdo.php";
$stmt = $pdo->prepare("SELECT * FROM game".$_POST['gcode']." ORDER BY ID DESC LIMIT 1");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $_POST['token_id'] > 11 and $_POST['player'] == 1 ) {
  echo 0;
  exit();
}
if ( $_POST['token_id'] < 12 and $_POST['player'] == 2 ) {
  echo 0;
  exit();
}
if ( $row === false ) {
  if ( $_POST['player'] === $_POST['first_player'] ) {
    echo 1;
    exit();
  }
  else {
    echo 0;
    exit();
  }
}
if ( $row['Player'] === $_POST['player'] ) {
  echo 0;
  exit();
}
else {
  echo 1;
  exit();
}
?>

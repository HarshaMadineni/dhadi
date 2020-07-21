<?php
require_once "pdo.php";
$pdo->exec("USE main;");
$player = $_POST['player'];
if ( $player === "1" ) {
  $sql = "UPDATE gameids SET p1_last_seen = ".$_POST['time']." WHERE gameid = ".$_POST['gcode'];
  $pdo->exec($sql);
  $stmt = $pdo->prepare("SELECT p2_last_seen FROM gameids WHERE gameid = ".$_POST['gcode']);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  echo $row['p2_last_seen'];
  exit();
}
if ( $player === "2" ) {
  $sql = "UPDATE gameids SET p2_last_seen = ".$_POST['time']." WHERE gameid = ".$_POST['gcode'];
  $pdo->exec($sql);
  $stmt = $pdo->prepare("SELECT p1_last_seen FROM gameids WHERE gameid = ".$_POST['gcode']);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  echo $row['p1_last_seen'];
  exit();
}
echo $_POST['time'];
?>

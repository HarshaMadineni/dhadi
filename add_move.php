<?php
require_once "pdo.php";
$sql = "INSERT INTO game".$_POST['gcode']." (Player, TokenId, NewPosId)
          VALUES (".$_POST['player'].", ".$_POST['token_id'].", ".$_POST['new_pos_id'].")";
$pdo->exec("USE main;");
$pdo->exec($sql);
echo "Move sent";
//echo "executed sql command";
?>

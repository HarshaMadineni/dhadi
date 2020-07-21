<?php
require_once "pdo.php";
$drop_table_sql = "DROP TABLE game".$_POST['gcode'];
$pdo->exec($drop_table_sql);
$dead_gameids_sql = "INSERT INTO dead_gameids (gameid, creator, opponent, time_created) SELECT gameid, creator, opponent, time FROM gameids";
$pdo->exec("USE main;");
$pdo->exec($dead_gameids_sql);
$gameids_sql = "DELETE FROM gameids WHERE gameid = ".$_POST['gcode'];
$pdo->exec("USE main;");
$pdo->exec($gameids_sql);
echo 'success';
?>

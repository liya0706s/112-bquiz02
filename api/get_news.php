<?php
include_once "db.php";

// find只撈一筆
$news=$News->find($_GET['id']);
echo nl2br($news['news']);
// new line 換行 - nl2br

?>
<?php include_once "db.php";

// 從front/vote.php來
// 某一個選項被選中的值
$opt=$Que->find($_POST['opt']);
$opt['vote']++;
$Que->save($opt);
// 每投一票，總票數+1

?>
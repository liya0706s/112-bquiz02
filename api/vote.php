<?php include_once "db.php";

// 從front/vote.php來
// 某一個選項被選中的值
$opt=$Que->find($_POST['opt']);
$opt['vote']++;
$Que->save($opt);
// 每投一票，總票數+1 選項+1

// $opt的subject_id 找主題資料 主題總項也+1
$sub=$Que->find($opt['subject_id']);
$sub['vote']++;
$Que->save($sub);

// 看選項的"主題"結果
to("../index.php?do=result&id={$sub['id']}");
?>
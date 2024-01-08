<?php include_once "db.php";
$news = $News->find($_POST['news']);
// 拿到news資料
if ($Log->count(['news' => $_POST['news'], 'acc' => $_SESSION['user']]) > 0) {
    // 收回讚
    $Log->del(['news' => $_POST['news'], 'acc' => $_SESSION['user']]);
    $news['good']--;
} else {
    // 按讚
    $Log->save(['news' => $_POST['news'], 'acc' => $_SESSION['user']]);
    $news['good']++;
}
// 有這筆log判斷是要刪除，收回讚
// 以上增加log

$News->save($news);

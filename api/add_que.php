<?php
include_once "db.php";
// 判斷有無主題，儲存主題
if (isset($_POST['subject'])) {
    $Que->save(['text' => $_POST['subject'], 'subject_id' => 0, 'vote' => 0]);
    // 用剛剛存儲的text（主題）從數據庫中查找並獲取其id
    $subject_id = $Que->find(['text' => $_POST['subject']])['id'];
    $subject_id2 = $Que->max('id');
}
echo $subject_id;
echo $subject_id2;

// 判斷有無選項，儲存選項
if (isset($_POST['option'])) {  // 檢查是否有名為'option'的表單數據被提交
    foreach ($_POST['option'] as $option) {
        // $option為每個選項中的文字內容
        // 使用$Que物件的save方法將選項數據保存到數據庫
        $Que->save(['text' => $option, 'subject_id' => $subject_id, 'vote' => 0]);
    }
}
to("../back.php?do=que");
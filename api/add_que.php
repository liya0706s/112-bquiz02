<?php
include_once "db.php";
// 先儲存主題再儲存選項，才符合邏輯。不可能只有選項沒有主體的問卷
// 判斷有無主題，儲存主題
if (isset($_POST['subject'])) {
    // 儲存 主題(text)從POST的subject來, 主題的subject_id是0, 投票的初始值是0
    $Que->save(['text' => $_POST['subject'], 'subject_id' => 0, 'vote' => 0]);
    
    // 用剛剛存的text（主題）從db中查找並獲取其id (主題的id)
    $subject_id = $Que->find(['text' => $_POST['subject']])['id'];
    // 是新增加的一定是最大的id，要有Auto Increment才有效
    $subject_id2 = $Que->max('id');
}
echo $subject_id;
echo $subject_id2;
// 以上兩種的答案是一樣的 

// 判斷有無選項，儲存選項
if (isset($_POST['option'])) {  // 檢查是否有名為'option'的表單數據被提交
    foreach ($_POST['option'] as $option) {
        // $option為"每個選項"中的文字內容
        // 這邊的subject_id是以上 主題的id 
        $Que->save(['text' => $option, 'subject_id' => $subject_id, 'vote' => 0]);
    }
}
to("../back.php?do=que");
<?php
include_once "./db.php";

// 根據郵件來取得使用者的資料
$user=$User->find(['email'=>$_GET['email']]);

// 判斷是否有取得使用者資料
if(empty($user)){
    // 回傳查無此使用者
    echo "查無此資料";
}else{
    // 回傳使用者密碼
    echo "您的密碼為:". $user['pw'];
}


?>
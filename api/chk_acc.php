<?php
include_once "db.php";

// POST收到的值from reg.php
$res=$User->count(['acc'=>$_POST['acc']]);

if($res>0){
    // 1代表帳號重覆(已有帳號,不能註冊,可以登入)
    echo 1;
}else{
    // 0代表帳號不存在(可新增)
    echo 0;
}
// res變數 會回傳回reg.php callback function
?>
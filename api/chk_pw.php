<?php 
include_once "db.php";

$res=$User->count($_POST);

if($res){
    $_SESSION['user']=$_POST['acc'];
}
echo $res;

// echo $User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

// $_POST是陣列
// $_POST=['acc'=>xxx,'pw'=>yyy];


// echo $res;
// return 0 OR 1
// if($res>0){
//     echo 1;
// }else{
//     echo 0;
// }


?>
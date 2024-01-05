<?php include_once "db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        // 刪除:用in_array檢查現在的id有沒有在...
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            $news=$News->find($id);
            // 檢查現在的id有沒有在POST sh中
            $news['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $News->save($news);
        }
    }
}
// 否則只有管理員才能做的，導回首頁
to("../back.php?do=news");

?>
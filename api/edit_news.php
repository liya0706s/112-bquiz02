<?php include_once "db.php";

// 要先確認有POST id, 防止有人直接輸入網址進入"localhost/api/edit_news.php?? 
if(isset($_POST['id'])){
    foreach($_POST['id'] as $id){
        // 刪除:用in_array檢查"現在的$id元素"，有沒有在POST delete裡面，有的話代表勾選要刪除...
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            // 為什麼用find不用all? 
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
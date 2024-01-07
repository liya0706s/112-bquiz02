<?php
include_once "db.php";
// 從back/admin.php form POST 來的
if (isset($_POST['del'])) {
// 檢查 POST 請求中是否有名為 'del' 的數據    
    foreach ($_POST['del'] as $id) {
    // 遍歷 'del' 數組中的每個元素，每個元素都是要刪除的 ID
        $User->del($id);
        // 對每個 ID 調用 User 類的 del 方法來刪除用戶
    }
}

to("../back.php?do=admin");


// GPT給的範例:
// <form action="您的處理腳本的路徑" method="post">
//     <input type="checkbox" name="del[]" value="1"> 用戶 1<br>
//     <input type="checkbox" name="del[]" value="2"> 用戶 2<br>
//     <input type="checkbox" name="del[]" value="3"> 用戶 3<br>
//     <!-- 更多用戶 -->
//     <input type="submit" value="刪除選中的用戶">
// </form>



// if (isset($_POST['del'])) {
//     foreach ($_POST['del'] as $id) {
        // 在這裡，$id 將會是 1，然後是 2，最後是 3 (重點!!!)
//         $User->del($id);
//     }
// }


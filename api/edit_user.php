<?php
include_once "db.php";
// 從back/admin.php form POST 來的
if (isset($_POST['del'])) {
    foreach ($_POST['del'] as $id) {
        $User->del($id);
    }
}

to("../back.php?do=admin");

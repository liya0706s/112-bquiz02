<?php
// 從front/que.php來
// 拿到網址上方GET題目的id(que資料表的id號碼) 例如&id=6
$que = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['text']; ?></legend>
    <h3><?= $que['text']; ?></h3>

    <form action="./api/vote.php" method="post">
        <?php
        $opts = $Que->all(['subject_id' => $_GET['id']]);
        //  GET id是題目的id  
        foreach ($opts as $opt) {
            // $opt是選項的名稱
            echo "<div>";
            echo "<input type='radio' name='opt' value='{$opt['id']}'>";
            // $opt['id']選項的id 帶入到api/vote計算數量，過去的話會叫做$_POST['opt']
            echo $opt['text'];
            echo "</div>";
        }
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>
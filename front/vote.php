<?php
// 拿到網址上方GET題目的id 例如&id=6
$que = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['text']; ?> </legend>
    <h3> <?= $que['text']; ?> </h3>

    <form action="./api/vote.php">
        <?php
        //  GET id是題目的id  

        // $opt['id']選項的id 
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>
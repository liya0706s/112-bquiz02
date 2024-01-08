<!-- localhost/index.php?do=result&id=... -->
<!-- 從front/que.php來的 -->
<?php
$que = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['text']; ?></legend>
    <h3><?= $que['text']; ?></h3>

    <?php
    $opts = $Que->all(['subject_id' => $_GET['id']]);  
    // GET id是題目的id  
    foreach ($opts as $opt) {
        // $opt是選項的名稱

        // 總票數不得為零，不然就是1
        $total = ($que['vote'] != 0) ? $que['vote'] : 1;
        $rate = round($opt['vote'] / $total, 2);
        echo "<div style='width:95%;display:flex;align-items:center;margin:10px 0'>";
        echo    "<div style='width:50%'>{$opt['text']}</div>";
        echo    "<div style='width:" . (40 * $rate) . "%;height:20px;background-color:#ccc'></div>";
        echo    "<div style='width:10%'>{$opt['vote']}票(" . ($rate * 100) . "%)</div>";
        // .加字串的
        echo "</div>";
    }
    ?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
    </div>
</fieldset>
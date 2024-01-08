<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th>人氣</th>
        </tr>

        <?php
        $total = $News->count();
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        // GET p是直接呼應到網址 ?p=1頁碼 isset判斷 $now代表當前頁
        $start = ($now - 1) * $div;

        // 按照按讚順序排列，條件order by接在$where這邊
        // 先排序 desc由大至小，再限制
        $rows = $News->all(['sh' => 1], " order by `good` desc limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td>
                    <div class='title' data-id="<?= $row['id']; ?>"> <?= $row['title']; ?></div>
                </td>
                <!-- 字串中取部分 substr 從0開始取25個字-->
                <!-- position:relative 呼應index style的absolute -->
                <td style="position: relative;">
                    <div>
                        <?= mb_substr($row['news'], 0, 25); ?>...
                    </div>
                    <div id="p<?= $row['id']; ?>" class="pop">
                        <h3 style="color:skyblue"><?= $row['title']; ?></h3>
                        <pre><?= $row['news']; ?></pre>
                    </div>
                </td>
                <td class="ct">
                    <span> <?=$row['good'];?> </span>
                    個人說<img src="../icon/02B03.jpg" style="width:20px">
                    <!-- 判斷有沒有登入，登入才可以按讚 -->
                    <!-- 有取消讚，是有按過讚的情況下(瀏覽器會記住) -->
                    <?php
                   if(isset($_SESSION['user'])){
                    if($Log->count(['news'=>$row['id'],'acc'=>$_SESSION['user']])>0){
                        echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                    }else{
                        echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                    }
                }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <div class="ct">
        <?php
        // 上一頁
        // 如果(現在頁碼-1)>0, 代表有上一頁
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='index.php?do=pop&p=$prev'>";
            echo " < ";
            echo " </a> ";
        }
        // 當前頁和全部頁數
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px;' : 'font-size:16px';
            // 設定頁碼的尺寸，如果$i是當前頁$now,文字尺寸是22px 其他頁碼是16px
            echo "<a href='index.php?do=pop&p=$i' style='$size'> ";
            echo $i;
            echo " </a>";
        }
        // 下一頁
        // 小於"等於"總共的頁數
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='index.php?do=pop&p=$next'>";
            echo " > ";
            echo "</a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $(".title").hover(
        function() {
            // 滑鼠移過去對應的顯示出來
            $(".pop").hide()
            let id = $(this).data('id')
            $("#p" + id).show();
        }
    )
</script>
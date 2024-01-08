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
                <td><?= $row['title']; ?></td>
                <!-- 字串中取部分 substr 從0開始取25個字-->
                <td><?= mb_substr($row['news'], 0, 25); ?>...</td>
                <td></td>
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
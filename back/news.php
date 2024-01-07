<!-- 從back.php
<a class="blo" href="?do=news">最新文章管理</a> 來的 -->
<fieldset>
    <legend>
        <h3>最新文章管理</h3>
    </legend>
    <!-- 傳送一個表單裡面放table -->
    <form action="./api/edit_news.php" method="post">
        <table style="width:95%;text-align:center">
            <tr class="clo">
                <td>編號</td>
                <td class="width:70%">標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>

            <?php
            $total = $News->count();
            $div = 3; // 三筆
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            // GET p是直接呼應到網址 ?p=1頁碼 isset判斷 $now代表當前頁
            $start = ($now - 1) * $div;
            // 每一頁的第一筆
            $rows = $News->all(" limit $start,$div");
            // 全部的資料加上條件
            // SELECT * FROM `table` LIMIT 10,20;
            // 從資料表"第11筆"開始，取出20筆資料
            // 使用LIMIT語法時，資料表的開始是由第0筆開始計算

            foreach ($rows as $idx => $row) {
            ?>
                <tr>
                    <!-- 編號不一定等於id -->
                    <!-- 編號是index+1 加上每一頁的開始編號 -->
                    <td><?= $idx + 1 + $start; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        <!-- 當$row['sh'] == 1 就顯示checked  -->
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        <!-- not sure about this line code -->
                    </td>

                </tr>
            <?php
            }
            ?>
        </table>
            <!-- 表單外放分頁 -->
            <!-- class ct是text-align:center -->
        <div class="ct">
            <?php
            // 上一頁
            // 如果(現在頁碼-1)>0, 代表有上一頁
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='back.php?do=news&p=$prev'>";
                echo " < ";
                echo " </a> ";
            }
            // 當前頁和全部頁數
            for ($i = 1; $i <= $pages; $i++) {
                $size = ($i == $now) ? 'font-size:22px;' : 'font-size:16px';
                // 設定頁碼的尺寸，如果$i是當前頁$now,文字尺寸是22px 其他頁碼是16px
                echo "<a href='back.php?do=news&p=$i' style='$size'> ";
                echo $i;
                echo " </a>";
            }
            // 下一頁
            // 小於"等於"總共的頁數
            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='back.php?do=news&p=$next'>";
                echo " > ";
                echo "</a>";
            }
            ?>
        </div>
        <div class="ct"><input type="submit" value="修改確定"></div>
    </form>
</fieldset>
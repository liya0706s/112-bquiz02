<!-- 從back.php
<a class="blo" href="?do=news">最新文章管理</a> 來的 -->

<form action="./api/edit_news" method="post">
    <table>
        <tr class="clo">
            <td>編號</td>
            <td>標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>

        <?php
        $rows = $News->count();
        $div = 3; // 三筆
        $pages = ceil($total / $div);
        // GET p是頁碼
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        // 全部的資料加上條件
        $rows = $News->all(" limit $start, $div");
        foreach ($rows as $idx => $row) {
        ?>
            <tr>
                <!-- 編號不一定等於id -->
                <td><?= $idx + 1 + $start; ?></td>
                <td><?= $row['title']; ?></td>
                <td><input type="checkbox" name="sh[]" val="<?= $row['id']; ?>"></td>
                <td><input type="checkbox" name="del[]" val="<?= $row['id']; ?>"></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <!-- 分頁 -->
        <?php
        // 上一頁
        if($now-1>0){
            
        }
        // 頁數
        for ($i; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px;' : 'font-size:16px';
            echo "<a href=''>";
            echo $i;
            echo "</a>";
        }
        ?>
    </div>
    <div class="ct"><input type="submit" value="修改確定"></div>
</form>
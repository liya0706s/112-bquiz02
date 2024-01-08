<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th></th>
        </tr>
        <?php
        $total = $News->count(['sh'=>1]);
        $div = 5;  //一頁五筆資料
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        // GET p是直接呼應到網址 isset判斷??有的話是左沒有是右 $now代表當前頁數
        $start = ($now - 1) * $div;

        $rows = $News->all(['sh' => 1], " limit $start,$div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <!-- 一般的id不能只有數字要有英文字，data-id才可以只有數字 -->
                <td>
                    <div class='title' data-id="<?= $row['id']; ?>" style='cursor:pointer'> <?= $row['title']; ?> </div>
                </td>
                <!-- 字串中取部分 substr 從0開始取25個字-->
                <td>
                    <div id="short<?= $row['id']; ?>">
                        <?= mb_substr($row['news'], 0, 25); ?>...
                    </div>
                    <div id="all<?= $row['id']; ?>" style='display:none'>
                        <?= $row['news']; ?>
                    </div>
                </td>
                <td>
                    <?php
                    // 1.判斷有沒有登入
                    if (isset($_SESSION['user'])) {
                        // 2.判斷有沒有按過讚
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            // 這篇文章 $row['id'] 如果count()==1代表有被按讚過
                            echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                            // 帳號session就有
                        } else {
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
            echo "<a href='?do=news&p=$prev'>";
            // ?代表當前頁
            // echo "<a href='index.php?do=news&p=$prev'>";
            echo " < ";
            echo " </a> ";
        }
        // 當前頁和全部頁數
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px;' : 'font-size:16px';
            // 設定頁碼的尺寸，如果$i是當前頁$now,文字尺寸是22px 其他頁碼是16px
            echo "<a href='?do=news&p=$i' style='$size'> ";
            echo $i;  // 頁數
            echo " </a>";
        }
        // 下一頁
        // 小於"等於"總共的頁數
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'>";
            echo " > ";
            echo "</a>";
        }
        ?>
    </div>

</fieldset>
<script>
    // 要用function才可以用$(this)點下去的對象 等同於回乎函式e.target(event.target)
    $(".title").on('click', (e) => {
        let id = $(e.target).data('id');
        $(`#short${id},#all${id}`).toggle();
        // 在重音符裡面大括號$ 可以放變數
    })

    
</script>
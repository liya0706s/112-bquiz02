<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auto">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th width=""></th>
        </tr>
        <?php
        $rows = $News->all(['sh' => 1]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['title']; ?></td>
                <!-- 字串中取部分 substr 從0開始取25個字-->
                <td><?=mb_substr($row['news'],0,25);?>...</td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>
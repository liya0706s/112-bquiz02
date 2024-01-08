<fieldset>
<legend>目前位置：首頁 > 問卷調查</legend>
<table>
    <tr class="ct">
        <th width="10%">編號</th>
        <th width="50%">問卷題目</th>
        <th width="10%">投票總數</th>
        <th width="10%">結果</th>
        <th width="10%">狀態</th>
    </tr>

    <?php
    // subject_id等於0是題目的才要列出來
    $ques=$Que->all(['subject_id'=>0]);
    // 有編號用$key 用於流水號
    foreach($ques as $key => $que){
    ?>
    <tr class="ct">
        <td><?=$key+1;?></td>
        <td><?=$que['text'];?></td>
        <td><?=$que['vote'];?></td>
        <td>
            <a href="?do=result&id<?=$que['id'];?>">結果</a>
        </td>
        <td>
            <?php
            // 如果是登入的使用者，讓你餐與投票，否則請先登入
            if(isset($_SESSION['user'])){
                echo "<a href='?do=vote&id={$que['id']}'>參與投票</a>";
            }else{
                echo "請先登入";
            }
            ?>
        </td>
    </tr>

    <?php
    }
    ?>
</table>

</fieldset>
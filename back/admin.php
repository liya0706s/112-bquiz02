<fieldset>
    <legend>
        <h3>帳號管理</h3>
    </legend>

    <form action="./api/edit_user.php" method="post">
    <!-- back/admin.php是在 back.php? why?  -->
        <table style="width:55%;margin:auto;text-align:center">
            <tr>
                <!-- 內建css底色灰色clo -->
                <td class="clo">帳號</td>
                <td class="clo">密碼</td>
                <td class="clo">刪除</td>
            </tr>

            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
                // 帳號是admin以外的，都會顯示出來
                if ($row['acc'] != 'admin') {
            ?>
                    <tr>
                        <td><?= $row['acc']; ?></td>
                        <!-- str_rapeat 重覆特定字元 -->
                        <!-- 米字號是要重複的字，mb_strlen重複幾次 -->
                        <td><?= str_repeat("*", mb_strlen($row['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <!-- 兩個按鈕要寫在table下方 -->
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>

    <h2>新增會員</h2>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最常12個字元)</span>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <!-- submit改成button 才可以放onclick 使用js -->
            <td><input type="button" value="註冊" onclick="reg()">
                <input type="reset" value="清除">
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>


<!-- 要有相對應的id -->
<!-- input 是抓val -->
<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            if (user.pw == user.pw2) {
                // 送了一個acc的資料POST過去，看看帳號有沒有重覆
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (res) => {
                    // 如果帳號存在(重複了)=1,不存在(可新增)=0
                    // 數字格式1,不是字串格式1
                    // console.log(res);
                    if (parseInt(res) == 1) {
                        alert("帳號重覆!")
                    } else {
                        // let user變數等於以上整串json大括號
                        $.post('./api/reg.php', user, (res) => {
                            // alert('註冊完成，歡迎加入!')
                            location.reload();
                        })
                    }
                })
            } else {
                alert("密碼錯誤")
            }
        } else {
            alert("不可空白")
        }
        console.log(user);
    }
</script>
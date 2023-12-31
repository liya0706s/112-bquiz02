    <fieldset>
        <legend>會員登入</legend>
        <table>
            <tr>
                <td class="clo">帳號</td>
                <td><input type="text" name="acc" id=""></td>
            </tr>
            <tr>
                <td class="clo">密碼:</td>
                <td><input type="password" name="pw" id=""></td>
            </tr>

            <tr>
                <td>
                    <!-- submit改成button 才可以放onclick 使用js -->
                    <input type="button" value="登入" onclick="login()">
                    <input type="reset" value="清除">
                </td>
                <td>
                    <a href="?do=forget">忘記密碼</a> |
                    <a href="?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>
    </fieldset>

    <script>
        function login() {
            $.post('./api/chk_acc.php', {
                acc: $("#acc").val()
            }, (res) => {
                if (parseInt(res) == 0) {
                    alert("查無帳號!")
                } else {
                    $.post('./api/chk_pw.php', {
                            acc: $("#acc").val(),
                            pw: $("#pw").val()
                        },
                        (res) => {
                            if (parseInt(res) == 1) {
                                if ($("#acc").val() == 'admin') {
                                    location.href = "back.php";
                                } else {
                                    location.href = "index.php"
                                }
                            } else {
                                alert("密碼錯誤")
                            }
                        })
                }
            })
        }
    </script>
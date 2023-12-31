    <fieldset>
        <legend>會員登入</legend>
        <table>
            <tr>
                <td class="clo">帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td class="clo">密碼:</td>
                <td><input type="password" name="pw" id="pw"></td>
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
            // 使用 jQuery 的 $.post 方法發送 AJAX 請求到伺服器 './api/chk_acc.php'
            $.post('./api/chk_acc.php', {acc:$("#acc").val() // 從帳號輸入框獲取帳號
            },(res)=>{  // (res) 是一個回調函數的參數
                if(parseInt(res)==0){  // 如果伺服器回傳的結果是 0（代表查無帳號）
                    alert("查無帳號!")
                } else {  // 如果帳號存在，檢查密碼
                    // 再次使用 $.post 方法發送 AJAX 請求到 './api/chk_pw.php'
                    $.post('./api/chk_pw.php',{acc: $("#acc").val(),  // 帳號
                            pw:$("#pw").val()  // 從密碼輸入框獲取密碼
                        },
                        (res) => {
                            if (parseInt(res) == 1) {  // 如果密碼正確（伺服器回傳 1）
                                if ($("#acc").val() == 'admin') {  // 如果帳號是 'admin'
                                    location.href = "back.php";  // 導航到 back.php
                                } else { // 如帳號不是'admin',是一般會員
                                    location.href = "index.php"  // 導航到 index.php
                                }
                            } else {  // 如果密碼錯誤
                                alert("密碼錯誤") // 顯示警告訊息
                            }
                        })
                }
            })
        }
    </script>
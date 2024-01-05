<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <!-- d-flex會是兩個div同一個row -->
        <div style="display:flex">
            <div>問卷名稱</div>
            <div>
                <!-- 問卷名稱 主題 -->
                <input type="text" name="subject">
            </div>
        </div>
        <div>
            <div id="opt">選項
                <input type="text" name="option[]">
                <!-- 多個選項有 送出資料name="option[]" -->
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="送出">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more() {
        let opt = `
        <div id="opt">選項
            <input type="text" name="option[]">
            <input type="button" value="更多">
        </div>
        `
        $("#opt").before(opt);
    }
</script>
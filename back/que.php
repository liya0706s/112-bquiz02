<fieldset>
    <legend>新增問卷</legend>
    <!-- 這個php file其實是在back.php，所以連結的路徑會以back.php回基準 -->
    <form action="./api/add_que.php" method="post">
        <!-- d-flex會是兩個div同一個row -->
        <div style="display:flex;margin-top:10px">
            <div style="margin-top:5px">問卷名稱</div>
            <div>
                <!-- 問卷名稱 主題 -->
                <input type="text" name="subject">
            </div>
        </div>
        <div style="margin-top:10px">
            <div id="opt">選項
                <input type="text" name="option[]">
                <!-- 多個選項有 送出資料name="option[]" -->
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <div style="margin-top:10px">
            <input type="submit" value="送出">
            <input type="reset" value="清空">
        </div>
    </form>  
    <!-- form結束標籤放到submit下方 -->
</fieldset>
<script>
    function more() {
        let opt = `
        <div id="opt">選項
            <input type="text" name="option[]">
        </div>
        `
        // 按下click的時候，會在#opt的前面增加``重音符的內容
        $("#opt").before(opt);
    }
</script>
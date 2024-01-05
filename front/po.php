<style>
    .type-item{
        display: block;
    }

    .types, .news-list{
        display: inline-block;
        width:100px;
        height:110px;
        vertical-align: top; 
        /* 垂直靠上對齊 */
}
</style>
<div class="nav">目前位置: > 分類網誌 >
    <span class="type">健康新知</span>
</div>

<fieldset class="types">
    <legend>分類網誌</legend>
    <a class="type-item">健康新知</a>
    <a class="type-item">菸害防治</a>
    <a class="type-item">癌症防治</a>
    <a class="type-item">慢性病防治</a>
</fieldset>

<fieldset class="news-list">
    <legend>文章列表</legend>
</fieldset>

<script>
    // 點下a連結，會更換上方路徑的名稱
    $(".type-item").on('click',function(){
        $(".type").text($(this).text())
    })
</script>
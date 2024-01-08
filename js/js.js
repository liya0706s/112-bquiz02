// JavaScript Document
function lo(th, url) {
	$.ajax(url, { cache: false, success: function (x) { $(th).html(x) } })
}

// 最新文章和人氣文章 按讚的jquery
// 向"./api/good.php"發送POST請求，將文章的ID作為資料傳送，
// 然後在POST請求完成後重新載入當前頁面
function good(news) {
	$.post("./api/good.php", { news }, () => {
		// 這邊大括號是POST news 
		location.reload();

		// 如果發現文字是讚，要變成收回讚，以此類推
		// 文字*1會變成數字型態
		// switch ($("#n" + news).text()) {
		// 	case "讚":
		// 		$("#n" + news).text("收回讚")
		// 		$("#g" + news).text($("#g" + news).text() * 1 + 1)
		// 		break;
		// 	case "收回讚":
		// 		$("#n" + news).text("讚")
		// 		$("#g" + news).text($("#g" + news).text() * 1 - 1)

		// }
	})
}
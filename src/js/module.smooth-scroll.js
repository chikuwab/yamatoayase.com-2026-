// スムーススクロール
$(window).on('load',function(){
	var locUrl = location.href;
	var setHash = locUrl.split('#');
	$('a[href^="#"]').on('click', function () {
		var href = $(this).attr("href");
		var clkUrl = href.split('#');
		hashMove("#"+clkUrl[1]);
	});
	$('a[href*="#"]').on('click',function() {
		var href = $(this).attr("href");
		var pageURL = location.pathname;
		var reg = new RegExp(pageURL);
		if (href.match(reg)) {
				var clkUrl = href.split('#');
				hashMove("#"+clkUrl[1]);
		}
	});
});
function hashMove(trg){
	var position = 0;
	if(trg && trg != "#"){
		position = $(trg).offset().top;
	}
	$('body,html').animate({scrollTop:position}, '800', 'swing');
}


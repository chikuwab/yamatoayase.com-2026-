export const slick = function () {
	$('.js-slider-fade').on('init', function (event, slick) { });
	$('.js-slider-fade').slick(
		{
			autoplay: true,
			autoplaySpeed: 1000,
			arrows: false,
			dots: false,
			speed: 1000,
			slidesToShow: 1,
			fade: true
		}
	);

	$('.js-slider-works').slick(
		{
			autoplay: true,
			arrows: false, // 前・次のボタンを表示する
			dots: true, // ドットナビゲーションを表示する
			// appendDots: $('.dots-2'), // ドットナビゲーションの生成位置を変更
			speed: 1000, // スライドさせるスピード（ミリ秒）
			slidesToShow: 5, // 表示させるスライド数
			centerMode: true, // slidesToShowが奇数のとき、現在のスライドを中央に表示する
			// variableWidth: true, // スライド幅の自動計算を無効化
			// prevArrow: '<div class="slick-arrow slick-prev"></div>',
			// nextArrow: '<div class="slick-arrow slick-next"></div>',
			responsive: [
				{
					breakpoint: 1440,
					settings: {
						slidesToShow: 3,
					},
				},
				{
					breakpoint: 1000,
					settings: {
						slidesToShow: 1,
					},
				},
			],
		}
	);
}




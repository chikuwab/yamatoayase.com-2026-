// モーダル

export const modal = function () {
	$('.js-modal-trigger').on('click', function () {
		if ($(this).data('modal_contents')) {
			$contents = $($(this).data('modal_contents')).clone();
			$('.js-modal-contents').html($contents);
		} else if ($(this).data('modal_title')){
			$('.js-professional-modal-pic').attr("src","/assets/img/professional/"+$(this).attr('id').replace('button_', '')+".webp");
			$('.js-professional-modal-title').text($(this).data('modal_title'));
			$('.js-professional-modal-text').text($(this).data('modal_text'));
		}
		if ($(this).data('modal_target')) {
			$($(this).data('modal_target')).addClass('is-show');
		} else {
			$('.js-modal').addClass('is-show');
		}
		setTimeout(function () {
			bodyScrollPrevent(true); //スクロール禁止
		},500);
		return false;
	});
	$('.js-modal-close').on('click', function () {
		var $modal = $(this).parents('.js-modal');
		$(this).parents('.js-modal').removeClass('is-show');
		bodyScrollPrevent(false); //スクロール解除
		return false;
	});
}

// スクロール禁止
function bodyScrollPrevent(flag) {
	
	var scrollPosition;
	var body = document.getElementsByTagName('body')[0];
	//iOS(iPad含む)の判定
	var ua = window.navigator.userAgent.toLowerCase();
	var isiOS = ua.indexOf('iphone') > -1 || ua.indexOf('ipad') > -1 || ua.indexOf('macintosh') > -1 && 'ontouchend' in document;
	//スクロールバーの幅
	var scrollBarWidth = window.innerWidth - document.body.clientWidth;

	if (flag) {
		// console.log('スクロール固定');
		body.style.paddingRight = scrollBarWidth + 'px';
		//iOSの場合はposition:fixedの処理
		if (isiOS) {
			scrollPosition = -window.pageYOffset;
			body.style.position = 'fixed';
			body.style.width = '100%';
			body.style.top = scrollPosition + 'px';
		//それ以外はoverflow:hiddenでシンプルな処理
		} else {
			body.style.overflow = 'hidden';
		}	
	} else if (!flag) {//elseでもOK。わかりやすく!flagとしているだけ
			body.style.paddingRight = '';
			if (isiOS) {
				scrollPosition = parseInt(body.style.top.replace(/[^0-9]/g, ''));
				body.style.position = '';
				body.style.width = '';
				body.style.top = '';
				window.scrollTo(0, scrollPosition);
			} else {
				body.style.overflow = '';
			}
		// });
	}

	//transitionendイベントを一回だけ呼び出すための関数（これをやらないと二回目以降のモーダル処理に影響がある）
	function addEventListenerOnce(node, event, callback) {
		var handler = function (e) {
			callback.call(this, e);
			node.removeEventListener(event, handler);
		};
		node.addEventListener(event, handler);
	}
}  

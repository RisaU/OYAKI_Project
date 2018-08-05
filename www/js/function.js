/**
 * ユーザーエージェントを判別する方法
 * http://mugen00.moo.jp/web/jquery/useragent
 */
	var getDevice = (function(){
	var ua = navigator.userAgent;
	if(ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0){
		return 'sp';
	}else if((ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) && screen.width <= 768){
		return 'tab';
	}else{
		return 'other';
	}
	})();
// console.log("Device: " + getDevice);	

/**
 * 固定ナビゲーション
 * 3. スクロールでヘッダーサイズを変更
 * https://www.nxworld.net/tips/stikcy-or-change-header-and-navigation-when-scrolling-using-jquery.html
 */
$(function() {
	var $win = $(window);
	var $nav = $(".mainNav");
	animationClass = "is-navFixed";

	$win.on("load scroll", function() {
		var value = $(this).scrollTop();
		if (value > 100) {
			$nav.addClass(animationClass);
		} else {
			$nav.removeClass(animationClass);
		}
	});
});



// load: 画像などのデータ全ての読み込みが完了したら実行
$(window).on('load',function(){	
	// Drawer Menu(Hamburger Menu)
	$(".navbar_toggle").on("click", function(){
		$(this).toggleClass("open");
		$(".menu").toggleClass("open");
	});
 	
});
/*  
* ふわっとフェードインするあれ
* ref: http://imasashi.net/element-fadein.html
* how to use: put the class od 'fadein'
*/
$(window).scroll(function() {
	$('.fadein').each(function() {
		var elemPos = $(this).offset().top;// element posiiton
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll > elemPos - windowHeight + 100) {
			$(this).addClass('scrollin');
		}	
	});
	
});


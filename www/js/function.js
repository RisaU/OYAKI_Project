// load: 画像などのデータ全ての読み込みが完了したら実行
$(window).on('load',function(){
	
			// 固定navigation
	var navH = $('#fixedNav').height();
	// console.log(navH);
	var main = $('main');
	main.css('margin-top', navH);
	
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

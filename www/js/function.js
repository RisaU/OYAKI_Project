$(window).on('load',function(){
// load: 画像などのデータ全ての読み込みが完了したら実行

/**
* http://yurixxx8.hatenablog.com/entry/2017/02/05/022049
* プラグインなしで拡大しながらフェードで切り替わるスライド
*/
	var slideFlag = 0;
    var slide = $(".slideshow");
    var i = 0;
    // 1枚目のスライド表示
    slide.find(".item").eq(i).fadeIn(2000).addClass("in");
    // スライドの枚数
    var total = $(".slideshow .item").length -1;

if (slideFlag == 1) {
    // 処理を繰り返す
    setInterval(function() {
        if(i < total) {
            slide.find(".item").eq(i).addClass("out");
            slide.find(".item").eq(i).removeClass("in");
                j = i;
                i++;
                setTimeout(function() {
					// 1000ミリ秒後に3500ミリ秒かけてフェードインする
                    slide.find(".item").eq(i).fadeIn(3500)
                    .addClass("in").removeClass("out");
                }, 1000);
			// 4500ミリ秒かけてフェードアウトする
            slide.find(".item").eq(j).fadeOut(4500);
        } else if(i == total) {
            slide.find(".item").eq(i).addClass("out");
            slide.find(".item").eq(i).removeClass("in");
            j = i;
            i = 0;
            setTimeout(function() {
                slide.find(".item").eq(i).fadeIn(3500)
                    .addClass("in").removeClass("out");
            }, 1000);
            slide.find(".item").eq(j).fadeOut(4500);
        };
	// この値を変更すると、処理の間隔を遅くしたり早くしたりできる
    }, 7000);
}
});
/*  
http://imasashi.net/element-fadein.html
how to use: put the class od 'fadein'
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

/**
* jQuery for slider sample
*/
$(function(){
	// alert("hoge");
	var photo_list$ = $("#photo_list");
	var li$ = $("#photo_list li");
	var li_count = li$.length;
	var li_width = li$.width() + parseInt(li$.css("margin-left"), 10)
					+ parseInt(li$.css("margin-right"), 10);
	var ul_padding = parseInt(photo_list$.css("padding-left"), 10)
						+ parseInt(photo_list$.css("padding-right"), 10);
 // console.log(ul_padding);	

	//#slider_inner の幅は「 li 要素の幅（マージンを含む） X その個数」と ul 要素のパディングの合計
	var slider_inner$ = $("#slider_inner");		
	slider_inner$.css("width", ((li_width * li_count) + ul_padding) + 'px');
	
	//最後の画像をul要素の先頭位置に移動（prependTo）
	$("#photo_list li:last").prependTo(photo_list$);
	//slider_inner を上記で移動した分だけ左方向へずらす
	slider_inner$.css("margin-left", "-" + li_width + "px");
	
	// previous
	$("#slider_prev").click(function() {
		slider_inner$.stop().animate({
			marginLeft: parseInt(slider_inner$.css("margin-left"), 10)
						+ li_width + "px"
		}, 500, function(){
			slider_inner$.css("margin-left", "-" + li_width + "px");
			$("#photo_list li:last").prependTo(photo_list$);
		});
	});
	
	// next
	$("#slider_next").click(function(){
		slider_inner$.stop().animate({
			marginLeft: parseInt(slider_inner$.css("margin-left"), 10)
						- li_width + "px"
		}, 500, function(){
			slider_inner$.css("margin-left", "-" + li_width + "px");
			//  $(A).appendTo(B) ではBにAが追加
			$("#photo_list li:first").appendTo(photo_list$);
		});
	});
	
	
	var timer;
	var is_stopped = false;
	var stop$ = $("#stop");
	var next_prev$ = $("#slider_next", "#slider_prev");
	
	function start_carousel() {
		timer = setInterval(function(){
			$("#slider_next").click();
		}, 1500);
		stop$.text("Stop");
		is_stopped = false;
	}
	
	function stop_carousel() {
		clearInterval(timer);
		stop$.text("Start");
		is_stopped = true;
	}
	
	$("#slider_wrap").hover(function() {
		clearInterval(timer);
		next_prev$.show();
	}, function() {
		if (!is_stopped) {
			start_carousel();
			next_prev$.hide();
		}
	});
	
	stop$.click(function (){
		if (is_stopped) {
			start_carousel();
			next_prev$.hide();
		} else {
			stop_carousel();
			next_prev$.show();
		}
	});
	
	// ini settings
	next_prev$.hide();
	//自動的にスタートするように設定
	// start_carousel();
	stop_carousel();

	

});
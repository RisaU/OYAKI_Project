$(window).on('load',function(){
// load: 画像などのデータ全ての読み込みが完了したら実行

    var slide = $(".slideshow");
    var i = 0;
    // 1枚目のスライド表示
    slide.find(".item").eq(i).fadeIn(2000).addClass("in");
    // スライドの枚数
    var total = $(".slideshow .item").length -1;

    // 処理を繰り返す
    setInterval(function() {
        if(i < total) {
            slide.find(".item").eq(i).addClass("out");
            slide.find(".item").eq(i).removeClass("in");
                j = i;
                i++;
                setTimeout(function() {
                    slide.find(".item").eq(i).fadeIn(5500)
                    .addClass("in").removeClass("out");
                }, 1000);
            slide.find(".item").eq(j).fadeOut(6500);
        } else if(i == total) {
            slide.find(".item").eq(i).addClass("out");
            slide.find(".item").eq(i).removeClass("in");
            j = i;
            i = 0;
            setTimeout(function() {
                slide.find(".item").eq(i).fadeIn(5500)
                    .addClass("in").removeClass("out");
            }, 1000);
            slide.find(".item").eq(j).fadeOut(6500);
        };
    }, 6500);
});

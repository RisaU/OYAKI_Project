/**
 *  カルーセル機能
 *  - 機能
 *      -- 5秒ごとの自動巡回
 *      -- 左右ボタン
 *  - 構成
 *      -- .gallery         ... 表示全体枠
 *      -- .galleryRoad     ... 画像表示部分
 *      -- .gNext           ... 次ボタン
 *      -- .gPrev           ... 前ボタン
 *
 *      .gallery
 *      --------------------------------
 *      |.gPrev  ---------------  .gNext|
 *      |   --  |               |   --  |
 *      |  |  | | .galleryRoad  |  |  | |
 *      |   --  |               |   --  |
 *      |         ---------------       |
 *      --------------------------------
 *
 *  - 追加したい機能
 *      -- 矢印押してるときは自動巡回停止
 *      -- ホバーで自動巡回停止
 */

$(function() {
    var $sWidth = $('.gallery li').outerWidth(); // スライド1枚の横幅
    var $gLeftLength = $('.gallery li').css("left");
    var $gNum = $('.gallery li').length;/* 画像枚数 */
    var $gRoadWidth = $sWidth * $gNum; /* スライドを横並びにした時の全横幅 */
    var $firstSlide = $('.gallery li').eq(0);
    var $lastSlide = $('.gallery li').eq($gNum -1);
    $('.galleryRoad').css("width", $gRoadWidth);
    var $Current = 0;
    $($lastSlide).css("left", -$gRoadWidth);

    // 自動アニメーション
    setInterval(function() {
        $Current++;
        $($lastSlide).css("left", "0");
        $SlideAnimation();
    }, 5000);

    // ボタン処理
    $(".gNext").click(function() {
        $Current++;
        $SlideAnimation()
    });
    $(".gPrev").click(function() {
        $Current--;
        $SlideAnimation();
    });

    /**
    * 画像をスライドさせる関数
    */
    var $SlideAnimation = function() {
        $($lastSlide).css("left", "0");
        // 最後のスライド
        if($Current > $gNum -1) {
            $($firstSlide).css("left", $gRoadWidth);
            $('.galleryRoad').stop().animate({
                left: -$sWidth * $Current
            }).promise().done(function() {
                $($firstSlide).css("left", "0");
                $('.galleryRoad').css("left", "0");
            });
            $Current = 0;
        // 最初のスライド
        } else if($Current < 0) {
            $($lastSlide).css("left", -$gRoadWidth);
            $('.galleryRoad').stop().animate({
                left: -$sWidth * $Current
            }).promise().done(function() {
                // アニメーション終了後に1枚目のスライドと
                // スライド格納要素のleftを初期値に戻す
                $($lastSlide).css("left", "0");
                $('.galleryRoad').css("left", -$gRoadWidth + $sWidth);
            });
            // スライドを最後に追加
            $Current = $gNum -1;
        } else {
            $('.galleryRoad').stop().animate({
                left: -$sWidth * $Current
            });
        }
    }
});


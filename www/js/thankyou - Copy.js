// this is for cross browser
window.requestAnimFrame = (function () {
	return  window.requestAnimationFrame   ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame    ||
		window.oRequestAnimationFrame      ||
		window.msRequestAnimationFrame     ||
		function (callback) {
			window.setTimeout(callback, 1000 / 60);
		};
})();

var speedX = 3;
var speedY = 4;
var locX = 200;
var locY = 150;
var ctx;
function draw() {
	// set how new image are drawn onto a destination existing image.
	ctx.globalCompositeOperation = "source-over";
	ctx.fillStyle = "rgba(8, 8, 12, 0.2)";
	ctx.fillRect(0, 0, 400, 300);
	ctx.globalCompositeOperation = "lighter";
	
	// position
	locX += speedX;
	locY += speedY;

	// reset
	if (locX < 0 || locX > 400) {
		speedX *= -1;
	}
	if (locY < 0 || locY > 300) {
		speedY *= -1;
	}
	
	// draw circle
	ctx.beginPath();
	ctx.fillStyle = "#39f";
	ctx.arc(locX, locY, 4, 0, 2*Math.PI, true);
	ctx.fill();
	
}
window.onload = function () {
	
	// not run if canvas is NOT supported
	if (!window.HTMLCanvasElement) return;
	

	
	var canvas = document.getElementById("canvas");
	ctx = canvas.getContext('2d');
	var timer = setInterval(draw, 33);

};



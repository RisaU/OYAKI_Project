/**
* @task8
* ref: https://www.otwo.jp/blog/canvas_sakura/
*/

window.onload = function () {
	var canvas = document.getElementById("cvs");
	var ctx = canvas.getContext("2d");

	// img of sakura
	var imgCnt = 25;
	var aryImg = [];
	
	// size of window	
	var w = document.body.clientWidth;
	var h = document.body.clientHeight + 200;

	// fit width/height of canvas with window
	var cvsw = canvas.width = w;
	var cvsh = canvas.height = h;	

	// Size of sakura img
	var imgBaseSizeW = 15;
	var imgBaseSizeH = 18.5;
	
	//  Aspect ratio for sakura
	var aspectMax = 1.5;
	var aspectMin = 0.5;
	
	// fall velocity
	var speedMax = 2;
	var speedMin = 0.5;
	
	// Image angle
	var angleAdd = 4;


	// load sakura img
	var img = new Image();
	img.src = "./images/sakura.png";
	img.onload = flow_start;
	
	// set img position
	function setImages() {
		var aspect = 0;
		for (var i=0; i<imgCnt; i++) {
			
			// make sakura with random size(0.5 to 1.5)
			aspect = Math.random()*(aspectMax - aspectMin) + aspectMin;
			
			aryImg.push({
				// display position(init)
				"posx": Math.random()*cvsw, 
				"posy": Math.random()*cvsh,
				// sakura size
				"sizew": imgBaseSizeW*aspect, 
				"sizeh": imgBaseSizeH*aspect,
				"speedy": Math.random()*(speedMax-speedMin)+speedMin,
				"angle": Math.random()*360
			});
		}

	}
	
	// display and update parameter
	var idex = 0;
	var cos = 0;
	var sin = 0;
	var radian = Math.PI / 180;// Math.PI = 3.14 
	
	function flow() {
		// reset
		ctx.clearRect(0, 0, cvsw, cvsh);
		for (idx=0; idx<imgCnt; idx++) {
			aryImg[idx].posy += aryImg[idx].speedy;
			aryImg[idx].angle += Math.random()*angleAdd;
			cos = Math.cos(aryImg[idx].angle * radian);
			sin = Math.sin(aryImg[idx].angle * radian);
			
			// transform to the identity matrix
			ctx.setTransform(cos, sin, sin, cos, aryImg[idx].posx, aryImg[idx].posy);
			
			// display images on screen drawImage(image, dx, dy, dw, dh)
			ctx.drawImage(img, 0, 0, aryImg[idx].sizew, aryImg[idx].sizeh);
			
			// resets the current transform for next one
			ctx.setTransform(1, 0, 0, 1, 0, 0);
			
			// return the image back in if it go outside screen
			if (aryImg[idx].posy >= cvsh) {
				aryImg[idx].posy = 0 - aryImg[idx].sizeh;
			}
		}
	}
	function flow_start() {	
		setImages();
		setInterval(flow, 10);
	}
	
	// for text(not use)
	function text () {
		ctx.strokeStyle = '#ff0000';
		ctx.lineWidth = 8;

		ctx.font = '72px serif';
		ctx.strokeText("abc", 64, 64);
		
	}
};



$(function() {
	var o = {
	  textFont: 'Arial, Helvetica, sans-serif',
	  maxSpeed: 0.05, minSpeed: 0.01,
	  textColour: '#00F',
	  textHeight: 25,
	  outlineMethod: 'colour',
	  fadeIn: 800,
	  outlineColour: '#F96',
	  outlineThickness: 3,
	  outlineOffset: 0,
	  depth: 0.92,
	  minBrightness: 0.1,
	  wheelZoom: false,
	  reverse: true,
	  shadowBlur: 3,
	  shuffleTags: true,
	  shadowOffset: [1,1],
	  // stretchX: 1.7,
	  initial: [0,0.1],
	  clickToFront: 600,
	  radiusX: 0.8,
	  radiusY: 0.8,
	  radiusZ: 0.8,
	  shadow: '#ccf',
	  weight: true,
	  weightFrom: 'data-weight',
	  weightMode: 'size'
	};
	window.onload = function() {
		TagCanvas.Start('myCanvas', '',o);
		TagCanvas.textColour = '#ffffff';
		TagCanvas.outlineColour = '#ff9999'; 
	};
	// $('#myCanvas').tagcanvas({ textColour : '#ffffff', outlineThickness : 1, maxSpeed : 0.03, depth : 0.75 });
});
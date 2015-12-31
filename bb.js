/*
 * bb.js
 * Copyright (C) 2015 raghuram <raghuram@raghuram-HP-Pavilion-g6-Notebook-PC>
 *
 * Distributed under terms of the MIT license.
 */
var imgs=$('.crystal_ball');
console.log(imgs.size());
var angle=220/imgs.size();
var cur_angle=(220 - angle*(imgs.size()-1))/2;
imgs.each(function(){
	console.log(angle);
	var cur_str = 'rotate(-' + cur_angle + 'deg) translate(16vh) rotate(' + cur_angle + 'deg)';
	$(this).css({
		'transform':cur_str
	});
	cur_angle += angle;
});


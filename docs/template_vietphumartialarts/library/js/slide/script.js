$(window).load(function(){
	$('.slider')._TMS({
		nextBu:'.next',
		prevBu:'.prev',
		preset:'diagonalExpand',
		easing:'easeOutQuad',
		duration:800,
		slideshow:6000,
		banners:'fade',// fromLeft, fromRight, fromTop, fromBottom
		waitBannerAnimation:false
	})
	$('ul#menu').superfish({
      delay:       600,
      animation:   {height:'show'},
      speed:       600,
      autoArrows:  false,
      dropShadows: false
    });
})

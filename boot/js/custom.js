/* Js Morphext */

$("#js-rotating").Morphext({	
	animation: "fadeIn",		
	separator: ",",		
	speed: 2000,
	complete: function () {	
	}
}); 

/* On Scroll Menu */

$(window).scroll(function() {

	var top = $(window).scrollTop();

	if (top > 35) {
		$(".mainNav").addClass("nav_fixed");
		$(".header").addClass("header_fix");
		$("nav").addClass("navbar-light");
	} else {
		$(".mainNav").removeClass("nav_fixed");
		$(".header").removeClass("header_fix");
		$("nav").removeClass("navbar-light");
	}
});

/* payment button click */

function payment() {	
window.location.replace("payment.html");
};

function payment2() {	
window.location.replace("../payment.html");
};

$(function() {
$('[data-toggle="tooltip"]').tooltip()
});
 




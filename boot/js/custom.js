/* Js Morphext */

$("#js-rotating").Morphext({	
	animation: "fadeIn",		
	separator: ",",		
	speed: 2000,
	complete: function () {	
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
 




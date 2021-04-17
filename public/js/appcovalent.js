

$(document).ready(function(){

	$('.invest_dash').click(function(event){
		event.preventDefault();
		$('body').load('invest');
		console.log('Done');

	});


	

	$('.invest-alert').fadeOut(5000);

	$('#cart-to-show').click(function(event){
		event.preventDefault();
		$('body').load('showorder');
		console.log('Done');

	});

});
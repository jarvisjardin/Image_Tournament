function winner(match, winner){
	$('#'+match+'').val(winner);
	$('#match_'+match).hide();
	$('#match_'+(match+1)).show();

	$('#match_count').val($('#match_count').val() - 1);
	
	console.log(match);
	
	
	if($('#match_count').val() == 0){
		$("#round").submit();
	}
}

$(document).ready(function(){
	
	$('.img-thumbnail').hover(function(){
		console.log('hover');
	});
});
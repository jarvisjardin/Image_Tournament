<?php
	if(count($fruit) > 0){
		echo '<div class="alert alert-info" role="alert"><h4 class="text-center">Pick your favorite out of the two below.</h4>';
		echo '<p class="text-center">';
		switch($category){
			case 'categories/fruits':
				echo '(Which is the tastiest? Which looks prettier? Just pick which one <strong>YOU</strong> like better! )';
				break;
			case 'categories/puppies':
				echo '(Which is the cutest? Which one do you just want to snuggle all day with? Just pick which one <strong>YOU</strong> like better! )';
				break;
				
			default:
				break;
		};
		echo '</p></div>';
		echo '<div class="col-md-6 col-md-offset-3">';
		echo '<form id="round" action="index.php" method="POST" >';

		shuffle($fruit);
		$matches = prepare_match($fruit);
		$winByDefault = false;

		foreach($matches as $key => $match){
			include('match.php');
		}
		$match_count = ($winByDefault)? count($matches) : count($matches) ;

		echo '<input id="match_count" value="'.$match_count.'" type="hidden">';

		echo '</form>';	
		echo '</div>';
	}else{
		echo '<h1>No Contest!</h1>';	
	}
?>
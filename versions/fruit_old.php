<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head> 
<body>
<?php
	
	$fruit = array('apple','bananas', 'cantalope', 'pear', 'peach', 'honeydew', 'mango', 'cherry', 'orange', 'pineapple', 'strawberry', 'kiwi');

	if(count($fruit) > 0){
		
		$matches = prepare_match($fruit);
		echo '<input id="match_count" value="'.count($matches).'">';
		foreach($matches as $key => $match){
			echo '<div id="match_'.$key.'">';
			echo 'MATCH '.($key+1).':<br>';

			foreach($match as $m){				
				echo '<a onclick="winner('.$key.',\''.$m.'\');" href="#" >'.$m.'</a>    ';
			}
			echo '</div>';
			
			echo '<br><br>';
		}	
	}

	function prepare_match($fruit){
// 		echo '<input id="match_winners" value="array()">'.'<br>';
		
		$match_count = count($fruit)/2;
		$matches = array();		
		for($i = 0; $i < $match_count; $i++){		
			$match = array();
			foreach(array_rand($fruit,2) as $m){
				$match[$m] = $fruit[$m];
				unset($fruit[$m]);
			}		
			$matches[] = $match;
			echo '<input id="match_'.$i.'_winner" >'.'<br>';
		}
		
		return $matches;
	}
?>	
</body>
</html>

<script type="text/javascript">
	var match_count;

	$( document ).ready(function() {

		match_count	= $('#match_count').val();
			
	});		
	
		function winner(match, winner){
			/*
			console.log(match);
			console.log(winner);
			*/
			$('#match_'+match+'_winner').val(winner);
			// 		$('#match_winners').val(winner);
			$('#match_'+match).hide();
			$('#match_count').val($('#match_count').val() - 1);
			
			if($('#match_count').val() == 0){
				submit_winners();
			}
		}
		
		function submit_winners(){
			var data = []; 

			for($i = 0; $i < match_count; $i++){
				data.push($('#match_'+$i+'_winner').val());
			}
			
			var request = $.ajax({
				url: "php/prepare_match.php",
				type: "POST",
				data: data,
				dataType: "json"
			});
			request.done(function(res) {
				console.log(res);
			});
		}		
</script>
	
	
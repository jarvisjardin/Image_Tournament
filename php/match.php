<div id="match_<?=$key?>" <?php if($key != 0){ echo 'style="display:none"';} ?> >
<?	
	foreach($match as $m){

		if(count($match) == 2){
			echo '<div class="col-md-6">';
			echo '<a onclick="winner('.$key.',\''.$m.'\'); return false;" href="#" >
					<img src="'.$category.'/'.$m.'" alt="'.$m.'" class="img-thumbnail contestant" height="200" width="200">
				</a>';
			echo '<p class="text-center">'.substr($m, 0, strpos($m, ".")).'</p>';
			echo '</div>';
		}else{
			$winByDefault = true;
			echo '<h3>Win by default</h3>';
			echo '<p><small>Due to uneven match ups, this contestant wins by default and goes to the next round</small><p>';
			echo '<img src="'.$category.'/'.$m.'" alt="'.$m.'" class="img-thumbnail" height="200" width="200">'; 
			echo '<p>'.substr($m, 0, strpos($m, ".")).'</p>';

			echo '<div><button onclick="winner('.$key.',\''.$m.'\'); return false;" href="#">Continue</button></div>';
		}

	}
	echo '</div>';
	echo ($winByDefault) ? '<input id="'.$key.'" name="'.$key.'" value="'.$m.'" type="hidden">' : '<input id="'.$key.'" name="'.$key.'" type="hidden">';

?>
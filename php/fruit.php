<?php
/*
	function getCategories(){
		foreach(scandir('categories',1) as $category){
			if($category != '.' && $category != '..'){
				echo '<button class="btn btn-default">'.$category.'</button>';
			}
		};
	}
*/

	function getContestants($category){
		$contestants = array();
		foreach(scandir($category,1) as $contestant){
			
			$supported_image = array(
				'gif',
				'jpg',
				'jpeg',
				'png'
			);
			
			if (in_array(strtolower(pathinfo($contestant, PATHINFO_EXTENSION)), $supported_image)) {
				$contestants[] = $contestant;
			}
		};
		return $contestants;
	}

	function prepare_match($fruit){		
		$match_count = floor(count($fruit)/2);
		$matches = array();
		for($i = 0; $i < $match_count; $i++){
			$match = array();
			foreach(array_rand($fruit,2) as $m){
				$match[$m] = $fruit[$m];
				unset($fruit[$m]);
			}
			$matches[] = $match;
		}
		if(!empty($fruit)){
			$matches[] = $fruit;
		}
		return $matches;
	}
?>	

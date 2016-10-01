<?php
	foreach(scandir('categories',1) as $category){
		if($category != '.' && $category != '..'){
			echo '<form action="index.php" method="post">';
			echo '<input name="category" value="'.$category.'">';
			echo '<button type="submit" class="btn btn-default">'.$category.'</button>';
			echo '</form>';
		}
	};
?>
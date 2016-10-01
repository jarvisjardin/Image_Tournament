<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>KPOP</title>
	
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
			<div class="navbar-header">
			<a class="navbar-brand" href="index.php">KPOP APP</a>
			</div>
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<?php
				include_once('php/fruit.php');
/* 				include_once('php/categories.php'); */
				
				//do get category logic later.
/* 				$category = 'categories/fruits'; */
				$category = 'categories/puppies';

				if(empty($_POST)){
					$_SESSION['round'] = 1;
					$fruit = getContestants($category);
					include_once('php/round.php');
				}else if(count($_POST) == 1){
					echo '<h1> YOU LIKE <u>'.substr($_POST['0'], 0, strpos($_POST['0'], ".")).'</u> THE BEST</h1>';
					echo '<img src="'.$category.'/'.$_POST['0'].'" alt="'.$_POST['0'].'" class="img-thumbnail contestant" height="200" width="200">';

					echo '<button class="btn btn-default" onclick="window.location.href = \'index.php\'">RESTART</button>';
					
				}else{

					$fruit = $_POST;
					include_once('php/round.php');
				} 
			?>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>

	</body>
</html>
<?php
   include('../server/session.php');
      //admin level is 1
   if ($level == !1){
	   header("Location:../home.php");
   }
?>



<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="adminhome.css">
</head>
<body>
 	<header>
		<nav> 
			<div class="main-wrapper">
				<ul>
				<li class="home"><?php echo mb_strtoupper( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) );?></li>
				<li class="other"><a href="add progress.php">ADD PROGRESS</a></li>
				<li class="other"><a href="edit.php">EDIT</a></li>
				<li class="other"><a href="search.php">SEARCH</a></li>
				
				
				</ul>

				<div id="loginContainer">
						<form action="../server/logout.php" method="POST"> 
							<button class="button2" >ID: <?php echo $id;?> | Name: <?php echo $first;?> </button>
							<button type="submit" name="logoutbtn"> SIGN OUT</button>
						</form>
				</div>


			</div>


		</nav>
 	</header>
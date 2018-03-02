<?php include 'server/login.php';?>

<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="headerStyle.css">
</head>
<body>
 	<header>
		<nav> 
			<div class="main-wrapper">
				<ul>
				<li class="home"><?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) );?></li>
				<li class="other"><a href="http://google.com">HELP</a></li>
				<li class="other"><a href="http://google.com">CONTACT</a></li>
				
				
				</ul>

				<div id="loginContainer">
						<form action="server/login.php" method="POST"> 
							<input type="text" name="login"></input>
							<input type="password" name="password"></input>
							<button type="submit" name="loginbtn">SIGN IN</button>
						</form>
				</div>


			</div>


		</nav>
 	</header>
	
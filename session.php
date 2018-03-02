<?php
   include('dbh.php');
   session_start();
    //store session variable in %user_check
	$user_check = $_SESSION['login_user'];
    //QUERY where emplogin = $user_check
	$query = "select empid, empfirst, emplogin, level from users where emplogin = '$user_check' ";

    //store result
	$result = mysqli_query($db, $query);

    // store array in  $row
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // store emplogin in $login_session 
	$login_session = $row['emplogin'];
	// store additional values for showing which user on header
	$id = $row['empid'];
	$first = $row['empfirst'];
	// level stored and identifies what login is who: manager, admin or employee
	$level = $row['level'];
    //if session is not set, send to home
    if(!isset($_SESSION['login_user'])){
      header("location: ../home.php");
    }
?>


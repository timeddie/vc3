<?php
   include("dbh.php");
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   //session_start();
   
   if(isset($_POST['loginbtn'])) {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['login']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	 
	  
	  //SQL Query
      $sql = "SELECT level FROM users WHERE emplogin = '$myusername' and emppass = '$mypassword'";
	  // QUERY PUT INTO $RESULT
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //Count the returned rows, 1 would mean username and password is correct
	  $count = mysqli_num_rows($result);
	  //Get user level
	  $level = $row['level'];
	  
		//Counted row returning 1 would mean username and password is correct
		//log in user level 2 and send to admin page
		if($count == 1 && $level == 1) {
        $_SESSION['login_user'] = $myusername;
        header("Location: ../admin/admin.php");
		}
		//log in user level 2 and send to employee page
		elseif($count == 1 && $level == 2){
		$_SESSION['login_user'] = $myusername;
		header("Location: ../employee/employee.php");
		}
		// if 3 send to managers page
		elseif($count == 1 && $level == 3){
		$_SESSION['login_user'] = $myusername;
		header("Location: ../manager/manager.php");
		}
		else{
		//not logged in go back and try again
		header("location: ../home.php");
		}
   }
?>
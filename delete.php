<?php

		//including the database connection file
		include('dbh.php');
 
		//getting id of the data from url
		$id = $_GET['tid'];
 
		//deleting the row from table
		$sql = "DELETE FROM users WHERE empid=$id";
		$result = mysqli_query($db, $sql); 


		if ($db->query($sql) === TRUE) 
		{
	    echo '<script language="javascript">';
		echo "if(!alert('Employee record deleted')){window.location.href = '../admin/edit.php'}";  
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo "if(!alert('Record failed to delete: Contact your software provider')){window.location.href = '../admin/edit.php'}";  
		echo '</script>';	}


		

 
		
<?php
include('session.php');
// functions to both ADD & UPDATE an employees progress
// ADD PROGRESS FUNCTION

if(isset($_POST['addbtn']))
{
	addprogress();
}

function addprogress()
{
	include ('dbh.php');
	$monval = mysqli_real_escape_string($db,$_POST['monval']);
	$montar = mysqli_real_escape_string($db,$_POST['montar']);

	$tueval = mysqli_real_escape_string($db,$_POST['tueval']);
	$tuetar = mysqli_real_escape_string($db,$_POST['montar']);

	$wedval = mysqli_real_escape_string($db,$_POST['wedval']);
	$wedtar = mysqli_real_escape_string($db,$_POST['wedtar']);

	$thuval = mysqli_real_escape_string($db,$_POST['thuval']);
	$thutar = mysqli_real_escape_string($db,$_POST['thutar']);

	$frival = mysqli_real_escape_string($db,$_POST['frival']);
	$fritar = mysqli_real_escape_string($db,$_POST['fritar']);

	$empid = mysqli_real_escape_string($db,$_POST['empid']);

	$sql = "INSERT INTO prodata (monval, montar, tueval, tuetar, wedval, wedtar, thuval, thutar, frival, fritar, empid) VALUES ('$monval', '$montar', '$tueval', '$tuetar', '$wedval', '$wedtar', '$thuval', '$thutar', '$frival', '$fritar', '$empid')";

	//DID IT WORK? ERROR HANDLERS
	if ($db->query($sql) === TRUE) {
		echo '<script language="javascript">';
		echo "if(!alert('Record succesfully updated')){window.location.href = '../manager/add progress.php'}";  
		echo '</script>';
	} else {
    	echo '<script language="javascript">';
		echo "if(!alert('Record failed to write: Contact your software provider')){window.location.href = '../manager/add progress.php'}";  
		echo '</script>';
	}
}

// END OF ADD PROGRESS FUNCTION
// START OF UPDATE PROGRESS FUNCTION

if(isset($_POST['updatebtn']))
{
	updateprogress();
}

function updateprogress()
{
	include ('dbh.php');
	$monval = mysqli_real_escape_string($db,$_POST['monval']);
	$montar = mysqli_real_escape_string($db,$_POST['montar']);

	$tueval = mysqli_real_escape_string($db,$_POST['tueval']);
	$tuetar = mysqli_real_escape_string($db,$_POST['tuetar']);

	$wedval = mysqli_real_escape_string($db,$_POST['wedval']);
	$wedtar = mysqli_real_escape_string($db,$_POST['wedtar']);

	$thuval = mysqli_real_escape_string($db,$_POST['thuval']);
	$thutar = mysqli_real_escape_string($db,$_POST['thutar']);

	$frival = mysqli_real_escape_string($db,$_POST['frival']);
	$fritar = mysqli_real_escape_string($db,$_POST['fritar']);

	$empid = mysqli_real_escape_string($db,$_POST['empid']);
	// if they have not put progress values, then simply update targets only
	if ($monval == NULL && $tueval == NULL && $wedval == NULL && $thuval == NULL && $frival == NULL)
	{
		$sql = "UPDATE prodata 
			SET montar = '$montar', tuetar = '$tuetar', wedtar ='$wedtar', thutar = '$thutar', fritar = '$fritar' 
			 WHERE empid = '$empid'";
	} 
	elseif ($montar == NULL && $tuetar == NULL && $wedtar == NULL && $thutar == NULL && $fritar == NULL) //target values not entered then only update progress values
	{
		$sql = "UPDATE prodata 
			SET monval = '$monval', tueval = '$tueval', wedval ='$wedval', thuval = '$thuval', frival = '$frival' 
			 WHERE empid = '$empid'"; // need to code if only targets are changed, then values already there are not increased

	}
	else // THIS IS BASED ON THE FACT A NULL VALUE MAY BE BROUGHT IN THE FORM, IF IT ISNT INTERPRETED PROPERLY, REASASSIGN VALUES TO NULL!
	{
		$sql = "UPDATE prodata 
			SET monval = '$monval', montar = '$montar', tueval = '$tueval', tuetar = '$tuetar', wedval ='$wedval', wedtar ='$wedtar', thuval = '$thuval', thutar = '$thutar', frival = '$frival', fritar = '$fritar'  
			 WHERE empid = '$empid'"; // need to code if only targets are changed, then values already there are not increased
	}

	


	// END OF UPDATE PROGRESS FUNCTION
	//DID IT WORK? ERROR HANDLERS
	if ($db->query($sql) === TRUE) {
	    echo '<script language="javascript">';
		echo "if(!alert('Record succesfully updated')){window.location.href = '../manager/add progress.php'}";  
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo "if(!alert('Record failed to update: Contact your application provider')){window.location.href = '../manager/add progress.php'}";  
		echo '</script>';
	}
}

?>
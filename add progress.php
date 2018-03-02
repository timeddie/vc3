<?php
include 'adminheader.php';

?>

<?php
// Displays all records where emp id = 2 (employee)
include '../server/dbh.php';
$sql = "SELECT * FROM users WHERE level = 2 ORDER BY empid ASC"; 
$result = mysqli_query($db, $sql); 

?>


<section class="main-container">
	<div class="main-wrapper">
		<!--ENTRE FORM FOR ADDING USERS-->
		<form class="signupform" action="../server/updateprogress.php" method="post">
			<div class="div1">Set Employee Progress</div>
			<!--Actualy employee values & Expected employee targets-->
			<input  maxlength="100" type="text" name="monval" placeholder="Monday"></input>
			<input  maxlength="100" type="text" name="montar" placeholder="Monday's target"></input>
			<input  maxlength="100" type="text" name="tueval" placeholder="Tuesday"></input>
			<input  maxlength="100" type="text" name="tuetar" placeholder="Tuesday's target" class="target"></input>
			<input  maxlength="100" type="text" name="wedval" placeholder="Wednesday"></input>
			<input  maxlength="100" type="text" name="wedtar" placeholder="Wednesday's target" class="target"></input>
			<input  maxlength="100" type="text" name="thuval" placeholder="Thursday"></input>
			<input  maxlength="100" type="text" name="thutar" placeholder="Thursday's target" class="target"></input>
			<input  maxlength="100" type="text" name="frival" placeholder="Friday"></input>
			<input  maxlength="100" type="text" name="fritar" placeholder="Friday's target" class="target"></input>
			
			<!--Selects employee by their ID-->
			<input required maxlength="100" type="text" name="empid" placeholder="Employee ID"></input>
			<button class="button4" type="submit" name="addbtn">Enter Progress</button> <!--CHANGE NAME OF BUTTON-->
			<button class="button3" type="submit" name="updatebtn">Update Progress</button> <!--CHANGE NAME OF BUTTON-->
			<div class="addinfo">ADD OR UPDATE AN EMPLOYEES INFORMATION BY ENTERING THEIR TARGETS AND EMPLOYEE ID LOCATED TO THE RIGHT </div>
		</form>	


		<!--SEARCH & DELETE USERS-->
		
		<div class="searchdel">
		<div class="div2">Record List</div>
			<div class="searchdel2">
			  		<table class="emprec3">
			  			<tr>
			  			<td>ID</td>            			
            			<td>First</td>
            			<td>Last</td>
            			<td>Age</td>
            			<td>Email</td>
            			<td>Phone</td>
            			<td>Dept</td>
            			<td>Level</td>
        				</tr>

        				<?php
        				while($res = mysqli_fetch_array($result)) {         
            			echo "<tr>";
            			echo "<td>".$res['empid']."</td>";
            			echo "<td>".$res['empfirst']."</td>";
           				echo "<td>".$res['emplast']."</td>";
           				echo "<td>".$res['empage']."</td>";          			
           				echo "<td>".$res['empeaddress']."</td>"; 
           				echo "<td>".$res['empphone']."</td>";
           				echo "<td>".$res['empdept']."</td>"; 
           				echo "<td>".$res['level']."</td>";       
            			}
            			?>
        			</table>
				<!--<form class="deleteform" action="../server/registration.php" method="post">
				</form>-->

			</div>
		
		</div>
	</div>
</section>


<?php
include 'footer.php';
?>
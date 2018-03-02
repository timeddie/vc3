<?php
include 'adminheader.php';

?>

<?php
// This displays records for the employee data display
include '../server/dbh.php';
$sql = "SELECT * FROM users ORDER BY empid ASC";
$result = mysqli_query($db, $sql); 

?>


<section class="main-container">
	<div class="main-wrapper">
		<!--ENTRE FORM FOR ADDING USERS-->
		<form class="signupform" action="../server/registration.php" method="post">
			<div class="div1">Set A Record</div>
			<input  maxlength="100" type="text" name="first" placeholder="Firstname"></input>
			<input  maxlength="100" type="text" name="last" placeholder="Lastname"></input>
			<input  maxlength="3" type="text" name="age" placeholder="Age"></input>
			<select  name="sex" placeholder="Sex" size="1">				
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			</select>
			<input  maxlength="100" type="text" name="eaddress" placeholder="Email-Address"></input>
			<input  maxlength="20" type="text" name="phonenumber" placeholder="Phone Number"></input>
			<input  maxlength="20" type="text" name="nino" placeholder="NI-Number"></input>
			<input  maxlength="100" type="text" name="dept" placeholder="Department"></input>
			<input  maxlength="100" type="text" name="login" placeholder="Login"></input>
			<input  maxlength="100" type="text" name="pass" placeholder="Password"></input>
			<select  name="level" placeholder="Level" size="1">				
			<option value="2">Employee</option>
			<option value="1">Admin</option>
			<option value="3">Manager</option>
			</select>
			<button type="submit" name="registerbtn">Enter Record</button>
			
		</form>	


		<!--SEARCH & DELETE USERS-->
		
		<div class="searchdel">
		<div class="div2">Record List</div>
			<div class="searchdel2">
			  		<table class="emprec">
			  			<tr>
			  			<td>ID</td>            			
            			<td>First</td>
            			<td>Last</td>
            			<td>Age</td>
            			<td>Sex</td>
            			<td>Email</td>
            			<td>Phone</td>
            			<td>NI</td>
            			<td>Dept</td>
            			<td>Login</td>
            			<td>Pass</td>
            			<td>Level</td>
            			<td>Delete</td>
        				</tr>

        				<?php
        				while($res = mysqli_fetch_array($result)) {         
            			echo "<tr>";
            			echo "<td>".$res['empid']."</td>";
            			echo "<td>".$res['empfirst']."</td>";
           				echo "<td>".$res['emplast']."</td>";
           				echo "<td>".$res['empage']."</td>";
            			echo "<td>".$res['empsex']."</td>";
           				echo "<td>".$res['empeaddress']."</td>"; 
           				echo "<td>".$res['empphone']."</td>";
            			echo "<td>".$res['empnino']."</td>";
           				echo "<td>".$res['empdept']."</td>"; 
           				echo "<td>".$res['emplogin']."</td>"; 
           				echo "<td>".$res['emppass']."</td>"; 
           				echo "<td>".$res['level']."</td>";     
            			echo "<td><a href=\"../server/delete.php?tid=$res[empid]\">Delete</a></td>";    
            			}
            			?>
        			</table>
				

			</div>
		
		</div>
	</div>
</section>


<?php
include 'footer.php';
?>
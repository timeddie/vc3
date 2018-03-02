<?php 
include 'employeeheader.php';
include '../server/dbh.php';
?>



<?php

	$sql = "SELECT  users.empid, users.empfirst, users.emplast, prodata.montar, prodata.tuetar, prodata.wedtar, prodata.thutar, prodata.fritar, 
				   prodata.monval + prodata.tueval + prodata.wedval +
				   prodata.thuval + prodata.frival AS totalscore, prodata.montar + prodata.tuetar + prodata.wedtar + prodata.thutar + prodata.fritar AS totaltarget
				   FROM users JOIN prodata ON 
				   users.empid = prodata.empid WHERE users.level = 2 ORDER BY totalscore DESC" ;
				   $result = mysqli_query($db, $sql);
               ?>


<script src="../server/sorttable.js"></script>


<section class="main-container">
	<div class="main-wrapper">
		<div class="div2"> 
		Search for an employee's Performance 
			</div>
				<div class="div3">

					
				<?php
				$query = "SELECT showhide FROM leaderboard WHERE tableid = 1";
				$result2 = mysqli_query($db,$query);
 				$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
 				$switch = $row['showhide'];

					if($switch == 1)
					{	
							             	
			            	while($res = mysqli_fetch_array($result)) 
			            	{
					            //Add all 
				    			echo "<tr>";
		            			echo "<td>".$res['empid']."</td>";
		            			echo "<td>".$res['empfirst']."</td>";
		           				echo "<td>".$res['emplast']."</td>";
		           				echo "<td>".$res['totalscore']."</td>"; 
		           				echo "<td>".$res['totaltarget']."</td>";
		           				//Work out percentage of 
		           				
		           				$increase = $res['totalscore'] - $res['totaltarget'];
		           				$increase = ($increase / $res['totaltarget']) * 100;
		           				echo "<td>".number_format((float)$increase, 2, '.', '').'%'."</td>"; //Target total
		           				//if statement below
		           				if ($increase > 0) 
		           				{
		           					$status = '<h1 style="color:#4CA64C">Target Met</h1>';
		           				}elseif ($increase < 0)
		           				{
		           					$status = '<h1 style="color:#990000">Target Not Met</h1>';
		           				}
		           				echo "<td>".$status."</td>";
           					}

           				}
           				if ($switch == 0)
           				{
           					echo 'Leaderboard has been turned off';
           				}

           				?>

           				              
              				

           				
				</div>

			</div>


		</section>
			 

<?php 
include 'footer.php';
?>









<?php
//fetch.php
include '../server/dbh.php';
$output = '';
if(isset($_POST["query"]))
  {
     $search = mysqli_real_escape_string($db, $_POST["query"]);
     $query = "
          SELECT * FROM users 
          WHERE empfirst LIKE '%".$search."%'
          OR emplast LIKE '%".$search."%'
          OR empdept LIKE '%".$search."%'
          AND level = 2 ";
  }else
      {
         $query = "
          SELECT * FROM users WHERE level = 2 ORDER BY empid
         ";
      }
$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) > 0)
{

 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>First name</th>
     <th>Last name</th>
     <th>Department</th>
     <th>Contact</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["empfirst"].'</td>
    <td>'.$row["emplast"].'</td>
    <td>'.$row["empdept"].'</td>
    <td>'.$row["empphone"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
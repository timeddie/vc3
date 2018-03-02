<?php
include 'employeeheader.php';
?>
<?php
  //QUERY FOR ALL THINGS
 $sql = "SELECT * FROM prodata WHERE empid = '$id'";
 $result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
// SET VARIABLES FOR TARGETS
settype($monval, "integer");
settype($tueval, "integer");
settype($wedval, "integer");
settype($thuval, "integer");
settype($frival, "integer");
// SET VARIABLES FOR TARGETS


// ASSIGN ROW VALUES TO EACH VARIABLE 
 $monval = $row['monval'];
 $tueval = $row['tueval'];
 $wedval = $row['wedval'];
 $thuval = $row['thuval'];
 $frival = $row['frival'];
 //TARGETS ASSIGNED
 $montar = $row['montar'];
 $tuetar = $row['tuetar'];
 $wedtar = $row['wedtar'];
 $thutar = $row['thutar'];
 $fritar = $row['fritar'];
// IF IT AINT GOT A VaLUE, SET TO NULL SO TRENDLINE IGNORES

if ($tueval == 0){
   $tueval = 'null';
} 
if ($wedval == 0){
    $wedval = 'null';
} 
if ($thuval == 0){
   $thuval = 'null';
} 
if ($frival == 0){
   $frival = 'null';
}



?>

<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
        
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Day'); // horizontal line <<>>
        data.addColumn('number', 'Achieved'); 
        data.addColumn('number', '' ); 
        data.addRows([
          [1, <?php echo $monval; ?>, <?php echo $montar; ?> ],
          [2, <?php echo $tueval; ?>, <?php echo $tuetar; ?> ], //data brought from SQL query
          [3, <?php echo $wedval; ?>, <?php echo $wedtar; ?> ],
          [4, <?php echo $thuval; ?>, <?php echo $thutar; ?> ],
          [5, <?php echo $frival; ?>, <?php echo $fritar; ?> ]
        ]);
     
        


        // Set chart options
        var options = {'title':'Employee Performance', 'width':630, 'height':300, 'hAxis': {title: 'Day'}, 'vAxis': {title: 'Amount'}, colors: ['#DDA0DD','transparent'],
                        'trendlines': 
                       { 
                          0: { type: 'exponential', opacity: 0.6, lineWidth: 5, enableInteractivity: 'false', color: 'purple'},
                          1: { type: 'exponential', color: 'green', enableInteractivity: 'false', visibleInLegend: 'false'} 
                       }
                   		}; 
                          
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>



<section class="main-container">
	<div class="main-wrapper">
		<div class="div2"> Your Performance </div>
		<div class="div3">
		
			<div id="chart_div"></div>
			
		</div>
	</div>
</section>





<?php
include 'footer.php';
?>
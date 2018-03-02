<?php
 include 'adminheader.php';
 //include 'fetch.php';
?>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"../server/fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

<section class="main-container">
	<div class="main-wrapper">
		
		<!--SEARCH & DELETE USERS-->
		
		<div class="searchdel4">
		<div class="div2">Employee Directory</div>
			<div class="searchdel3">
			  		 
   <br>
   
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>
   
   <br>
   <div id="result"></div>
  

				
			</div>
		
		</div>
	</div>
</section>

















<?php
include 'footer.php';
?>
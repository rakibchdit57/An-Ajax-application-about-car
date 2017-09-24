<?php include "db.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ajax</title>
      <script src="jquery-1.11.0.min.js"></script>
       <script src="jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   --></head>
  <body>
    
    <script>
    	$(document).ready(function(){
            
            $("#action-container").hide();
            setInterval(function(){
                
                update_data();
                
                
                
            },600);
            function update_data()
            {
                $.ajax({
                url: 'display_cars.php',
                type: 'POST',
                success: function(show_car)
                {
                   if(!show_car.error)
                   {
                       $("#show_car").html(show_car);
                   }
                }
             });
            }
            

       /* alert('this is great');*/
        $('#search').keyup(function(){
        var search=$('#search').val();
      /*  alert(search);*/

         
        $.ajax({

         url:'search.php',
         data:{search:search},
         type:'POST',
         success:function(data){

         	if(!data.error)
         	{
         		$('#result').html(data);
         	}
         }
        
        });

       });
   //add car to database table car
      $('#add_to_car_form').submit(function(evt){

      	evt.preventDefault(); 

      	var postData=$(this).serialize();
      	var url=$(this).attr('action');
      	/*alert(postData);
*/
      	$.post(url,postData, function(php_table_data){
      		$('#car_result').html(php_table_data); 
            $('#add_to_car_form')[0].reset();
      	});

      

      });
       
    	});//document ready function


    </script>
   <div id="container" class="col-xs-6 col-xs-offset-3">
   <div class="row">
   <h2>Search Database</h2>
  <input type="text" name='search' class="form-control" id='search' placeholder='Serach our inventory'>
   <h2 class='bg-success' id='result'></h2>

   </div>

   <div class="row">
   <form action="add_car.php" id="add_to_car_form" method="post">
   <div class="form-group">
   <input type="text" name="car_name" class="form-control" required>
   </div>
   <div class="form-group">
   <input type="submit" name="" class="btn btn-primary" value="Add Car">
   </div>

   </form>
<!--   <div class="col-xs-6">
    <div id="car_result"></div>
   	
   </div>-->

   </div>
   <div class="row">
       <div class="col-xs-6">
           <table class="table">
           <thead>
               <tr>
               <th>Id</th>
                   <th>Name</th>
                  
               </tr>
               
               </thead>
               <tbody id="show_car">
               
               
               
               </tbody>
           
           </table>
       </div>
         <div class="col-xs-6">
             <p id="feedback" class="bg-success"></p>
          <div id="action-container">
              
             </div>
       </div>
       
       
    </div>

   </div>
   
  </body>
</html>











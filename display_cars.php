<?php
include("db.php");
$query="SELECT * FROM cars";
$query_car_info=mysqli_query($connection,$query);
if(!$query_car_info)
{
    die('Quary failed'.mysqli_error($connection));
}
 while($row=mysqli_fetch_array($query_car_info))
 {
     echo "<tr>";
     echo "<td>{$row['car_id']}</td>";
     echo "<td><a href='javascript:void(0)' rel='".$row['car_id']."' class='title_link'>{$row['car_name']}</a></td>";
     echo "</tr>";
 }
?>
<script>
   	$(document).ready(function(){
$('.title_link').on('click',function(){
    
    
     $("#action-container").show();
     var id=$(this).attr("rel");
       $.post("proce.php",{id:id},function(data){
           
           
          $("#action-container").html(data);
           
       })
    
    
    
});
        });




</script>
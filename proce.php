<?php include("db.php");

/*echo "Hi rakib";*/
if(isset($_POST['id']))
{
    $car_id=mysqli_real_escape_string($connection,$_POST['id']);
    $query="SELECT * FROM cars WHERE car_id={$car_id}";
    $query_car_info=mysqli_query($connection,$query);
if(!$query_car_info)
{
    die('Quary failed'.mysqli_error($connection));
}
 while($row=mysqli_fetch_array($query_car_info))
 {
     
      echo "<input type='text' rel='".$row['car_id']."' class='form-control car_name_input' value='".$row['car_name']."'>";
      echo "<input type='button' class='btn btn-success update' value='Update'>";
      echo "<input type='button' class='btn btn-danger delete' value='Delete'>";
     /* echo "<tr>";
     echo "<td class='car_id'>{$row['car_id']}</td>";
     echo "<td><a href='#' rel='".$row['car_id']."' class='title_link'>{$row['car_name']}</a></td>";
     echo "</tr>";*/
     
    
 }
}

if(isset($_POST['updatethis']))
{ 
    $id=$_POST['id'];
    $title=$_POST['title'];   
    $query="UPDATE cars SET car_name='{$title}' WHERE car_id=$id";
    $result_set=mysqli_query($connection,$query);
    if(!$result_set)
    {
        die('Quary Failed'.mysqli_error($connection));
    }
}
if(isset($_POST['deletethis']))
{ 
    $id=$_POST['id'];
   
    $query="DELETE FROM cars WHERE car_id=$id";
    $result_set=mysqli_query($connection,$query);
    if(!$result_set)
    {
        die('Quary Failed'.mysqli_error($connection));
    }
    /*echo $id=$_POST['id'];*/
    
}
?>
<script>
   	$(document).ready(function(){
        var id;
        var title;
        var updatethis="update";
        var deletethis="delete";
        
        /**************Extract id and title***********/
        $('.car_name_input').on('input',function(){
            
            
            id=$(this).attr('rel');
            title=$(this).val();
       /*     alert(title);*/
            
        });
        /****************Update****************/
        $('.update').on('click',function(){
            
            
           $.post("proce.php",{id:id,title:title,updatethis:updatethis},function(data){
                 $('#feedback').text("Record Updated");
            /*   alert("Updated ...........");*/
           })
             });
        
         /****************Delete****************/
        $('.delete').on('click',function(){
            
                      var id=$('.title_link').attr('rel');
           $.post('proce.php',{id:id,deletethis:deletethis},function(data){
              $("#action-container").hide();
          /*     alert(id);*/
           })
             });
            
    
        });

   </script> 


 
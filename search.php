<?php include("db.php");?>
<?php

    
    $search=$_POST['search'];
    /*echo $search;*/
    if(!empty($search))
    {
    	$query="SELECT * FROM cars WHERE car_name LIKE '%$search%' ";
    	$search_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($search_query);
       if(!$search_query)
       {
       	die('QUEARY FAILED'.mysqli_error($connection));
       }
        if($count<=0)
        {
            echo "<h1>Sorry not availabe</h1>";
        }
        else
        {
            while ($row=mysqli_fetch_array($search_query)) {
    		
    		$brand=$row['car_name'];
    	
           ?> 
           <ul style="list-style: none;">
           	<?php 
             echo "<li>{$brand} in stock</li>";

            ?>

           </ul>
           <?php

    	}
            
        }
    	
    }

?>



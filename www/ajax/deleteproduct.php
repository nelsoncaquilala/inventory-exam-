<?php 

    include '../connection/data.php';


    $id=isset($_POST['id']) ? $_POST['id']:"";
    
    $msg=0;
                        
            $sel=mysqli_query($con,"DELETE FROM items where id='".$id."' ");
            
        
     echo json_encode($sel);


?>
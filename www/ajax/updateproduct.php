<?php 

include '../connection/data.php';



$name=isset($_POST['name']) ? $_POST['name']: '';
$brand=isset($_POST['brand']) ? $_POST['brand']: '';
$description=isset($_POST['description']) ? $_POST['description']: '';
$units=isset($_POST['units']) ? $_POST['units']: '';
$id=isset($_POST['id']) ? $_POST['id']: '';


$sql="UPDATE items set 
                    name='$name', 
                    brand='$brand',
                    description='$description',
                    unit='$units'
Where id='$id' ";
$res=mysqli_query($con,$sql);

echo json_encode($sql);



?>
<?php 
 include '../connection/data.php';

    $ordernumber=isset($_POST['ordernumber']) ? $_POST['ordernumber']: '';
 	$sql="SELECT * from displayproductdashboard where OrderNo='$ordernumber' and status='Hold'";
 	$res=mysqli_query($con,$sql);
 	if($res)
 	{
 		$ret=array();
 		while($row=mysqli_fetch_array($res))
 		{
 			$ret[]=$row;
 		} 		
 	} 	
 	else
 	{
 		$ret= '-1';

 	}
 	echo json_encode($ret);
?>
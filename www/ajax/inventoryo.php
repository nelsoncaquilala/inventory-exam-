

<?php 

include '../connection/data.php';
// include '../session.php';


$id=isset($_POST['id']) ? $_POST['id']: '';
$qty=isset($_POST['qty']) ? $_POST['qty']: '';
$username=isset($_POST['username']) ? $_POST['username']: '';

$today = date("Y-m-d");


// $mysq=mysqli_query($con,"SELECT * from inventory_in where item_id='$id' and quantity>0 
// order by  id desc");

$mysq=mysqli_query($con,"SELECT * FROM inventory_in 
  WHERE item_id='$id' and quantity>0 
  ORDER BY id asc LIMIT 1");
$myd=mysqli_fetch_array($mysq);
$price=$myd['unit_price'];
$quantity=$myd['quantity'];
$firstid=$myd['id'];

$mysqqq=mysqli_query($con,"SELECT sum(quantity)as quantity FROM inventory_in 
  WHERE item_id='$id' and quantity>0");
$mydq=mysqli_fetch_array($mysqqq);
$quantityy=$mydq['quantity'];
// $date_received=$myd['date_received'];

if($quantityy < $qty)
{
    //insuficient stocks
    echo json_encode(1);
}
else
{
        $my=mysqli_query($con,
        "INSERT INTO inventory_out
        (
            item_id,
            quantity,
            unit_price,
            date_issued,
            issued_by
        )
        VALUES
        (
        '$id',
        '$qty',
        '$price',
        '$today',
        '$username'
        )
        ");
    

        $sql="UPDATE inventory_in set quantity=quantity-$qty 
        Where item_id='$id' and id='$firstid'";
        $res=mysqli_query($con,$sql);

        $mysq11=mysqli_query($con,"SELECT * FROM inventory_in 
        WHERE item_id='$id' and quantity<0 
        ORDER BY id asc LIMIT 1");
        $myd11=mysqli_fetch_array($mysq11);
        $quantity11=$myd11['quantity'];
        // $netqty=$quantity($quantity11);


        //for minus the asccending value
        $sq="UPDATE inventory_in set quantity=$quantity11+quantity
        WHERE item_id='$id' and quantity>0 
        ORDER BY id asc LIMIT 1";
        $re=mysqli_query($con,$sq);

        //for minus the negative value
        $sqll="UPDATE inventory_in set quantity=0
        Where item_id='$id' and quantity<0  ";
        $ress=mysqli_query($con,$sqll);

        echo json_encode(2);
}
    

?>

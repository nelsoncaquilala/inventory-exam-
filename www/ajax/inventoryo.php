

<?php 

include '../connection/data.php';
// include '../session.php';


$id=isset($_POST['id']) ? $_POST['id']: '';
$qty=isset($_POST['qty']) ? $_POST['qty']: '';
$username=isset($_POST['username']) ? $_POST['username']: '';

$today = date("Y-m-d");


$mysq=mysqli_query($con,"SELECT * from inventory_in where item_id='$id' and quantity>0 
order by  date_received desc");
$myd=mysqli_fetch_array($mysq);
$price=$myd['unit_price'];
$quantity=$myd['quantity'];
$date_received=$myd['date_received'];

if($quantity < $qty)
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
    Where id='$id' and date_received='$date_received'";
    $res=mysqli_query($con,$sql);

    echo json_encode(2);
}
    

?>
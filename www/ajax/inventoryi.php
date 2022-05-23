

<?php 

include '../connection/data.php';
include '../session.php';


$id=isset($_POST['id']) ? $_POST['id']: '';
$qty=isset($_POST['qty']) ? $_POST['qty']: '';
$price=isset($_POST['price']) ? $_POST['price']: '';
$today = date("Y-m-d");


$mysq=mysqli_query($con,"SELECT * from inventory_in where item_id='$id' and date_received='$today' and  received_by='$username' ");
$myd=mysqli_fetch_array($mysq);
$qt=$myd['quantity'];

    $my=mysqli_query($con,
    "INSERT INTO inventory_in
    (
        item_id,
        quantity,
        unit_price,
        date_received,
        received_by
    )
    VALUES
    (
    '$id',
    '$qty',
    '$price',
    '$today ',
    '$username'
    )
    ");
    echo json_encode($my);



?>

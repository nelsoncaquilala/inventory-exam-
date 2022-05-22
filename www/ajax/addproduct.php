

<?php 

include '../connection/data.php';
// include '../session.php';


$id=isset($_POST['id']) ? $_POST['id']: '';
$name=isset($_POST['name']) ? $_POST['name']: '';
$brand=isset($_POST['brand']) ? $_POST['brand']: '';
$pdescription=isset($_POST['pdescription']) ? $_POST['pdescription']: '';
$units=isset($_POST['units']) ? $_POST['units']: '';



$sel=mysqli_query($con,"SELECT * FROM items where name='$name'");
$f=mysqli_fetch_array($sel);
if($f)
{
    echo json_encode(1);
}
else
{
    $my=mysqli_query($con,
    "INSERT INTO items
    (
        id,
        name,
        brand,
        description,
        unit
    )
    VALUES
    (
    '$id',
    '$name',
    '$brand',
    '$pdescription',
    '$units'
    )
    ");
    echo json_encode(2);
}
?>
<?php 
    error_reporting(0);
    session_start();
    include 'connection/data.php';
    include('session.php');
    if(!isset($_SESSION['username']))
    {
        header("Location:index.php");
    }
    $today = date("Y-m-d");
    $number=0;
    $sele=mysqli_query($con,"SELECT EXISTS (SELECT * FROM items)as identity;") ;
    $my=mysqli_fetch_array($sele);
    $e=$my['identity'];
    if($e=='0')
    {

        $numberr = 1;
        $number = sprintf('%04d',$numberr);
    }
    else
    {
      $m=mysqli_query($con,"SELECT * FROM items order by id desc limit 1");
      $g=mysqli_fetch_array($m);
      $gd=$g['id'];
      $numberr = $gd+1;
      $number = sprintf('%04d',$numberr);
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" /> -->
<link rel="stylesheet" type="text/css" href="sweetalert_css/sweetalert.css">
<link rel="stylesheet" href="css/home.css">
  <script type="text/javascript" src="sweetalert_js/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    .branchess
    {
      border-bottom:5px solid blue !important;
    }
  </style>
  <title>ADMIN_TOOL / PRODUCTS</title>
</head>

<body>
<div style="width: 100%;float:left;background-color: #555;">
  <button class="tablink" style="width:15%;" onclick="openPage('Admintools', this, 'blue')" id="defaultOpen">Admin Tools</button>
  <button class="tablink" onclick="openPage('inventory', this, 'blue')">Inventory</button>
  <button class="tablink" onclick="openPage('reporting', this, 'blue')">Reporting</button>
  <button class="tablink clos" >Logout</button>
  <button class="tablink" style="float: right;width:20%;text-align:center;font-weight:900;border-left:2px solid gray;text-transform: uppercase;"><?php echo $username;?></button>
  <button class="tablink" style="float: right;width:20%;text-align:center;font-weight:900"><span id="time"></span></button>
</div>


<div id="Admintools" class="tabcontent">
    <div style="background-color: lightgray;padding:0px 0px;width:100%">
      <div style='width:99%; margin:auto;border:none;'>
        <a href="products.php"><button class="tablinks  branchess"><img src="img/package.png" alt="" class="alllogo"><br><b>Products</b></button></a>
        <!-- <a href="adminproducts.php"><button class="tablinks  "><img src="img/branch.png" alt="" class="alllogo"><br><b>Products</b></button></a> -->
     </div>
    </div><br>



      <!-- start productcode -->
    <div class="ro homeAdmintoolbranch" style='display:block;'>
      <div>
          <div class="col-md-2">
              <table >
                <tr>
                  <td><h4 class='text-center'><b>ADD PRODUCT</b></h4></td>
                </tr>
                <tr>
                  <td ><label for="inputAddress">Product ID</label><input type="text" class="form-control id" placeholder="" value='<?php echo $number; ?>' readonly></td>
                </tr>
                <tr>
              
                  <td>  <label for="inputAddress2">Product Name</label><input type="text" class="form-control name" ></td>
                </tr>
                <tr>
              
                  <td>   <label for="inputAddress2">Product Brand</label> <input type="text" class="form-control brand" ></td>
                </tr>
                <tr>
              
                  <td>   <label for="inputAddress2">Product Description</label> <input type="text" class="form-control pdescription" ></td>
                </tr>
                <tr>
                
                  <td> <label for="inputState">Product Unit</label> <select id="inputState" class="form-control units">
                  <option selected>Kgs</option>
                  <option>Pcs</option>
                  <option>Pack</option>

                </select></td>
                </tr>
                <tr>
                  <td><br> <button type="submit"  class="btn btn-primary add" style='width:100%'>ADD PRODUCT</button></td>
                  
                </tr>
                <tr>
                <td><button type="submit"  class="btn btn-info new" style='display:none;width:100%'>ADD NEW</button></td>
                </tr>
              </table>
            
          </div>
          </div>
          <div class="col-md-10 ">
            <table id="example" class="table table-striped table-bordered cl" style='width:100%'>
              <thead >
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Brand</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Units</th>
                <th scope="col" style='text-align:center'>Action</th>
              </thead>
              <tbody>
              <?php 
                //  include('connection/data.php');
                $displayy=mysqli_query($con,"SELECT * from items "); 
                while($rows=mysqli_fetch_array($displayy)){
                
              ?>
                <tr style='text-align:left'>
              
                  <td><?php echo sprintf('%04d',$rows['id']); ?></td>
                  <td><?php echo $rows['name'] ?></td>
                  <td><?php echo $rows['brand'] ?></td>
                  <td><?php echo $rows['description'] ?></td>
                  <td><?php echo $rows['unit'] ?></td>

                  <td align='center'><button class='btn btn-info btn-sm editt' id="<?php echo $rows['id'];  ?>" name="<?php echo $rows['name'];  ?>" brand="<?php echo $rows['brand'];?>" description="<?php echo $rows['description'];?>" units="<?php echo $rows['unit'];?>">Edit</button>&nbsp;
                  <button class='btn btn-danger btn-sm delete' id="<?php echo $rows['id'];  ?>">Delete</button></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
    </div>
  </div>
  <!-- end of productcode -->
</div><br>
</div>

<div id="reporting" class="tabcontent">
        <div style="background-color: lightgray;padding:0px 0px;width:100%">
              <div style='width:99%; margin:auto;border:none;'>
              <a href="report.php"><button class="tablinks  ">
                <img src="img/report.png" alt="" class="alllogo"><br><b>Report</b></button></a>
              </div>
        </div>
</div>
<div id="inventory" class="tabcontent">
<div style="background-color: lightgray;padding:0px 0px;width:100%">
      <div style='width:99%; margin:auto;border:none;'>
      <a href="inventoryin.php"><button class="tablinks  ">
        <img src="img/import.png" alt="" class="alllogo"><br><b>Inventory In</b></button></a>
        <a href="inventoryout.php"><button class="tablinks  ">
        <img src="img/demand.png" alt="" class="alllogo"><br><b>Inventory out</b></button></a>
        <a href="inventorystocks.php"><button class="tablinks  ">
        <img src="img/checklist.png" alt="" class="alllogo"><br><b>Total Stocks</b></button></a>
      </div>
    </div>
</div>


<?php include 'modal.php' ;?>
<script>
            $(document).ready(function(){
                $('#example').DataTable();
            });
            $('.clos').click(function(){
                window.close();
            });
            var timeDisplay = document.getElementById("time");
            function refreshTime() {
            var dateString = new Date().toLocaleString("en-US", {timeZone: "Asia/Manila"});
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.innerHTML = formattedString;
            }
            setInterval(refreshTime, 1000);
            function openPage(pageName,elmnt,color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
</script>

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/for_ajax_functionalities/homeAdmintoolproductt.js"></script>
</body>
</html> 

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


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="sweetalert_css/sweetalert.css">
<link rel="stylesheet" href="css/home.css">
  <script type="text/javascript" src="sweetalert_js/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title>DASHBOARD / HOME</title>
</head>
<body>


   
<?php
  if($role=='staff')
    {
     ?>
        <div style="width: 100%;float:left;background-color: #555;">
        <button class="tablink" onclick="openPage('inventory', this, 'blue')" id="defaultOpen">Inventory</button>
        <button class="tablink clos" >Logout</button>
        <button class="tablink" style="float: right;width:20%;text-align:center;font-weight:900;border-left:2px solid gray;text-transform: uppercase;"><?php echo $username;?></button>
        <button class="tablink" style="float: right;width:20%;text-align:center;font-weight:900"><span id="time"></span></button>
      </div>
      <div id="inventory" class="tabcontent">
          <div style="background-color: lightgray;padding:0px 0px;width:100%">
            <div style='width:99%; margin:auto;border:none;'>
            <a href="inventoryin.php"><button class="tablinks  ">
              <img src="img/import.png" alt="" class="alllogo"><br><b>Inventory In</b></button></a>
              <a href="inventoryout.php"><button class="tablinks  ">
              <img src="img/demand.png" alt="" class="alllogo"><br><b>Inventory out</b></button></a>
            
            <!-- <a href="adminproducts.php"><button class="tablinks  "><img src="img/branch.png" alt="" class="alllogo"><br><b>Products</b></button></a> -->
            </div>
          </div>
      </div>
<?php }
else
{
 ?>
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
                    <a href="products.php"><button class="tablinks  ">
                      <img src="img/package.png" alt="" class="alllogo"><br><b>Products</b></button></a>
                    </div>
              </div>
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
            <!-- <a href="adminproducts.php"><button class="tablinks  "><img src="img/branch.png" alt="" class="alllogo"><br><b>Products</b></button></a> -->
            </div>
          </div>
      </div>
  <?php } ?>
  







<script type="text/javascript">
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

          $(document).ready(function(){
          $('.clos').click(function(){
            window.close('home.php', '');
          });
          });
</script>

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
</body>
</html> 
<?php 

 

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

    $tra=mysqli_query($con,"SELECT * from postransaction order by SequenceNumber desc limit 1");
    $mm=mysqli_fetch_array($tra);
    $TransactionNo=$mm['TransactionNo']+1;
    $TransactionN = sprintf('%015d',$TransactionNo);

    $traa=mysqli_query($con,"SELECT * from salestransactionsummary where UserID='$username' 
    and TransactionDate='$today'");
    $mmd=mysqli_fetch_array($traa);
    $cashiertransno=$mmd['CashierTransNo'];


   
    $cashh=mysqli_query($con,"SELECT Cash from cashbeginning");
    $mys=mysqli_fetch_array($cashh);
    $ca=$mys['Cash'];


    $number=0;
    $sele=mysqli_query($con,"SELECT EXISTS (SELECT * FROM Products)as identity;") ;
    $my=mysqli_fetch_array($sele);
    $e=$my['identity'];
    if($e=='0')
    {
        // echo json_encode(0);
        $numberr = 5;
        $number = sprintf('%07d',$numberr);
    }
    else
    {
      $m=mysqli_query($con,"SELECT * FROM Products order by Productcode desc limit 1");
      $g=mysqli_fetch_array($m);
      $gd=$g['Productcode'];
      $numberr = $gd+5;
      $number = sprintf('%07d',$numberr);
    }
    

    $msgg=0;
    $name='';
    
    $selects=mysqli_query($con,"SELECT * from postransaction  order by SequenceNumber desc limit 1");
    $mm=mysqli_fetch_array($selects);
    $date=$mm['DateAdded'];
    $type=$mm['Type'];
    $ExecuteBy=$mm['ExecuteBy'];
    if($type=='ENDOFDAY')
    {
      // $msgg=7;
          $selectsda=mysqli_query($con,"SELECT EXISTS (SELECT * FROM POSTransaction where DateAdded='$today') as datee;");
          $dmm=mysqli_fetch_array($selectsda);
          $value=$dmm['datee'];
            if($value=='0')
            {
              $msgg=0;
            }
            else
            {
              $msgg=7;
            }
    }
    else
    {
          //last date
            $traaa=mysqli_query($con,"SELECT TransactionDate from salestransactionsummary 
            order by TransactionDate desc limit 1");
            $mmdd=mysqli_fetch_array($traaa);
            $TransactionDate=$mmdd['TransactionDate'];

            if($TransactionDate==$today)
            {
                    $sele=mysqli_query($con,"SELECT EXISTS(SELECT * FROM displayproductdashboard
                    WHERE status='Pending') as identity");
                    $my=mysqli_fetch_array($sele);
                    $e=$my['identity'];
                    if($e=='1')
                    {
                            // $msg='1';
                            $sele=mysqli_query($con,"SELECT * FROM displayproductdashboard;");
                            $fetch=mysqli_fetch_array($sele);
                            $status=$fetch['status'];
                            if($status=='Pending')
                            {
                              //pending
                              $msgg='1';
                            }
                    }
                    else
                    {
                            $sele=mysqli_query($con,"SELECT * FROM displayproductdashboard;");
                            $fetch=mysqli_fetch_array($sele);
                            $status=$fetch['status'];
                            if($status=='Hold')
                            {
                              //hold
                              $msgg='2';
                            }
                            else
                            {
                              $selects=mysqli_query($con,"SELECT * from postransaction where DateAdded='$today' and ExecuteBy='$username'
                               order by SequenceNumber desc limit 1");
                              $mm=mysqli_fetch_array($selects);
                              $date=$mm['DateAdded'];
                              $type=$mm['Type'];
                              
                              if($type=='SALES' || $type=='CASHBEGIN')
                              {
                                $msgg='5';
                              }
                              else
                              {
                                // $msgg='3';

                                // $ttr=mysqli_query($con,"SELECT TransactionDate from salestransactionsummary where
                                // order by TransactionDate desc limit 1");
                                // $ttrr=mysqli_fetch_array($ttr);
                                // $da=$ttrr['TransactionDate'];
                                // if($da!=$today)
                                // {
                                //   $msgg='8';
                                // }
                                // else
                                // {
                                  $tr=mysqli_query($con,"SELECT isOpen from salestransactionsummary 
                                  where TransactionDate='$today' and isOpen='1'");
                                  $trr=mysqli_fetch_array($tr);
                                  $isOpen=$trr['isOpen'];
                                  if($isOpen=='1')
                                  {
                                    $msgg='3';
                                    $name='';
                                  }
                                  else
                                  {
                                    $msgg='6';
                                  }
                                // }

                                
                                

                              }
                            }
                    }  
            }
            else
            {
              $msgg='4';
            }
    }

   
    
// ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo

$message=0;

$sele=mysqli_query($con,"SELECT EXISTS(SELECT dateadded,Type FROM POSTransaction)as datee;") ;
     $my=mysqli_fetch_array($sele);
     $e=$my['datee'];
     if($e=='0')
     {
                // echo "<script>window.location.href = 'PosOpen.php';</script>";
                $message=1; // PosOpen.php
               //  echo "open  PosOpen.php";
                 
     }
     else
     {
               $selects=mysqli_query($con,"SELECT * from postransaction  order by SequenceNumber desc limit 1");
               $mm=mysqli_fetch_array($selects);
               $date=$mm['DateAdded'];
               if($date==$today)
               {
                       $selects=mysqli_query($con,"SELECT * from postransaction  order by SequenceNumber desc limit 1");
                       $mm=mysqli_fetch_array($selects);
                       $date=$mm['DateAdded'];
                       $type=$mm['Type'];
                       $ExecuteBy=$mm['ExecuteBy'];
                       if($type=='ENDOFDAY')
                       {
                           // echo "<script>window.location.href = 'home.php?msg=2';</script>";
                           if($date!=$today)
                           {
                               echo 'goto PosOpen.php';
                           }
                           else
                           {
                              //  echo "<script>window.location.href = 'home.php?msg=2';</script>";
                               $message=2; // You cannot open this application, youll already end of day. Try again tommorrow.
                           }
                       }
                       else if($type=='CLOSE_TRANSACTION')
                       {
                                       if($ExecuteBy==$username)
                                       {
                                           // echo 'this account is close';
                                          //  echo "<script>window.location.href = 'home.php?msg=1';</script>";
                                           $message=3; // You cannot open this application, You already close your transaction.
                                       }
                                       else{
                                           $m=mysqli_query($con,"SELECT * FROM salestransactionsummary where
                                           TransactionDate='$today' and UserID='$username' and isOpen='1' ");
                                           $fet=mysqli_fetch_array($m);
                                           $id=$fet['UserID'];
                                           $dat=$fet['TransactionDate'];
                                           if($id==$username && $dat==$today)
                                           {
                                              //  echo "<script>window.location.href = 'pos.php';</script>";
                                              $message=4;// Pos.php
                                           }
                                           else
                                           {
                                                $mm=mysqli_query($con,"SELECT * FROM postransaction 
                                                where DateAdded='$today' and Type='CLOSE_TRANSACTION' and ExecuteBy='$username'");
                                                $fett=mysqli_fetch_array($mm);
                                                $type=$fett['Type'];
                                                $ExecutedBy=$fett['ExecuteBy'];
                                                $dat=$fett['DateAdded'];
                                                if($ExecutedBy==$username && $type=='CLOSE_TRANSACTION')
                                                {
                                                  $message=3; // You cannot open this application, You already close your transaction.
                                                }
                                                else 
                                                {
                                                  $message=1; // PosOpen.php
                                                }
                                               
                                                // $message=1; // PosOpen.php
                                           }
                                           
                                       }
                                   
                       }
                       else
                       {
                           $selectss=mysqli_query($con,"SELECT * from postransaction where DateAdded='$today' and ExecuteBy='$username' order by SequenceNumber desc limit 1");
                           $mmm=mysqli_fetch_array($selectss);
                           $Execute=$mmm['ExecuteBy'];
                          if($Execute==$username)
                          {
                         

                                           $m=mysqli_query($con,"SELECT * FROM salestransactionsummary where
                                           TransactionDate='$today' and UserID='$username' ");
                                           $fet=mysqli_fetch_array($m);
                                           $open=$fet['isOpen'];
                                           if($open=='1')
                                           {
                                              //  echo "<script>window.location.href = 'pos.php';</script>";
                                              $message=4;// Pos.php
                                           }
                                           else
                                           {
                                              //  echo "<script>window.location.href = 'home.php?msg=1';</script>";
                                              $message=3; // You cannot open this application, You already close your transaction.
                                           }
                          }
                          else
                          {
                            $message=1; // PosOpen.php
                          }
                           // echo "<script>window.location.href = 'pos.php';</script>";
                       }
                   // echo 'exact date';
               }
               else
               {
                  
                   // echo "<script>window.location.href = 'home.php?msg=3';</script>";

                   
                   $selects=mysqli_query($con,"SELECT * from postransaction where Type='ENDOFDAY' order by SequenceNumber desc limit 1");
                       $mm=mysqli_fetch_array($selects);
                       $Type=$mm['Type'];
                       if($Type=='ENDOFDAY')
                       {
                            
                            $selectst=mysqli_query($con,"SELECT * from postransaction order by SequenceNumber desc limit 1");
                            $mt=mysqli_fetch_array($selectst);
                            $Typee=$mt['Type'];
                            if($Typee=='CASHBEGIN' || $Typee=='SALES')
                            {
                              $message=5;//The System found out that some transactions are still not yet END OF DAY process , Please contact your Admin!
                            }
                            else 
                            {
                              $message=1; // PosOpen.php
                            }

                       }
                       else
                       {
                          //  echo "<script>window.location.href = 'home.php?msg=3';</script>";
                          $message=5; //The System found out that some transactions are still not yet END OF DAY process , Please contact your Admin!
                       }
                       
               }
     }
    
$machine_name=gethostname();//machined used
$begin='CASHBEGIN';

$ms=0;

//     $number = 1;
// $number = sprintf('%010d',$number);
// print $number;

    if(isset($_POST['submit']))
    {
                    $cbegin=$_POST['cbegin'];
                    $date=$_POST['date'];
                    $branchcode=$_POST['branchcode'];
                    $cashiername=$_POST['cashiername'];

                      $sele=mysqli_query($con,"SELECT EXISTS (SELECT * FROM POSTransaction) as datee;") ;
                $my=mysqli_fetch_array($sele);
                $e=$my['datee'];
                if($e=='0')
                {
                   $number = 1;
                   $CashierTransNo=1;
                   $isupload=0;
                   $TransactionNo = sprintf('%015d',$number);

                   $quer=mysqli_query($con,"INSERT INTO postransaction(BranchCode,TransactionNo,MachineUsed,Type,DateAdded,ExecuteBy)
                      VALUES('$branchcode','$TransactionNo','$machine_name','$begin','$today','$username') ");


                            $inser=mysqli_query($con,"INSERT INTO `pos`.`salestransactionsummary`
                            (`BranchCode`,
                            `CashierTransNo`,
                            `TransactionDate`,
                            `UserID`,
                            `BeginningCash`,
                            `BeginningSI`,
                            `EndingSI`,
                            `BeginningTransactionNo`,
                            `EndingTransactionNo`,
                            `BeginningReturnTransNo`,
                            `EndingReturnTransNo`,
                            `NextBeginningCash`,
                            `TransactionBegin`,
                            `NoOfSoldItem`,
                            `TotalSoldItem`,
                            `NoOfCancelledItem`,
                            `TotalCancelledItem`,
                            `NoOfVoidItem`,
                            `TotalVoidItem`,
                            `NoOfReturnedItem`,
                            `TotalReturnedSales`,
                            `NoOfDiscount`,
                            `TotalDiscount`,
                            `NoOfSCDisc`,
                            `TotalSCDisc`,
                            `NoOfPWDDisc`,
                            `TotalOfPWDDisc`,
                            `NoOfRegDisc`,
                            `TotalOfRegDisc`,
                            `NoOfCharges`,
                            `TotalCharge`,
                            `NoOfTaxItem`,
                            `TotalTax`,
                            `TotalSales`,
                            `TotalCashSales`,
                            `TotalCreditSales`,
                            `TotalActualCash`,
                            `TotalNetSales`,
                            `TotalCoins`,
                            `CashRemitted`,
                            `OpenBy`,
                            `ClosedBy`,
                            `DateClosed`,
                            `isOpen`,
                            `DateOpen`,
                            `isUpload`,
                            `Shortage`,
                            `Overage`,
                            `TotalVatableSales`,
                            `TotalVatExemptSales`,
                            `TotalNetSalesOfVat`,
                            `TotalVatAmount`,
                            `TotalZeroRatedSale`,
                            `VatAdjustment`,
                            `MachineUsed`)
                            VALUES
                            ('$branchcode',
                            '$CashierTransNo',
                            '$today',
                            '$username',
                            '$ca',
                            '',
                            '',
                            '$TransactionNo',
                            '',
                            '',
                            '',
                            '',
                            '$today',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '$fullname',
                            '',
                            '',
                            '1',
                            '$today',
                            '$isupload',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '$machine_name')");


                   if($quer)
                   {
                    header("Location: pos.php");
                   }
                }
                else
                {
                    
                      $selects=mysqli_query($con,"SELECT * FROM salestransactionsummary where DateOpen='$today' and UserID='$username'");
                      $fees=mysqli_fetch_array($selects);
                    $date=$fees['DateOpen'];
                    $CashierTransNo=$fees['CashierTransNo']+1;
                    if($date==$today)
                    {
                        // $ms=1;
                        echo "<script>window.location.href = 'home.php?ms=4';</script>";
                    }
                    else
                    {

                        $select=mysqli_query($con,'SELECT * FROM postransaction order by TransactionNo  desc limit 1');
                    $fee=mysqli_fetch_array($select);
                    $number=$fee['TransactionNo']+1;
                    $trans = sprintf('%015d',$number);


                      $quer=mysqli_query($con,"INSERT INTO postransaction(BranchCode,TransactionNo,MachineUsed,Type,DateAdded,ExecuteBy)
                      VALUES('$branchcode','$trans','$machine_name','$begin','$today','$username') ");
                      

                                    $inser=mysqli_query($con,"INSERT INTO `pos`.`salestransactionsummary`
                                    (`BranchCode`,
                                    `CashierTransNo`,
                                    `TransactionDate`,
                                    `UserID`,
                                    `BeginningCash`,
                                    `BeginningSI`,
                                    `EndingSI`,
                                    `BeginningTransactionNo`,
                                    `EndingTransactionNo`,
                                    `BeginningReturnTransNo`,
                                    `EndingReturnTransNo`,
                                    `NextBeginningCash`,
                                    `TransactionBegin`,
                                    `NoOfSoldItem`,
                                    `TotalSoldItem`,
                                    `NoOfCancelledItem`,
                                    `TotalCancelledItem`,
                                    `NoOfVoidItem`,
                                    `TotalVoidItem`,
                                    `NoOfReturnedItem`,
                                    `TotalReturnedSales`,
                                    `NoOfDiscount`,
                                    `TotalDiscount`,
                                    `NoOfSCDisc`,
                                    `TotalSCDisc`,
                                    `NoOfPWDDisc`,
                                    `TotalOfPWDDisc`,
                                    `NoOfRegDisc`,
                                    `TotalOfRegDisc`,
                                    `NoOfCharges`,
                                    `TotalCharge`,
                                    `NoOfTaxItem`,
                                    `TotalTax`,
                                    `TotalSales`,
                                    `TotalCashSales`,
                                    `TotalCreditSales`,
                                    `TotalActualCash`,
                                    `TotalNetSales`,
                                    `TotalCoins`,
                                    `CashRemitted`,
                                    `OpenBy`,
                                    `ClosedBy`,
                                    `DateClosed`,
                                    `isOpen`,
                                    `DateOpen`,
                                    `isUpload`,
                                    `Shortage`,
                                    `Overage`,
                                    `TotalVatableSales`,
                                    `TotalVatExemptSales`,
                                    `TotalNetSalesOfVat`,
                                    `TotalVatAmount`,
                                    `TotalZeroRatedSale`,
                                    `VatAdjustment`,
                                    `MachineUsed`)
                                    VALUES
                                    ('$branchcode',
                                    '$CashierTransNo',
                                    '$today',
                                    '$username',
                                    '$ca',
                                    '',
                                    '',
                                    '$trans',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '$today',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '$fullname',
                                    '',
                                    '',
                                    '1',
                                    '$today',
                                    '$isupload',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '$machine_name')");
                                    if($quer)
                                    {
                                        header("Location: pos.php");
                                    }
                    }
           
                }

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
    <button class="tablink" onclick="openPage('dashboard', this, 'blue')" >Dashboard</button>
    <button style="width:15%;" class="tablink" onclick="openPage('Admintools', this, 'blue')" id="defaultOpen">Admin Tools</button>
    <button class="tablink sales" onclick="openPage('sales', this, 'blue')" >Sales</button>
    <button class="tablink" onclick="openPage('inventory', this, 'blue')">Inventory</button>
    <button class="tablink" onclick="openPage('About', this, 'blue')">Reporting</button>
    <button class="tablink clos" >Logout</button>
    <button class="tablink" style="float: right;width:20%;text-align:center;font-weight:900;border-left:2px solid gray;text-transform: uppercase;"><?php echo $fullname;?></button>
    <button class="tablink" style="float: right;width:20%;text-align:center;font-weight:900"><span id="time"></span></button>
</div>
<!-- <button class="tablink" onclick="openPage('Contact', this, 'blue')">Logout</button>
<button class="tablink" onclick="openPage('About', this, 'blue')">About</button>
<button class="tablink" onclick="openPage('Contact', this, 'blue')">Logout</button>
<button class="tablink" onclick="openPage('About', this, 'blue')">About</button>
<button class="tablink" onclick="openPage('Contact', this, 'blue')">Logout</button> -->


<div id="Admintools" class="tabcontent">
    <div style="background-color: lightgray;padding:0px 0px;width:100%">
      <div style='width:99%; margin:auto;border:none;'>
        
        <a href="adminbranches.php"><button class="tablinks  " ><img src="img/package.png" alt="" class="alllogo"><br><b>Branches</b></button></a>
        <a href="adminproducts.php"><button class="tablinks  branchess"><img src="img/branch.png" alt="" class="alllogo"><br><b>Products</b></button></a>
        <button class="tablinks  "><img src="img/list.png" alt="" class="alllogo"><br><b>Products Category</b></button>
        <button class="tablinks  " ><img src="img/user.png" alt="" class="alllogo"><br><b>Users Info</b></button>
        <button class="tablinks  " ><img src="img/padlock.png" alt="" class="alllogo"><br><b>Users Access</b></button>
     
      </div>
    </div>
     <!-- start PRODUCTS -->
     <div class="ro homeAdmintoolbranch" style='display:block;margin-top:10px;'>
      <div>
        <div class="col-md-12">
        <table cellspadding='2' cellspacing='20' class='productstable'>
              <tr>
                <td colspan='7'><h4 class='text-center'><b> ADD PRODUCT</b> </h4></td>
              </tr>
              <tr>
                <td><label for="inputAddress2">Product Code</label>
                <input type="text" class="form-control productcode" value='<?php echo $number; ?>' readonly>
              </td>
              </tr>
              <tr>
              <td style='width:15%'> <label for="inputState">Product Category</label>
               <select id="inputState" class="form-control productcategory">

               <option value=""></option>
                <option>Active</option>
                <option>Deactive</option>
              </select></td>
              <td colspan="2"><label for="inputAddress2">Product Description</label>
              <input type="text" class="form-control productdescription" ></td>
              <td colspan="2"><label for="inputAddress">Barcode</label>
              <input type="text" class="form-control productbarcode" placeholder=""></td>  
              <td ><label for="inputAddress">Landing Cost</label>
              <input type="text" class="form-control landingcost" placeholder="0.00"  ></td>
                <td ><label for="inputAddress">Selling Price</label>
                <input type="text" class="form-control sellingprice" placeholder="0.00"  ></td>
                <td>   <label for="inputAddress2">Price 1</label> 
                <input type="text" class="form-control price1" placeholder="0.00"></td>
                
            </tr>
              <tr>
             
              <td><label for="inputAddress2">Price 2</label>
                <input type="text" class="form-control price2" placeholder="0.00"></td>
                <td ><label for="inputAddress">Price 3</label>
                <input type="text" class="form-control price3" placeholder="0.00"  ></td>
                <td ><label for="inputAddress">Price 4</label>
                <input type="text" class="form-control price4" placeholder="0.00" ></td>
                
                <td> <label for="inputState">Product Status</label> <select id="inputState" class="form-control productstatus">
                <option selected>Active</option>
                <option>Deactive</option>
              </select></td>
                <td style='text-align:center;width:3%'><label for="inputAddress" >IsVat</label>
                <input  type="checkbox" class="form-control isvatt" placeholder=""  > 
                <input type="text" class='isvat' style='display:none' value='0'>
              </td>
     
              
                <td><br> <button type="submit"  class="btn btn-primary addproduct" style='width:100%'>ADD NEW PRODUCT</button></td>
                
            </tr>
           
        
<!--               
              <tr>
              <td><button type="submit"  class="btn btn-info new" style='display:none;width:100%'>ADD NEW</button></td>
              </tr> -->
            </table>
        </div>
      </div>
    </div>

<!-- end of branche -->
        <div class="col-md-12 " style='margin-top:10px;'>
          <table id="examplee" class="table table-striped table-bordered cl" style='width:100%'>
            <thead >
              <th scope="col">Product Code</th>
              <th scope="col">Product Description</th>
              <th scope="col">Product Category</th>
              <th scope="col">Product Barcode</th>
              <th scope="col">Landing Cost</th>
              <th scope="col">Selling Price</th>
              <th scope="col">Price 1</th>
              <th scope="col">Price 2</th>
              <th scope="col">Price 3</th>
             
    
              <th scope="col">IsVat</th>
              <th scope="col">Status</th>
              <th scope="col" style='text-align:center'>Action</th>
            </thead>
            <tbody>
            <?php 
              //  include('connection/data.php');
              $displayy=mysqli_query($con,"SELECT * from Products order by Productcode desc"); 
              while($rows=mysqli_fetch_array($displayy)){
              
            ?>
           
              <tr style='text-align:left'>
             
                <td><?php echo $rows['Productcode'] ?></td>
                <td><?php echo $rows['Description'] ?></td>
                <td><?php echo $rows['ProductCategoryCode'] ?></td>
                <td><?php echo $rows['Barcode'] ?></td>
                <td style='width:3%'><?php echo $rows['LandingCost'] ?></td>
                <td style='width:3%'><?php echo $rows['SellingPrice'] ?></td>
                <td style='width:3%'><?php echo $rows['Price1'] ?></td>
                <td style='width:3%'><?php echo $rows['Price2'] ?></td>
                <td style='width:3%'><?php echo $rows['Price3'] ?></td>
     
                <td style='width:3%'><?php echo $rows['isVat'] ?></td>
                <td><?php echo $rows['status'] ?></td>


                <td align='center'><button class='btn btn-info btn-sm editt' Code="<?php echo $rows['Productcode'];  ?>" UPBranchName="<?php echo $rows['Description'];  ?>" UPstatus="<?php echo $rows['status'];?>" >Edit</button>&nbsp;
                <button class='btn btn-danger btn-sm delete' Code="<?php echo $rows['Productcode'];  ?>">Delete</button></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
  </div>
</div>
<!-- end of PRODUCTS -->
</div>
                  









<div id="inventory" class="tabcontent">
    <div style="background-color: lightgray;padding:0px 0px;width:100%">
      <div style='width:99%; margin:auto;border:none;'>
        <button class="tablinks  "><img src="img/branch.png" alt="" class="alllogo"><br><b>Branches</b></button>
        <button class="tablinks  " ><img src="img/package.png" alt="" class="alllogo"><br><b>Products</b></button>
        <button class="tablinks  "><img src="img/list.png" alt="" class="alllogo"><br><b>Products Category</b></button>
        <button class="tablinks  " ><img src="img/user.png" alt="" class="alllogo"><br><b>Users Info</b></button>
        <button class="tablinks  " ><img src="img/padlock.png" alt="" class="alllogo"><br><b>Users Access</b></button>
        <!-- <button class="tablinks " style="width:90px;margin-left:5px"><img src="img/branch.png" alt="" class="alllogo"><br><b>USERS INFO</b></button>
        <button class="tablinks " style="width:90px;margin-left:5px"><img src="img/branch.png" alt="" class="alllogo"><br><b>USERS INFO</b></button>
        <button class="tablinks " style="width:90px;margin-left:5px"><img src="img/branch.png" alt="" class="alllogo"><br><b>USERS INFO</b></button>
        <button class="tablinks " style="width:90px;margin-left:5px"><img src="img/branch.png" alt="" class="alllogo"><br><b>USERS INFO</b></button>
        <button class="tablinks " style="width:90px;margin-left:5px"><img src="img/branch.png" alt="" class="alllogo"><br><b>USERS INFO</b></button>
        <button class="tablinks " style="width:90px;margin-left:5px"><img src="img/branch.png" alt="" class="alllogo"><br><b>USERS INFO</b></button> -->
      </div>
    </div>
</div>


<div id="Contact" class="tabcontent">
  <h3>Contact</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="About" class="tabcontent">
  <h3>About</h3>
  <p>Who we are and what we do.</p>
</div>
<?php include 'modal.php' ;?>

<script>


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
        $('#examplee').DataTable();


        
        $('table.productstable td input:text').bind('keydown', function(e) {
                // detecting keycode returned from keydown and comparing if its equal to 13 (enter key code)
                            if (e.keyCode == 13) {
                                        // by default if you hit enter key while on textbox so below code will prevent that default behaviour
                                        e.preventDefault();
                                        // getting next index by getting current index and incrementing it by 1 to go to next textbox
                                        var nextIndex = $('table.productstable td input:text').index(this) + 1;
                                        // getting total number of textboxes on the page to detect how far we need to go
                                        var maxIndex = $('table.productstable td input:text').length;
                                        // check to see if next index is still smaller then max index
                                        if (nextIndex < maxIndex) {
                                        // setting index to next textbox using CSS3 selector of nth child
                                        $('table.productstable td input:text:eq(' + nextIndex+')').focus();
                                        }
                            }
                            if (e.keyCode == 37) {
                                        // by default if you hit enter key while on textbox so below code will prevent that default behaviour
                                        e.preventDefault();
                                        // getting next index by getting current index and incrementing it by 1 to go to next textbox
                                        var nextIndex = $('table.productstable td input:text').index(this) - 1;
                                        // getting total number of textboxes on the page to detect how far we need to go
                                        var maxIndex = $('table.productstable td input:text').length;
                                        // check to see if next index is still smaller then max index
                                        if (nextIndex < maxIndex) {
                                        // setting index to next textbox using CSS3 selector of nth child
                                        $('table.productstable td input:text:eq(' + nextIndex+')').focus();
                                        }
                            }
                            if (e.keyCode == 39) {
                                        // by default if you hit enter key while on textbox so below code will prevent that default behaviour
                                        e.preventDefault();
                                        // getting next index by getting current index and incrementing it by 1 to go to next textbox
                                        var nextIndex = $('table.productstable td input:text').index(this) + 1;
                                        // getting total number of textboxes on the page to detect how far we need to go
                                        var maxIndex = $('table.productstable td input:text').length;
                                        // check to see if next index is still smaller then max index
                                        if (nextIndex < maxIndex) {
                                        // setting index to next textbox using CSS3 selector of nth child
                                        $('table.productstable td input:text:eq(' + nextIndex+')').focus();
                                        }
                            }
            });
                // arrow key used
    });
    $('.clos').click(function(){
    window.close();
});
</script>


<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/for_ajax_functionalities/endofday.js"></script>
<script src="js/for_ajax_functionalities/homeAdmintoolbranch.js"></script>
<script src="js/for_ajax_functionalities/homeAdminProducts.js"></script>

<script src="js/for_ajax_functionalities/clickendofday_pos.js"></script>


</body>
</html> 
<?php 

 
    $ms=$_GET['ms'];
    
    if($ms=='4')
    {
      echo '
      <script>
          swal({
            title: "",
            text: "Ops!, Please check your computer date, make sure you are in current date, Then please try again.",
            timer: 8000,
            showConfirmButton: true,
            type:"error"
            });
            $(".sales").click();
        </script>';
    }
    if($ms=='5')
    {
      echo '
      <script>
          swal({
            title: "",
            text: "Successfully End of Day",
            icon: "success",
            button: "OK",
            });
        </script>';
    }

 ?>


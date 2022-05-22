


<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modalchange" 
data-target="#myModal_change">Launch demo modal</button>

<!-- Modal for message after tender -->
<div class="modal" id="myModal_change"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" style="background-color: white;color:darkred;width:30%;border:none;">

         
             
                <div class="modal-body" style="padding:10px 0px;">
                            <table  style="width: 90%;margin:auto;border:none;">
                            <tr>
                                <td style="text-align:center;border:none;color:black; font-weight:900;font-size:25px">TENDER : </td>
                                <td style=" text-align:left;border:none; font-weight:900;font-size:25px" class="tenderr"></td>
                            </tr>
                                <tr>
                                    <td style="text-align:center;border:none;color:darkred; font-weight:900;font-size:40px">CHANGE : </td>
                                    <td style=" text-align:left;border:none; font-weight:900;font-size:40px" class="changee"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <a href="pos.php"  ><button class="btn btn-danger" id="ok" style="width: 100%;">CLOSE</button></a></td>
                                </tr>
                            </table>
                         
                            
                               
                                
                         
                      
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- Modal for message after tender -->

<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modaldiscount" 
data-target="#myModal_discount">Discount</button>

<!-- Modal for message after tender -->
<div class="modal" id="myModal_discount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
            <div class="modal-header" >
                    <button type="button" class="close close_discount" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;">
                         <tr>
                             <td style="width:50%"><h4 class="modal-title" id="myModalLabel" style="font-weight: 900;color:white;">ADD DISCOUNT</h4></td>
                             
                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="background-color: white;">
                <center><table class="tdiscount"  style="width: 90%;">
                <tr>
                                    <td colspan="2" style="text-align: center; color:darkred; font-weight:900" class=""><br><span class="discountmessage"></span><br><br>  </td>
                                </tr>
                                <tr>
                                    <th>Select Discount Category :</th>
                                    <td style="padding: 10px 10px; width:50%;text-align:right;border:none">
                                            <select class="classic form-control" class="discountcategoryy"  style="background-color: transparent;border:1px solid grey;">
                                                
                                                <?php 
                                                    $categ=mysqli_query($con,"SELECT * FROM DiscountCategory");
                                                    while($f=mysqli_fetch_array($categ)){

                                                    
                                                ?>
                                                <option class="classicc" value="<?php echo $f['Description']; ?>"><?php echo $f['Description']; ?></option>
                                                <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                <th>Enter Controlled Number :</th>
                                <td style="padding: 10px 10px; width:50%;text-align:left;border:none;">
                                            <input type="text" class="form-control controlnumber">    
                                </td>
                                </tr>
                                <tr>
                                <th>Customer Name :</th>
                                <td style="padding: 10px 10px; width:50%;text-align:left;border:none;">
                                            <input type="text" class="form-control customername">    
                                </td>
                                </tr>
                                <tr>
                                <th>Amount to Discount :</th>
                                <td style="padding: 10px 10px; width:50%;text-align:left;border:none;">
                                            <input type="text" class="form-control amounttodiscount" style='background-color:transparent' readonly>    
                                </td>
                                </tr>
                                <tr>
                                <th>Percentage % :</th>
                                <td style="padding: 10px 10px; width:50%;text-align:left;border:none;">
                                            <input type="text" class="form-control percnt" value="<?php echo $percent; ?>" style='background-color:transparent' readonly>    
                                </td>
                                </tr>
                                <tr>
                                <th>Discounted Amount :</th>
                                <td style="padding: 10px 10px; width:50%;text-align:left;border:none;">
                                            <input type="text" class="form-control damount"  style='background-color:transparent' readonly>    
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><br> <button class="btn btn-success confirmdiscount" style="float: right;font-weight:bold">Confirm</button></td>
                                </tr>
                                




                          
                            </table><br>
                          
                              

                                    </center>      
           
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- Modal for message after tender -->



<!-- Close transaction modal -->
<button style="display: none;" type="button" class="btn btn-primary" id="modalclosetrans" data-toggle="modal" data-target="#exampleModal">
 click
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #04AA6D;">
      <button type="button" class="close closemodaltransaction" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="Color:red;">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel" style="font-weight: 900;color:white">CLOSE TRANSACTION DETAILS</h4>
        
      </div>
      <div class="modal-body closebodytrans" style="background: white ;">
        <table >
            <tr>
                <th>TRANSACTION DATE</th>
                <th>CASHIER TRANSACTION #</th>
                <th>CASHIER NAME</th>
            </tr>
            <tr>
                <td><input type="text" value="<?php echo $today ?>" readonly></td>
                <td><input type="text" readonly value="<?php echo $cashiertransno; ?>"></td>
                <td><input type="text" name="" value="<?php echo $fullname ?>" readonly></td>
            </tr>
        </table>
        <!-- <hr style="border:1px solid lightgray;"> -->
        <div class="den">
        <table class="deno">
            <tr>
                <th colspan="3" style="border:1px solid lightgray;text-align:center;"><h4 style="color:white"><b>Denomination</b></h4></th>
                
            </tr>
            <tr>
                
                <th>1000</th>
                <td><input type="text" placeholder="0"  class="input_1k" ></td>
                <td><input type="number" placeholder="0" value="0" class="result_1k" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>500</th>
                <td><input type="text" placeholder="0"  class="input_500"></td>
                <td><input type="number" placeholder="0" value="0" class="result_500" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>200</th>
                <td><input type="text" placeholder="0"  class="input_200"></td>
                <td><input type="number" placeholder="0" value="0" class="result_200" style="background-color:blanchedalmond"  readonly></td>
            </tr>
            <tr>
                <th>100</th>
                <td><input type="text" placeholder="0"  class="input_100"></td>
                <td><input type="number" placeholder="0" value="0" class="result_100" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>50</th>
                <td><input type="text" placeholder="0"  class="input_50"></td>
                <td><input type="number" placeholder="0" value="0" class="result_50" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>20</th>
                <td><input type="text" placeholder="0"  class="input_20"></td>
                <td><input type="number" placeholder="0" value="0" class="result_20" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>10</th>
                <td><input type="text" placeholder="0"  class="input_10"></td>
                <td><input type="number" placeholder="0" value="0" class="result_10" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>5</th>
                <td><input type="text" placeholder="0"   class="input_5"></td>
                <td><input type="number" placeholder="0" value="0" class="result_5" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>1</th>
                <td><input type="text" placeholder="0"  class="input_1"></td>
                <td><input type="number" placeholder="0" value="0" class="result_1" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>.25</th>
                <td><input type="text" placeholder="0" class="input_c25"></td>
                <td><input type="number" placeholder="0" value="0" class="result_c25" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>.10</th>
                <td><input type="text" placeholder="0"  class="input_c10"></td>
                <td><input type="number" placeholder="0" value="0" class="result_c10" style="background-color:blanchedalmond" readonly></td>
            </tr>
            <tr>
                <th>.05</th>
                <td><input type="text" placeholder="0"  class="input_c5"></td>
                <td><input type="number" value="0" style="background-color:blanchedalmond" class="result_c5" placeholder="0" readonly></td>
            </tr>
            <tr>
                <th>.01</th>
                <td><input type="text" placeholder="0" class="input_c01" ></td>
                <td><input type="number" style="background-color:blanchedalmond" value="0" class="result_c01" placeholder="0" readonly></td>
            </tr>
        </table>
        </div>
        <div class="de">
        <table class="det">
            <tr>
                    <th>ACTUAL CASH ONHAND</th>
            </tr>
            <tr>
                <td>
                    <input style="font-weight:900;color:darkgoldenrod" class="cashactual" type="text" readonly>
                </td>
            </tr>
            <tr>
                    <th>NEXT TRANSACTION BEGINNING</th>
            </tr>
            <tr>
                <td>
                    <input class="cashbegin" style="font-weight:900;color:darkgoldenrod" type="text" value="<?php echo $cas; ?>" readonly>
                </td>
            </tr>
            <tr>
                    <th>TOTAL CASH REMITTED</th>
            </tr>
            <tr>
                <td>
                    <input class="remited" style="font-weight:900;color:darkgoldenrod" type="text" readonly>
                </td>
            </tr>  
            <tr>
                <td> 
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <br>
       
      </td>
            </tr> 
        </table>
        
        </div>
     <button type="button" class="btn btn-success pleaseconfirm"  style="float:right;margin-top: -35px; font-weight:900">Please Confirm</button>
        </div>
      </div>
                         
     
    </div>
  </div>
</div>
<!-- Close transaction modal -->




<!-- modal for cancel button -->
<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modalcancel" 
data-target="#myModal_cancel">Launch demo modal</button>

<div class="modal fade" id="myModal_cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper" >
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" style="background-color: white; border:none;width:60%">
            <div class="modal-header" >
                    <button type="button" class="close close_tender" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;">
                         <tr>
                             <td style="width:20%"><h3 class="modal-title" id="myModalLabel" style="font-weight: 900;color:darkgrey;">ORDER</h3></td>
                             <!-- <td ><span class="errormsg" style="float:right;color:darkred;font-weight:900;margin-right:150px; "></span></td> -->
                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="color:gray;font-size:14px">
                <table id="example" class="table table-striped table-bordered;">
                        <thead>
                            <tr>
                                <th >Description</th>
                                <th>Selling Price</th>
                                <th>Quantity</th> 
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include('connection/data.php');
                            $display=mysqli_query($con,"SELECT *
                                from displayproductdashboard where status='Pending'"); 
                            while($row=mysqli_fetch_array($display)){

                            
                            ?>
                            <tr>
                                
                                <td style="width:35%; "><?php echo $row['Description'];?></td>
                                <td><?php echo $row['SellingPrice'];?></td>
                                <td><?php echo $row['Quantity'];?></td>
                                <td><?php echo $row['Amount'];?></td>
                                <td style="font-weight:900">
                                <button class="btn btn-danger btn-sm" id='cancel_or' idd="<?php echo $row['Productcode']; ?>">Cancel</button></td>
                                
                            </tr>
                            <?php }?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Description</th>
                                <th>Selling Price</th>
                                <th>Quantity</th> 
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- End modal for cancel button -->


<!-- modal for recover button -->
<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modalrecover" 
data-target="#myModal_recover">Launch demo modal</button>

<div class="modal fade" id="myModal_recover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper" >
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" style="background-color: white; border:none;width:60%">
            <div class="modal-header" >
                    <button type="button" class="close close_tender" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;">
                         <tr>
                             <td style="width:20%"><h3 class="modal-title" id="myModalLabel" style="font-weight: 900;color:darkgrey;">ORDER NEED AN ACTION</h3></td>
                             <!-- <td ><span class="errormsg" style="float:right;color:darkred;font-weight:900;margin-right:150px; "></span></td> -->
                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="color:gray;font-size:14px">
                <table id="examplee" class="table table-striped table-bordered;">
                        <thead>
                            <tr>
                            <th>Order Number #</th>
                            <th>Cashier trans #</th>
                            <th>Date Order</th> 
                            <th>branchcode</th>
                            <th>Cashier Name</th>
                            <th>Status</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            include('connection/data.php');
                            $display=mysqli_query($con,"SELECT distinct OrderNo,CashierTransNo,DateOrder,Branchcode
                             from displayproductdashboard where status='Hold'"); 
                            while($row=mysqli_fetch_array($display)){

                            
                            ?>
                            <tr>
                                <td><?php echo $row['OrderNo'];?></td>
                                <td style="width:35%; "><?php echo $row['CashierTransNo'];?></td>
                                <td><?php echo $row['DateOrder'];?></td>
                                <td><?php echo $row['Branchcode'];?></td>
                                <td><?php echo $fullname;?></td>
                                <td style="font-weight:900"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" id="<?php echo $row['OrderNo']; ?>">Details</button>&nbsp;
                                <button class="btn btn-primary btn-sm" id='btn-sm' idd="<?php echo $row['OrderNo']; ?>">Restore</button></td>
                            </tr>
                            <?php }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Order Number #</th>
                                <th>Cashier trans #</th>
                                <th>Date Order</th> 
                                <th>branchcode</th>
                                <th>Cashier Name</th>
                                <th>Status</th> 
                            </tr>
                        </tfoot>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- modal for recover button -->



<!-- modal for search button -->
<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modalsearch" 
data-target="#myModal_search">Launch demo modal</button>

<div style="display:none">
<input type="button" id="goto_first" value="first" class="btn btn-success">
<input type="button" id="goto_prev" value="prev" class="btn btn-secondary">
<input type="button" id="goto_next" value="next" class="btn btn-secondary">
<input type="button" id="goto_last" value="last" class="btn btn-success">
</div>

<div class="modal" id="myModal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper" >
        <div class="modal-dialog vertical-align-center" style=' width:80%'>
            <div class="modal-content" style="background-color: white; border:none;width:100%">
            <div class="modal-header" >
                    <button type="button" class="close close_search" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;text-align:center" border='0'>
                         
                         <tr>
                             <td><b style="color:darkred">[F2] Focus </b></td>
                             <td><b style="color:darkred">[Arrow Down]</b> Select table down</td>
                             <td><b style="color:darkred">[Arrow UP]</b> Select table UP</td>
                             <td><b style="color:darkred">[Space Bar]</b> use to input quantity and price </td>


                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="color:gray;font-size:14px;height:500px;overflow:auto">
                   
                    <table id="example3" class="table table-stripd table-bordered tablesearch">
        <thead>
            <tr>
                <!-- <th style="width:2%;border:none;background-color:transparent"></th> -->
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Brand</th>
                <th>Product Description</th>  
                <th>Unit/s</th>
               
            </tr>
        </thead>
        <tbody>
        <?php 
               include('connection/data.php');
               $display=mysqli_query($con,"SELECT *
                from items "); 
               while($row=mysqli_fetch_array($display)){

               
            ?>
            <tr  iid='<?php echo $row['id'];?>'>
                <!-- <td style="border:none;background-color:transparent"><input type="text" value="" class="pcode" iid='<?php //echo $row['Productcode'];?>' style="border:none;background-color:transparent;width:100%" ></td> -->
                <td><?php echo sprintf('%04d', $row['id']);?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['brand'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['unit'];?></td>
            </tr>
            <?php }?>

                    </table>

                   
                </div>

               
            </div>
        </div>
    </div>
</div>

<!-- End modal for search button -->



<!-- modal for search button -->
<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modalsearch_out" 
data-target="#myModal_search">Launch demo modal</button>

<div style="display:none">
<input type="button" id="goto_first" value="first" class="btn btn-success">
<input type="button" id="goto_prev" value="prev" class="btn btn-secondary">
<input type="button" id="goto_next" value="next" class="btn btn-secondary">
<input type="button" id="goto_last" value="last" class="btn btn-success">
</div>

<div class="modal" id="myModal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper" >
        <div class="modal-dialog vertical-align-center" style=' width:80%'>
            <div class="modal-content" style="background-color: white; border:none;width:100%">
            <div class="modal-header" >
                    <button type="button" class="close close_search" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;text-align:center" border='0'>
                         
                         <tr>
                             <td><b style="color:darkred">[F2] Focus </b></td>
                             <td><b style="color:darkred">[Arrow Down]</b> Select table down</td>
                             <td><b style="color:darkred">[Arrow UP]</b> Select table UP</td>
                             <td><b style="color:darkred">[Space Bar]</b> use to input quantity and price </td>


                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="color:gray;font-size:14px;height:500px;overflow:auto">
                   
                    <table id="example3" class="table table-stripd table-bordered tablesearch">
        <thead>
            <tr>
                <!-- <th style="width:2%;border:none;background-color:transparent"></th> -->
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Brand</th>
                <th>Product Description</th>  
                <th>Unit/s</th>
               
            </tr>
        </thead>
        <tbody>
        <?php 
               include('connection/data.php');
               $display=mysqli_query($con,"SELECT *
                from items "); 
               while($row=mysqli_fetch_array($display)){

               
            ?>
            <tr  iid='<?php echo $row['id'];?>'>
                <!-- <td style="border:none;background-color:transparent"><input type="text" value="" class="pcode" iid='<?php //echo $row['Productcode'];?>' style="border:none;background-color:transparent;width:100%" ></td> -->
                <td><?php echo sprintf('%04d', $row['id']);?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['brand'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['unit'];?></td>
            </tr>
            <?php }?>

                    </table>

                   
                </div>

               
            </div>
        </div>
    </div>
</div>

<!-- End modal for search button -->









<!-- modal for  edit button branch-->
<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modalbranchedit" 
data-target="#myModalbranchedit">Launch demo modal</button>

<!-- Modal -->
<div class="modal fade" id="myModalbranchedit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" style="background-color: white;width:55%;margin:auto">
                <div class="modal-header" >
                    <button type="button" class="close close_branchupdate" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;">
                         <tr>
                            
                             <td ><span class="errormsg" style="float:right;color:darkred;font-weight:900;margin-right:150px; "></span></td>
                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="color:black;font-weight:900">
                
            
                <table  style='width:100%'>
                
              <tr>
                <td><h4 class='text-center'>UPDATE PRODUCT</h4></td>
              </tr>
              <tr>
             
             <td>  <label for="inputAddress2">Product ID</label><input type="text" class="form-control idd" readonly></td>
           </tr>
              <tr>
             
                <td>  <label for="inputAddress2">Product Name</label><input type="text" class="form-control namee" ></td>
              </tr>
              <tr>
            
                <td>   <label for="inputAddress2">Product Brand</label> <input type="text" class="form-control brandd" ></td>
              </tr>
              <tr>
            
                <td>   <label for="inputAddress2">Product Description</label> <input type="text" class="form-control descriptionn" ></td>
              </tr>
              <tr>
               
                <td> <label for="inputState">Product Description</label> <select id="inputState" class="form-control unitss">
                <option selected>Kgs</option>
                <option>Pcs</option>
                <option>Pack</option>
              </select></td>
              </tr>
              <tr>
                <td><br> <button type="submit"  class="btn btn-primary updateproduct" style='width:100%'>UPDATE</button></td>
                
              </tr>
              
            </table>
               
                </div>
               
            </div>
        </div>
    </div>
</div>

<!-- end modal for  edit button branch-->

<!-- modal for  cash-->
<button style="display: none;" class="btn btn-primary btn-lg" data-toggle="modal" id="modalprice_quantity" data-target="#myModal">Launch demo modal</button>

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header" >
                    <button type="button" class="close close_tender" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;">
                         <tr>
                             <td style="width:20%"><h5 class="modal-title" id="myModalLabel" style="font-weight: 900;color:black;"><b>Note: </b> </h5>Keep always press [ ENTER ]   </td>
                             <td ><span class="errormsg" style="float:right;color:darkred;font-weight:900;margin-right:150px; "></span></td>
                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="color:black;font-weight:900">
                            <div class="">
                                <strong>Item ID</strong>
                                <input type="text" class="form-control id" readonly>
                            </div>
                            <div class="">
                                <strong>Quantity</strong>
                                <input type="text" class="form-control qty" >
                            </div>
                            <div class="">
                                <strong>Price</strong>

                            
                                <input type="text"  class="form-control price" >
                                <button class="clickch" style="display: none;">click change</button>
                            </div>
                        <br><br><br>
                </div>
               
            </div>
        </div>
    </div>
</div>

<!-- modal end cash -->


<!-- modal for  cash-->
<button style="display: none;" class="btn btn-primary btn-lg modal_quantity_outt" data-toggle="modal" 
id="" data-target="#myModal_out">Launch demo modal</button>

<!-- Modal -->
<div class="modal" id="myModal_out" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" style="background-color: white;">
                <div class="modal-header" >
                    <button type="button" class="close close_tender" data-dismiss="modal"><span aria-hidden="true" style="color:red">&times;</a></span><span class="sr-only">Close</span>

                    </button>
                     
                     <table style="width: 100%;">
                         <tr>
                             <td style="width:20%"><h5 class="modal-title" id="myModalLabel" style="font-weight: 900;color:black;"><b>Note: </b> </h5>Keep always press [ ENTER ]   </td>
                             <td ><span class="errormsg" style="float:right;color:darkred;font-weight:900;margin-right:150px; "></span></td>
                         </tr>
                     </table>

                </div>
                <div class="modal-body" style="color:black;font-weight:900">
                            <div class="">
                                <strong>Item ID</strong>
                                <input type="text" class="form-control id" readonly>
                            </div>
                            <div class="">
                                <strong>Quantity</strong>
                                <input type="text" class="form-control qtyy" >
                            </div>
                           
                        <br><br><br>
                </div>
               
            </div>
        </div>
    </div>
</div>

<!-- modal end cash -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         <?php if(isset($Breadcumbs)) echo $Breadcumbs ?>
         <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php if(isset($BreadcumbsURI)) echo $BreadcumbsURI ?>"><i class="fa fa-dashboard"></i> <?php if(isset($Breadcumbs)) echo $Breadcumbs ?></a></li>
         <li class="active"><?php if(isset($PageTitle)) echo $PageTitle ?></li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="box box-body">
               <div class="box-header with-border">
                  <h3 class="box-title">ব্রাঞ্চ এবং তারিখ সিলেক্ট করুনঃ</h3>
                  <div class="InsertSuccess"></div>
               </div>
               <div class="box-body">
                  <?php echo form_open('Summary/GenerateSummary', array('class' => 'snsert-pharmacy-form', 'method'=>'get')); ?>
                  <div class="form-group">
                     <label>ব্রাঞ্চের নাম</label>
                        <select required class="form-control" id="RepresentativeBranch" name="branch_id" data-placeholder="Select a Category" required
                              style="width: 100%;" >
                              <option readonly>----- এখান থেকে বাছাই করুন ----</option>
                                 <?php foreach($BranchList as $branch): ?>
                                    <option value="<?php echo $branch->br_code; ?>"><?php echo $branch->branch_name; ?></option> 
                                 <?php endforeach; ?>       
                     </select>
                  </div>
                  <div class="form-group">
                     <div class="form-group">
                     <label>কোন প্রতিনিধির অধীনে ফার্মেসিটি পড়বে? </label>
                     <select class="form-control" id="PharmacyByRe" name="reid" style="width:100%;" required>
                           <option> ---- ব্রাঞ্চ সিলেক্ট করার পর এখান থেকে বাছাই করুন প্রতিনিধি বাছাই করুন ---- <option>
                     
                     </select>
                     
                  </div>  
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-3 col-xs-4">
                        <label>তারিখ শুরু: </label>
                        <div id="datepicker" class="input-group date" data-date-format="dd-MM-yyyy">
                           <input class="form-control" type="text" name="starting_date" readonly required />
                           <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                     </div>
                     <div class="col-md-3 col-xs-4">
                        <label>তারিখ শেষ: </label>
                        <div id="datepicker2" class="input-group date" data-date-format="dd-MM-yyyy">
                           <input class="form-control" type="text" name="ending_date" readonly required/>
                           <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">    
                     <input type="submit" class="btn btn-success margin pull-left" value="তথ্য লোড করুন">
                  </div>
               </div>
               <?php echo form_close(); ?>
            </div>
            <?php if(isset($BranchName)): ?>
            <div class="box box-body">
               <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <div class="col-md-12 col-xs-6">
                    <ul class="list-unstyled">
                        <li>
                        <h3>ব্রাঞ্চের নামঃ-  <?php if(isset($BranchName)) echo $BranchName; ?></h3>
                        <h3>প্রতিনিধির নামঃ-  <?php if(isset($ReName)) echo $ReName; ?></h3>
                                <ul>
                                    
                                    <h4><li style="list-style: none">সময়কালঃ <span  style="font-weight:bold;"> <span style='color:blue'><?php if(isset($Start)) echo  BanglaConverter::en2bn($Start); ?></span> থেকে <span style='color:green'><?php if(isset($End)) echo BanglaConverter::en2bn($End); ?></span></span></li><h4>
                                    <h4><li style="list-style: none">মোটঃ <span  style="font-weight:bold;"> <?php if(isset($DateCount) <= 0){ 

                                                                                                                    echo  BanglaConverter::en2bn($DateCount);
                                                                                                                
                                                                                                                }else{
                                                                                                                    echo  BanglaConverter::en2bn($DateCount+1);
                                                                                                                }?> দিনের সামারী</span>
                                    </li><h4>

                                </ul>
                        </li>
                        </ul>
                    </div>
               </div>
               <?php//echo $re_id;?>
               <div class="box-body">
                   <?php //f(isset($Summaries)){
                  //foreach($Summaries as $Summary)
                  //{ 
                      //if(!empty($Summary->TotalSale)){
                       // echo "<h3>সর্বমোট বিক্রি হয়েছেঃ- <strong style='color:red;'>".BanglaConverter::en2bn($Summary->TotalSale)."</strong> টাকা </h3>" ;
                      //}else{

                        //echo "<h3>সর্বমোট বিক্রি হয়েছে <strong style='color:red;'> 0.00</strong> টাকা </h3>" ;
                      //}
                     
                  //}
                //}
                ?>
                <?php if(empty($ProQResOBJ)): ?>
                  <h1>কোন তথ্য পাওয়া যায় নি </h1>
                <?php else: ?>
               
                 <table class="table table-bordered">
                    <thead>
                    <tr>
                         <th>#</th>
                        <!-- <th>ফার্মেসীর নাম</th> -->
                        <th>পণ্যের নাম</th>
                        <th>পণ্যের মার্কেট দাম</th>
                        <th>বিক্রির পরিমাণ</th>
                        <th>মোট টাকা</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($ProQResOBJ)):?>
                    <?php if(!empty($ProQResOBJ)):?>
                    <?php $counter =1; $total_sale = 0; $total_revenu = 0 ; $product_market_price = 0; $grandTotal = 0;?>
                    <?php $productQuantity = array();?>
                    <?php foreach($ProQResOBJ as $product_name => $key):?>
                    <?php //foreach($key as $p):?>
                    
                    <tr>
                        <td style="width:3%"><?php echo $counter++;?></td>
                        
                        <td><?php echo $product_name;  ?></td>
                        <?php
                        $query3=$this->db->query("SELECT invoice_details.product_market_price FROM invoice_details,invoice_master WHERE invoice_details.invoice_master_id = invoice_master.invoice_master_id and invoice_details.product_name ='$product_name' and invoice_master.re_id = '$re_id' LIMIT 1");
                        foreach ($query3->result() as $market_price)
                           {
                              $pro_market_price =  $market_price->product_market_price;
                             echo '<td>'.BanglaConverter::en2bn($pro_market_price).' টাকা</td>'; 
                                 
                           } ?>
                        <?php
                        $query1=$this->db->query("SELECT SUM(invoice_details.product_quantity) AS total  FROM invoice_details,invoice_master WHERE invoice_details.invoice_master_id = invoice_master.invoice_master_id and invoice_details.product_name ='$product_name' and invoice_master.re_id = '$re_id'");
                        foreach ($query1->result() as $quantity)
                           {
                              $total_sale =  $quantity->total;
                             echo '<td>'.BanglaConverter::en2bn($total_sale).'</td>'; 
                                 
                           } ?>
                        <?php
                      
                              $total_revenu =   $pro_market_price * $total_sale;
                              $grandTotal =   $grandTotal + $total_revenu;
                             echo '<td>'.BanglaConverter::en2bn((float)$total_revenu).' টাকা</td>'; 
                            
                                 
                         ?>
      
                        
                    </tr>
                    <?php endforeach;?>
                    <hr>
                    
                    <?php endif;?>
                    <?php else:?>
                           <h2>Notgin</h2>
                    <?php endif;?>
                    
                    </tbody>
                </table>
                <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>      
                        <th></th>   
                        <th></th>
                        <th>সর্বমোট টাকাঃ </th>
                        <th><?php  if(isset($grandTotal))echo BanglaConverter::en2bn((float)$grandTotal).' টাকা';  ?></th>
                        
                        
                    </tr>
                    </thead>
               
                </table>
               </div>
            <!-- /.box-body -->
           </div>
           <?php endif;?>
           <?php endif; ?>
         <!-- /.box -->
      </div>
      <!--/.col (left) -->
      
    
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
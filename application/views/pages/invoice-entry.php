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
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
         <div class="box-header with-border">
            <h3 class="box-title" style="color:green;">ব্রাঞ্চের নাম সিলেক্ট করুন, নিচের বক্সে ঐ ব্রাঞ্চের অধীনস্থ সকল প্রতিনিধির নাম চলে আসবে </h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <div class="row">
               <?php echo form_open('Invoice/GetDataForInvoiceGeneration', array('method' => 'GET'));?>
               <div class="col-md-6 col-xs-12">
                  <div class="form-group">
                     <label>কোন ব্রাঞ্চের প্রতিনিধি বের করতে চান </label>
                     <select class="form-control" name="BranchID" id="RepresentativeBranch" 
                        style="width:100%;color:red;" required>
                        <option value="" readonly>----- ব্রাঞ্চ বাছাই করুন ----</option>
                        <?php foreach($BranchList as $branch): ?>
                        <option value="<?php echo $branch->br_code; ?>"><?php echo $branch->branch_name; ?></option>
                        <?php endforeach; ?>       
                     </select>
                  </div>
               </div>
               <div class="col-md-2 col-xs-4">
                  <div class="form-group">
                     <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                     <input type="submit" class="btn bg-navy" value="লোড করুন">
                  </div>
               </div>
               <?php echo form_close();?>
            </div>
            <!-- /.col -->
         </div>
      </div>
      <!-- /.row -->
      <div class="box ">
         <div class="box-header with-border">
            <h3 class="box-title" style="color:green;"> </h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body" id="VisibleDiv">
            <?php $PharmacyID;$ReID;$BranchID; ?>
            <div class="row" style="font-size: 2vmin;">
                <?php $re_code;?>
               <?php if(isset($MultipleData)):?>
               <?php foreach($MultipleData as $TopLevelData) :?>
               <div class="col-md-6 col-xs-6">
                  <ul class="list-unstyled">
                     <li>
                        বরবর, 
                        <ul>
                           <li style="list-style: none">ব্রাঞ্চঃ <span  style="font-weight:bold;"> <?php echo $TopLevelData->branch_name;?></span></li>
                        </ul>
                     </li>
                  </ul>
                  <?php //$PharmacyID = $TopLevelData->ph_id; ?>
                  <?php $ReID = $TopLevelData->id; ?>
                  <?php $BranchID = $TopLevelData->br_id; ?>
               </div>
               <div class="col-md-6 col-xs-6"  style="font-size: 2vmin;">
                  <p>তারিখঃ <?php echo BanglaConverter::en2bn(date("d-m-Y")); ?></p>
                  
                  <p id="timer"></p>
               </div>
               <?php endforeach;?> 
               <?php endif;?>
            </div>
            <div class="row">
           <?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?>
            </div>
            <br>
         
            <div class="row">
               <?php if(isset($ProductData)):?>
               <?php //foreach($ProductData as $pd):?>
               <div class="col-md-12" style="">
                
                  <?php echo form_open('Invoice/InvoiceSubmit', array('method'=>'POST', 'id'=>'InvoiceFormss')); ?>
                  <div class="col-md-12 col-xs-12">
                  <div class="form-group">
                     <label>কোন প্রতিনিধির অধীনে ফার্মেসিটি পড়বে? </label>
                     <select class="form-control" id="PharmacyByReForInvoice" name="RepresentativeID" style="width:100%;color:green" required>
                     <option value="" readonly> ----  প্রতিনিধি বাছাই করুন ---- </option>
                     <?php foreach($RepresentativeData as $ReData):?>
                     <option value="<?php echo $ReData->re_code; ?>"><?php echo $ReData->re_name.", কোডঃ ".$ReData->re_code; ?></option>

                     <?php endforeach;?>
                        
                     </select>
                  <div class="form-group">
                     <label>কোন প্রতিনিধির অধীনে ফার্মেসিটি পড়বে? </label>
                     <select class="form-control" id="PharmacyByReBranchses" name="PharmacyID" style="width:100%;color:red" required>
                        <option value="" readonly> ---- ফার্মেসি বাছাই করুন ----</option>
                       
                  
                     </select>
                  </div>
               </div>
                  <input type="hidden" name="br_id" value="<?php if(isset($br_id)) echo $br_id; ?>">
                  <input type="hidden" name="re_id" value="<?php //if(isset($re_id)) echo $re_id; ?>">
                  <input type="hidden" name="re_code" value="<?php //if(isset($re_code)) echo $re_code; ?>">
                  <div id="field">
                     <div class="row" id="ProTable">
                        <?php for($i=1; $i<200;$i++){?>
                        <?php for($j=$i; $j<200; $j++){?>
                        <?php //foreach($ProductData as $datas):?>
                        <div class="col-md-12" id="field1">
                           <table>
                              <tr>
                                 <td style="width:30%">
                                    <label for="hint">পণ্যের নাম </label>
                                    <input style="width:69%;color:blue;font-weight:bold;font-size:18px;margin-left:5px;" type="text" id="hint<?php echo $i++;?>" class="hint" placeholder="পণ্যের নাম"> 
                                 </td>
                                 <td  style="width:30%">
                                    <label for="">পরিমান</label>
                                    <span><input style="width:69%;color:blue;font-weight:bold;font-size:18px;margin-left:5px;" type="text"  class="sale" name="pro_sale[]">
                                    </span>  
                                 </td>
                                 <td style="width:20%">
                                    <label for="">বোনাস </label>
                                    <input style="width:69%;color:blue;font-weight:bold;font-size:18px;margin-left:5px;" id="myBtn" class="bonus" name="pro_bonus[]"> 
                                 </td>
                                 <td style="width:30%">
                                    <label for="">মার্কেট মুল্য </label>
                                    <input style="width:69%;color:blue;font-weight:bold;font-size:18px;margin-left:5px;" class="mp" name="pro_market_price[]" readonly> 
                                 </td>
                                 <td>
                                    <a href="javascript:;" data-value="<?php echo $j ?>" class="clear">Clear</a>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <?php //endforeach;?>
                        <?php }?>
                        <?php }?>
                     </div>
                  </div>
                  <?php echo form_close(); ?>
               </div>
               <?php //endforeach;?>
               <?php endif;?>    
            </div>
            <div class="row" id="content"></div>
         </div>
      </div>
      <!-- /.box -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
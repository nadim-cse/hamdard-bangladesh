<?php $this->benchmark->mark('code_end'); ?>
<footer class="main-footer">
   <strong>Copyright &copy; 2018 <a href="#">Hamdard Waqf</a>.</strong> All rights
   reserved.
   <strong>Load time <?php echo $this->benchmark->elapsed_time('code_start', 'code_end'); ?></strong>
</footer>
</div>
<!-- Edit Teacher Modal -->
<div class="modal fade" id="modal-edit-branch" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
               পণ্যের তথ্য এডিট করুণ
            </h4>
         </div>
         <!-- Modal Body -->
         <div class="modal-body">
            <?php echo form_open('get-update-branch-data', array(
               'class' => 'form-horizontal',
               'id' => 'edit-branch'
               )); ?>
            <!-- left column -->
            <div class="col-md-12">
               <!-- Form Element sizes -->
               <div class="box box-body">
                  <div class="box-header with-border">
                     <div class="InsertSuccess"></div>
                  </div>
                  <div class="box-body">
                     <label>নাম</label>
                     <input class="form-control input-lg" name="branch_name" type="text" placeholder="ব্রাঞ্চের নাম">
                     <br>
                  </div>
                  <!-- /.box-body -->
               </div>
            </div>
            <div class="form-group">
               <div class="col-sm-12">
                  <input type="hidden" name="br_id" value="">
                  <input type="submit" id="" value="তথ্য আপডেট করুণ" class="btn btn-primary pull-right">
               </div>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- Modal Footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default"
               data-dismiss="modal">
            Close
            </button>
         </div>
      </div>
   </div>
</div>
<!-- Modal Product Modal -->
<div class="modal fade" id="modal-edit-product" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
               পণ্যের তথ্য এডিট করুণ
            </h4>
         </div>
         <!-- Modal Body -->
         <div class="modal-body">
            <?php echo form_open('get-product-update-data', array(
               'class' => 'form-horizontal',
               'id' => 'edit-product'
               )); ?>
            <!-- left column -->
            <div class="col-md-12">
               <!-- Form Element sizes -->
               <div class="box box-body">
                  <div class="box-header with-border">
                     <div class="InsertSuccess"></div>
                  </div>
                  <div class="box-body">
                     <label>নাম</label>
                     <input class="form-control input-lg" name="pro_name" type="text" placeholder="পণ্যের নাম">
                     <br>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
               <div class="box box-danger">
                  <div class="box-header with-border">
                     <h3 class="box-title">পণ্যের মূল্য, একক এবং পরিমাণ</h3>
                  </div>
                  <div class="box-body">
                     <div class="row">
                        <div class="col-xs-3">
                           <label>নেট  মূল্য</label>
                           <input type="text" name="pro_net_price" class="form-control" placeholder="নেট মূল্য">
                        </div>
                        <div class="col-xs-3">
                           <label>বাজার মূল্য</label>
                           <input type="text" name="pro_market_price" class="form-control" placeholder="বাজার মূল্য">
                        </div>
                        <div class="col-xs-3">
                           <label>পরিবেশনা</label>
                           <input type="text" name="pro_performances" class="form-control" placeholder="পরিবেশনা">
                        </div>
                        <div class="col-xs-3">
                           <div class="form-group">
                              <label>একক</label>
                              <select class="form-control" id="unit_update" name="pro_unit" style="width: 100%;">
                                 <option >মিলি</option>
                                 <option>ট্যাবলেট</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-4">
                           <label>কোড</label>
                           <input type="text" name="pro_sku" class="form-control" placeholder="পণ্যের কোড">
                        </div>
                        <div class="col-xs-4">
                           <label>পন্যের ধরন</label>
                           <select class="form-control" id="sku_update" name="pro_type" style="width: 100%;">
                              <option>সিরাপ</option>
                              <option>ট্যাবলেট</option>
                              <option>ক্যাপসুল</option>
                           </select>
                        </div>
                        <div class="col-xs-4">
                           <label>স্টক</label>
                           <input type="text" name="pro_stock" class="form-control" placeholder="স্টক">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-xs-3">
                           <label>কতটি পন্যে বিক্রি হলে বোনাস দিবেন?</label>
                           <input type="text" name="pro_bonus" class="form-control" placeholder="পণ্যের কোড">
                        </div>
                        <div class="col-xs-3">
                           <label>কতটি বোনাস দিবেন</label>
                           <input type="text" name="pro_gained_bonus" class="form-control" placeholder="স্টক">
                        </div>
                     </div>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </div>
            <div class="fileError"></div>
            <div class="tasksuccess"></div>
            <div class="form-group">
               <div class="col-sm-12">
                  <input type="hidden" name="pro_id" value="">
                  <input type="hidden" name="sku_id" value="">
                  <input type="submit" id="ProUpdateSubmit" value="তথ্য আপডেট করুণ" class="btn btn-primary pull-right">
               </div>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- Modal Footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default"
               data-dismiss="modal">
            Close
            </button>
         </div>
      </div>
   </div>
</div>
<!-- ./wrapper -->
<!-- Edit Peoduct Modal -->
<!-- Modal -->
<div class="modal modal-danger fade" id="modal-product-delete">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">আপনি কি এই পণ্যটি ডিলিট করতে চান ?</h4>
         </div>
         <div class="modal-body">
            <p>যদি ডিলিট করে দেন তাহলে ডাটাবেজ থেকে এই পণ্যটির সকল তথ্য মুছে যাবে&hellip;</p>
         </div>
         <div class="modal-footer">
            <a href="javascript:confirm();" class="btn btn-outline pull-left" data-dismiss="modal">ডিলিট করবো না</a>
            <a href="javascript:confirm();" class="btn btn-outline">হ্যা ডিলিট করতে চাই</a>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- ./wrapper -->
<!-- Modal Product Modal -->
<div class="modal fade" id="modal-edit-representative" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
               প্রতিনিধির তথ্য এডিট করুণ
            </h4>
         </div>
         <!-- Modal Body -->
         <div class="modal-body">
            <?php echo form_open('get-representative-update-data', array(
               'class' => 'form-horizontal',
               'id' => 'edit-representative'
               )); ?>
            <!-- left column -->
            <div class="col-md-12">
               <!-- Form Element sizes -->
               <div class="box box-body">
                  <div class="box-header with-border">
                     <div class="InsertSuccess"></div>
                  </div>
                  <div class="box-body">
                     <div class="row">
                        <div class="col-md-12">
                           <label>নাম</label>
                           <input class="form-control input-lg" name="re_name" type="text" placeholder="পণ্যের নাম">
                           <br> 
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-6">
                           <label>মোবাইল</label>
                           <input type="text" name="re_phone" class="form-control" placeholder="নেট মূল্য">
                        </div>
                        <div class="col-xs-6">
                           <label>ঠিকানা</label>
                           <input type="text" name="re_address" class="form-control" placeholder="বাজার মূল্য">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-6">
                           <label>কোড</label>
                           <input type="text" name="re_code" class="form-control" placeholder="কোড">
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label>ব্রাঞ্চ</label>
                              <select class="form-control" id="rebranch" name="re_branch" style="width: 100%;">
                                 <?php foreach($BranchList as $b):?>
                                 <option value="<?php echo $b->br_id; ?>"><?php echo $b->branch_name; ?></option>
                                 <?php endforeach;?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </div>
            <div class="fileError"></div>
            <div class="tasksuccess"></div>
            <div class="form-group">
               <div class="col-sm-12">
                  <input type="hidden" name="id" value="">
                  <input type="submit" id="ProUpdateSubmit" value="তথ্য আপডেট করুণ" class="btn btn-primary pull-right">
               </div>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- Modal Footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default"
               data-dismiss="modal">
            Close
            </button>
         </div>
      </div>
   </div>
</div>
<!-- ./wrapper -->
<!-- Modal Product Modal -->
<div class="modal fade" id="modal-edit-pharmacy" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
               ফার্মেসীর তথ্য এডিট করুণ
            </h4>
         </div>
         <!-- Modal Body -->
         <div class="modal-body">
            <?php echo form_open('get-update-pharmacy-data', array('class' => 'form-horizontal', 'id' => 'edit-pharmacy-form')); ?>
            <!-- left column -->
            <div class="col-md-12">
               <!-- Form Element sizes -->
               <div class="box box-body">
                  <div class="box-header with-border">
                     <div class="InsertSuccess"></div>
                  </div>
                  <div class="box-body">
                     <div class="row">
                        <div class="col-md-12">
                           <label>নাম</label>
                           <input class="form-control input-lg" name="ph_name" type="text" placeholder="ফার্মেসীর নাম">
                           <br> 
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-6">
                           <label>মোবাইল</label>
                           <input type="text" name="ph_phone" class="form-control" placeholder="মোবাইল">
                        </div>
                        <div class="col-xs-6">
                           <label>ঠিকানা</label>
                           <input type="text" name="ph_address" class="form-control" placeholder="ঠিকানা">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-xs-12">
                           <label>প্রোপ্রাইটার</label>
                           <input type="text" name="ph_proprietor" class="form-control" placeholder="প্রোপ্রাইটার">
                        </div>
                     </div>
                     <br> 
                     <div class="row">
                        <div class="col-xs-6">
                           <label>প্রতিনিধি</label>
                           <select class="form-control" id="reph" name="ph_under_representative" style="width: 100%;">
                              <?php foreach($Representatives as $r):?>
                              <option value="<?php echo $r->id; ?>"><?php echo $r->re_name; ?></option>
                              <?php endforeach;?>
                           </select>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label>ব্রাঞ্চ</label>
                              <select class="form-control" id="rebranchs" name="ph_under_branch" style="width: 100%;">
                                 <?php foreach($Branches as $b):?>
                                 <option value="<?php echo $b->br_id; ?>"><?php echo $b->branch_name; ?></option>
                                 <?php endforeach;?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </div>
            <div class="form-group">
               <div class="col-sm-12">
                  <input type="hidden" name="ph_id" value="">
                  <button type="submit" class="btn btn-primary pull-right">তথ্য আপডেট করুণ</button>
               </div>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- Modal Footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default"
               data-dismiss="modal">
            Close
            </button>
         </div>
      </div>
   </div>
</div>
<!-- ./wrapper -->


<!-- Page script -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- <script
   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="<?php //echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
   $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script>
   $(function () {
     //Initialize Select2 Elements
     $('#category').select2();
     $('#type').select2();
     $('#ProductCat').select2();
     $('#ProductType').select2();
     $('#RepresentativeBranch').select2();
     $('#PharmacyBranch').select2();
     $('#BranchCat').select2();
     $('#unit_update').select2();
     $('#sku_update').select2();
     $('#re_branchs').select2();
     $('#rebranch').select2();
     $('#rebranchs').select2();
     $('#reph').select2();
     $('#PharmacyByReBranchs').select2();
     $('#PharmacyByReForInvoice').select2();
     $('#PharmacyByReBranchses').select2();
     
     
   
   })
</script>
<!-- Javascript code start -->
<script>
   $(document).ready(function(){
   
       // Representative Data Insert Form
   	$('form.insert-representative-form').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'store-represenative-data';
   	
   		$.post(URL , $('form.insert-representative-form').serialize(), function(data){
   
           if(data == '1'){
   
               $('.InsertSuccess').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>আপনার এন্ট্রি সফলভাবে ডাটাবেজে নিবন্ধিত হয়েছে</div>');
               window.location.reload();
           }
           if(data == '0'){
   
             $('.InsertError').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> সতর্কতা !</h4>এই মোবাইল নাম্বার দিয়ে একজন প্রতিনিধি ডাটাবেজে এন্ট্রি করা আছে , আপনি দ্বিতীয়বার এন্ট্রি দিতে পারবেন না । </div>');
           }
   		
   	  	console.log(data);
   		
   		})
    });
   
       // Branch Data Insert Form
   	$('form.insert-branch-form').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'store-branch-data';
   	
   		$.post(URL , $('form.insert-branch-form').serialize(), function(data){
   
           if(data == '1'){
   
               $('.InsertSuccess').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>আপনার এন্ট্রি সফলভাবে ডাটাবেজে নিবন্ধিত হয়েছে </h4> </div>');
               window.location.reload();
           }
           if(data == '0'){
   
             $('.InsertError').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> সতর্কতা !</h4>এই নামটি বর্তমানে ডাটাবেজে এন্ট্রি করা আছে , আপনি দ্বিতীয়বার এন্ট্রি দিতে পারবেন না।</div>');
           }
   		
   	  	console.log(data);
   		
   		})
   });
   
       // Pharmacy Data Insert Form
   	$('form.insert-pharmacy-form').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'store-pharmacy-data';
   	
   		$.post(URL , $('form.insert-pharmacy-form').serialize(), function(data){
   
           if(data == '1'){
   
               $('.InsertSuccess').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>আপনার এন্ট্রি সফলভাবে ডাটাবেজে নিবন্ধিত হয়েছে </h4> </div>');
               window.location.reload();
           }
           if(data == '0'){
   
             $('.InsertError').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> সতর্কতা !</h4>এই নামটি বর্তমানে ডাটাবেজে এন্ট্রি করা আছে , আপনি দ্বিতীয়বার এন্ট্রি দিতে পারবেন না।</div>');
           }
   		
   	  	console.log(data);
   		
   		})
   });
   
       //  Product Data Insert Form
   	$('form.insert-product-form').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'store-product-data';
   	
   		$.post(URL , $('form.insert-product-form').serialize(), function(data){
   
           if(data == '1'){
   
               $('.InsertSuccess').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i>আপনার এন্ট্রি সফলভাবে ডাটাবেজে নিবন্ধিত হয়েছে </h4> </div>');
               window.location.reload();
           }
           if(data == '0'){
   
             $('.InsertError').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> সতর্কতা !</h4>এই নামটি বর্তমানে ডাটাবেজে এন্ট্রি করা আছে , আপনি দ্বিতীয়বার এন্ট্রি দিতে পারবেন না।</div>');
           }
   		
   	  	console.log(data);
   		
   		})
    });
   
   
   
   $("#ivsubmit").on('click', function(){
            // send ajax
            $.ajax({
                url: '<?php echo site_url(); ?>Invoice/GetInvoiceProcessedData', // url where to submit the request
                type : "POST", // type of action POST || GET
                dataType : 'json', // data type
                data : $("#InvoiceForm").serialize(), // post data || get data
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
                  
                    $('#modal-invoice-view').modal('show');
                    var invoice_data = '';
                    var GrandTotal = 0;
                    var ProTotal = 0;
                    var ph_id = 0;
                    var re_id = 0;
                    var br_id = 0;
                    var serial =1;
                    
                    jQuery.each( result, function( i, val ){
                      //console.log(val)
                      ProTotal = (val.pro_market_price * val.pro_sale);
                      GrandTotal = GrandTotal + ProTotal;
                      ph_id = val.ph_id;
                      re_id= val.re_id;
                      br_id= val.br_id;
                      
                      
                      invoice_data +='<tr>';
                        invoice_data +='<td style="border:1px solid black;text-align:center;">'+(serial++)+'</td>';
                        invoice_data +='<td style="border:1px solid black;text-align:center;">'+val.pro_name+'</td>';
                        invoice_data +='<td style="border:1px solid black;text-align:center;">'+val.pro_performances+'</td>';
                        invoice_data +='<td style="border:1px solid black;text-align:center;">'+val.pro_sale+'</td>';
                        invoice_data +='<td style="border:1px solid black;text-align:center;">'+val.pro_market_price+'</td>';
                        invoice_data +='<td style="border:1px solid black;text-align:center;">'+val.pro_bonus+'</td>';
                        invoice_data +='<td style="border:1px solid black;text-align:right;">'+ ProTotal+' টাকা</td>';
                      invoice_data +='</tr>';
                      invoice_data +='<input type="hidden" name="pro_id[]" value="'+val.pro_id+'" />';
                      invoice_data +='<input type="hidden" name="pro_name[]" value="'+val.pro_name+'" />';
                      invoice_data +='<input type="hidden" name="pro_performances[]" value="'+val.pro_performances+'" />';
                      invoice_data +='<input type="hidden" name="pro_market_price[]" value="'+val.pro_market_price+'" />';
                      invoice_data +='<input type="hidden" name="pro_net_price[]" value="'+val.pro_net_price+'" />';
                      invoice_data +='<input type="hidden" name="pro_sale[]" value="'+val.pro_sale+'" />';
                      invoice_data +='<input type="hidden" name="pro_bonus[]" value="'+val.pro_bonus+'" />';
                      invoice_data +='<input type="hidden" name="pro_total[]" value="'+ProTotal+'" />';
                      
   
                    });
                   
                    invoice_data +='<tr style="border: 1px solid;">';
                      invoice_data +='<td ></td>';
                      invoice_data +='<td ></td>';
                      invoice_data +='<td ></td>';
                      invoice_data +='<td ></td>';
                      invoice_data +='<td ></td>';
                      invoice_data +='<td style="border:1px solid black;text-align:right;border-right: 1px solid white;">সর্বমোটঃ </td>';
                      invoice_data +='<td style="border:1px solid black;text-align:right;">'+GrandTotal+' টাকা</td>';
                      invoice_data +='<input type="hidden" name="pro_grand_total" value="'+GrandTotal+'" />';
                    invoice_data +='</tr>';
                    invoice_data +='<input type="hidden" name="ph_id" value="'+ph_id+'" />';
                      invoice_data +='<input type="hidden" name="re_id" value="'+re_id+'" />';
                      invoice_data +='<input type="hidden" name="br_id" value="'+br_id+'" />';
                  
                    $("#invoice_table").append(invoice_data);
   
                    $("#clearAll").on('click', function(){
                          
                        $("#invoice_table td").remove(); 
                        $('#modal-invoice-view').modal('hide');
                    });
                    console.log(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })
        });
        
        
   
   });	
   
     $(document).ready(function() { 
       $('#example2').DataTable( {
         dom: 'Bfrtip',
         buttons: [
             {
                 extend: 'copyHtml5',
                 exportOptions: {
                     columns: [ 0, ':visible' ]
                 }
             },
             {
                 extend: 'excelHtml5',
                 exportOptions: {
                     columns: ':visible'
                 }
             },
             {
                 extend: 'pdfHtml5',
                 exportOptions: {
                     columns: [ 0, 1, 2, 5 ]
                 }
             },
             'colvis'
         ]
     } );;
   
       $('#example').DataTable( {
         dom: 'Bfrtip',
         buttons: [
             {
                 extend: 'copyHtml5',
                 exportOptions: {
                     columns: [ 0, ':visible' ]
                 }
             },
             {
                 extend: 'excelHtml5',
                 exportOptions: {
                     columns: ':visible'
                 }
             },
             {
                 extend: 'pdfHtml5',
                 exportOptions: {
                     columns: [ 0, 1]
                 }
             },
             'colvis'
         ]
     } );;
   
   
   
       $("#RepresentativeBranch").change(function(){
             var BranchID = $('#RepresentativeBranch option:selected').val();
             //alert(BranchID);
             var url ="<?php echo base_url();?>";
             $.ajax({
               type: 'ajax',
               method: 'get',
               url: url+"get-representaive-list-by-branch",
               data: {
                 BranchID: BranchID,
               },
               
               success: function(data) {
   
               
                 $('#PharmacyBranch').html(data);
                   
               },
               error: function() {
                 alert('Ajax failour');
               }
             });
         })

           $("#PharmacyByReForInvoice").change(function(){
             var ReID = $('#PharmacyByReForInvoice option:selected').val();
            //alert(ReID);
             var url ="<?php echo base_url();?>";
             $.ajax({
               type: 'ajax',
               method: 'get',
               url: url+"get-pharmacy-list-by-re",
               data: {
                  ReID: ReID,
               },
               
               success: function(data) {
   
               
                 $('#PharmacyByReBranchses').html(data);
                   
               },
               error: function() {
                 alert('Ajax failour');
               }
             });
           })
   
   
           // 
           $("#RepresentativeBranch").change(function(){
             var BranchID = $('#RepresentativeBranch option:selected').val();
             var url ="<?php echo base_url();?>";
             $.ajax({
               type: 'ajax',
               method: 'get',
               url: url+"get-representaive-list-by-branch",
               data: {
                 BranchID: BranchID,
               },
               
               success: function(data) {
   
               
                 $('#PharmacyByRe').html(data);
                   
               },
               error: function() {
                 alert('Ajax failour');
               }
             });
           })  
   
           $("#PharmacyByRe").change(function(){
             var ReID = $('#PharmacyByRe option:selected').val();
            // alert(ReID);
             var url ="<?php echo base_url();?>";
             $.ajax({
               type: 'ajax',
               method: 'get',
               url: url+"get-pharmacy-list-by-representative",
               data: {
                 ReID: ReID,
               },
               
               success: function(data) {
   
               
                 $('#PharmacyByReBranch').html(data);
                   
               },
               error: function() {
                 alert('Ajax failour');
               }
             });
           })  
   
              
         
   
           $('#ProductLoad').on('click', function(){
   
             var procat = $('#ProductCat').val();
             //alert(procat);
             
             var url ="<?php echo base_url();?>";
             $.ajax({
               type: 'ajax',
               method: 'get',
               url: url+"get-product-list-by-type",
               //async: false,
   	        dataType: 'json',
               data: {
                 procat: procat,
               },
               
               success: function(data) {
   
             
                
                 $('#example').dataTable( {
                   "ajaxSource": data,
                   "columns": [
                     { "data": "pro_id" },
                    
                   ]
                 } );
                 //console.log(data[i].pro_id);
   
                 
                   
               },
               error: function() {
                 alert('Ajax failour');
               }
             });
   
           });
           
         
   
           
       });
       $(function() {
         $("td[colspan=3]").find("p").hide();
         $("#example2").click(function(event) {
             event.stopPropagation();
             var $target = $(event.target);
             if ( $target.closest("td").attr("colspan") > 1 ) {
                 $target.slideUp();
             } else {
                 $target.closest("tr").next().find("p").slideToggle();
             }                    
            });
         });
</script>
<script>
   function EditProduct(ProductID){
   
   $('#modal-edit-product').modal('show');
     var url ="<?php echo base_url();?>";
   $.ajax({
   	type: 'ajax',
   	method: 'get',
   	url: url+"get-single-product-details",
   	data: {
   		ProductID: ProductID,
   	},
   	async: false,
   	dataType: 'json',
   	success: function(data) {
   
   		for(var i=0; i<data.length;i++){
   
   			$('input[name=pro_name]').val(data[i].pro_name);
   			$('input[name=pro_net_price]').val(data[i].pro_net_price);
   			$('input[name=pro_market_price').val(data[i].pro_market_price);
   			$('input[name=pro_performances]').val(data[i].pro_performances);
            $('select[name=pro_unit]').val(data[i].pro_unit);
            $('select[name=pro_type]').val(data[i].pro_type);
            $('input[name=pro_sku]').val(data[i].pro_sku);
            $('input[name=pro_stock]').val(data[i].pro_stock);
            $('input[name=pro_bonus]').val(data[i].bonus_target);
            $('input[name=pro_gained_bonus]').val(data[i].gained_bonus);
   
            $('input[name=pro_id]').val(data[i].pro_id);
            $('input[name=sku_id]').val(data[i].sku_id);
           
   		}
   
   		
   		console.log(data);
   
   
   
   
   	},
   	error: function() {
   		alert('Ajax failour');
   	}
     	});
   }
   
   $('form#edit-product').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'get-product-update-data';
   	
   		$.post(URL , $('form#edit-product').serialize(), function(data){
   
   			if(data == '1'){
               
   				alert('Updated Successfully');
   			
   			 window.location.reload();
   			}
   		
   			
   		
   		//console.log(data);
   		
   		
   		
   		
   	})
   });	
   
   $('form#edit-pharmacy-form').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'get-update-pharmacy-data';
   	
   		$.post(URL , $('form#edit-pharmacy-form').serialize(), function(data){
   
   				alert('সফলভাবে আপডেট হয়েছে');
   			   window.location.reload();
   		
   		
   	})
      //alert();
   });	
   $('form#edit-branch').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'get-update-branch-data';
   	
   		$.post(URL , $('form#edit-branch').serialize(), function(data){
   
   				alert('সফলভাবে আপডেট হয়েছে');
   			   window.location.reload();
   		
   		
   	})
      //alert();
   });	
   $('form#edit-representative').on('submit', function(form){
   	
   		form.preventDefault();
   	
   		var URL = 'get-representative-update-data';
   	
   		$.post(URL , $('form#edit-representative').serialize(), function(data){
   
   				alert('সফলভাবে আপডেট হয়েছে');
   			   window.location.reload();
   		
   		
   	})
      //alert();
   });	
   
   
   
   
   $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
   });
   
   $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-danger").slideUp(500);
   });
   
    function DeleteProduct(pro_id,pro_name)
    {
   
   	 var url="<?php echo base_url();?>";
   	 var r=confirm("আপনি কি এই পণ্যটি ডিলিট করতে চান ?")
      if (r==true)
        window.location = url+"Product/DeleteProducts/"+pro_id+"/"+pro_name;
      else
      return false;
   } 
   function  DeleteRe(id)
    {
   
   	 var url="<?php echo base_url();?>";
   	 var r=confirm("আপনি কি এই প্রতিনিধির সকল তথ্য ডিলিট করতে চান ?")
      if (r==true)
        window.location = url+"Representative/DeleteRepresentateive/"+id;
      else
      return false;
   } 
   
   
   function DeleteBranch(br_id)
    {
      
   	 var url="<?php echo base_url();?>";
   	 var r=confirm("আপনি কি এই  এই ব্রাঞ্চের সকল পণ্যটি ডিলিট করতে চান ?")
      if (r==true)
        window.location = url+"Branch/DeleteBranch/"+br_id;
      else
      return false;
   } 
   
   
   function EditRepresentativeData(id){
    
     $('#modal-edit-representative').modal('show');
     var url ="<?php echo base_url();?>";
     // edit-representative
     $.ajax({
   	type: 'ajax',
   	method: 'get',
   	url: url+"get-representative-data",
   	data: {
   		id: id,
   	},
   	async: false,
   	dataType: 'json',
   	success: function(data) {
   
   		for(var i=0; i<data.length;i++){
   
   			$('input[name=re_name]').val(data[i].re_name);
   			$('input[name=re_phone]').val(data[i].re_phone);
   			$('input[name=re_address').val(data[i].re_address);
   			$('input[name=re_code]').val(data[i].re_code);
   			$('input[name=id]').val(data[i].id);
            $('select[name=re_branch]').val(data[i].br_id,data[i].branch_name);
    
   
   
   		}
   
   		
   		console.log(data);
   
   
   
   
   	},
   	error: function() {
   		alert('Ajax failour');
   	}
   });
   }
   function EditPharmacy(ph_id){
   
   $('#modal-edit-pharmacy').modal('show');
    var url ="<?php echo base_url();?>";
   
    $.ajax({
     type: 'ajax',
     method: 'get',
     url: url+"get-pharmacy-update-data",
     data: {
      ph_id: ph_id,
     },
     async: false,
     dataType: 'json',
     success: function(data) {
   
        for(var i=0; i<data.length;i++){
   
           $('input[name=ph_name]').val(data[i].ph_name);
           $('input[name=ph_phone]').val(data[i].ph_phone);
           $('input[name=ph_address').val(data[i].ph_address);
           $('input[name=ph_id').val(data[i].ph_id);
          
           $('input[name=ph_proprietor]').val(data[i].ph_proprietor);
           $('select[name=ph_under_branch]').val(data[i].br_id,data[i].branch_name);
           $('select[name=ph_under_representative]').val(data[i].id,data[i].re_name);
        
   
   
   
        }
   
        
        console.log(data);
   
   
   
   
     },
     error: function(error) {
        alert(error);
        
     }
   });
   }
   function EditBranch(br_id){
   
   $('#modal-edit-branch').modal('show');
   var url ="<?php echo base_url();?>";
   
   $.ajax({
   type: 'ajax',
   method: 'get',
   url: url+"get-branch-update-data",
   data: {
      br_id:br_id,
   },
   async: false,
   dataType: 'json',
   success: function(data) {
   
      for(var i=0; i<data.length;i++){
   
         $('input[name=branch_name]').val(data[i].branch_name);
         $('input[name=br_id]').val(data[i].br_id);
   
      }
   
      
      console.log(data);
   
   
   
   
   },
   error: function(error) {
      alert(error);
      
   }
   });
   
   }
   
   
</script>
<!--Add and Remove child-->
 
<script type="text/javascript">
   function DraftView(){
   
       $('#modal-invoice-view').modal('show');
   }
   
   function myFunction() 
   {
   var input, filter, table, tr, td, i;
   input = document.getElementById("myInput");
   filter = input.value.toUpperCase();
   table = document.getElementById("myTable");
   tr = table.getElementsByTagName("tr");
   for (i = 0; i < tr.length; i++) {
     td = tr[i].getElementsByTagName("td")[0];
     if (td) {
       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
         tr[i].style.display = "";
       } else {
         tr[i].style.display = "none";
       }
     }       
   }
   }
   $(function () 
   {
   
   $("#datepicker").datepicker({ 
         autoclose: true, 
         todayHighlight: true
   }).datepicker('update', new Date());
   
   });
   $(function () 
   {
   $("#datepicker2").datepicker({ 
         autoclose: true, 
         todayHighlight: true
   }).datepicker('update', new Date());
   
   });
   
</script>

<script type="text/javascript"> 
   document.body.onkeyup = function(e)
   {
      //e.preventDefault(); 
       if(e.ctrlKey == true && e.keyCode == 32){
         // alert("Space pressed!");
           
      if (confirm('আপনি কি ইনভয়েসটি সেভ করতে চান ?')) 
      {
   
            e.preventDefault();
            $('#InvoiceFormss').submit();
      }
      else{

         return false;
      }
    }
}
   
</script>
<script type="text/javascript">
   $( document ).ready(function(){
       var url = "<?php echo base_url();?>";
   
       $('#ProTable').on('change', '.sale', function(){
   
           	var id = $(this).attr('data-id');	
       
            	var sale = this.value;	
            
            
          
   
           $.ajax({
             type: 'ajax',
             method: 'get',
             url: url+"Invoice/GetBonus",
             data: {
               id: id , sale: sale
             },
             async: false,
             dataType: 'json',
             success: function(data) {
   
              //console.log(data);
               if(data == '1'){
                // console.log('You Can not sale more products than its stock');
                 $('#SaleError-'+id+'').html("স্টকের অধিক পণ্য ইনভয়েসে যোগ করতে পারবেন না!");
                 setTimeout(function() {$('#SaleError-'+id+'').fadeOut('fast');}, 2000);
               }
               if(data == '0'){
                
                 $('input[class=bonus-'+id+']').val("বোনাস নেই");
                 //$('input[class=total-'+id+']').val(totalPrice);
                
                 
   
               }else{
                 $('input[class=bonus-'+id+']').val(data);
                
             
               }
               
           
             },
             error: function(error) {
               console.log(error);
             }
           });
   
   
   
       });
   
   });
   $(document).ready(function () {
       // Handler for .ready() called.
       $('html, body').animate({
           scrollTop: $('#VisibleDiv').offset().top
       }, 'slow');
   });
            
           
</script>
<script>
  
   $(function() {
         
    
         $("#hint1,#hint2,#hint3,#hint4,#hint5,#hint6,#hint7,#hint8,#hint9,#hint10,#hint11,#hint12,#hint13,#hint14,#hint15,#hint16,#hint17,#hint18,#hint19,#hint20,#hint21,#hint22,#hint23,#hint24,#hint25,#hint26,#hint27,#hint28,#hint29,#hint30,#hint31,#hint32,#hint33,#hint34,#hint35,#hint36,#hint37,#hint38,#hint39,#hint40,#hint41,#hint42,#hint43,#hint44,#hint45,#hint46,#hint47,#hint48,#hint49,#hint50,#hint51,#hint52,#hint53,#hint54,#hint55,#hint56,#hint57,#hint58,#hint59,#hint60,#hint61,#hint62,#hint63,#hint64,#hint65,#hint66,#hint67,#hint68,#hint69,#hint70,#hint71,#hint72,#hint73,#hint74,#hint75,#hint76,#hint77,#hint78,#hint79,#hint80,#hint81,#hint82,#hint83,#hint84,#hint85,#hint86,#hint87,#hint88,#hint89,#hint90,#hint91,#hint92,#hint93,#hint94,#hint95,#hint96,#hint97,#hint98,#hint99,#hint100,#hint101,#hint102,#hint103,#hint104,#hint105,#hint106,#hint107,#hint108,#hint109,#hint110,#hint111,#hint112,#hint113,#hint114,#hint115,#hint116,#hint117,#hint118,#hint119,#hint120,#hint121,#hint122,#hint123,#hint124,#hint125,#hint126,#hint127,#hint128,#hint129,#hint130,#hint131,#hint132,#hint133,#hint134,#hint135,#hint136,#hint137,#hint138,#hint139,#hint140,#hint141,#hint142,#hint143,#hint144,#hint145,#hint146,#hint147,#hint148,#hint149,#hint150,#hint151,#hint152,#hint153,#hint154,#hint155,#hint156,#hint157,#hint158,#hint159,#hint160,#hint161,#hint162,#hint163,#hint164,#hint165,#hint166,#hint167,#hint168,#hint169,#hint170,#hint171,#hint172,#hint173,#hint174,#hint175,#hint176,#hint177,#hint178,#hint179,#hint180,#hint181,#hint182,#hint183,#hint184,#hint185,#hint186,#hint187,#hint188,#hint189,#hint190,#hint191,#hint192,#hint193,#hint194,#hint195,#hint196,#hint197,#hint198,#hint199, #hint200").autocomplete({
   
             source: "<?php echo base_url('Invoice/GetProductName'); ?>",
             select: function( event, ui ) {
               
                 event.preventDefault();
                 var values = ui.item.value;
                 var hintsid = $(this).attr('id');
                 var hintidname = '#'+hintsid;
                //console.log(ui.item.id);
                 $('input[id='+hintsid+']').attr('data-id',ui.item.id); // This is the id name of current input hint
                 $(hintidname).closest('td').next().find('.sale').attr('data-id',ui.item.id);
                 $(hintidname).closest('td').next().find('.sale').attr('id', 'saledata-'+ui.item.id);
                 $('#saledata-'+ui.item.id).closest('td').next().find('.bonus').attr('data-id',ui.item.id);
                 $('#saledata-'+ui.item.id).closest('td').next().find('.bonus').attr('class','bonus-'+ui.item.id);
                 $('.bonus-'+ui.item.id).closest('td').next().find('.bonus').attr('class','bonus-'+ui.item.id);
                 $('.bonus-'+ui.item.id).closest('td').next().find('.mp').attr('class','market_price-'+ui.item.id);
                 $('input[class=market_price-'+ui.item.id+']').val(ui.item.market_price);
                 $(hintidname).closest('td').next().find('span').append('<input type="hidden" name="pro_id[]" value="'+ui.item.id+'" />');
                 $(hintidname).closest('td').next().find('span').append('<input type="hidden" name="pro_net_price[]" value="'+ui.item.net_price+'" />');
                 $(hintidname).closest('td').next().find('span').append('<input type="hidden" name="pro_stock[]" value="'+ui.item.stock+'" />');
                 $(hintidname).closest('td').next().find('span').append('<input type="hidden" name="pro_performances[]" value="'+ui.item.performances+'" />');
                 $(hintidname).closest('td').next().find('span').append('<input type="hidden" name="pro_name[]" value="'+ui.item.pro_name+'" />');
                 $(hintidname).closest('td').next().find('span').append('<input type="hidden" name="pro_sku[]" value="'+ui.item.pro_code+'" />');
                 
            
             }
   
         });
   
        
     });
   //   $('.clear').on('click', function(){

   // //    var inputs = $(this).attr('data-value');
   // //   // document.getElementById("myText").name;
   // //    var value = document.getElementById("#hint'"+inputs+'"').name;
   // //       // for(var i=0;i<value.length;i++)
   // //       //    inputs[i].value = '';
   // //    alert(value);

   //   });
   jQuery(document).ready(function() {
      jQuery('.clear').click(function() {
         jQuery(this).parents('tr').find('. ').attr('data-id',0);
         jQuery(this).parents('tr').find('.sale').attr('id', 'saledata-');
      });
      });
         
   
   
</script>
<!-- Javascript code start -->
<script>
      var currentTime = new Date(),
      hours = currentTime.getHours(),
      minutes = currentTime.getMinutes();

	if (minutes < 10) {
	 minutes = "0" + minutes;
  }

	var suffix = "AM";
	if (hours >= 12) {
    suffix = "PM";
    hours = hours - 12;
	}
	if (hours == 0) {
	 hours = 12;
	}
   $('#timer').html("বর্তমান সময়ঃ "+hours + ":" + minutes+ " "+ suffix);
   </script>
</body>
</html>
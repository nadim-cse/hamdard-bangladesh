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

   <?php echo form_open('store-product-data', array('class' => 'insert-product-form')); ?>
   <div class="row">
   <!-- left column -->
   <div class="col-md-12">
      <!-- Form Element sizes -->
      <div class="box box-body">
         <div class="box-header with-border">
            <h3 class="box-title">পণ্য ব্যবস্থাপনা</h3>
            <div class="InsertSuccess"></div>
         </div>
         <div class="box-body">
         <div class="callout callout-warning">
                <h4>একই নামের একাধিক পণ্যের ক্ষেত্রে Add More বাটন চেপে পণ্যের মূল্য, একক এবং পরিমাণ যোগ করুণ  </h4>
              </div>
         <div class="form-group">
            <input class="form-control input-lg nameinputs" name="pro_name" type="text" placeholder="পণ্যের নাম" required>
          </div>
            <div class="row">
                <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                    <label>একক</label>
                        <select class="form-control" id="type" name="pro_unit" style="width: 100%;" required>
                            <option value="">- একক বাছাই করুণ-</option>
                            <option >মিলি</option>
                            <option>ট্যাবলেট</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                   <label>পন্যের ধরন</label>
                        <select class="form-control" id="type" name="pro_type" style="width: 100%;" required>
                           <option value="">- ধরন বাছাই করুন-</option>
                           <option >সিরাপ</option>
                           <option>ট্যাবলেট</option>
                           <option>ক্যাপসুল</option>
                        </select>
                    </div>
                </div>
            <div>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div id="field">
         <div id="field0">
            <div class="box box-danger">
               <div class="box-header with-border">
                  <h3 class="box-title">পণ্যের মূল্য, একক এবং পরিমাণ</h3>
               </div>
               <div class="box-body">
                  <div class="row">
                     <div class="col-xs-12 col-md-3">
                        <label>নেট  মূল্য</label>
                        <input type="number" min="0" name="pro_net_price[]" class="form-control" placeholder="নেট মূল্য" required>
                     </div>
                     <div class="col-xs-12 col-md-3">
                        <label>বাজার মূল্য</label>
                        <input type="number" min="0" name="pro_market_price[]" class="form-control" placeholder="বাজার মূল্য" required>
                     </div>
                     <div class="col-xs-12 col-md-3">
                        <label>পরিবেশনা</label>
                        <input type="text" name="pro_performances[]" class="form-control" placeholder="পরিবেশনা" required>
                     </div>
                     <div class="col-xs-12 col-md-3">
                        <label>কোড</label>
                        <input type="text" name="pro_sku[]" class="form-control" placeholder="পণ্যের কোড" >
                     </div>
                    
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-xs-12 col-md-3">
                        <label>স্টক</label>
                        <input type="number" min="0" name="pro_stock[]" class="form-control" placeholder="স্টক" required>
                     </div>
                     <div class="col-xs-12 col-md-3">
                        <label>কতটা প্রডাক্টকে বোনাস দিবেন</label>
                        <input type="number" min="0" name="pro_bonus[]" id="getProductBounsValue" class="form-control" placeholder="কতটা প্রডাক্টকে বোনাস দিবেন" required>
                     </div>
                     <div class="col-xs-12 col-md-3">
                        <label>কতটা বোনাস দিবেন?</label>
                        <input type="number" min="0" name="pro_gained_bonus[]" class="form-control" placeholder="কতটা বোনাস দিবেন?" required>
                     </div>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!--/.col (left) -->
      </div>
      <input type="submit" class="btn bg-navy margin pull-right" id="subbtn" value="তথ্য সংরক্ষণ করুণ">
      <div class="form-group">
                  <button id="add-more" type="button" class="btn btn-warning" >Add More</button>
               </div>
      <?php echo form_close(); ?>
      <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

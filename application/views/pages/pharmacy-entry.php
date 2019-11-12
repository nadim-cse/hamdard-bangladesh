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
          <div class="col-md-12">
          <?php echo form_open_multipart('Pharmacy/import', array('method' => 'POST', 'id' => 'import_form'));?>
                <p><label for="">Select excel file</label></p>
                <p><input type="file" name="file" id="file" accept=".xls, .xlsx" required></p>
                <p><input type="submit" name="import" value="Import" class="btn btn-info"></p>
              <?php echo form_close(); ?>
          </div>
        </div>
     <?php echo form_open('store-pharmacy-data', array('class' => 'insert-pharmacy-form')); ?>
      <div class="row">
             <!-- left column -->
            <div class="col-md-12">
                <!-- Form Element sizes -->
                <div class="box box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">ফার্মেসির তথ্যঃ</h3>
                        <div class="InsertSuccess"></div>
                    </div>
                    <div class="box-body">
                        <input class="form-control input-lg" name="ph_name" type="text" placeholder="ফার্মেসির নাম" required>
                    <br>
                    <input class="form-control" type="text" name="ph_proprietor" placeholder="ফার্মেসির প্রোপ্রাইটোর" required>
                    <br>
                    <input class="form-control" type="text" name="ph_address" placeholder="ফার্মেসির ঠিকানা" required>
                    <br>
                    <input class="form-control" type="tel" name="ph_phone" placeholder="মোবাইল নাম্বার"  required>
                    <p class="text-red">+880 ফরমেটে নাম্বার লিখবেন</p>
                    <br>
                    <div class="form-group">
                        <label>কোন ব্রাঞ্চের অধীনে ফার্মেসিটি পড়বে? </label>
                        <select class="form-control" id="RepresentativeBranch" name="ph_under_branch" style="width: 100%;">
                             <option readonly>----- এখান থেকে বাছাই করুন ----</option>
                             <?php foreach($BranchList as $branch): ?>
                                <option value="<?php echo $branch->br_code; ?>"><?php echo $branch->branch_name; ?></option> 
                             <?php endforeach; ?>   
                        </select>
                         
                    </div>
                    <br>
                    <div class="form-group">
                        <label>কোন প্রতিনিধির অধীনে ফার্মেসিটি পড়বে? </label>
                        <select class="form-control PharmacyBranchs" id="PharmacyBranch" name="ph_under_representative" style="width:100%;">
                              <option> ---- ব্রাঞ্চ সিলেক্ট করার পর এখান থেকে বাছাই করুন প্রতিনিধি বাছাই করুন ---- <option>
                        
                        </select>
                         
                    </div>
                    <br>
                    <div class="form-group">
                     <input type="submit" class="btn btn-success margin pull-right" value="তথ্য সংরক্ষণ করুন">
                    </div>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
               
            </div>

            <!--/.col (left) -->
      </div>
      <?php echo form_close(); ?>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
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
     <?php echo form_open_multipart('Representative/import', array('method' => 'POST', 'id' => 'import_form'));?>
                      <p><label for="">Select excel file</label></p>
                      <p><input type="file" name="file" id="file" accept=".xls, .xlsx" required></p>
                      <p><input type="submit" name="import" value="Import" class="btn btn-info"></p>
                    <?php echo form_close(); ?>
     </div>
     </div>
     <?php echo form_open('store-represenative-data', array('class' => 'insert-representative-form')); ?>
      <div class="row">
             <!-- left column -->
            <div class="col-md-12">
                <!-- Form Element sizes -->
                <div class="box box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">প্রতিনিধির তথ্যঃ</h3>
                        <div class="InsertSuccess"></div>
                        <div class="InsertError"></div>
                    </div>
               
                    <div class="box-body">
                        <input class="form-control input-lg" name="re_name" type="text" placeholder="প্রতিনিধির নাম" required>
                    <br>
                    <input class="form-control" name="re_code" type="text" placeholder="প্রতিনিধির কোড" required>
                    <br>
                    <input class="form-control" type="text" name="re_address" placeholder="প্রতিনিধির ঠিকানা" required>
                    <br>
                    <input class="form-control" type="tel" name="re_phone" placeholder="প্রতিনিধির মোবাইল নাম্বার"  required>
                    <p class="text-red">+88 কোড স্বয়ংক্রিয়ভাবে ফোন নাম্বারের সাথে যুক্ত হয়ে যাবে</p>
                    <br>
                    <div class="form-group">
                        <label>প্রতিনিধির ব্রাঞ্চ</label>
                        <select class="form-control" id="RepresentativeBranch" name="re_branch" style="width: 100%;">
                             <option readonly>----- এখান থেকে বাছাই করুন ----</option>
                             <?php foreach($Branches as $branch): ?>
                                <option value="<?php echo $branch->br_code; ?>"><?php echo $branch->branch_name; ?></option> 
                             <?php endforeach; ?>   
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
 
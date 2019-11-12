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
     <?php echo form_open('store-branch-data', array('class' => 'insert-branch-form')); ?>
      <div class="row">
             <!-- left column -->
            <div class="col-md-12">
                <!-- Form Element sizes -->
                <div class="box box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">ব্রাঞ্চের তথ্যঃ</h3>
                        <div class="InsertSuccess"></div>
                    </div>
                    <div class="box-body">
                        <input class="form-control input-lg" name="branch_name" type="text" placeholder="ব্রাঞ্চের নাম" required>
                    <br>
                    <input class="form-control input-lg" name="branch_code" type="text" placeholder="ব্রাঞ্চের কোড" required>
                    <br>
                    <div class="InsertError"></div>
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
 
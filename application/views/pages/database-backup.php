  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        সেটিংস
        <small>ডাটাবেজ ব্যাকআপ</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php if(isset($BreadcumbsURI)) echo $BreadcumbsURI ?>"><i class="fa fa-dashboard"></i> <?php if(isset($Breadcumbs)) echo $Breadcumbs ?></a></li>
        <li class="active"><?php if(isset($PageTitle)) echo $PageTitle ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-md-6">
            <a href="<?php echo site_url('Dashboard/CreateDatabaseBackup');?>" class="btn btn-success">ডাটাবেজ ব্যাকআপ নিতে ক্লিক করুন</a>
         </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
Branches  <!-- Content Wrapper. Contains page content -->
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
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          <?php if($this->session->flashdata('deleteSuccess')){echo $this->session->flashdata('deleteSuccess');} ?>
            <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ব্রাঞ্চের নাম</th>
                <th>ব্রাঞ্চের কোড</th>
                <th>ব্রাঞ্চ তৈরীর তারিখ</th>
                <th>একশন</th>
            </tr>
        </thead>
        <tbody>
          <?php $counter = 1;?>
          <?php if(isset($Branches)) :?>
          <?php if(!empty($Branches)) :?>
        <?php foreach($Branches as $branch): ?>
            
            <tr  class="accordion-toggle"  data-toggle="collapse" data-target="#collapseOne">
                <td><?php echo $counter++;; ?></td>
                <td><?php echo $branch->branch_name; ?></td>
                <td><?php echo $branch->br_code; ?></td>
                <td><?php echo BanglaConverter::en2bn(date("d,M Y | h:i A", strtotime($branch->branch_create_at))) ?></td>
                <td><a href="javascript:EditBranch(<?php echo $branch->br_id; ?>)" class="btn btn-warning">এডিট</a> <a href="javascript:DeleteBranch(<?php echo  $branch->br_id; ?>)" class="btn btn-danger">ডিলিট</a></td>
            </tr>
            
         <?php endforeach; ?>   
          <?php else:?>   
          <h2>কোন তথ্য পাওয়া যায় নি</h2>
          <?php endif; ?>   
          <?php endif; ?>   
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>ব্রাঞ্চের নাম</th>
                <th>ব্রাঞ্চের কোড</th>
                <th>ব্রাঞ্চ তৈরীর তারিখ</th>
                <th>একশন</th>
            </tr>
        </tfoot>
    </table>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
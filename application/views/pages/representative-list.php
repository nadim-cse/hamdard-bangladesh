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
                <th>নাম</th>
                <th>মোবাইল নংঃ</th>
                <th>ঠিকানা</th>
                <th>শাঁখা</th>
                <th>কোড নংঃ</th>
                <th>যোগ দেয়ার সময়</th>
                <!-- <th>সর্বশেষ আপডেট</th> -->
                <th>প্রক্রিয়া</th>
            </tr>
        </thead>
        <tbody>
          <?php $counter = 1;?>
          <?php if(!empty($Representatives)):?>
        <?php foreach($Representatives as $representative): ?>
            <tr>
                <td><?php echo $counter ++; ?></td>
                <td><?php echo $representative->re_name; ?></td>
                <td><?php echo $representative->re_phone; ?></td>
                <td><?php echo $representative->re_address; ?></td>
                <td><?php echo $representative->branch_name; ?></td>
                <td><?php echo $representative->re_code; ?></td>
                <td><?php echo date("d,M Y | h:i A", strtotime($representative->re_create_at)) ?></td>
                <!-- <td><?php echo date("d,M Y | h:i A", strtotime($representative->re_update_at)) ?></td> -->
                <td><a href="javascript:EditRepresentativeData(<?php echo $representative->id?>);" class="btn btn-warning" style="">Edit</a> <a href="javascript:DeleteRe(<?php echo  $representative->id; ?>)" class="btn btn-danger" style="">Delete</a></td>
            </tr>
         <?php endforeach; ?>  
         <?php else:?>

         <?php endif;?> 
        </tbody>
        <tfoot>
            <tr>
              <th>#</th>
              <th>নাম</th>
              <th>মোবাইল নংঃ</th>
              <th>ঠিকানা</th>
              <th>শাঁখা</th>
              <th>কোড নংঃ</th>
              <th>যোগ দেয়ার সময়</th>
              <!-- <th>সর্বশেষ আপডেট</th> -->
              <th>প্রক্রিয়া</th>
            </tr>
        </tfoot>
    </table>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <a href="<?php echo site_url('Representative/PrintRe');?>" class="btn btn-warning">প্রিন্ট করুন</a>
      </div>
      <!-- /.box -->

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
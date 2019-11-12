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
          
             <div class="col-md-12">
                <table id="example" class="table" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>নাম</th>
                      <th>মোবাইল নংঃ</th>
                      <th>ঠিকানা</th>
                      <th>শাঁখা</th>
                      <th>প্রতিনিধি</th>
                      <th>কোড নংঃ</th> 
                      <th>যোগ দেয়ার সময়</th>
                      <th>সর্বশেষ আপডেট</th>
                      <th>প্রক্রিয়া</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $counter = 1;?>
                        <?php if(isset($Pharmacies)): ?>
                        <?php if(!empty($Pharmacies)): ?>
                        <?php foreach($Pharmacies as $pharmacy): ?>
                          <tr>
                              <td><?php echo $counter++; ?></td>
                              <td><?php echo $pharmacy->ph_name; ?></td>
                              <td><?php echo $pharmacy->ph_phone; ?></td>
                              <td><?php echo $pharmacy->ph_address; ?></td>
                              <td><?php echo $pharmacy->branch_name; ?></td>
                              <td><?php echo $pharmacy->re_name; ?></td>
                              <td><?php echo $pharmacy->ph_code; ?></td>
                              <td><?php echo date("d,M Y | h:i A", strtotime($pharmacy->ph_create_at)) ?></td>
                              <td><?php  if(date("d,M Y | h:i A", strtotime($pharmacy->ph_update_at)) == '01,Jan 1970 | 06:00 AM')
                                      { echo "আপডেট হয় নি"; 
                                      
                                      } else{ echo date("d,M Y | h:i A", strtotime($pharmacy->ph_update_at)); } ?></td>
                              <td><a href="javascript:EditPharmacy(<?php echo  $pharmacy->ph_id; ?>);" class="btn btn-warning">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
                          </tr> 
                    <?php endforeach;?> 
                    <?php else:?>
                    <h2>ডাটাবেজে কোন ইনপুট দেওয়া নেই</h2>   
                    <?php endif; ?>   
                    <?php endif; ?>   
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>নাম</th>
                        <th>মোবাইল নংঃ</th>
                        <th>ঠিকানা</th>
                        <th>শাঁখা</th>
                        <th>প্রতিনিধি</th>
                        <!-- <th>কোড নংঃ</th> -->
                        <th>যোগ দেয়ার সময়</th>
                        <th>সর্বশেষ আপডেট</th>
                        <th>প্রক্রিয়া</th>
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
 
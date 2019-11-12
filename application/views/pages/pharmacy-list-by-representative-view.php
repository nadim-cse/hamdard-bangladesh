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
            <?php echo form_open('get-pharmacy-by-representative', array('method' => 'get'));?>
            <div class="col-md-12">
              <div class="form-group">
                <label>ব্রাঞ্চের নাম</label>
                   <select class="form-control" id="RepresentativeBranch" name="branch_id" data-placeholder="Select a Category"
                        style="width: 100%;">
                        <option readonly>----- এখান থেকে বাছাই করুন ----</option>
                             <?php foreach($BranchList as $branch): ?>
                                <option value="<?php echo $branch->br_code; ?>"><?php echo $branch->branch_name; ?></option> 
                             <?php endforeach; ?>       
                </select>
              </div>
              <div class="form-group">
                <div class="form-group">
                <label>কোন প্রতিনিধির অধীনে ফার্মেসিটি পড়বে? </label>
                <select class="form-control" id="PharmacyByRe" name="id" style="width:100%;">
                      <option> ---- ব্রাঞ্চ সিলেক্ট করার পর এখান থেকে বাছাই করুন প্রতিনিধি বাছাই করুন ---- <option>
                
                </select>
                 
              </div>  
              </div>
              <div class="form-group">
                    <!-- <a href="javascript:;"  id="Loadbtn" class="btn bg-navy">লোড করুন</a> -->
                    <button type="submit" class="btn bg-navy">লোড করুন</button>
             </div>
             <?php echo form_close();?>
            </div>
            <!-- /.col -->
          </div>
          <br>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
            <table id="example" class="table" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>নাম</th>
                <th>কোড নংঃ</th>
                <th>মোবাইল নংঃ</th>
                <th>ঠিকানা</th>
                <th>শাঁখা</th>
                <th>প্রতিনিধি</th>
                <th>যোগ দেয়ার সময়</th>
                <th>সর্বশেষ আপডেট</th>
                <th>প্রক্রিয়া</th>
            </tr>
        </thead>
        <tbody>
          <?php $counter = 1;?>
          <?php if(isset($Pharmacies)):?>
          <?php if(!empty($Pharmacies)):?>
        <?php foreach($Pharmacies as $pharmacy): ?>
            <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $pharmacy->ph_name; ?></td>
                <td><?php echo $pharmacy->ph_code; ?></td>
                <td><?php echo $pharmacy->ph_phone; ?></td>
                <td><?php echo $pharmacy->ph_address; ?></td>
                <td><?php echo $pharmacy->branch_name; ?></td>
                <td><?php echo $pharmacy->re_name; ?></td>
                <td><?php echo date("d,M Y | h:i A", strtotime($pharmacy->ph_create_at)) ?></td>
                <td><?php echo date("d,M Y | h:i A", strtotime($pharmacy->ph_update_at)) ?></td>
                <td><a href="javascript:EditPharmacy(<?php echo  $pharmacy->ph_id; ?>);" class="btn btn-warning">Edit</a> <a href="" class="btn btn-danger">Delete</a></td>
            </tr>
         <?php endforeach; ?> 
         <?php else:?>
         <h2>কোন তথ্য পাওয়া যায় নি</h2>
         <?php endif ;?>  
         <?php endif ;?>  
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
            </div>
          </div>
        </div>
      </div>
      <!-- /.box -->

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
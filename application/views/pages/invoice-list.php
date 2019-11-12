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
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
            <?php echo form_open('Invoice/GetInvoiceListByBranch', array('method'=> 'GET'));?>
              <!-- <div class="form-group">
                <label>ব্রাঞ্চের নাম</label>
                   <select class="form-control" id="" name="br_id" data-placeholder="Select a Category"
                        style="width: 100%;" required>
                        <option value="" readonly>----- এখান থেকে বাছাই করুন ----</option>
                             <?php //foreach($BranchList as $branch): ?>
                                <option value="<?php //echo $branch->br_code; ?>"><?php echo $branch->branch_name; ?></option> 
                     <?php //endforeach; ?>       
                </select>
              </div> -->
              <!-- <div class="form-group">
                <div class="form-group">
                <label>কোন প্রতিনিধির অধীনে ফার্মেসিটি পড়বে? </label>
                <select class="form-control" id="PharmacyByRe" name="ph_under_representative" style="width:100%;">
                      <option> ---- ব্রাঞ্চ সিলেক্ট করার পর এখান থেকে বাছাই করুন প্রতিনিধি বাছাই করুন ---- <option>
                
                </select>
                 
              </div>  
              </div> -->
              <div class="form-group">
                        <label>কোন ব্রাঞ্চের অধীনে ফার্মেসিটি পড়বে? </label>
                        <select class="form-control" id="RepresentativeBranch" name="ph_under_branch" style="width: 100%;" required>
                             <option value="">----- এখান থেকে বাছাই করুন ----</option>
                             <?php foreach($BranchList as $branch): ?>
                                <option value="<?php echo $branch->br_code; ?>"><?php echo $branch->branch_name.", কোডঃ- ".$branch->br_code; ?></option> 
                             <?php endforeach; ?>   
                        </select>
                         
                    </div>
                    <br>
                    <div class="form-group">
                        <label>কোন প্রতিনিধির অধীনে ফার্মেসিটি পড়বে? </label>
                        <select class="form-control PharmacyBranchs" id="PharmacyBranch" name="ph_under_representative" style="width:100%;" required>
                              <option value=""> ---- ব্রাঞ্চ সিলেক্ট করার পর এখান থেকে বাছাই করুন প্রতিনিধি বাছাই করুন ---- <option>
                        
                        </select>
                         
                    </div>
              <div class="form-group">
                    <!-- <a href="javascript:;"  id="Loadbtn" class="btn bg-navy">লোড করুন</a> -->
                    <button type="submit"  class="btn bg-navy">লোড করুন</button>
              </div>
              <?php echo form_close();?>
            </div>
            <!-- /.col -->
          </div>
          <br>
          <!-- /.row -->
          <div class="row">
         
            <div class="col-md-12">
            <?php if(!empty($InvoiceData)):?>
            <h2><span style="color:blue"><?php if(isset($BranchName)) echo $BranchName; ?></span> ব্রাঞ্চের <span style="color:red"> প্রতিনিধিঃ- <?php if(isset($Rename)) echo $Rename; ?> (<?php if(isset($ReID)) echo $ReID?>)</span> এর অধীনস্থ সকল ইনভয়েসের তালিকা</h2>
            
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="ইনভয়েস নংঃ লিখুন " title="Type in a name">
                <a href="<?php echo site_url('print-all-invoice/'.$BranchID.'/'.$ReID);?>" class="btn btn-success">সব ইনভয়েস প্রিন্ট করুন</a>
                <br>

                <table id="myTable">
                <tr class="header">
                    <th style="width:5%;">#</th>
                    <th style="width:15%;">ইনভয়েস নংঃ.</th>
                    <th style="width:10%;">ব্রাঞ্চ</th>
                    <th style="width:20%;">ফার্মেসী</th>
                    <th style="width:15%;">প্রতিনিধি</th>
                    <th style="width:15%;">ইনভয়েসের তারিখ</th>
                    <th style="width:40%;">সম্পুর্ন তথ্য দেখুন </th>
                </tr>
                <?php $Counter = 1;?>
               
                <?php foreach($InvoiceData as $id ):?>
                <tr>
                    <td><?php echo $Counter++ ?></td>
                    <td><?php echo $id->serial_no?></td>
                    <td><?php echo $id->branch_name?></td>
                    <td><?php echo $id->ph_name?></td>
                    <td><?php echo $id->re_name?></td>
                    <td><?php echo  BanglaConverter::en2bn(date("d/m/Y ", strtotime($id->invoice_master_create_at))); ?></td>
                    <td><a href="<?php echo site_url('invoice-list/'.$id->invoice_master_id);?>" class="btn btn-block btn-info btn-lg">ক্লিক করুণ</a></td>
                   
                </tr>
                <?php endforeach;?>
                </table>
            </div>
            <?php else:?>
                <h2 class="text-center"><span style="color:blue"><?php if(isset($BranchName)) echo $BranchName; ?></span> ব্রাঞ্চের <span style="color:red"> প্রতিনিধিঃ- <?php if(isset($Rename)) echo $Rename; ?> <?php if(isset($ReID)) echo $ReID?> </span> এর অধীনে কোন ইনভয়েসের রেকর্ড পাওয়া যায় নি</h2>
            <?php endif;?>
          </div>
        </div>
      </div>
      <!-- /.box -->

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
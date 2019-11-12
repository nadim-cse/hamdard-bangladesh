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
          <h3 class="box-title" style="color:green;">পণ্যের ধরন সিলেক্ট করে "তথ্য লোড করুণ" বাটন চাপুন </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
           
              <?php echo form_open_multipart('Product/import', array('method' => 'POST', 'id' => 'import_form'));?>
                <p><label for="">Select excel file</label></p>
                <p><input type="file" name="file" id="file" accept=".xls, .xlsx" required></p>
                <p><input type="submit" name="import" value="Import" class="btn btn-info"></p>
              <?php echo form_close(); ?>

              <div class="form-group">
                <label>পণ্যের ধরণ</label>
                <?php echo form_open('get-products-by-type', array('method' => 'GET')); ?>
                <select class="form-control" id="ProductCat" name="product_type"  data-placeholder="পণ্যের ধরণ"
                        style="width: 100%;">
                        <option value="">-- পণ্যের ক্যটাগরী সিলেক্ট করুণ </option>
                        <?php if(!empty($ProResOBJ)): ?>
                        <?php foreach($ProResOBJ as $pro_type => $pt): ?>
                        
                          <option value="<?php echo $pro_type ?>"><?php echo $pro_type ?></option>
                        
                        <?php endforeach; ?>  
                        <option value="all">সকল পণ্য</option>
                          <?php else: ?>
                          <option value="">কোন পন্য এখনো এন্ট্রি দেওয়া হয় নি</option>
                          <?php  endif;?>
                </select>
              </div>
              <div class="form-group">
                <input type="submit" class="btn bg-navy" value="তথ্য লোড করুণ">
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.col -->
          </div>

        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
            <button onclick="PrintProductTable('test')">Print</button>
            <script>
              function PrintProductTable(em1){

                var restorepage = document.body.innerHTML;
                var printcontent =  document.getElementById(em1).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
              }
            </script>
             <?php if($this->session->flashdata('deleteSuccess')){echo $this->session->flashdata('deleteSuccess');} ?>
            <div id="test">
            <table id="example" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>নাম</th>
                  <th>কোড</th>
                  <th>পণ্যের ধরণ</th>
                  <th>নেট মূল্য</th>
                  <th>বাজার মূল্য</th>
                  <th>পরিবেশন</th>
                  <th>স্টক</th>
                  <th>বোনাস</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(isset($Products) && !empty($Products)): $Counter = 1 ;?>
                    <?php foreach($Products as $product): ?>
                        <tr>
                            <td><p><?php echo  $Counter++; ?><p></td>
                            <td><p><?php echo  $product->pro_name; ?><p></td>
                            <td><p><?php echo  $product->pro_sku; ?><p></td>
                            <td><p><?php echo  $product->pro_type; ?><p></td>
                            <td><p><?php echo  BanglaConverter::en2bn(round($product->pro_net_price)); ?><p></td>
                            <td><p><?php echo  BanglaConverter::en2bn(round($product->pro_market_price)); ?><p></td>
                            <td><p><?php echo  BanglaConverter::en2bn($product->pro_performances.' '. $product->pro_unit); ?><p></td>
                            <td><p><?php echo  BanglaConverter::en2bn($product->pro_stock); ?><p></td>
                            <td><p><?php echo  "প্রতি ".BanglaConverter::en2bn($product->bonus_target)." পন্যে বোনাস হচ্ছে ".BanglaConverter::en2bn($product->gained_bonus); ?><p></td>
                            <!-- <td><?php echo date("d,M Y | h:i A", strtotime( $product->pro_created_at)) ?></td>
                            <td><?php echo date("d,M Y | h:i A", strtotime( $product->pro_update_at)) ?></td> -->
                            <?php $productName =  "'".$product->pro_name."'";  ?>
                            <td><p><a href="javascript:EditProduct(<?php echo  $product->pro_id; ?>);" class="btn btn-warning">Edit</a>  <a href="javascript:DeleteProduct(<?php echo  $product->pro_id.', '.$productName; ?>)" class="btn btn-danger">Delete</a></p></td>
                           
                        </tr>
                       
                    <?php endforeach; ?>
                    <?php else:?>

                    <?php endif;?>
               
                    
                </tbody>
                <tfoot>
                    <tr>
                      <th>#</th>
                      <th>নাম</th>
                      <th>কোড</th>
                      <th>পণ্যের ধরণ</th>
                      <th>নেট মূল্য</th>
                      <th>বাজার মূল্য</th>
                      <th>পরিবেশন</th>
                      <th>স্টক</th>
                      <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
          </div>
          <!-- /.row -->
        </div>

      </div>
      <!-- /.box -->

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
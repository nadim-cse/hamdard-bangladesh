


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <section class="content">
        
        <div class="body-title">
    	   <div class="row">
               <div class="col-md-3 ol-sm-4">
                   <img class="hamdard" src="<?php echo site_url()?>assets/logo/hamdard_logo2.png">
               </div>
               <div class="col-md-9 ol-sm-8">
                   <h2 style="margin-left:13%">
                       হামদর্দ ল্যাবরেটরীজ (ওয়াক্‌ফ) বাংলাদেশ
                    </h2>
                   <p style="margin-left:13%">   
                       হামদর্দ ল্যাবরেটরীজ 
                    </p>
               </div>
            </div>
		</div>
        
        <div class="address text-center">
                    <p>
                        জেলা পরিবেশকঃ মেসার্স মারহাবা ফার্মেসি 
                    </p>
                    <p>
                        নতুন পৌরসভা রোড (মাদার কেয়ার ডায়গনাস্টিক সেন্টার সংলগ্ন),শায়েস্তানগর,হবিগঞ্জ।
                    </p>
        </div>
        <?php $invoiceNo ; $invoice_master_id ;  $InvoiceDate; $pharmacy_address ; $pharmacy_phone; $pharmacy_owner; $Area; $Representative; $GrandTotal;?>
        <?php foreach($InvoiceResOBJ as $pharmacy_name => $datas):?>
        <?php foreach($datas as $data):?>
        <?php  
            $invoiceNo = $data->serial_no; 
            $InvoiceDate = $data->invoice_master_create_at; 
            $pharmacy_address = $data->ph_address; 
            $pharmacy_phone = $data->ph_phone; 
            $pharmacy_name = $data->ph_name; 
            $pharmacy_owner = $data->ph_proprietor; 
            $Representative = $data->re_name; 
            $Area = $data->branch_name; 
            $GrandTotal = $data->grand_total ; 
            $invoice_master_id = $data->invoice_master_id;
        
        ?>

        <?php endforeach;?>
        <div class="Serial-Number">
            <div class="row">
                <div class="col-md-6">
                    ইনভয়েস নং - <?php echo $invoiceNo; ?>
                </div>
                <div class="col-md-6 text-right">
                    তারিখ -  <?php echo  BanglaConverter::en2bn(date("d/m/Y ", strtotime($InvoiceDate))); ?>
                </div>
            </div>  
        </div> 
        
        <div class="pharma-address">
            <div class="row">
                <div class="address-part1 col-md-4 col-sm-6">
                    <p>এরিয়া - <?php echo $Area;?> </p>
                    <p>গ্রাম - <?php echo $Area;?> </p>
                    <p>প্রতিনিধি - <?php echo $Representative; ?> </p>
                </div>
                <div class="address-part2 col-md-4 col-sm-6">
                    <p>ফার্মেসীর নাম - <?php echo $pharmacy_name; ?>  </p>
                    <p>প্রোপ্রাইটোর - <?php echo $pharmacy_owner; ?>  </p>
                    <p>ফার্মেসীর ঠিকানা - <?php echo $pharmacy_address; ?> </p>
                    <p>মোবাইল নং - <?php echo  BanglaConverter::en2bn($pharmacy_phone); ?> </p></div>
                <div class="col-md-4 col-sm-0"></div>
            </div>
        </div>
        
        <div class="medicine-table">
            <div class="table-responsive">
                <table class="table">
                <thead>
                  <tr>
                    <th>ক্রমিক নং </th>
                    <th>পণ্যের নাম </th>
                    <th>পণ্যের কোড</th>
                    <th>পরিবেশনা</th>
                    <th>পরিমান</th>
                    <th>দর</th>
                    <th>বোনাস</th>
                    
                    <th class="text-right">মোট টাকা</th>
                  </tr>
                </thead>
                <tbody>
                <?php $counter = 1;?>
                <?php foreach($datas as $data):?>
                  <tr>
                    <td><?php echo  BanglaConverter::en2bn($counter++)?></td>
                    <td><?php echo $data->product_name; ?></td>
                    <td><?php echo $data->pro_sku; ?></td>
                    <td><?php echo  BanglaConverter::en2bn( $data->product_performances); ?></td>
                    <td><?php echo  BanglaConverter::en2bn($data->product_quantity); ?></td>
                    <td><?php echo  BanglaConverter::en2bn($data->product_market_price); ?> টাকা</td>
                    <td><?php echo  BanglaConverter::en2bn($data->product_bonus); ?></td>
                    <td class="text-right"><?php echo  BanglaConverter::en2bn($data->product_total_price); ?> টাকা</td>
                  </tr>
                  <?php endforeach;?>
                  <hr>
                  <tr>
                  
                  <th ></th>
                  <th ></th>
                  <th ></th>
                  <th ></th>
                  <th ></th>
                  <th class="">সর্বমোটঃ <td style="text-align: right;"><?php echo BanglaConverter::en2bn($GrandTotal);?> টাকা</td></th>
                  </tr>
                  <tr>
                  
                   
                  </tr>
                </tbody>
              </table>
            </div>
            <a href="<?php echo site_url('print-invoice/'.$invoiceNo.'/'.$invoice_master_id);?>" class="btn btn-warning">ইনভয়েস প্রিন্ট করুন অথবা PDF আকারে সেইভ করুন</a>
        </div>
        
    </section>
    <!-- /.content -->
      
    
        
       
      <?php endforeach;?>
  
      
  <!-- /.content-wrapper -->
    

      
<!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

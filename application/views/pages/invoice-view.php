 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<!--         
        <div class="body-title">
    	   <div class="row">
               <div class="col-md-3 ol-sm-4">
                   <img class="hamdard" src="https://images.adgully.com/img/400x300/201612/hamdard.jpg">
               </div>
               <div class="col-md-9 ol-sm-8">
                   <h2>
                       হামদর্দ ল্যাবরেটরীজ (ওয়াক্‌ফ) বাংলাদেশ
                    </h2>
                   <p>   
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
        </div> -->
        <?php $InvoiceNumber = 1; ?>
        <?php foreach($AllData as $ad):?>
        <div class="Serial-Number">
            <div class="row">
                <!-- <div class="col-md-6">
                    ইনভয়েস নং - # IN000<?php //echo $InvoiceNumber++ ?>
                </div> -->
                <div class="col-md-12 text-right">
                    তারিখ - <?php echo date("d/m/Y"); ?>
                </div>
                <br>
            </div>  
        </div> 
        <br><br>
        <div class="pharma-address">
            <div class="row">
                <div class="address-part1 col-md-4 col-sm-6">
                    <p>এরিয়া - <?php echo $ad->branch_name; ?> </p>
                    <p>গ্রাম - <?php  ?> </p>
                    <p>প্রতিনিধি - <?php echo $ad->re_name;  ?> </p>
                </div>
                <div class="address-part2 col-md-4 col-sm-6">
                    <p>ফার্মেসীর নাম - <?php echo $ad->ph_name; ?> </p>
                    <p>ফার্মেসীর ঠিকানা - <?php echo $ad->ph_address; ?>   </p>
                    <p>মোবাইল নং - <?php echo $ad->ph_phone ?> </p></div>
                <div class="col-md-4 col-sm-0"></div>
            </div>
        </div>
        <?php endforeach;?>
        <div class="medicine-table">
            <div class="table-responsive">
                <table class="table"  style="text-align:center;">
                <thead >
                  <tr  style="text-align:center;">
                    <th style="border:1px solid black;width: 5%; text-align:center">ক্রমিক নং </th>
                    <th style="border:1px solid black;width: 30%;text-align:center">ঔষধের নাম   </th>
                    <th style="border:1px solid black;width: 10%;text-align:center">পরিবেশনা</th>
                    <th style="border:1px solid black;width: 10%;text-align:center">পরিমান</th>
                    <th style="border:1px solid black;width: 10%;text-align:center">দর</th>
                    <th style="border:1px solid black;" class="text-right">মোট টাকা</th>
                  </tr>
                </thead>
                <tbody>
                <?php $GrandTotal = 0;?>
                <?php $Counter = 1?> 
                <?php foreach($ProductOBJ as $pro_name => $p):?>
                 <?php foreach($p as $pro):?>
                  <tr>
                    <td style="border:1px solid black;"><?php echo $Counter++; ?></td>
                    <td style="border:1px solid black;"><?php echo $pro_name?></td>
                    <td style="border:1px solid black;"><?php echo $pro->pro_performances; ?></td>
                    <td style="border:1px solid black;"><?php echo $pro->pro_sale; ?></td>
                    <td style="border:1px solid black;"><?php echo $pro->pro_market_price; ?></td>
                    <td style="border:1px solid black;" class="text-right"><?php echo $pro->ProductTotal; ?></td>
                  </tr>
                  <?php $GrandTotal = $GrandTotal +  $pro->ProductTotal; ?>
                  <?php endforeach;?>  
                <?php endforeach;?>  
                  <tr style="border: 1px solid;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <br>
                    <td class="text-right">
                        <p>সর্বমোটঃ</p>
                        <!-- <p>পরিশোধ</p> -->
                    </td>
                    <td class="text-right">
                        <?php ?>
                        <p><?php echo $GrandTotal; ?></p>
                        <!-- <p>০.০০</p> -->
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div><input type="submit" class="pull-right btn btn-success" value="Save & Print"></div>
        
    </section>
    <!-- /.content -->
      
    
        
        <!-- <div class="signature">
            <div class="row">
                <div class="container-fluid">
                    <div class="signature-line col-md-4 text-center">
                        <hr>
                         <p>ক্রেতার স্বাক্ষর </p>

                    </div>
                    <div class="signature-line col-md-4 text-center">
                        <hr>
                         <p>বিক্রেতার স্বাক্ষর </p>

                    </div>
                    <div class="signature-line col-md-4 text-center">
                        <hr>
                         <p>প্রতিনিধির স্বাক্ষর </p>

                    </div>
                </div>
            </div>
      </div>
      <div class="other-address">
                <div class="container-fluid ">
                    <div class="col-md-3 text-center other-address-1">
                         <p>নতুন পৌরসভা রোড (মাদার কেয়ার ডায়গনাস্টিক সেন্টার সংলগ্ন),শায়েস্তানগর,হবিগঞ্জ। </p>
                    </div>
                    <div class="col-md-3 text-center other-address-1">
                         <p>নতুন পৌরসভা রোড (মাদার কেয়ার ডায়গনাস্টিক সেন্টার সংলগ্ন),শায়েস্তানগর,হবিগঞ্জ।</p>
                    </div>
                    <div class="col-md-3 text-center other-address-1">
                         <p>নতুন পৌরসভা রোড (মাদার কেয়ার ডায়গনাস্টিক সেন্টার সংলগ্ন),শায়েস্তানগর,হবিগঞ্জ।</p>
                    </div>
                    <div class="col-md-3 text-center other-address-1">
                         <p>নতুন পৌরসভা রোড (মাদার কেয়ার ডায়গনাস্টিক সেন্টার সংলগ্ন),শায়েস্তানগর,হবিগঞ্জ।</p>
                    </div>
                
                </div>
            </div>  -->
  </div>
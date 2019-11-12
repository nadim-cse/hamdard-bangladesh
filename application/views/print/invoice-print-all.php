<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
      <?php foreach($InvoiceResOBJ as $serial_no =>$datas ):?>
      <title><?php echo "All-Invoice".date('y-m-d/h:i');?></title>
     
      <style>
         /* Sticky footer styles
         -------------------------------------------------- */
         html {
         position: relative;
         min-height: 100%;
         }
         body {
         margin-bottom: 60px; /* Margin bottom by footer height */
         font-family: 'AdorshoLipi', Arial, sans-serif !important;
         }
            /* style sheet for "A4" printing */
         @media print and (width: 21cm) and (height: 32.7cm) {
         @page {
         margin: 6cm;
         }
         }
         /* style sheet for "letter" printing */
         @media print and (width: 8.5in) and (height: 11in) {
         @page {
         margin: 1in;
         }
         } 
         /* A4 Landscape*/
         @page {
         size: A4 vertical;
         margin: 3%;
         } 
         .borderless td, .borderless th {
         border: none;
         /* line-height: 8px; */
         }
         #footer{
         /* position: fixed; */
         left: 0px;
         bottom: 5px;
         height: 80px;
         width: 100%;
         background:;
         margin-top:-10px;
         }
         #footer2 {
         position: sticky;
         left: 0px;
         bottom: 24px;
         height: 30px;
         width: 100%;
         background:;
         }
     
         }
         tr{
         line-height: 10px;
         }
         .borderless td, .borderless th {
         border: none;
         }
         .footer {
         position: absolute;
         bottom: -45px;
         width: 100%;
         line-height: 60px; /* Vertically center the text there */
         width:100%;
         left:0;
         }
         #footer{
         position: fixed;
         left: 0px;
         bottom: 5px;
         height: 80px;
         width: 100%;
         background:;
         margin-top:-10px;
         }
         #footer2 {
         position: sticky;
         left: 0px;
         bottom: 24px;
         height: 30px;
         width: 100%;
         background:;
         }
         /* Custom page CSS
         -------------------------------------------------- */
         /* Not required for template or sticky footer method. */
         .container {
         width: auto;
         max-width: 680px;
         padding: 0 15px;
         }
         .break{
         page-break-before:always;
         }
         tr{
         line-height: 10px;
         }
         @media print {
         .title-text{
         font-size:24px;
         }
         .title-image{
         height:20px;
         }
         }
      </style>
   </head>
   <body onload="PrintThis()">
      <div class="container-fluid break">
         <div class="row mt-4 text-center" style="margin-left: 22%;">
            <div class=""><img class="title-image" src="<?php echo site_url()?>assets/logo/hamdard.png" style="margin-top: -26px;height: 70%; align-content: center"></div>
            <div style="padding-top: 10px" class="text-center ">
               <h2 class="title-text text-center ">হামদর্দ ল্যাবরেটরীজ (ওয়াকফ) বাংলাদেশ</h2>
               <p class="lead text-center" style="font-size: 13px;">হামদর্দ ভবন, ৯৯ বীর উত্তম সি আর দত্ত সড়ক(পুরাতন ২৯ ১/১ সোনারগাঁও রোড) ধানমন্ডি, ঢাকা-১২৩৫ </p>
            </div>
         </div>
         <br>
         <div style="background-color: #e3e3e3; margin-top: -5%;margin-bottom:2%" class="header-contents row">
            <div class="col-md-12 col-sm-12">
               <p class="text-center " style="margin-top: 15px;line-height:15px">জেলা পরিবেশকঃ মেসার্স মারহাবা ফার্মেসী, প্রোপ্রাইটারঃ সিরাজুল ইসলাম  </p>
               <p class="text-center" style="line-height:15px">নতুন পৌরসভা রোড, (মাদার কেয়ার ডায়গনিস্টিক সেন্টার সংলগ্ন), সায়েস্তাগঞ্জ, হবিগঞ্জ। </p>
               <p class="text-center" style="line-height:15px"> মোবাইল নংঃ ০১৯১৭-৭৬২৫০০</p>
            </div>
         </div>
         <?php $invoiceNo ; $invoice_master_id ;  $InvoiceDate; $pharmacy_address ; $pharmacy_phone; $pharmacy_owner; $Area; $Representative; $GrandTotal;?>
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
         <div class="row">
            <div class="col-md-4 col-sm">
               <p class="text-left">ইনভয়েস নং - <?php echo $invoiceNo; ?></p>
            </div>
            <div class="col-md-4 col-sm">
               <p class="text-center">&nbsp; &nbsp;</p>
            </div>
            <div class="col-md-4 col-sm">
               <p class="text-right">তারিখ -  <?php echo  BanglaConverter::en2bn(date("d/m/Y ", strtotime($InvoiceDate))); ?></p>
            </div>
         </div>
         <div class="row">
            <div style="height: 1px; width: 100%; background-color: black" class="col"></div>
         </div>
         <div class="row" style="margin-top: 10px;">
            <div style="" class="col-md-6">
               <div class="text-left">
                  <p style="line-height: 7px;">এরিয়া - <?php echo $Area;?> </p>
                  <p style="line-height: 7px;">গ্রাম - <?php echo $Area;?> </p>
                  <p style="line-height: 7px;">প্রতিনিধি - <?php echo $Representative; ?> </p>
               </div>
            </div>
            <div style="" class="col-md-6">
               <div class="text-left">
                  <p style="line-height: 7px;">ফার্মেসীর নাম - <?php echo $pharmacy_name; ?>  </p>
                  <p style="line-height: 7px;">প্রোপ্রাইটোর - <?php echo $pharmacy_owner; ?>  </p>
                  <p style="line-height: 7px;">ফার্মেসীর ঠিকানা - <?php echo $pharmacy_address; ?> </p>
                  <p style="line-height: 7px;">মোবাইল নং - <?php echo  BanglaConverter::en2bn($pharmacy_phone); ?> </p>
               </div>
            </div>
         </div>
      </div>
      <div class="row" >
         <div class="col" >
            <table class="table borderless" style="font-size: 12px;">
               <thead>
                  <tr>
                     <th>ক্রমিক নং </th>
                     <th>পণ্যের নাম</th>
                      <th>পণ্যের কোড</th>
                      <th>পরিবেশনা</th>
                     <th>পরিমান</th>
                     <th>দর</th>
                     <th>বোনাস</th>
                     <th>মোট দর</th>
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
                     <td class=""><?php echo  BanglaConverter::en2bn($data->product_total_price); ?> টাকা</td>
                  </tr>
                  <?php endforeach;?>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    
                     <td>সর্বমোটঃ</td>
                     <td><?php echo BanglaConverter::en2bn($GrandTotal);?> টাকা</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>পরিশোধঃ</td>
                     <td></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
      <div class="container-fluid" id="footer">
         <!-- <div class="row">
            <h4>Naidm</h4>
            </div> -->
         <div style="" id="" class="row footer">
            <div class="col-sm-4">
               <div class="text-center" style="padding: 0%">
                  <div style="height: 1px; width: 100%; background-color: black" class="col"></div>
                  <p style="margin-top: -22px;font-size:12px">ক্রেতার সাক্ষর</p>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="text-center" style="padding: 0%">
                  <div style="height: 1px; width: 100%; background-color: black" class="col"></div>
                  <p style="margin-top: -22px;font-size:12px">বিক্রেতার সাক্ষর</p>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="text-center" style="padding: 0%">
                  <div style="height: 1px; width: 100%; background-color: black" class="col"></div>
                  <p style="margin-top: -22px;font-size:12px">প্রতিনিধির সাক্ষর</p>
               </div>
            </div>
         </div>
      </div>
      <br>
      </div>
      <?php endforeach;?>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script>
         function PrintThis() {
         window.print();
         history.go(-1); 
         }
         //    jQuery(document).ready(function(){
         //    x=0;
         //    i=0;
         //    items=jQuery( "tbody tr" ).length;
         //    jQuery( "tbody tr" ).each(function(index) {
         //       i++;
         //       x = x + parseInt(jQuery("td:last-of-type",this).text());
         //       if (i==21 || items == index+1){
         //       jQuery('<div id="diviver"><br><br><br><br><br></div>').insertAfter(this);
          
         //       x=0;
         //       i=0;
         //       }
         //    });
         // });
      </script>
   </body>
</html>
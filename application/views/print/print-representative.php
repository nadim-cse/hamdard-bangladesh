<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title><?php echo "প্রতিনিধির তালিকা -".date('Y/m/d');?></title>
    <style>
        /* Sticky footer styles
-------------------------------------------------- */
        html {
        position: relative;
        min-height: 100%;
        }
        body {
        margin-bottom: 60px; /* Margin bottom by footer height */
        }
        .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 20px; /* Set the fixed height of the footer here */
        line-height: 60px; /* Vertically center the text there */
        }


        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        .container {
        width: auto;
        max-width: 680px;
        padding: 0 15px;
        }
    </style>
  </head>
  <body onload="PrintThis()">
    <div class="container-fluid">
    	<div class="row mt-4 text-center" style="margin-left: 30%; margin-right: 30%">
			 <div class=""><img src="<?php echo site_url()?>assets/logo/hamdard.png" style="margin-top: 0px;height: 70%; align-content: center"></div>
            
			    <div style="padding-top: 10px" class="text-center">
			    	<h2 class="display-10 text-center">হামদর্দ ল্যাবরেটরীজ (ওয়াকফ) বাংলাদেশ</h2>
			    	<p class="lead text-center">ঠিকানা  </p>
				</div>
</div>
		
    	<br>
    	<div style="background-color: #e3e3e3; margin-top: -3%;margin-bottom:2%" class="row">
    		<div class="col-md-12 col-sm-12">
                    <p class="text-center" style="margin-top: 15px;">জেলা পরিবেশকঃ মেসার্স মারহাবা ফার্মেসী, প্রোপ্রাইটারঃ সিরাজুল ইসলাম  </p>
                <p class="text-center">নতুন পৌরসভা রোড, (মাদার কেয়ার ডায়গনিস্টিক সেন্টার সংলগ্ন) </p>
                
		    	
                <p class="text-center">সায়েস্তাগঞ্জ, হবিগঞ্জ। মোবাইল নং ০১৭৩১০০১৩৩৩ 	</p>
    		</div>
        </div>
         
    	<div class="row">
    		<div class="col-md-8 col-sm">
    			<p class="text-left"><?php echo BanglaConverter::en2bn(date('M d, Y'))." , তারিখ পর্যন্ত সকল প্রতিনিধির তালিকা"; ?></p>
    		</div>
    		<div class="col-md-2 col-sm">
    			<p class="text-center">&nbsp; &nbsp;</p>
    		</div>
    		<div class="col-md-42 col-sm">
               <p class="text-center">&nbsp; &nbsp;</p>
    		</div>
    	</div>
    	<div class="row">
    		<div style="height: 1px; width: 100%; background-color: black" class="col"></div>
    	</div>
    	<div class="row">
    		<div class="col">
    			<table class="table table-hover">
				  <thead>
				    <tr>
                    <th>#</th>
                        <th style="width:20%">নাম</th>
                        <th>মোবাইল নংঃ</th>
                        <th>ঠিকানা</th>
                        <th>শাঁখা</th>
                        <th>কোড নংঃ</th>
                        <!-- <th>যোগ দেয়ার সময়</th> -->
				    </tr>
				  </thead>
				  <tbody>
                  <?php $counter = 1;?>
                <?php foreach($Representatives as $representative):?>
                  <tr>
                     <td ><?php echo $counter ++; ?></td>
                    <td style="width:20%"><?php echo $representative->re_name; ?></td>
                    <td><?php echo BanglaConverter::en2bn($representative->re_phone); ?></td>
                    <td style="width:30%"><?php echo $representative->re_address; ?></td>
                    <td><?php echo $representative->branch_name; ?></td>
                    <td><?php echo $representative->re_code; ?></td>
                    <!-- <td><?php //echo BanglaConverter::en2bn(date("d,M Y (h:i A)", strtotime($representative->re_create_at))) ?></td> -->
                  </tr>
                  <?php endforeach;?>
				    
				  </tbody>	
				</table>
    		</div>
    	</div>
    </div>

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
    </script>
  </body>
</html>
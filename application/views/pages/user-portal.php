<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if(isset($TemplateTitle)): echo $TemplateTitle; else: echo "Hamdard Waqf "; endif;?> </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


      <style>
      
          Body{
              
              background-color:  #0b657ed9;;
          }
          .mainBody{
              background: rgba(11,94,126,0.8);
              margin-top: 1%;
              padding-top: 5%;
              padding-bottom: 10%;
          }
          
          .content_header{
            padding-top: 5%;    
              color: white;
          }
          
          .content_body{
            padding-top: 5%;    
          }
          
          .brandNAme{
              color: #ff0000;
              font-size: 1.5em;
          }
          
          .admin_portal , .representative_portal {
            background-color: #cc1111;
            color: white;
            padding: 2%;
            margin: 9%;
            border-radius: 13px;
            border: 1px solid navajowhite;
          }
          
          a{
         
              text-decoration: none !important;
          }
          
      </style>
      
      
  </head>

  <body>
      <div class="container">
          
          <div class="row mainBody">
              <div class="content_header text-center">
                  <img src="<?php echo site_url(); ?>assets/user_portal/Hamdard-logo-538E7E396F-seeklogo.com.png">
                <h2>Welcome to <b class="brandNAme">Hamdard Waqf</b> user portal</h2>
              </div>

              <div class="container content_body">
                  <div class="row">
                     
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <a href="<?php echo site_url('Login'); ?>">
                            <div class="admin_portal">

                                <h2 class="text-center">Admin Portal</h2>

                            </div>
                        </a>
                    </div>
                        
                      <div class="col-md-6 col-sm-12 col-xs-12">

                            <a href="">
                                <div class="representative_portal">

                                    <h2 class="text-center">Representative Portal</h2>

                                </div>
                            </a>
                        </div>

                  </div>
              </div>
            </div>
      </div>
  </body>

</html>



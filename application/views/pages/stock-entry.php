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
   <?php echo form_open(); ?>
    <div class="row">
     
           <!-- left column -->
          <div class="col-md-12">
              <!-- Form Element sizes -->
              <div class="box box-body">
                  <div class="box-header with-border">
                      <h3 class="box-title">Product Information</h3>
                  </div>
                  <div class="box-body">
                      <input class="form-control input-lg" type="text" placeholder="Enter Product Name">
                  <br>
                  <div class="form-group">
                      <label>Select Product Category</label>
                      <select class="form-control" id="category" style="width: 100%;">
                           <option selected="selected">Food</option>
                            <option>Unanani</option>
                            <option>Ayurvedic</option>
                            <option>Herbal</option>   
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Select Product Type</label>
                      <select class="form-control" id="type" style="width: 100%;">
                           <option selected="selected">Syrup</option>
                            <option>Capsul</option>
                            <option>Tabet</option>
                      </select>
                  </div>
                  <br>
                      
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <div class="box box-danger">
                  <div class="box-header with-border">
                  <h3 class="box-title">Product Price and Quantity</h3>
                  </div>
                  <div class="box-body">
                      <div class="row">
                          <div class="col-xs-3">
                              <input type="text" class="form-control" placeholder="Price in taka">
                          </div>
                           <div class="col-xs-3">
                               <input type="text" class="form-control" placeholder="Quantity">
                           </div>
                           <div class="col-xs-3">
                              <input type="text" class="form-control" placeholder="Stock">
                           </div>
                      </div>
                      <button type="button" class="btn bg-navy margin pull-right">Save Information</button>
                  </div>
                
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>

          <!--/.col (left) -->
    </div>
    <?php echo form_close(); ?>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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
        <h3 class="box-title" style="color:green;">Select product category and types and then press load information button</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Select Product Category</label>
              <select class="form-control" id="ProductCat" multiple="multiple" data-placeholder="Select a Category"
                      style="width: 100%;">
                      <option>Food</option>
                      <option>Unanani</option>
                      <option>Ayurvedic</option>
                      <option>Herbal</option>  
              </select>
            </div>
            <div class="form-group">
              <label>Select Product Type</label>
              <select class="form-control" id="ProductType" multiple="multiple" data-placeholder="Select a Category"
                      style="width: 100%;">
                      <option>Syrup</option>
                      <option>Capsul</option>
                       <option>Tabet</option> 
              </select>   
            </div>
            <div class="form-group">
              <button type="button" class="btn bg-navy">Load Information</button>
              </div>
          </div>
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

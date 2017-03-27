
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('stock/create_supplier') ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Add supplier</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">  Suppliers
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('stock/suppliers'); ?>"><i class="fa fa-truck"></i>Supplier</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('stock/create_supplier'); ?>"><i class="fa fa-plus"></i>Create suppliers</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">stock
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('stock/stocks'); ?>"><i class="fa fa-car"></i>stocks</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('stock/create_stock'); ?>"><i class="fa fa-plus"></i>Create a stock</a></li>
                   
                  </ul>
                </div>
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Drivers
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('stock/drivers'); ?>"><i class="fa fa-user"></i>Drivers</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('stock/create_driver'); ?>"><i class="fa fa-plus"></i>Add a Driver</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">




            <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Supplier Name<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($supplier_name);?><span><?= form_error('supplier_name'); ?></span>
                  </div>
               </div>
                 <div class="form-group">
                  <label for="details" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($address);?><span><?= form_error('address'); ?></span>
                  </div>
               </div>
              <div class="form-group">
                  <label for="phone no" class="col-sm-2 control-label">Phone Number<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($telephone);?><span><?= form_error('telephone'); ?></span>
                  </div>
               </div>
        



             <div class="form-group">
                  <label for="details" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($remarks);?><span><?= form_error('remarks'); ?></span>
                  </div>
               </div>
              
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save supplier','class="btn btn-xs btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



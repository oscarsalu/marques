
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('stock/create_stock_item') ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-barcode fa-2x"></i>Add stock item</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">  stock_items
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('stock/stock_items'); ?>"><i class="fa fa-truck"></i>stock_item</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('stock/create_stock_item'); ?>"><i class="fa fa-plus"></i>Create stock_items</a></li>
                   
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
                  <label for="type" class="col-sm-2 control-label">stock item Name<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($stock_item_name);?><span><?= form_error('stock_item_name'); ?></span>
                  </div>
               </div>
                 <div class="form-group">
                  <label for="details" class="col-sm-2 control-label">Brand</label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($brand);?><span><?= form_error('brand'); ?></span>
                  </div>
               </div>
              <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Price<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($price);?><span><?= form_error('price'); ?></span>
                  </div>
               </div>
              <div class="form-group">
                  <label for="supplier" class="col-sm-2 control-label">Supplier</label>

                  <div class="col-sm-10">
                    <?php echo form_input($supplier);?><span><?= form_error('supplier'); ?></span>
                  </div>
               </div>



             <div class="form-group">
                  <label for="details" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($description);?><span><?= form_error('description'); ?></span>
                  </div>
               </div>
              
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save stock_item','class="btn btn-xs btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



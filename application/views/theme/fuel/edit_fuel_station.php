
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?= form_open(uri_string(), 'class="form-horizontal"') ?>
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Add Fleet</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">  vehicle_types
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/vehicle_types'); ?>"><i class="fa fa-truck"></i>fuel_station types</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_vehicle_type'); ?>"><i class="fa fa-plus"></i>Create fuel_stationtype</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Fleet
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/fleets'); ?>"><i class="fa fa-car"></i>Fleets</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_fleet'); ?>"><i class="fa fa-plus"></i>Create a fleet</a></li>
                   
                  </ul>
                </div>
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Drivers
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/drivers'); ?>"><i class="fa fa-user"></i>Drivers</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_driver'); ?>"><i class="fa fa-plus"></i>Add a Driver</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">




            <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">fuel station<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($fuel_station_name);?><span><?= form_error('fuel_station_name'); ?></span>
                  </div>
               </div>
      
             
            <div class="form-group">
                  <label for="reg date" class="col-sm-2 control-label">Address<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_textarea($address);?><span><?= form_error('address'); ?></span>
                  </div>
               </div>

            <div class="form-group">
                  <label for="reg no" class="col-sm-2 control-label">Contact Number<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($telephone);?><span><?= form_error('regno'); ?></span>
                  </div>
               </div>

             <div class="form-group">
                  <label for="make" class="col-sm-2 control-label">Deposit</label>

                  <div class="col-sm-10">
                    <?php echo form_input($deposit);?><span><?= form_error('deposit'); ?></span>
                  </div>
               </div>
           
      <?php echo form_hidden($csrf); ?>
       <?php echo form_hidden('id',$fuel_station->Id); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save fuel station','class="btn  btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



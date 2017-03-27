
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('fuel/create_fuel_record') ?>">
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
                  <label for="vehicle" class="col-sm-2 control-label">Vehicle<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                  <select name="vehicle" class="form-control">
                  <option>Select a vehicle</option>
                   <?php foreach ($vehicle as $row): ?>
                   <option><?= $row->RegNo ?></option>
                    <?php endforeach; ?>
                  </select>
                    <span><?= form_error('vehicle'); ?></span>
                  </div>
               </div>
      
             
            <div class="form-group">
                  <label for="fuel date" class="col-sm-2 control-label">Fuel date<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($fuel_date);?><span><?= form_error('fuel_date'); ?></span>
                  </div>
               </div>

            <div class="form-group">
                  <label for="fuel station" class="col-sm-2 control-label">Fuel Station<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                 <select name="fuel_station" class="form-control">
                  <option>Select a station</option>
                   <?php foreach ($stations as $station): ?>
                   <option><?= $station->FuelStation ?></option>
                    <?php endforeach; ?>
                  </select><span><?= form_error('fuel_station'); ?></span>
                  </div>
               </div>

             <div class="form-group">
                  <label for="metre read" class="col-sm-2 control-label">Metre Read</label>

                  <div class="col-sm-10">
                    <?php echo form_input($metre_read);?><span><?= form_error('metre_read'); ?></span>
                  </div>
               </div>
                 <div class="form-group">
                  <label for="litre pump" class="col-sm-2 control-label">Litre Pump</label>

                  <div class="col-sm-10">
                    <?php echo form_input($litre_pump);?><span><?= form_error('litre_pump'); ?></span>
                  </div>
               </div>
                  <div class="form-group">
                  <label for="Litre price" class="col-sm-2 control-label">Litre Price</label>

                  <div class="col-sm-10">
                    <?php echo form_input($litre_price);?><span><?= form_error('litre_price'); ?></span>
                  </div>
               </div>
                    <div class="form-group">
                  <label for="last mileage" class="col-sm-2 control-label">Last Mileage</label>

                  <div class="col-sm-10">
                    <?php echo form_input($last_mileage);?><span><?= form_error('last_mileage'); ?></span>
                  </div>
               </div>
                <div class="form-group">
                  <label for="driver" class="col-sm-2 control-label">Driver</label>

                  <div class="col-sm-10">
                  <select name="driver" class="form-control">
                  <option>Select a driver</option>
                   <?php foreach ($drivers as $driver): ?>
                   <option><?= $driver->name ?></option>
                    <?php endforeach; ?>
                  </select></div>
               </div>
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn  btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save fuel record','class="btn  btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



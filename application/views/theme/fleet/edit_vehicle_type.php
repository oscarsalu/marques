<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Vehicle Types</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">vehicle types
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/vehicle_types'); ?>"><i class="fa fa-truck"></i>Vehicle types</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_vehicle_type'); ?>"><i class="fa fa-plus"></i>Create vehicle type</a></li>
                   
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
          </div>
        </div>
        <div class="box-body">
<div id="infoMessage"><?php echo $message;?></div>



            <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Vehicle Type<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($type);?><span><?= form_error('type'); ?></span>
                  </div>
               </div>
      
      <?php echo form_hidden('id', $vehicle_type->id);?>
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save Vehicle Type','class="btn btn-xs btn-success pull-right"');?>
        </div>

<?php echo form_close();?>

            </div><!-- /.box-body -->
           </div><!--box box-success-->
          </div>
          </div>
       </section>



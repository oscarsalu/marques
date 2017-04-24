
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('fleetscheduling/create_routedetail/'.$routeid) ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Add Route Details</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Name<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="hidden" name="routeid" id="routeid" value="<?php echo $routeid; ?>">
                    <?php echo form_input($name);?><span><?= form_error('name'); ?></span>
                  </div>
               </div>
      
             
            <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">Latitude<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($latitude);?><span><?= form_error('latitude'); ?></span>
                  </div>
               </div>

            <div class="form-group">
                  <label for="remarks" class="col-sm-2 control-label">Longititude</label>

                  <div class="col-sm-10">
                    <?php echo form_input($longititude);?><span><?= form_error('longititude'); ?></span>
                  </div>
           </div>           
           <div class="form-group">
                  <label for="fleet" class="col-sm-2 control-label">Type</label>

                  <div class="col-sm-10">
                     <select class="form-control" name="type">
                     <option>Select Type...</option>
                       <option value="source">Source</option>
                       <option value="destination">Destination</option>
                       <option value="sub-terminals">Sub-Terminals</option>
                     </select>
                     <?= form_error('type'); ?></span>
                  </div>
               </div>
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save Route','class="btn btn-xs btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



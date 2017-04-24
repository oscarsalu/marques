<?php foreach ($routedetail as $routedet){}; ?>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('fleetscheduling/edit_routedetails/'.$routedet->id) ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Edit Route Detail</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Name<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="hidden" name="routeid" id="routeid" value="<?php echo $routedet->routeid; ?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $routedet->id; ?>">
                    <input type="text" name="name" id="name" value="<?php echo $routedet->name; ?>"><span><?= form_error('name'); ?></span>
                  </div>
               </div>
      
             
            <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">Latitude<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="latitude" id="latitude" value="<?php echo $routedet->latitude; ?>"><span><?= form_error('latitude'); ?></span>
                  </div>
               </div>

            <div class="form-group">
                  <label for="remarks" class="col-sm-2 control-label">Longititude</label>

                  <div class="col-sm-10">
                    <input type="text" name="longititude" id="longititude" value="<?php echo $routedet->longititude; ?>"><span><?= form_error('longititude'); ?></span>
                  </div>
           </div>           
           <div class="form-group">
                  <label for="fleet" class="col-sm-2 control-label">Type</label>

                  <div class="col-sm-10">
                     <select class="form-control" name="type">
                     <option>Select Type...</option>
                       <option <?php if($routedet->type=="source"){ echo "Selected"; } ?> value="source">Source</option>
                       <option <?php if($routedet->type=="destination"){ echo "Selected"; } ?> value="destination">Destination</option>
                       <option <?php if($routedet->type=="sub-terminals"){ echo "Selected"; } ?> value="sub-terminals">Sub-Terminals</option>
                     </select>
                     <?= form_error('type'); ?></span>
                  </div>
               </div>
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Update Route','class="btn btn-xs btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



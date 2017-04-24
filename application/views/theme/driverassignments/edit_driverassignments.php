<?php foreach ($driverassignments as $driverassignment){}; ?>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('fleetscheduling/edit_driverassignments/'.$driverassignment->id) ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Edit Route Detail</h3>
        </div>
        <div class="box-body">      
             <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Fleet<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                     <input type="hidden" name="id" id="id" value="<?php echo $driverassignment->id; ?>">
                     <select class="form-control" name="fleetid">
				<option value="">Select...</option>
				<?php
		                     foreach ($fleets as $row) { 
		                 ?>
				   
					    <option <?php if($driverassignment->fleetid==$row->ID){ echo "selected"; } ?> value="<?php echo $row->ID; ?>"><?php echo $row->RegNo;?></option>
				    <?php
				    }
				?>
		    </select><span><?= form_error('fleetid'); ?></span>
                  </div>
               </div> 
               <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Route<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                     <select class="form-control" name="driverid">
				<option value="">Select...</option>
				<?php
		                     foreach ($drivers as $row) { 
		                 ?>
				   
					    <option <?php if($driverassignment->driverid==$row->id){ echo "selected"; } ?>  value="<?php echo $row->id; ?>"><?php echo $row->name;?></option>
				    <?php
				    }
				?>
		    </select><span><?= form_error('driverid'); ?></span>
                  </div>
               </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Departure<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="assignedon" class="date_input" value="<?php echo $driverassignment->assignedon; ?>"><?= form_error('assignedon'); ?></span>
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Expected Arrival<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="assignmentdate" id="assignmentdate" class="date_input" value="<?php echo $driverassignment->assignmentdate; ?>"><?= form_error('assignmentdate'); ?></span>
                  </div>
               </div>
                           
               <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="remarks" id="remarks"  cols="20" rows="5" title="remarks" ><?php echo $driverassignment->remarks; ?></textarea><?= form_error('remarks'); ?></span>
                  </div>
               </div>
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Update','class="btn btn-xs btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



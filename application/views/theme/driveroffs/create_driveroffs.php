
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('fleetscheduling/create_driveroffs') ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Add Driver Off</h3>
        </div>
        <div class="box-body">
              <div class="form-group">
                  <label for="driver" class="col-sm-2 control-label">Driver<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                     <select class="form-control" name="driverid">
				<option value="">Select...</option>
				<?php
		                     foreach ($drivers as $row) { 
		                 ?>
				   
					    <option value="<?php echo $row->id; ?>"><?php echo $row->name;?></option>
				    <?php
				    }
				?>
		    </select><span><?= form_error('name'); ?></span>
                  </div>
               </div>             
                <div class="form-group">
                  <label for="startdate" class="col-sm-2 control-label">Start Date<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="startdate" class="date_input" value="<?php echo set_value('startdate'); ?>"><?= form_error('startdate'); ?></span>
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">End Date<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="enddate" id="enddate" class="date_input" value="<?php echo set_value('enddate'); ?>"><?= form_error('enddate'); ?></span>
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">Returned On<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="returnedon" id="returnedon" class="date_input" value="<?php echo set_value('returnedon'); ?>"><?= form_error('returnedon'); ?></span>
                  </div>
               </div>
               <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                     <select class="form-control" name="status">
                     <option>Select Type...</option>
                       <option value="open">Open</option>
                       <option value="closed">Closed</option>
                       <option value="overdue">Overdue</option>
                     </select>
                     <?= form_error('status'); ?></span>
                  </div>
               </div> 
               
               <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="remarks" id="remarks"  cols="20" rows="5" value="<?php echo set_value('remarks'); ?>" title="remarks" ></textarea><?= form_error('remarks'); ?></span>
                  </div>
               </div>

      
      <?php echo form_hidden($csrf); ?>
      </div>
     <div class="box-footer">
     <button type="reset" class="btn btn-xs btn-danger pull-left"> cancel </button>
         <?php echo form_submit('submit', 'Save','class="btn btn-xs btn-success pull-right"');?>
        </div>


            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>



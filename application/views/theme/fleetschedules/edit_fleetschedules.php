<?php foreach ($fleetschedules as $fleetschedule){}; ?>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('fleetscheduling/edit_fleetschedules/'.$fleetschedule->id) ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Edit Route Detail</h3>
        </div>
        <div class="box-body">      
             <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Fleet<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                     <input type="hidden" name="id" id="id" value="<?php echo $fleetschedule->id; ?>">
                     <select class="form-control" name="fleetid">
				<option value="">Select...</option>
				<?php
		                     foreach ($fleets as $row) { 
		                 ?>
				   
					    <option <?php if($fleetschedule->fleetid==$row->ID){ echo "selected"; } ?> value="<?php echo $row->ID; ?>"><?php echo $row->RegNo;?></option>
				    <?php
				    }
				?>
		    </select><span><?= form_error('fleetid'); ?></span>
                  </div>
               </div> 
               <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Route<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                     <select class="form-control" name="routeid">
				<option value="">Select...</option>
				<?php
		                     foreach ($routes as $row) { 
		                 ?>
				   
					    <option <?php if($fleetschedule->routeid==$row->id){ echo "selected"; } ?>  value="<?php echo $row->id; ?>"><?php echo $row->route;?></option>
				    <?php
				    }
				?>
		    </select><span><?= form_error('routeid'); ?></span>
                  </div>
               </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Departure<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="departuretime" class="form_datetime" value="<?php echo $fleetschedule->departuretime; ?>"><?= form_error('departuretime'); ?></span>
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Expected Arrival<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="expectedarrivaltime" id="expectedarrivaltime" class="form_datetime" value="<?php echo $fleetschedule->expectedarrivaltime; ?>"><?= form_error('expectedarrivaltime'); ?></span>
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Actual Arrival<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <input type="text" name="actualarrivaltime" id="actualarrivaltime" class="form_datetime" value="<?php echo $fleetschedule->actualarrivaltime; ?>"><?= form_error('actualarrivaltime'); ?></span>
                  </div>
               </div>               
               <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="remarks" id="remarks"  cols="20" rows="5" title="remarks" ><?php echo $fleetschedule->remarks; ?></textarea><?= form_error('returnedon'); ?></span>
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
<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
</script>


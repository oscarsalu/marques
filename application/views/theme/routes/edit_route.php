
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?= form_open(uri_string(), 'class="form-horizontal"') ?>
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Edit Route</h3>
          <div class="box-tools pull-right">
                <div class="btn-group">
		      <a href="<?= site_url('fleetscheduling/create_route'); ?>"><i class="fa fa-plus"></i>Add Route</a>
                </div>
          </div>
        </div>
        <div class="box-body">
<div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Source<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($source);?><span><?= form_error('source'); ?></span>
                  </div>
               </div>
      
             
            <div class="form-group">
                  <label for="destination" class="col-sm-2 control-label">Destination<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <?php echo form_input($destination);?><span><?= form_error('destination'); ?></span>
                  </div>
               </div>

            <div class="form-group">
                  <label for="remarks" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <?php echo form_input($remarks);?><span><?= form_error('remarks'); ?></span>
                  </div>
               </div>
        <?php echo form_hidden($csrf); ?>
        <?php echo form_hidden('id',$route->id); ?>
      </div>
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



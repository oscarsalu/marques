
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?= form_open(uri_string(), 'class="form-horizontal"') ?>
            <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
           
                   <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="Users">users
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('auth/index')?>"><i class="fa fa-users"></i>All users</a></li>
                     
                    <li><a href="<?= site_url('auth/create_user'); ?>"><i class="fa fa-plus"></i>Create user</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="Users">Role
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href=""><i class="fa fa-list"></i>All Roles</a></li>
                    
                    <li><a href="<?= site_url('auth/create_group'); ?>"><i class="fa fa-plus"></i>Create role</a></li>
                   
                  </ul>
                </div>
          </div>
        </div><!-- /.box-header -->
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



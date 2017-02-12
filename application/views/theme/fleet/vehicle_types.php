
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Active vtypes</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">vtypes
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href=""><i class="fa fa-vtypes"></i>All vtypes</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('auth/create_vtype'); ?>"><i class="fa fa-plus"></i>Create vtype</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Role
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href=""><i class="fa fa-list"></i>All Roles</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('auth/create_group'); ?>"><i class="fa fa-plus"></i>Create role</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
   




						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>id</th>
								<th>Vehicle Type</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($vehicle_types as $vtype):?>
								<tr>
						            <td><?= $vtype->id ?></td>
						            <td><?= $vtype->VehicleType ?></td>
						            <td><a href="<?= site_url("auth/edit_vtype/".$vtype->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                   
									</td>
								</tr>
							<?php endforeach;?>
							</tbody>
          </table>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

        



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
                    <li><a href=""><i class="fa fa-truck"></i>Vehicle types</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_vtype'); ?>"><i class="fa fa-plus"></i>Create vehicle type</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Fleet
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href=""><i class="fa fa-car"></i>Fleets</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('auth/create_group'); ?>"><i class="fa fa-plus"></i>Create a fleet</a></li>
                   
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
						            <td><a href="<?= site_url('fleet/edit_vehicle_type/'.$vtype->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                   
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

        


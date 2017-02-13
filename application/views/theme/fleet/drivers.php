<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Drivers List</h3>

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
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Drivers
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/drivers'); ?>"><i class="fa fa-user"></i>Drivers</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_driver'); ?>"><i class="fa fa-plus"></i>Add a Driver</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
   
         <?php if(isset($message)){ ?>
            <div class="alert alert-success"><?= $message ?></div>
         <?php } ?>



						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
							<tr>
								<th>id</th>
								<th>Name</th>
                <th>Phone</th>
                <th>Registration Date</th>
                <th>Details</th>
                
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
						       <?php foreach ($drivers as $driver):?>
                <tr>
                            <td><?= $driver->id ?></td>
                            <td><?= $driver->name ?></td>
                                      <td><?= $driver->phone ?></td>

                                      <td><?= date('d/m/Y', strtotime($driver->date_added)); ?></td>
                                      <td><?= $driver->details ?></td>
                           
                            <td><a href="<?= site_url('fleet/edit_driver/'.$driver->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="<?= site_url('fleet/delete_driver/'.$driver->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        


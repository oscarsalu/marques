<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">fuel_stations List</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">vehicle types
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fuel/vehicle_types'); ?>"><i class="fa fa-truck"></i>Vehicle types</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fuel/create_vehicle_type'); ?>"><i class="fa fa-plus"></i>Create vehicle type</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">fuel
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fuel/fuels'); ?>"><i class="fa fa-car"></i>fuels</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fuel/create_fuel'); ?>"><i class="fa fa-plus"></i>Create a fuel</a></li>
                   
                  </ul>
                </div>
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">fuel_stations
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fuel/fuel_stations'); ?>"><i class="fa fa-user"></i>fuel_stations</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fuel/create_fuel_station'); ?>"><i class="fa fa-plus"></i>Add a fuel_station</a></li>
                   
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
								<th>Fuel Station</th>
                <th>Address</th>
								<th>Telephone</th>
                 <th>Deposit</th>
               	<th>Action</th>
							</tr>
							</thead>
							<tbody>
						       <?php foreach ($fuel_stations as $fuel_station):?>
                <tr>
                            <td><?= $fuel_station->FuelStation ?></td>
                            <td><?= $fuel_station->Address ?></td>
                            <td><?= $fuel_station->ContactNumber ?></td>
                            <td><?= $fuel_station->Deposit ?></td>
                            <td><a href="<?= site_url('fuel/edit_fuel_station/'.$fuel_station->Id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="<?= site_url('fuel/delete_fuel_station/'.$fuel_station->Id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        


<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Fleet Schedule List</h3>
           <div class="box-tools pull-right">
                <div class="btn-group">
		      <a href="<?= site_url('fleetscheduling/create_fleetschedules/'); ?>"><i class="fa fa-plus"></i>Add Fleet Schedule</a>
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
			  <th>#</th>
			  <th>Fleet</th>
			  <th>Route</th>
			  <th>Departure</th>
			  <th>Expected Arrival</th>
			  <th>Actual Arrival</th>
			  <th>Remarks</th>
		      </tr>
		  </thead>
		  <tbody>
			<?php 
			$i=0;
			foreach ($fleetschedules as $fleetschedule):
			$i++;
			?>
			<tr>
			    <td><?= $i ?></td>
			    <td><?= $fleetschedule->RegNo; ?></td>
			    <td><?= $fleetschedule->route; ?></td>
			    <td><?= $fleetschedule->departuretime; ?></td>
			    <td><?= $fleetschedule->expectedarrivaltime ?></td>
			    <td><?= $fleetschedule->actualarrivaltime ?></td>
			    <td><?= $fleetschedule->remarks ?></td>
			    <td><a href="<?= site_url('fleetscheduling/edit_fleetschedules/'.$fleetschedule->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
			    <a href="<?= site_url('fleetscheduling/delete_fleetschedules/'.$fleetschedule->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        


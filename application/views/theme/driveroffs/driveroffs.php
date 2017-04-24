<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Driver Off List</h3>
           <div class="box-tools pull-right">
                <div class="btn-group">
		      <a href="<?= site_url('fleetscheduling/create_driveroffs/'); ?>"><i class="fa fa-plus"></i>Add Driver Offs</a>
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
			  <th>Driver</th>
			  <th>Start</th>
			  <th>End</th>
			  <th>Returned On</th>
			  <th>Status</th>
			  <th>Remarks</th>
		      </tr>
		  </thead>
		  <tbody>
			<?php 
			$i=0;
			foreach ($driveroffs as $driveroff):
			$i++;
			?>
			<tr>
			    <td><?= $i ?></td>
			    <td><?= $driveroff->name; ?></td>
			    <td><?= $driveroff->startdate; ?></td>
			    <td><?= $driveroff->enddate; ?></td>
			    <td><?= $driveroff->returnedon ?></td>
			    <td><?= $driveroff->status ?></td>
			    <td><?= $driveroff->remarks ?></td>
			    <td><a href="<?= site_url('fleetscheduling/edit_driveroffs/'.$driveroff->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
			    <a href="<?= site_url('fleetscheduling/delete_driveroffs/'.$driveroff->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        


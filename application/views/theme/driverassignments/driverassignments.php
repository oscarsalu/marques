<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Driver Assignment List</h3>
           <div class="box-tools pull-right">
                <div class="btn-group">
		      <a href="<?= site_url('fleetscheduling/create_driverassignments/'); ?>"><i class="fa fa-plus"></i>Add Driver Assignment</a>
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
			  <th>Fleet</th>
			  <th>Assigned On</th>
			  <th>Assignment Date</th>
			  <th>Remarks</th>
			  <th>&nbsp;</th>
		      </tr>
		  </thead>
		  <tbody>
			<?php 
			$i=0;
			foreach ($driverassignments as $driverassignment):
			$i++;
			?>
			<tr>
			    <td><?= $i ?></td>
			    <td><?= $driverassignment->driver; ?></td>
			    <td><?= $driverassignment->RegNo; ?></td>
			    <td><?= $driverassignment->assignedon; ?></td>
			    <td><?= $driverassignment->assignmentdate ?></td>
			    <td><?= $driverassignment->remarks ?></td>
			    <td><a href="<?= site_url('fleetscheduling/edit_driverassignments/'.$driverassignment->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
			    <a href="<?= site_url('fleetscheduling/delete_driverassignments/'.$driverassignment->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        


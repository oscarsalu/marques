<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Route List</h3>
           <div class="box-tools pull-right">
                <div class="btn-group">
		      <a href="<?= site_url('fleetscheduling/create_route'); ?>"><i class="fa fa-plus"></i>Add Route</a>
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
			  <th>Source</th>
			  <th>Destination</th>
			  <th>Remarks</th>
			  <th>Created By</th>
			  <th>Action</th>
		      </tr>
		  </thead>
		  <tbody>
			<?php 
			$i=0;
			foreach ($routes as $route):
			$i++;
			?>
			<tr>
			    <td><?= $i ?></td>
			    <td><?= $route->source; ?></td>
			    <td><?= $route->destination ?></td>
			    <td><?= $route->remarks ?></td>
			    <td><?= $route->createdby ?></td>
			    <td><a href="<?= site_url('fleetscheduling/edit_route/'.$route->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
			    <a href="<?= site_url('fleetscheduling/delete_route/'.$route->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>  
			    <a href="<?= site_url('fleetscheduling/routedetails/'.$route->id); ?>" data-toggle="tooltip"  title="View Route Details" class="btn btn-danger btn-xs"><i class="fa fa-list"></i></a>  
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

        


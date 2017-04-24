<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Route Detail List</h3>
           <div class="box-tools pull-right">
                <div class="btn-group">
		      <a href="<?= site_url('fleetscheduling/create_routedetail/'.$routeid); ?>"><i class="fa fa-plus"></i>Add Route Detail</a>
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
			  <th>Name</th>
			  <th>Latitude</th>
			  <th>Longititude</th>
			  <th>Type</th>
			  <th>Created By</th>
			  <th>Action</th>
		      </tr>
		  </thead>
		  <tbody>
			<?php 
			$i=0;
			foreach ($routedetails as $routedetail):
			$i++;
			?>
			<tr>
			    <td><?= $i ?></td>
			    <td><?= $routedetail->name; ?></td>
			    <td><?= $routedetail->latitude ?></td>
			    <td><?= $routedetail->longititude ?></td>
			    <td><?= $routedetail->type ?></td>
			    <td><?= $routedetail->createdby ?></td>
			    <td><a href="<?= site_url('fleetscheduling/edit_routedetails/'.$routedetail->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
			    <a href="<?= site_url('fleetscheduling/delete_routedetails/'.$routedetail->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

        


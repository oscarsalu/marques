<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Repairs</h3>
<div class="box-tools pull-right">
                <div class="btn-group">
                    <a href="#myModal" data-toggle="modal"><button type="button" class="btn btn-primary btn-xs">Filter
                  </button>
                  </a>
                </div>
          </div>
        </div>
        <div class="box-body">
   




						<table  class="table table-bordered table-striped" id="example1">
						   <thead>
								<th>Id</th>
								<th>vehicle</th>
                <th>part</th>
                <th>Cost</th>
                <th>Date</th>
              <th>Entered By</th>
                <th>Details</th>
                <th>Action</th>
							</thead>
							<tbody>
							<?php 
              $i=0;
              foreach ($vehicleData as $r):
              $i++?>
								<tr>
                        <td><?= $r->id ?></td>
                        <td><?= $r->vehicle ?></td>
                        <td><?= $r->part ?></td>
                        <td><?= $r->cost ?></td>
                        <td><?= $r->Date ?></td>
                        <td><?= $r->enteredBy ?></td>
                        <td><?= $r->Details ?></td>
                        <td><a href="<?= site_url('maintainance/repair_edit/'.$r->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('maintainance/repair_delete/'.$r->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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

            <!-- Modal Start -->
        <div class="modal fade" id="myModal" >
          <div class="modal-dialog ">
            <div class="modal-content">
        <form method="post" action="<? echo base_url() ?>insurance/report_repair" class="form-horizontal" />                     
            <div class="modal-content">
            <div class="modal-header" style="text-align:center">Filter</div>          
            <div class="modal-body">  
        <div class="form-group">
              <label for="date" class="col-sm-2 control-label">Vehicle</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="vehicleNo">
                     <option value="">--select Vehicle Number--</option>
                     <?php foreach ($vehicle_No as $vehicle) :?>
                       <option value="<?= $vehicle->RegNo?>"><?= $vehicle->RegNo?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
            <div class="form-group">
              <label for="date" class="col-sm-2 control-label">Part</label>
                  <div class="col-sm-10">
                    <input type="text" name="part">
                  </div>
               </div>
            <div class="form-group">
              <label for="date" class="col-sm-2 control-label">Cost</label>
                  <div class="col-sm-10">
                    From: <input type="number" name="fromcost" >&nbsp To: <input type="number" name="tocost" >
                  </div>
               </div>
               <div class="form-group">
              <label for="date" class="col-sm-2 control-label">Date</label>
                  <div class="col-sm-10">
                    From: <input type="text" class="date_input" name="fromdate" >&nbsp To: <input type="text" name="todate" class="date_input" >
                  </div>
               </div>
            <div class="modal-footer">
        <input type="submit" name='submit' value="Filter" class="btn  btn-success pull-right">
            </div>
            </div>
            </form>
            </div>
          </div>
        </div>

        


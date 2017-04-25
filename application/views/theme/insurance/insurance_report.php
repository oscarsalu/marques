<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Insurance Claims</h3>
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
							<tr>
								<th>Date</th>
								<th>Fleet</th>
								<th>Type</th>
                <th>Vehicle</th>
                <th>Accident</th>
                <th>Claim</th>
                <th>Entered By</th>
                <th>Reciept No</th>
                <th>Remarks</th>
                <th>Insurer</th>
                <th>Action</th>
              </th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($claimData as $claim):?>
								<tr>
						            <td><?= $claim->SysDate ?></td>
                        <td><?= $claim->Fleet ?></td>
                        <td><?= $claim->Type ?></td>
                        <td><?= $claim->VehicleNo ?></td>
                        <td><?= $claim->AccidentDate ?></td>
                        <td><?= $claim->Claim ?></td>
                        <td><?= $claim->EnteredBy ?></td>
                        <td><?= $claim->ReceiptNo ?></td>
                        <td><?= $claim->Remarks ?></td>
                        <td><?= $claim->insurer ?></td>
                        <td><a href="<?= site_url('insurance/editClaim/'.$claim->Id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('insurance/deleteClaim/'.$claim->Id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
                  </td>      
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
        <form method="post" action="<? echo base_url() ?>insurance/report_claims" class="form-horizontal" />                     
            <div class="modal-content">
            <div class="modal-header" style="text-align:center">Filter</div>          
            <div class="modal-body">  
        <div class="form-group">
                  <label for="fleet" class="col-sm-2 control-label">Fleet</label>

                  <div class="col-sm-10">
                     <select class="form-control" name="fleet">
                     <option value="">--select Fleet type--</option>
                     <?php foreach ($fleet_type as $fleet) :?>
                       <option value="<?= $fleet->FleetType?>"><?= $fleet->FleetType?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="type" class="col-sm-2 control-label">Type</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="type">
                     <option value="">--select Vehicle type--</option>
                     <?php foreach ($vehicle_type as $vehicle) :?>
                       <option value="<?= $vehicle->VehicleType?>"><?= $vehicle->VehicleType?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="vehicleNo" class="col-sm-2 control-label">Vehicle</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="vehicleNo">
                     <option value="">--select Vehicle Number--</option>
                     <?php foreach ($vehicle_No as $vehicle) :?>
                       <option value="<?= $vehicle->RegNo?>"><?= $vehicle->RegNo?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
               </div>
               <div class="form-group">
                  <label for="death" class="col-sm-2 control-label">Number Of Deaths</label>
                  <div class="col-sm-10">
                    <input type="text" name="death">
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


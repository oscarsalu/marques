<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Maintainace Record</h3>
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
								<th>id</th>
								<th>Supplier</th>
                <th>Date</th>
                <th>Fleet</th>
                <th>Cost</th>
                <th>Vehicle</th>
                <th>Remarks</th>
                <th>Ref No</th>
                <th>Approval</th>
                <th>Meter Reading</th>
                <th>Accident Ref</th>
                <th>Payment voucher</th>
								<th>Maintainance Type</th>
                <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($maintData as $m):?>
								<tr>
                        <td><?= $m->Id ?></td>
                        <td><?= $m->Supplier ?></td>
                        <td><?= $m->SysDate ?></td>
                        <td><?= $m->Fleet ?></td>
                        <td><?= $m->Cost ?></td>
                        <td><?= $m->Vehicle ?></td>
                        <td><?= $m->Remarks ?></td>
                        <td><?= $m->RefNo ?></td>
                        <td><?= $m->Approval ?></td>
                        <td><?= $m->MeterReading ?></td>
                        <td><?= $m->AccidentRef ?></td>
                        <td><?= $m->PaymentVoucher ?></td>
                        <td><?= $m->MaintType ?></td>
                        <td><a href="<?= site_url('maintainance/edit/'.$m->Id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="<?= site_url('maintainance/delete/'.$m->Id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>           
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
        <form method="post" action="<? echo base_url() ?>insurance/report_maintainance" class="form-horizontal" />                     
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
                  <label for="Supplier" class="col-sm-2 control-label">Supplier</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="supplier">
                    <option value="">--Select supplier--</option>
                     <?php foreach ($supplier as $s) :?>
                       <option value="<?= $s->SupplierName?>"><?= $s->SupplierName?></option>
                     <?php endforeach ?>
                     </select>
                  </div>
               </div>
            <div class="form-group">
                  <label for="Maintype" class="col-sm-2 control-label">Maintainance Type<span style="color:red">*</span></label>

                  <div class="col-sm-10">
                    <select class="form-control" name="Maintype">
                    <option value="">--Select Maintainance type--</option>
                     <?php foreach ($maintatype as $ty) :?>
                       <option value="<?= $ty->Type?>"><?= $ty->Type?></option>
                     <?php endforeach ?>
                     </select>
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


        


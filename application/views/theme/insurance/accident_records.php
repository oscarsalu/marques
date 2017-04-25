<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h2 class="box-title">Accident Records</h2>
<div class="box-tools pull-right">
                 <div class="btn-group">
                    <a href="#myModal" data-toggle="modal"><button type="button" class="btn btn-primary btn-xs">Filter
                  </button>
                  </a>
                </div>
          </div>
        </div>
        <div class="box-body">
        <div id="kotak">
          <?php foreach ($acciData as $accident):?>
            <h2>Date: <small><?php echo $accident->SysDate;?></small></h2>
            <h3>Vehicle: <small><?php echo $accident->Vehicle;?></small></h3>
            <h3>Driver: <small><?php echo $accident->Driver;?></small></h3>
            <p>Type: <?php echo $accident->Type; ?></p>
            <p>Fleet: <?php echo $accident->Fleet; ?></p>
            <p>Death: <?php echo $accident->Deaths; ?></p>
            <p><b>Details: </b> <?php echo $accident->Details; ?><br> Injured: <?php echo $accident->Injured; ?> <br> Damage: <?php echo $accident->DamageToVehicle; ?> <br> Location: <?php echo $accident->Location; ?><br>3rd Party Damages: <?php echo $accident->ThirdPartyDamages; ?></p>
            <img src="<?php echo base_url();?>uploads/<?php echo $accident->Images;?>" class="img-responsive">
            <p>Status Of The Injured: <?php echo $accident->StatusInjured; ?></p>
          <?php endforeach; ?>
        </div>

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
        <form method="post" action="<? echo base_url() ?>insurance/report_accident" class="form-horizontal" />                     
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
               <div class="form-group">
                  <label for="driver" class="col-sm-2 control-label">Driver</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="driver">
                    <option value="">--Select Driver--</option>
                     <?php foreach ($driver as $driver) :?>
                       <option value="<?= $driver->name?>"><?= $driver->name?></option>
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

        


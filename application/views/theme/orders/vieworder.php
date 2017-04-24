
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <form class="form-horizontal" method="post" action="<?= site_url('order/add_to_invoice') ?>">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-truck"></i>Add Fleet</h3>

          <div class="box-tools pull-right">
                  <div class="btn-group">
                
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">  vehicle_types
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/vehicle_types'); ?>"><i class="fa fa-truck"></i>fuel_station types</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_vehicle_type'); ?>"><i class="fa fa-plus"></i>Create fuel_stationtype</a></li>
                   
                  </ul>
                </div>
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Fleet
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/fleets'); ?>"><i class="fa fa-car"></i>Fleets</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_fleet'); ?>"><i class="fa fa-plus"></i>Create a fleet</a></li>
                   
                  </ul>
                </div>
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Drivers
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= site_url('fleet/drivers'); ?>"><i class="fa fa-user"></i>Drivers</a></li>
                     <li class="divider"></li>
                    <li><a href="<?= site_url('fleet/create_driver'); ?>"><i class="fa fa-plus"></i>Add a Driver</a></li>
                   
                  </ul>
                </div>
          </div>
        </div>
        <div class="box-body">
           <?php
           if(!empty($_SESSION['obj'])){
              $obj=get_object_vars($_SESSION['obj']); 
           }
           ?>
           <table class="table table-bordered">
             <tr>
               <td>Date</td>
                <td><input type="text" name="date" class="form-control" id="datepicker" value="<?php if(!empty($obj['date'])){ echo $obj['date']; } ?>"><span><?= form_error('date'); ?></span></td>
                <td>Ref No:</td>
                <td><input type="text" class="form-control" name="ref_no" value="<?php if(!empty($obj['ref_no'])){ echo $obj['ref_no']; } ?>"><span><?= form_error('ref_no'); ?></span></td>
                <td>Vehicle</td>
                <td><select name="fleet" class="form-control">
                  <option>Select a vehicle</option>
                   <?php foreach ($fleets as $fleet): ?>
                   <option <?php if(!empty($obj['fleet'])){ if($obj['fleet']==$fleet->ID){ echo "selected"; } } ?>  value="<?php echo $fleet->ID; ?>"><?php echo $fleet->RegNo; ?></option>
                    <?php endforeach; ?>
                  </select><span><?= form_error('fleet'); ?></span></td>
             </tr>
             <tr>
                <td>Billers Name</td>
                <td><input type="text" readonly name="created_by" value="<?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name'); ?>" class="form-control" ></td>
                <td>Loading Zone:</td>
                <td><input type="text" class="form-control" name="warehouse" value="<?php if(!empty($obj['warehouse'])){ echo $obj['warehouse']; } ?>"><span><?= form_error('warehouse'); ?></span></td>
                <td>driver:</td>
                <td><input type="text" class="form-control" name="driver" value="<?php if(!empty($obj['driver'])){ echo $obj['driver']; } ?>"><span><?= form_error('driver'); ?></span></td>
             </tr>
             <tr>
                <td>Note:</td>
                <td><textarea class="form-control" name="note" id="note"  cols="20" title="note" ><?php if(!empty($obj['note'])){ echo $obj['note']; } ?></textarea><span><?= form_error('note'); ?></span></td>
             </tr>
           </table>
           <hr>
           <table class="table table-bordered">
              <tr>
                <td><input type="text" name="item_name"  class="form-control" placeholder="item name"><span><?= form_error('item_name'); ?></span></td>
                <td><input type="text" name="qty"  class="form-control" placeholder="qty"><span><?= form_error('qty'); ?></span></td>
                <td><input type="text" name="cost"  class="form-control" placeholder="cost"><span><?= form_error('cost'); ?></span></td>
                <td><input type="text" name="total_amount"  class="form-control" placeholder="total"><span><?= form_error('total_amount'); ?></span></td>
                <td><input type="text" name="customer"  class="form-control" placeholder="customer"><span><?= form_error('customer'); ?></span></td>
                </tr>
                <tr>
                <td><input type="text" name="phone"  class="form-control" placeholder="Contact"><span><?= form_error('phone'); ?></span></td>
                <td><input type="text" name="source"  class="form-control" placeholder="source"><span><?= form_error('source'); ?></span></td>
                <td><input type="text" name="recipient"  class="form-control" placeholder="recipient"><span><?= form_error('recipient'); ?></span></td>
                <td><input type="text" name="recipienttel"  class="form-control" placeholder="Recipient Tel"><span><?= form_error('recipienttel'); ?></span></td>
                <td><input type="text" name="destination"  class="form-control" placeholder="destination"><span><?= form_error('destination'); ?></span></td>
                <td><input type="submit" name='submit' value="Add Record" class="btn  btn-success pull-left"></td>
              </tr>
           </table>
         
         <hr>
           <table class="table table-bordered">
              <thead>
                    <tr>
		      <th>Item</th>
		      <th>Qty</th>
		      <th>Cost</th>
		      <th>Total</th>
		      <th>Sender</th>
		      <th>Sender Contact</th>
		      <th>Recipient</th>
		      <th>Recipient Contact</th>
		      <th>Source</th>
		      <th>Destination</th>
		      <th>&nbsp;</td>
                    </tr>                
              </thead>
               <tbody>
                   <?php
                   $total=0;
		   $qty=0;
		   print_r($_SESSION['obj']);
		   $ob = str_replace('&','',serialize($obj));print_r($obj);
		   $ob = str_replace("'","!",$ob);
                   if(!empty($_SESSION['shpitems'])){
		    $shpitems=$_SESSION['shpitems'];//print_r($shpitems);
		    $i=0;
		    $j=count($shpitems);
		    while($j>0){
		    $qty+=$shpitems[$i]['qty'];
		    $total+=$shpitems[$i]['total_amount'];
		    ?>
                    <tr>
		      <td><?php echo $shpitems[$i]['item_name']; ?></td>
		      <td><?php echo $shpitems[$i]['qty']; ?></td>
		      <td><?php echo $shpitems[$i]['cost']; ?></td>
		      <td><?php echo $shpitems[$i]['total_amount']; ?></td>
		      <td><?php echo $shpitems[$i]['customer']; ?></td>
		      <td><?php echo $shpitems[$i]['phone']; ?></td>
		      <td><?php echo $shpitems[$i]['recipient']; ?></td>
		      <td><?php echo $shpitems[$i]['recipienttel']; ?></td>
		      <td><?php echo $shpitems[$i]['source']; ?></td>
		      <td><?php echo $shpitems[$i]['destination']; ?></td>
		      <td><a href="<?= site_url('order/edit_order_item/'.$i); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
		      <a href="<?= site_url('order/delete_order_item/'.$i); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> </td>
                    </tr>  
                    <?php 
                    $j--;
                    $i++;
                    }
                   }
                    ?>
              </tbody>
               <tfoot>
                    <tr>
		      <td>Totals</td>
		      <td><?php echo $qty; ?></td>
		      <td>&nbsp;</td>
		      <td><?php echo $total; ?></td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
                    </tr>                
              </tfoot>             
            </table>
 

      <?php echo form_hidden($csrf); ?>
      </div>
	    <div class="box-footer">
	    <input type='hidden' readonly name='total' value='<?php echo $total; ?>'>
	    <input type="submit" class="btn  btn-warning pull-left" name="submit" value="Cancel">
	    <input type="button" class="btn btn-success pull-right" value="Print" onclick="Clickheretoprint('<?= $obj['order_id']; ?>');">
	    <input type="submit" class="btn  btn-success pull-right" name="submit" value="Update Invoice">
	    </div>
            </div><!-- /.box-body -->
           </div><!--box box-success-->
           <?php echo form_close();?>

          </div>
          </div>
       </section>
<script language="javascript1.1" type="text/javascript">
function Clickheretoprint(id)
{ 
poptastic("<?= site_url('order/printinvoice/'); ?>"+id,450,940);
}
</script>


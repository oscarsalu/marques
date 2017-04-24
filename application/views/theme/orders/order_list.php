<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
           <div class="box-tools pull-right">
             
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
			  <th>Date</th>
			  <th>Ref No</th>
			  <th>Driver</th>
			  <th>Fleet</th>
			  <th>Warehouse</th>
			  <th>Note</th>
			  <th>Total</th>
			  <th>Status</th>
			  <th>Payment Status</th>
			  <th>Created By</th>
			  <th>&nbsp;</th>
		      </tr>
		  </thead>
		  <tbody>
			<?php 
			$i=0; 
			foreach ($orders as $row):
			$i++;
			?>
			<tr>
			    <td><?= $i ?></td>
			    <td><?= $row->date; ?></td>
			    <td><?= $row->ref_no; ?></td>
			    <td><?= $row->driver; ?></td>
			    <td><?= $row->fleet; ?></td>
			    <td><?= $row->warehouse; ?></td>
			    <td><?= $row->note; ?></td>
			    <td><?= $row->total; ?></td>			    
			    <td><?= $row->status; ?></td>
			    <td><?= $row->payment_status; ?></td>			    
			    <td><?= $row->created_by; ?></td>
			    <td>
			    <div class="box-tools pull-left">
			      <div class="btn-group">
			    
			      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Actions
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			      </button>
			      <ul class="dropdown-menu" role="menu">
				<li><a href="<?= site_url('order/load_order/'.$row->order_id); ?>"><i class=""></i>View Invoice</a></li>
				<li class="divider"></li>
				<li><a href="#<?= $row->order_id; ?>" data-toggle="modal">Make Payment</a></li>
				<li class="divider"></li>
				<li><a href="<?= site_url('order/load_payments/'.$row->order_id); ?>"><i class=""></i></i>View Payment</a></li>
			      </ul>
			    </div> 
			    </td>
			    	  <!-- Modal Start -->
			  <div class="modal fade" id="<?= $row->order_id; ?>" >
			    <div class="modal-dialog ">
			      <div class="modal-content">
				<form method="post" action="<? echo base_url() ?>order/makepayment" class="form-horizontal" />                     
				    <div class="modal-content">
				    <div class="modal-header" style="text-align:center">Make Payment</div>		      
				    <div class="modal-body">	
				         <div class="col-sm-10">
				         <input class="form-control" type="hidden" name="orderid" readonly value="<?= $row->order_id; ?>"> 
				         <input class="form-control" type="text" name="refno" readonly value="<?= $row->ref_no; ?>"> 
					 Amount Payable:<input class="form-control" type="text" name="amountpayable" readonly value="<?= $row->total; ?>"> 
					 </div>
					 <div class="col-sm-10">
					 Amount Paid:<input class="form-control" type="text" name="amount" value="" required> 
					 </div>
					 <div class="col-sm-10">
					    Payment Mode:<select class="form-control" name="paymentmode" required>
					    <option>Select Payment Mode...</option>
					      <option value="cash">Cash</option>
					      <option value="Bank">Bank</option>
					    </select>
					    <?= form_error('paymentmode'); ?></span>
					  </div>
					 <div class="col-sm-10">
					 Bank<input class="form-control" type="text" name="bank" value=""> 
					 </div>
					 <div class="col-sm-10">
					 Bank Receipt No:<input class="form-control" type="text" name="receiptno" value=""> 
					 </div>
					 <div class="col-sm-10">
					 Paid By:<input class="form-control" type="text" name="paidby" value="" required> 
					 <div class="col-sm-10">
					 Paid On:<br><input type="text" class="date_input" name="paidon" value="" required> 
					 </div>
				    </div>
				    <div class="modal-footer">
				<input type="submit" name='submit' value="Add Payment" class="btn  btn-success pull-right">
			      </div>
			      </div>
			      </form>
			      </div>
			    </div>
			  </div><!-- End Modal -->
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

        


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
			  <th>Paid On</th>
			  <th>Ref No</th>
			  <th>Amount</th>
			  <th>Paidby</th>
			  <th>Payment Mode</th>
			  <th>Bank</th>
			  <th>Receipt No</th>
			  <th>Created By</th>
			  <th>&nbsp;</th>
		      </tr>
		  </thead>
		  <tbody>
			<?php 
			$i=0; 
			foreach ($payments as $row):
			$i++;
			?>
			<tr>
			    <td><?= $i ?></td>
			    <td><?= $row->paidon; ?></td>
			    <td><?= $row->refno; ?></td>
			    <td><?= $row->amount; ?></td>
			    <td><?= $row->paidby; ?></td>
			    <td><?= $row->paymentmode; ?></td>
			    <td><?= $row->bank; ?></td>
			    <td><?= $row->receiptno; ?></td>			    
			    <td><?= $row->createdby; ?></td>
			    <td>
			    <div class="box-tools pull-left">
			      <div class="btn-group">
			    
			      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"  title="vtypes">Actions
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			      </button>
			      <ul class="dropdown-menu" role="menu">
				<li><input type="button" class="btn btn-success pull-left" value="Print" onclick="Clickheretoprint('<?= $row->id; ?>');"></li>
				<span class="caret"></span>
			      </ul>
			    </div> 
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
<script language="javascript1.1" type="text/javascript">
function Clickheretoprint(id)
{ 
poptastic("<?= site_url('order/printreceipt/'); ?>"+id,450,940);
}
</script>
        


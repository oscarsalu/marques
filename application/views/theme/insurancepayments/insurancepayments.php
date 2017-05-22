<!-- Main content -->
<section class="content">
<!-- Default box -->
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">insurancepayments List</h3>
			<div class="box-tools pull-right">
				<div class="btn-group">
					<a href="<?= site_url('insurancepayments/create_insurancepayments/'); ?>"><i class="fa fa-plus"></i>Add Insurancepayments</a>
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
							<th></th>
							<th>System Date</th>
							<th>Fleet</th>
							<th>Type</th>
							<th>Vehicle Number</th>
							<th>Renewal Date</th>
							<th>Premium</th>
							<th>Cost</th>
							<th>Payment vouther</th>
							<th>Entered By</th>
							<th>Date Of Payment</th>
							<th>Insurer</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0; ?>
					<?php foreach ($insurancepayments as $row): ?>
					<?php $i++; ?>
						<tr>
							<td><?= $row->Id; ?></td>
							<td><?= $row->SysDate; ?></td>
							<td><?= $row->Fleet; ?></td>
							<td><?= $row->Type; ?></td>
							<td><?= $row->VehicleNo; ?></td>
							<td><?= $row->RenewalDueDate; ?></td>
							<td><?= $row->Premium; ?></td>
							<td><?= $row->Cost; ?></td>
							<td><?= $row->PaymentVoucher; ?></td>
							<td><?= $row->EnteredBy; ?></td>
							<td><?= $row->DateofPayment; ?></td>
							<td><?= $row->Insurer; ?></td>
							<td><a href="<?= site_url('insurancepayments/edit_insurancepayments/'.$row->Id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>							<a href="<?= site_url('insurancepayments/delete_insurancepayments/'.$row->Id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
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

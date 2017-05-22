<!-- Main content -->
<section class="content">
<!-- Default box -->
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">otherrenewal List</h3>
			<div class="box-tools pull-right">
				<div class="btn-group">
					<a href="<?= site_url('otherrenewal/create_otherrenewal/'); ?>"><i class="fa fa-plus"></i>Add Otherrenewal</a>
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
							<th>Fleet</th>
							<th>Vehicle Number</th>
							<th>Vehicle Type</th>
							<th>Payment Type</th>
							<th>Payment Date</th>
							<th>Cost</th>
							<th>Entered By</th>
							<th>Period From</th>
							<th>Period To</th>
							<th>Payment Reference</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0; ?>
					<?php foreach ($otherrenewal as $row): ?>
					<?php $i++; ?>
						<tr>
							<td><?= $row->ID; ?></td>
							<td><?= $row->Fleet; ?></td>
							<td><?= $row->VehicleNo; ?></td>
							<td><?= $row->VehicleType; ?></td>
							<td><?= $row->PaymentType; ?></td>
							<td><?= $row->PaymentDate; ?></td>
							<td><?= $row->Cost; ?></td>
							<td><?= $row->EnteredBy; ?></td>
							<td><?= $row->PeriodFrom; ?></td>
							<td><?= $row->PeriodTo; ?></td>
							<td><?= $row->PaymentRef; ?></td>
							<td><a href="<?= site_url('otherrenewal/edit_otherrenewal/'.$row->ID); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>							<a href="<?= site_url('otherrenewal/delete_otherrenewal/'.$row->ID); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
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

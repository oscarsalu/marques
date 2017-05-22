<?php foreach ($otherrenewal as $obj){}; ?>
<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
			<form class="form-horizontal" method="post" action="<?= site_url('otherrenewal/edit_otherrenewal/'.$obj->ID) ?>">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Otherrenewal</h3>
					</div>
					<div class="box-body">
					<input class="form-control" name="id" id="id" type="hidden" value="<?php echo $obj->ID; ?>" />
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="ID" id="ID" value="<?php echo $obj->ID; ?>">
								<span class="alert-msg  error"><?php echo form_error('ID'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Fleet</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="Fleet" id="Fleet" value="<?php echo $obj->Fleet; ?>">
								<span class="alert-msg  error"><?php echo form_error('Fleet'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Vehicle Number</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="VehicleNo" id="VehicleNo" value="<?php echo $obj->VehicleNo; ?>">
								<span class="alert-msg  error"><?php echo form_error('VehicleNo'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Vehicle Type</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="VehicleType" id="VehicleType" value="<?php echo $obj->VehicleType; ?>">
								<span class="alert-msg  error"><?php echo form_error('VehicleType'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Payment Type</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="PaymentType" id="PaymentType" value="<?php echo $obj->PaymentType; ?>">
								<span class="alert-msg  error"><?php echo form_error('PaymentType'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Payment Date</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="PaymentDate" id="PaymentDate" value="<?php echo $obj->PaymentDate; ?>">
								<span class="alert-msg  error"><?php echo form_error('PaymentDate'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Cost</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="Cost" id="Cost" value="<?php echo $obj->Cost; ?>">
								<span class="alert-msg  error"><?php echo form_error('Cost'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Entered By</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="EnteredBy" id="EnteredBy" value="<?php echo $obj->EnteredBy; ?>">
								<span class="alert-msg  error"><?php echo form_error('EnteredBy'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Period From</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="PeriodFrom" id="PeriodFrom" value="<?php echo $obj->PeriodFrom; ?>">
								<span class="alert-msg  error"><?php echo form_error('PeriodFrom'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Period To</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="PeriodTo" id="PeriodTo" value="<?php echo $obj->PeriodTo; ?>">
								<span class="alert-msg  error"><?php echo form_error('PeriodTo'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Payment Reference</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="PaymentRef" id="PaymentRef" value="<?php echo $obj->PaymentRef; ?>">
								<span class="alert-msg  error"><?php echo form_error('PaymentRef'); ?></span>
							</div>
						</div>
						<div class="box-footer">
						<?php echo form_hidden($csrf); ?>
						<button type="reset" class="btn  btn-danger pull-left"> cancel </button>
						<?php echo form_submit('submit', 'Update','class="btn btn-lg btn-success pull-right"');?>
						</div>
					</div><!-- /.box-body -->
				</div><!--box box-success-->
			</div>
		</div>
	</section>
<script type="text/javascript">
	$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
</script>

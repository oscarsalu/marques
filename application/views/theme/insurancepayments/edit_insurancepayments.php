<?php foreach ($insurancepayments as $obj){}; ?>
<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
			<form class="form-horizontal" method="post" action="<?= site_url('insurancepayments/edit_insurancepayments/'.$obj->Id) ?>">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Insurancepayments</h3>
					</div>
					<div class="box-body">
					<input class="form-control" name="id" id="id" type="hidden" value="<?php echo $obj->Id; ?>" />
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="Id" id="Id" value="<?php echo $obj->Id; ?>">
								<span class="alert-msg  error"><?php echo form_error('Id'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">System Date</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="SysDate" id="SysDate" value="<?php echo $obj->SysDate; ?>">
								<span class="alert-msg  error"><?php echo form_error('SysDate'); ?></span>
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
							<label class="col-sm-2 control-label">Type</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="Type" id="Type" value="<?php echo $obj->Type; ?>">
								<span class="alert-msg  error"><?php echo form_error('Type'); ?></span>
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
							<label class="col-sm-2 control-label">Renewal Date</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="RenewalDueDate" id="RenewalDueDate" value="<?php echo $obj->RenewalDueDate; ?>">
								<span class="alert-msg  error"><?php echo form_error('RenewalDueDate'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Premium</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="Premium" id="Premium" value="<?php echo $obj->Premium; ?>">
								<span class="alert-msg  error"><?php echo form_error('Premium'); ?></span>
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
							<label class="col-sm-2 control-label">Payment vouther</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="PaymentVoucher" id="PaymentVoucher" value="<?php echo $obj->PaymentVoucher; ?>">
								<span class="alert-msg  error"><?php echo form_error('PaymentVoucher'); ?></span>
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
							<label class="col-sm-2 control-label">Date Of Payment</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="DateofPayment" id="DateofPayment" value="<?php echo $obj->DateofPayment; ?>">
								<span class="alert-msg  error"><?php echo form_error('DateofPayment'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Insurer</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="Insurer" id="Insurer" value="<?php echo $obj->Insurer; ?>">
								<span class="alert-msg  error"><?php echo form_error('Insurer'); ?></span>
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

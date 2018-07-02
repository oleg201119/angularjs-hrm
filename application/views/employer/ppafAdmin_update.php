<!-- end of top-nav -->
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<br/>
		<div class="box-header">
			<div class="box-tools pull-left">
				<h3 class="box-title">Update PPAF Admin</h3>  
			</div>
			<div class="box-tools pull-right">
				<a href="<?php echo base_url();?>ppafAdmin" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
		<div class="col-md-12 tabborderone">
			<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
					if(!empty($editppafAdmin))
					{
						foreach($editppafAdmin as $res)
						{
							?>
								<div class="box-body">
									<div class="row col-md-12">
										<div class="form-group col-md-6">
											<div class="input text">
												<label>Page<span class="text-danger">*</span></label>
												<select name="ppaf_a_page" class="form-control" id="ppaf_a_page" >
													<option value=""></option>>
													<option value="PPAF" <?php if($res->ppaf_a_page == 'PPAF'){ echo "selected"; } ?>>PPAF</option>>
													<option value="Cessation" <?php if($res->ppaf_a_page == 'Cessation'){ echo "selected"; } ?>>Cessation</option>>
												</select>
												<?php echo form_error('ppaf_a_page','<span class="text-danger">','</span>'); ?>
											</div>
										</div><br/><br/>
									</div>
									<div class="row col-md-12">
										<div class="form-group col-md-6">
											<div class="input text">
												<label>Question<span class="text-danger">*</span></label>
												<textarea name="ppaf_a_question" class="form-control" id="ppaf_a_question" ><?php echo $res->ppaf_a_question; ?></textarea>
												<?php echo form_error('ppaf_a_question','<span class="text-danger">','</span>'); ?>
											</div>
										</div><br/><br/>
									</div>
									<div class="row col-md-12">
										<div class="form-group col-md-6">
											<div class="input text">
												<label>Order<span class="text-danger">*</span></label>
												<input name="ppaf_a_order" class="form-control" type="number" min="0" id="ppaf_a_order" value="<?php echo $res->ppaf_a_order; ?>" />
												<?php echo form_error('ppaf_a_order','<span class="text-danger">','</span>'); ?>
											</div>
										</div><br/><br/>
									</div>
									<div class="row col-md-12">
										<div class="form-group col-md-6">
											<div class="input text">
												<label>Active<span class="text-danger">*</span></label>
												<select name="ppaf_a_active_status" class="form-control" id="ppaf_a_active_status" >
													<option value=""></option>>
													<option value="1" <?php if($res->ppaf_a_active_status == '1'){ echo "selected"; } ?>>Yes</option>>
													<option value="0" <?php if($res->ppaf_a_active_status == '0'){ echo "selected"; } ?>>No</option>>
												</select>
												<?php echo form_error('ppaf_a_active_status','<span class="text-danger">','</span>'); ?>
											</div>
										</div><br/><br/>
									</div>
								</div><!-- /.box-body -->								
								<div class="box-footer">
									<button class="btn btn-success btn-sm" data-toggle="model" type="submit" name="Submit" value="Update" >Submit</button>
									<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>ppafAdmin">Cancel</a>
								</div>
							<?php
						}
					}
					else
					{
						?>								
							<span>No record found </span>
						<?php
					}
				?>
			</form>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
</div>
<!-- end of top-nav -->
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<br/>
		<div class="box-header">
			<div class="box-tools pull-left">
				<h3 class="box-title">Update Employee Type</h3>  
			</div>
			<div class="box-tools pull-right">
				<a href="<?php echo base_url();?>employeeType" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
		<div class="col-md-12 tabborderone">
			<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
					if(!empty($editemployeeType))
					{
						foreach($editemployeeType as $res)
						{
							?>
							<div class="box-body">
								<div class="row col-md-12">
									<div class="form-group col-md-6">
										<div class="input text">
											<label>Employee Type Name<span class="text-danger">*</span></label>
											<input name="emp_type_name" class="form-control" type="text" id="emp_type_name" value="<?php echo $res->emp_type_name; ?>" />
											<?php echo form_error('emp_type_name','<span class="text-danger">','</span>'); ?>
										</div>
									</div><br/><br/>
								</div>
							</div><!-- /.box-body -->								
							<div class="box-footer">
								<button class="btn btn-success btn-sm" data-toggle="model" type="submit" name="Submit" value="Update" >Update</button>
								<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>employeeType">Cancel</a>
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
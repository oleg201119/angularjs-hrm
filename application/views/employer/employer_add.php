<!-- end of top-nav -->
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<br/>
		<div class="box-header">
			<div class="box-tools pull-left">
				<h3 class="box-title">Add New Employer</h3> 
			</div>
			<div class="box-tools pull-right">
				<a href="<?php echo base_url();?>employer" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
		<div class="col-md-12 tabborderone">
			<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row col-md-12">
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Name<span class="text-danger">*</span></label>
								<input name="employer_name" class="form-control" type="text" id="employer_name" value="<?php echo set_value('employer_name'); ?>" />
								<?php echo form_error('employer_name','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
						<div class="form-group col-md-1"></div>
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Email<span class="text-danger">*</span></label>
								<input name="employer_email" class="form-control" type="email" id="employer_email" value="<?php echo set_value('employer_email'); ?>" />
								<?php echo form_error('employer_email','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
					</div>
					<div class="row col-md-12">
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Password<span class="text-danger">*</span></label>
								<input name="employer_password" class="form-control" type="password" id="employer_password" value="<?php echo set_value('employer_password'); ?>" />
								<?php echo form_error('employer_password','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
						<div class="form-group col-md-1"></div>
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Confirm Password<span class="text-danger">*</span></label>
								<input name="c_employer_password" class="form-control" type="password" id="c_employer_password" value="<?php echo set_value('c_employer_password'); ?>" />
								<?php echo form_error('c_employer_password','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
					</div>
					<div class="row col-md-12">
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Phone Number<span class="text-danger">*</span></label>
								<input name="employer_phone_no" class="form-control" type="text" id="employer_phone_no" value="<?php echo set_value('employer_phone_no'); ?>" />
								<?php echo form_error('employer_phone_no','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
						<div class="form-group col-md-1"></div>
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Role<span class="text-danger">*</span></label>
								<select name="employer_role" class="form-control" id="employer_role">
									<option value="">-- Select Role --</option>
									<?php 
										foreach($role_list as $r_list)
										{
											$role_l = explode(',', $r_list->role_type);
											if(in_array('Employer', $role_l))
											{
												if($this->employer_role != $r_list->role_id)
												{
													?>
														<option value="<?php echo $r_list->role_id; ?>"><?php echo $r_list->role_name; ?></option>
													<?php
												}
											}
										}
									?>
									
								</select>
								<?php echo form_error('employer_role','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
					</div>
					<div class="row col-md-12">
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Address<span class="text-danger">*</span></label>
								<textarea name="employer_address" class="form-control" id="employer_address" ></textarea>
								<?php echo form_error('employer_address','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
						<div class="form-group col-md-1"></div>
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Address 2</label>
								<textarea name="employer_address_two" class="form-control" id="employer_address_two" ></textarea>
								<?php echo form_error('employer_address_two','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
					</div>
					<div class="row col-md-12">
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Suburb<span class="text-danger">*</span></label>
								<input name="employer_suburb" class="form-control" type="text" id="employer_suburb" value="<?php echo set_value('employer_suburb'); ?>" />
								<?php echo form_error('employer_suburb','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
						<div class="form-group col-md-1"></div>
						<div class="form-group col-md-5">
							<div class="input text">
								<label>State<span class="text-danger">*</span></label>
								<select name="employer_state_id" class="form-control" id="employer_state_id">
									<option value="">-- Select State --</option>
									<?php 
										foreach($state_list as $s_list)
										{
											?>
												<option value="<?php echo $s_list->state_id; ?>"><?php echo $s_list->state_name; ?></option>
											<?php
										}
									?>
									
								</select>
								<?php echo form_error('employer_state_id','<span class="text-danger">','</span>'); ?>
							</div>
						</div>
					</div>
					<div class="row col-md-12">
						<div class="form-group col-md-5">
							<div class="input text">
								<label>Postcode<span class="text-danger">*</span></label>
								<input name="employer_postcode" min="0" class="form-control" type="number" id="employer_postcode" value="<?php echo set_value('employer_postcode'); ?>" />
								<?php echo form_error('employer_postcode','<span class="text-danger">','</span>'); ?>
							</div>
						</div>			
					</div>
				</div><!-- /.box-body -->								
				<div class="box-footer">
					<button class="btn btn-success btn-sm" data-toggle="model" type="submit" name="Submit" value="Submit" >Submit</button>
					<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>employer">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
</div><br/><br/>
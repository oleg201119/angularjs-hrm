<!-- end of top-nav -->
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<br/>
		<div class="box-header">
			<div class="box-tools pull-left">
				<h3 class="box-title">Update Employees details</h3>  
			</div>
			<div class="box-tools pull-right">
				<a href="<?php echo base_url();?>employees/" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
		<form class="form-horizontal" action=""  id="employee_add_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<?php 
				foreach($editEmployees as $res)
				{
					?>
						<ul class="nav nav-tabs">
				            <li class="active"><a data-toggle="tab" href="#tab1">Personal Detail</a></li>
				            <li><a data-toggle="tab" href="#tab2">Work Detail</a></li>
				        </ul>
				        <div class="tab-content">
			          		<div id="tab1" class="tab-pane fade in active">
			          			<div class="col-md-12 tabborder">
			          				<div class="row">
				          				<div class="col-md-6">
				          					<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_fname">First Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="emp_fname" id="emp_fname" placeholder="" value="<?php echo $res->emp_fname; ?>">
													<span id="errormsg_emp_fname" style="display:none;" class="text-danger" >Enter First Name</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_lname">Last Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="emp_lname" id="emp_lname" placeholder="" value="<?php echo $res->emp_lname; ?>">
													<span id="errormsg_emp_lname" style="display:none;" class="text-danger" >Enter Last Name</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_email">Email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="emp_email" id="emp_email" placeholder="" value="<?php echo $res->emp_email; ?>">
													<span id="errormsg_emp_email" style="display:none;" class="text-danger" >Enter Email</span>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_address">Address</label>
												<div class="col-sm-8">
													<input type="text" maxlength="256" class="form-control" name="emp_address" id="emp_address" placeholder="" value="<?php echo $res->emp_address; ?>">
													<span id="errormsg_emp_address" style="display:none;" class="text-danger" >Enter Address</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_suburb">Suburb</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="emp_suburb" id="emp_suburb" placeholder="" value="<?php echo $res->emp_suburb; ?>">
													<span id="errormsg_emp_suburb" style="display:none;" class="text-danger" >Enter Suburb</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_state_id">State</label>
												<div class="col-sm-8">
													<select class="form-control" name="emp_state_id" id="emp_state_id">
														<?php
															if(!empty($state_list))
															{
																foreach ($state_list as $s_list) {
																	?>
																		<option value="<?php echo $s_list->state_id; ?>" <?php if($res->emp_state_id == $s_list->state_id){ echo "selected"; } ?>> <?php echo $s_list->state_name; ?></option>
																	<?php
																}
															}
														?>
													</select>
													<span id="errormsg_emp_state_id" style="display:none;" class="text-danger" >Select State</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_postcode">Postcode</label>
												<div class="col-sm-8">
													<input type="text" pattern="\d*" min="0" maxlength="8"  class="form-control" name="emp_postcode" id="emp_postcode" placeholder="" value="<?php echo $res->emp_postcode; ?>">
													<span id="errormsg_emp_postcode" style="display:none;" class="text-danger" >Enter Postcode</span>
												</div>
											</div>
				          				</div>	
				          				<div class="col-md-6">
				          					<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_title">Title</label>
												<div class="col-sm-8">
													<select class="form-control" name="emp_title" id="emp_title">
														<option value="Miss" <?php if($res->emp_title == 'Miss'){ echo "selected"; } ?> >Miss</option>
														<option value="Mr" <?php if($res->emp_title == 'Mr'){ echo "selected"; } ?> >Mr</option>
														<option value="Mrs" <?php if($res->emp_title == 'Mrs'){ echo "selected"; } ?> >Mrs</option>
														<option value="Ms" <?php if($res->emp_title == 'Ms'){ echo "selected"; } ?> >Ms</option>
													</select>
													<span id="errormsg_emp_title" style="display:none;" class="text-danger" >Select Title</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_gender">Gender</label>
												<div class="col-sm-8">
													<select class="form-control" name="emp_gender" id="emp_gender">
														<option value=""></option>
														<option value="Male" <?php if($res->emp_gender == 'Male'){ echo "selected"; } ?> >Male</option>
														<option value="Female" <?php if($res->emp_gender == 'Female'){ echo "selected"; } ?> >Female</option>
													</select>
													<span id="errormsg_emp_gender" style="display:none;" class="text-danger" >Select Gender</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_phone">Phone</label>
												<div class="col-sm-8">
													<input type="text" pattern="\d*" min="0" maxlength="16" class="form-control" name="emp_phone" id="emp_phone" placeholder="" value="<?php echo $res->emp_phone; ?>">
													<span id="errormsg_emp_phone" style="display:none;" class="text-danger" >Enter Phone</span>
												</div>
											</div>
											<div class="form-group row">
				                                <label class="control-label col-sm-4" for="email">Date of Birth</label>	                                
				                                <div class="col-sm-8">
	                                    <div class='input-group date' id='emp_dob_i'>
											<input type="text" class="form-control" name="emp_dob" id="emp_dob" placeholder="" value="<?php echo $res->emp_dob; ?>" onkeyup="validate_form_onchange('emp_dob', this.value)">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div> 
													<span id="errormsg_emp_dob" style="display:none;" class="text-danger" >Enter Date of Birth</span>                             
				                                </div>
				                            </div>
											
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_nationality">Nationality</label>
												<div class="col-sm-8">
													<select class="form-control" name="emp_nationality" id="emp_nationality">
														<?php
												if(!empty($country_list))
												{
													foreach ($country_list as $p_list) {
														?>
															<option value="<?php echo $p_list->country_id; ?>" <?php if($p_list->country_id == $res->emp_nationality){ echo "selected"; }?>> <?php echo $p_list->country_name; ?></option>
														<?php
													}
												}
											?>
													</select>
													<span id="errormsg_emp_nationality" style="display:none;" class="text-danger" >Select Nationality</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_visa_type">VISA Type</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="emp_visa_type" id="emp_visa_type" placeholder="" value="<?php echo $res->emp_visa_type; ?>">
													<span id="errormsg_emp_visa_type" style="display:none;" class="text-danger" >Enter VISA Type</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="emp_visa_expiry">Visa Expiry</label>
												 <div class="col-sm-8">
									 	 <div class='input-group date' id='emp_visa_expiry_i'>
											<input type="text" class="form-control" name="emp_visa_expiry" id="emp_visa_expiry" placeholder="" value="<?php echo $res->emp_visa_expiry; ?>" onkeyup="validate_form_onchange('emp_visa_expiry', this.value)">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
													<span id="errormsg_emp_visa_expiry" style="display:none;" class="text-danger" >Enter Visa Expiry</span>
				                                </div>
											</div>
				          				</div>	
			          				</div>
			          			</div>
			          		</div>
			          		<div id="tab2" class="tab-pane fade">
			          			<div class="col-md-12 tabborder">
			          				<div class="row">
				          				<div class="col-md-6">
				          					<div class="form-group row">
									<label class="control-label col-sm-4" for="empw_start_date">Start Date</label>
									<div class="col-sm-8">
										<div class='input-group date' id='empw_start_date_i'>
											<input type="text" class="form-control" name="empw_start_date" id="empw_start_date" placeholder="" value="<?php echo $res->empw_start_date; ?>" onkeyup="validate_form_onchange('empw_start_date', this.value)">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<span id="errormsg_empw_start_date" style="display:none;" class="text-danger" >Enter Start Date</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-sm-4" for="empw_end_date">End Date</label>
									<div class="col-sm-8">
										<div class='input-group date' id='empw_end_date_i'>
											<input type="text" class="form-control" name="empw_end_date" id="empw_end_date" placeholder="" value="<?php echo $res->empw_end_date; ?>" onkeyup="validate_form_onchange('empw_end_date', this.value)">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<span id="errormsg_empw_end_date" style="display:none;" class="text-danger" >Enter End Date</span>
									</div>
								</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_hourly_rate">Hourly rate</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_hourly_rate" id="empw_hourly_rate" placeholder="" value="<?php echo $res->empw_hourly_rate; ?>">
													<span id="errormsg_empw_hourly_rate" style="display:none;" class="text-danger" >Enter Hourly rate</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_weekly_rate">Weekly rate</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_weekly_rate" id="empw_weekly_rate" placeholder="" value="<?php echo $res->empw_weekly_rate; ?>">
													<span id="errormsg_empw_weekly_rate" style="display:none;" class="text-danger" >Enter Weekly rate</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_anual_rate">Annual rate</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_anual_rate" id="empw_anual_rate" placeholder="" value="<?php echo $res->empw_anual_rate; ?>">
													<span id="errormsg_empw_anual_rate" style="display:none;" class="text-danger" >Enter Annual rate</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_bonus">Bonus</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_bonus" id="empw_bonus" placeholder="" value="<?php echo $res->empw_anual_rate; ?>">
													<span id="errormsg_empw_bonus" style="display:none;" class="text-danger" >Enter Bonus</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_commission">Commission</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_commission" id="empw_commission" placeholder="" value="<?php echo $res->empw_commission; ?>">
													<span id="errormsg_empw_commission" style="display:none;" class="text-danger" >Enter Commission</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_hours_per_week">Hours/week</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_hours_per_week" id="empw_hours_per_week" placeholder="" value="<?php echo $res->empw_hours_per_week; ?>">
													<span id="errormsg_empw_hours_per_week" style="display:none;" class="text-danger" >Enter Hours/week</span>
												</div>
											</div>
				          				</div>	
				          				<div class="col-md-6">
				          					<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_position">Position</label>
												<div class="col-sm-8">
													<select class="form-control" name="empw_position" id="empw_position">
														<?php
															if(!empty($position_list))
															{
																foreach ($position_list as $p_list) {
																	?>
																		<option value="<?php echo $p_list->position_id; ?>" <?php if($res->empw_position == $p_list->position_id){ echo "selected"; } ?>> <?php echo $p_list->position_name; ?></option>
																	<?php
																}
															}
														?>
													</select>
													<span id="errormsg_empw_position" style="display:none;" class="text-danger" >Select Position</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_level">Level</label>
												<div class="col-sm-8">
													<select class="form-control" name="empw_level" id="empw_level">
														<?php
															if(!empty($level_list))
															{
																foreach ($level_list as $l_list) {
																	?>
																		<option value="<?php echo $l_list->level_id; ?>" <?php if($res->empw_level == $l_list->level_id){ echo "selected"; } ?>> <?php echo $l_list->level_name; ?></option>
																	<?php
																}
															}
														?>
													</select>
													<span id="errormsg_empw_level" style="display:none;" class="text-danger" >Select Level</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_department">Department</label>
												<div class="col-sm-8">
													<select class="form-control" name="empw_department" id="empw_department">
														<?php
															if(!empty($department_list))
															{
																foreach ($department_list as $d_list) {
																	?>
																		<option value="<?php echo $d_list->department_id; ?>" <?php if($res->empw_department == $d_list->department_id){ echo "selected"; } ?>> <?php echo $d_list->department_name; ?></option>
																	<?php
																}
															}
														?>
													</select>
													<span id="errormsg_empw_department" style="display:none;" class="text-danger" >Select Department</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_state">State</label>
												<div class="col-sm-8">
													<select class="form-control" name="empw_state" id="empw_state">
														<?php
															if(!empty($state_list))
															{
																foreach ($state_list as $s_list) {
																	?>
																		<option value="<?php echo $s_list->state_id; ?>" <?php if($res->empw_state == $s_list->state_id){ echo "selected"; } ?>> <?php echo $s_list->state_name; ?></option>
																	<?php
																}
															}
														?>
													</select>
													<span id="errormsg_empw_state" style="display:none;" class="text-danger" >Select State</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_entitle">Entitle</label>
												<div class="col-sm-8">
													<select class="form-control" name="empw_entitle" id="empw_entitle">
														<?php
															if(!empty($entitle_list))
															{
																foreach ($entitle_list as $e_list) {
																	?>
																		<option value="<?php echo $e_list->entitle_id; ?>" <?php if($res->empw_entitle == $e_list->entitle_id){ echo "selected"; } ?>> <?php echo $e_list->entitle_name; ?></option>
																	<?php
																}
															}
														?>
													</select>
													<span id="errormsg_empw_entitle" style="display:none;" class="text-danger" >Select Entitle</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_emp_type">Employee Type</label>
												<div class="col-sm-8">
													<select class="form-control" name="empw_emp_type" id="empw_emp_type">
														<?php
															if(!empty($employee_type_list))
															{
																foreach ($employee_type_list as $et_list) {
																	?>
																		<option value="<?php echo $et_list->emp_type_id; ?>" <?php if($res->empw_emp_type == $et_list->emp_type_id){ echo "selected"; } ?>> <?php echo $et_list->emp_type_name; ?></option>
																	<?php
																}
															}
														?>
													</select>
													<span id="errormsg_empw_emp_type" style="display:none;" class="text-danger" >Select Employee Type</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_anual_leave_owing">Annual leave</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_anual_leave_owing" id="empw_anual_leave_owing" placeholder="" value="<?php echo $res->empw_anual_leave_owing; ?>">
													<span id="errormsg_empw_anual_leave_owing" style="display:none;" class="text-danger" >Enter Annual leave</span>
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-sm-4" for="empw_personal_leave_owing">Personal leave</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="empw_personal_leave_owing" id="empw_personal_leave_owing" placeholder="" value="<?php echo $res->empw_personal_leave_owing; ?>">
													<span id="errormsg_empw_personal_leave_owing" style="display:none;" class="text-danger" >Enter Personal leave</span>
												</div>
											</div>
				          				</div>	
			          				</div>
			          			</div>
			          		</div>
			          	</div>	
						<div class="col-md-4 col-md-offset-5 butsave">
					        <button type="submit" name="Submit" id="Submit" value="Update"  class="btn btn-info">Update</button>
					        <a href="<?php echo base_url();?>employees/" class="btn btn-danger">Cancel</a>
					    </div>
					<?php
				}
			?>
		</form>
	</div>
	<div class="clearfix">&nbsp;</div>
</div><br/><br/>

<script type="text/javascript">
    $(function () {
       
        $('#emp_dob_i').datetimepicker({
			 format: 'DD-MM-Y'
		});

		$('#emp_visa_expiry_i').datetimepicker({
			 format: 'DD-MM-Y'
		});

		$('#empw_end_date_i').datetimepicker({
			 format: 'DD-MM-Y'
		});

		$('#empw_start_date_i').datetimepicker({
			 format: 'DD-MM-Y'
		});
    });
</script>
<script src="<?php echo base_url(); ?>webroot/js/validation/employees_validation.js"></script>
<form class="form-horizontal" id="employee_add_form" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
														<input type="text" class="form-control" name="emp_fname" id="emp_fname" value="'.$emp_fname.'" placeholder="" >
														<span id="errormsg_emp_fname" style="display:none;" class="text-danger" >Enter First Name</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_lname">Last Name</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="emp_lname" id="emp_lname" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_emp_lname" style="display:none;" class="text-danger" >Enter Last Name</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_email">Email</label>
													<div class="col-sm-8">
														<input type="email" class="form-control" name="emp_email" id="emp_email" placeholder="" value="'.$emp_fname.'">
														<span id="errormsg_emp_email" style="display:none;" class="text-danger" >Enter Email</span>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_address">Address</label>
													<div class="col-sm-8">
														<input type="text" maxlength="256" class="form-control" name="emp_address" id="emp_address" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_emp_address" style="display:none;" class="text-danger" >Enter Address</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_suburb">Suburb</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="emp_suburb" id="emp_suburb" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_emp_suburb" style="display:none;" class="text-danger" >Enter Suburb</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_state_id">State</label>
													<div class="col-sm-8">
														<select class="form-control" name="emp_state_id" id="emp_state_id">
															<option value=""></option>
															<?php
																if(!empty($state_list))
																{
																	foreach ($state_list as $s_list) {
																		?>
																			<option value="<?php echo $s_list->state_id; ?>"> <?php echo $s_list->state_name; ?></option>
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
														<input type="text" pattern="\d*" min="0" maxlength="8" class="form-control" name="emp_postcode" id="emp_postcode" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_emp_postcode" style="display:none;" class="text-danger" >Enter Postcode</span>
													</div>
												</div>
					          				</div>	
					          				<div class="col-md-6">
					          					<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_title">Title</label>
													<div class="col-sm-8">
														<select class="form-control" name="emp_title" id="emp_title" >
															<option value=""></option>
															<option value="Miss">Miss</option>
															<option value="Mr">Mr</option>
															<option value="Mrs">Mrs</option>
															<option value="Ms">Ms</option>
														</select>
														<span id="errormsg_emp_title" style="display:none;" class="text-danger" >Select Title</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_gender">Gender</label>
													<div class="col-sm-8">
														<select class="form-control" name="emp_gender" id="emp_gender">
															<option value=""></option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
														<span id="errormsg_emp_gender" style="display:none;" class="text-danger" >Select Gender</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_phone">Phone</label>
													<div class="col-sm-8">
														<input type="text" pattern="\d*" min="0" maxlength="16" class="form-control" name="emp_phone" id="emp_phone" placeholder="" value="'.$emp_fname.'">
														<span id="errormsg_emp_phone" style="display:none;" class="text-danger" >Enter Phone</span>
													</div>
												</div>
												<div class="form-group row">
					                                <label class="control-label col-sm-4" for="emp_dob">Date of Birth</label>	                                
					                                <div class="col-sm-8">
					                                    <div class='input-group date' id='emp_dob_i'>
															<input type="text" class="form-control" name="emp_dob" id="emp_dob" placeholder="" value="'.$emp_fname.'" >
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
														<select class="form-control" name="emp_nationality" id="emp_nationality" >
															<option value=""></option>
															<?php
																if(!empty($country_list))
																{
																	foreach ($country_list as $p_list) {
																		?>
																			<option value="<?php echo $p_list->country_id; ?>"> <?php echo $p_list->country_name; ?></option>
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
														<input type="text" class="form-control" name="emp_visa_type" id="emp_visa_type" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_emp_visa_type" style="display:none;" class="text-danger" >Enter VISA Type</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_visa_expiry">Visa Expiry</label>
													 <div class="col-sm-8">
													 	 <div class='input-group date' id='emp_visa_expiry_i'>
															<input type="text" class="form-control" name="emp_visa_expiry" id="emp_visa_expiry" placeholder="" value="'.$emp_fname.'">
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
															<input type="text" class="form-control" name="empw_start_date" id="empw_start_date" placeholder="" value="'.$emp_fname.'" >
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
															<input type="text" class="form-control" name="empw_end_date" id="empw_end_date" placeholder="" value="'.$emp_fname.'" >
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
														<input type="text" class="form-control" name="empw_hourly_rate" id="empw_hourly_rate" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_empw_hourly_rate" style="display:none;" class="text-danger" >Enter Hourly rate</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_weekly_rate">Weekly rate</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_weekly_rate" id="empw_weekly_rate" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_empw_weekly_rate" style="display:none;" class="text-danger" >Enter Weekly rate</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_anual_rate">Annual rate</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_anual_rate" id="empw_anual_rate" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_empw_anual_rate" style="display:none;" class="text-danger" >Enter Annual rate</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_bonus">Bonus</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_bonus" id="empw_bonus" placeholder="" value="'.$emp_fname.'">
														<span id="errormsg_empw_bonus" style="display:none;" class="text-danger" >Enter Bonus</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_commission">Commission</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_commission" id="empw_commission" placeholder="" value="'.$emp_fname.'" >
														<span id="errormsg_empw_commission" style="display:none;" class="text-danger" >Enter Commission</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_hours_per_week">Hours/week</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_hours_per_week" id="empw_hours_per_week" placeholder="" value="'.$emp_fname.'">
														<span id="errormsg_empw_hours_per_week" style="display:none;" class="text-danger" >Enter Hours/week</span>
													</div>
												</div>
					          				</div>	
					          				<div class="col-md-6">
					          					<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_position">Position</label>
													<div class="col-sm-8">
														<select class="form-control" name="empw_position" id="empw_position" >
															<?php
																if(!empty($position_list))
																{
																	foreach ($position_list as $p_list) {
																		?>
																			<option value="<?php echo $p_list->position_id; ?>"> <?php echo $p_list->position_name; ?></option>
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
														<select class="form-control" name="empw_level" id="empw_level" >
															<option value=""></option>
															<?php
																if(!empty($level_list))
																{
																	foreach ($level_list as $l_list) {
																		?>
																			<option value="<?php echo $l_list->level_id; ?>"> <?php echo $l_list->level_name; ?></option>
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
														<select class="form-control" name="empw_department" id="empw_department" >
															<option value=""></option>
															<?php
																if(!empty($department_list))
																{
																	foreach ($department_list as $d_list) {
																		?>
																			<option value="<?php echo $d_list->department_id; ?>"> <?php echo $d_list->department_name; ?></option>
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
														<select class="form-control" name="empw_state" id="empw_state" >
															<option value=""></option>
															<?php
																if(!empty($state_list))
																{
																	foreach ($state_list as $s_list) {
																		?>
																			<option value="<?php echo $s_list->state_id; ?>"> <?php echo $s_list->state_name; ?></option>
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
														<select class="form-control" name="empw_entitle" id="empw_entitle" >
															<option value=""></option>
															<?php
																if(!empty($entitle_list))
																{
																	foreach ($entitle_list as $e_list) {
																		?>
																			<option value="<?php echo $e_list->entitle_id; ?>"> <?php echo $e_list->entitle_name; ?></option>
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
														<select class="form-control" name="empw_emp_type" id="empw_emp_type" >
															<?php
																if(!empty($employee_type_list))
																{
																	foreach ($employee_type_list as $et_list) {
																		?>
																			<option value="'.$et_list->emp_type_id.'" '.if($et_list->emp_type_id == $res->empw_emp_type){ .'selected'.}.'>'.$et_list->emp_type_name.'</option>
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
														<input type="text" class="form-control" name="empw_anual_leave_owing" id="empw_anual_leave_owing" placeholder="" value="'.$empw_anual_leave_owing.'" >
														<span id="errormsg_empw_anual_leave_owing" style="display:none;" class="text-danger" >Enter Annual leave</span>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="empw_personal_leave_owing">Personal leave</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="empw_personal_leave_owing" id="empw_personal_leave_owing" placeholder="" value="'.$empw_personal_leave_owing.'" >
														<span id="errormsg_empw_personal_leave_owing" style="display:none;" class="text-danger" >Enter Personal leave</span>
													</div>
												</div>
					          				</div>	
				          				</div>
				          			</div>
				          		</div>
				          	</div>	
							<div class="col-md-4 col-md-offset-5 butsave">
						        <button type="submit" name="Submit" id="Submit_btn" value="Submit" class="btn btn-primary">Submit</button>
						        <button type="reset" id="Clear_btn" class="btn btn-info">Clear</button>
						    </div>
						</form>
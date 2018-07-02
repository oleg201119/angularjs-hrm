<div class="container main">
	<div class="row tablerow">
		<div class="col-md-12">
			<div class="container">
				<div class="col-md-12 tablemargin" style="padding-right: 100px; padding-left: 60px;">
					<div id="msg_div">
						<?php echo $this->session->flashdata('message');?>
					</div>	
					<div class="col-md-12 tabborderone">
						<div id="gridbox" style="width: 100%; height: auto; cursor: default;" class=" gridbox gridbox_material isModern">
						   <div class="" style="width: 100%;height: auto;overflow: hidden;position: relative;">
						     <div class="over_flow">
						      <table cellpadding="0" cellspacing="0" class="hdr" style="width: 100%;/* table-layout: fixed; */margin: 0px auto;">
						         <tbody>
						            <tr style="height: auto;">
						               <th style="height: 0px; width: 260px;"></th>
						               <th style="height: 0px; width: 120px;"></th>
						               <th style="height: 0px; width: 230px;"></th>
						               <th style="height: 0px; width: 160px;"></th>
						               <th style="height: 0px; width: 90px;"></th>
						               <th style="height: 0px; width: 119px;"></th>
						            </tr>
						            <tr>
						              	<th>Name</th>
										<th>Phone</th>
										<th>Email</th>
										<th>State</th>
										<th>Gender</th>
										<th>Action</th>  	
						            </tr>
						            <tr>
						               <th>
											<input type="text" id="emp_fname" name="emp_fname" value="" onkeyup="searchEmployees('emp_fname', this.value)" placeholder="" style="width: 90%;">
										</th>
										<th>
											<input type="number" id="emp_phone" name="emp_phone" value="" onkeyup="searchEmployees('emp_phone', this.value)" placeholder="" style="width: 90%;">
										</th>
										<th>
											<input type="email" id="emp_email" name="emp_email" value="" onkeyup="searchEmployees('emp_email', this.value)" placeholder="" style="width: 90%;">
										</th>
										<th>
											<select id="emp_state_id" name="emp_state_id" value="" onchange="searchEmployees('emp_state_id', this.value)" style="width: 90%;">
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
										</th>
										<th></th>
										<th></th>
						            </tr>
						         </tbody>
						      </table>
						   </div>
						   <div class="objbox" style="width: 100%; overflow: auto;height: 140px;    border: 1px solid #b3dce6;">
						      <table cellpadding="0" cellspacing="0" class="obj row20px" style="width: 100%; /*table-layout: fixed;*/">
						         <tbody id="searchResult">					           
						             <tr style="height: auto;">
						               <th style="height: 0px; width: 260px;"></th>
						               <th style="height: 0px; width: 120px;"></th>
						               <th style="height: 0px; width: 230px;"></th>
						               <th style="height: 0px; width: 160px;"></th>
						               <th style="height: 0px; width: 90px;"></th>
						               <th style="height: 0px; width: 119px;"></th>
						            </tr>
						          	<?php 
										if($employees_result) 
										{
											foreach ($employees_result as $row)
											{ 
												?>
												<input type="hidden" id="emp_name_<?php echo $row->emp_id; ?>" name="emp_name" value="<?php echo $row->emp_fname.' '.$row->emp_lname;?>" />
												<input type="hidden" id="emp_position_<?php echo $row->emp_id; ?>" name="emp_position" value="<?php echo $row->emp_position;?>" />
												<input type="hidden" id="emp_start_date_<?php echo $row->emp_id; ?>" name="emp_start_date" value="<?php echo $row->emp_start_date;?>" />
												<tr> 		
													<td><?php echo $row->emp_fname.' '.$row->emp_lname;?></a></td>
													<td><?php echo $row->emp_phone;?></a></td>
													<td><?php echo $row->emp_email;?></a></td>
													<td><?php echo $row->state_name;?></a></td>
													<td><?php echo $row->emp_gender;?></a></td>
													<td width="10%" class="text-center">
														<a style="cursor: pointer;" onclick="getEmployeeDetails(<?php echo $row->emp_id; ?>)" >Select</a>
													</td>															
												</tr>  
												<?php 
											} 
										}
										else 
										{ 
											?>
											<tr>
												<td colspan="10">No Records Found</td>
											</tr>
											<?php 
										}
									?>
						         </tbody>
						      </table>

						   </div>
						</div>
					</div>
					<form action="" method="post" >
						<div class="col-md-12 tabborderone">
							<div class="col-md-6">
								<div class="row">
									<label class="control-label col-sm-5">Employee Name</label>
									<div class="col-sm-7" id="emp_name_add">
										
									</div>
									<input type="hidden" name="ppaf_employee_id" id="ppaf_employee_id" value="">
								</div>
								<div class="row">
									<label class="control-label col-sm-5">Employee Position</label>
									<div class="col-sm-7" id="emp_position_add">
										
									</div>
								</div>
								<div class="row">
									<label class="control-label col-sm-5">Employee Start Date</label>
									<div class="col-sm-7"  id="emp_start_date_add">
										
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<label class="control-label col-sm-5">Site Location</label>
									<div class="col-sm-7">
										
									</div>
									<input type="hidden" name="ppaf_site_location" id="site_location_h" value="">
								</div>
								<div class="row">
									<label class="control-label col-sm-5">Site Manager Name</label>
									<div class="col-sm-7">
										
									</div>
									<input type="hidden" name="ppaf_site_manager_name" id="site_manager_name_h" value="">
								</div>
								<div class="row">
									<label class="control-label col-sm-5">Site Manager Position</label>
									<div class="col-sm-7">
										
									</div>
									<input type="hidden" name="ppaf_site_manager_position" id="site_manager_position_h" value="">
								</div>
							</div>
						</div>
						<div class="col-md-12 tabborderone">
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>  		
											<th>Criteria</th>
											<th>Poor</th>
											<th>Passable</th>  			
											<th>Average</th>  			
											<th>Good</th>  			
											<th>Excellent</th>  			
										</tr> 
										<tr>  		
											<th class="text-center"></th>
											<th class="text-center">1</th>
											<th class="text-center">2</th>  			
											<th class="text-center">3</th>  			
											<th class="text-center">4</th>  			
											<th class="text-center">5</th>  			
										</tr>  			
									</thead>
									<tbody>								
										<?php
											if(!empty($ppafAdmin_result))
											{
												foreach($ppafAdmin_result as $res)
												{
													?>
													<input type="hidden" name="total_ppaf_a_question" id="total_row" value="<?php echo count($ppafAdmin_result); ?>" >
													<tr class="question">  		
														<td>
															<?php echo $res->ppaf_a_question; ?>
														</td>
														<td class="text-center">
															<input type="radio" name="criteria_<?php echo $res->ppaf_a_id; ?>" id="criteria_<?php echo $res->ppaf_a_id; ?>" value="1" >
														</td>
														<td class="text-center">
															<input type="radio" name="criteria_<?php echo $res->ppaf_a_id; ?>" id="criteria_<?php echo $res->ppaf_a_id; ?>" value="2" >
														</td>
														<td class="text-center">
															<input type="radio" name="criteria_<?php echo $res->ppaf_a_id; ?>" id="criteria_<?php echo $res->ppaf_a_id; ?>" value="3" >
														</td>
														<td class="text-center">
															<input type="radio" name="criteria_<?php echo $res->ppaf_a_id; ?>" id="criteria_<?php echo $res->ppaf_a_id; ?>" value="4" >
														</td>
														<td class="text-center">
															<input type="radio" name="criteria_<?php echo $res->ppaf_a_id; ?>" id="criteria_<?php echo $res->ppaf_a_id; ?>" value="5" >
														</td>
													</tr> 
													<?php
												}
											}
											else
											{
												?>
												<tr>  		
													<td colspan="4" >No records found...</td>
												</tr> 
												<?php
											}
										?> 
									</tbody>
								</table>
</div>
								<div class="row"></div>
								<div class="form-group col-md-12">
									<div class="input text">
										<textarea name="ppaf_further_note" class="form-control" type="text" id="ppaf_further_note" placeholder="Further note"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-sm-9">
										
									</div>
									<label class="control-label col-sm-2">Overall score:</label>
									<label class="control-label col-sm-1" ><span id="overall_criteria"></span>/<span id="total_criteria"></span></label>
									<input type="hidden" name="ppaf_over_all_score" id="overall_criteria_h" value="">
									<input type="hidden" name="ppaf_total_score" id="total_criteria_h" value="">
								</div>
								<div class="col-md-12">
									<label class="col-sm-6 control-label">How does this employee rate to Challenger's standards? </label>
									<div class="col-sm-4">
										<select name="ppaf_rate_statndard" id="ppaf_rate_statndard">
											<option value="">Please select..</option>
											<option value="Manifestly Substandard">Manifestly Substandard</option>
											<option value="Substandard and making unsatisfactory progress">Substandard and making unsatisfactory progress</option>
											<option value="Substandard but making progress">Substandard but making progress</option>
											<option value="Average">Average</option>
											<option value="Above Average">Above Average</option>
											<option value="Outstanding">Outstanding</option>
										</select>
									</div>
								</div>							
								<!-- Pagination end -->
							</div>
						</div>
						<div class="col-md-12 tabborderone">
							<p>I confirm that over the course of this employee's probationary/qualification period, I have have been continually assessing the employee's performance on an informal basis. In my considered opinion, I hereby recommend Challenger undertake the following course of action against the employee named above.</p>
							<label class="col-sm-3 col-md-offset-2 control-label">Employee Recommendation </label>
							<div class="col-sm-4">
								<select name="ppaf_emp_recommendation" id="ppaf_emp_recommendation">
									<option value="">Please select..</option>
									<option value="Employee should be terminated with notice">Employee should be terminated with notice</option>
									<option value="Employee should have their suitability re-assessed in 3 months">Employee should have their suitability re-assessed in 3 months</option>
									<option value="Employee should be offered employment as soon as practicable">Employee should be offered employment as soon as practicable</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 text-center">
							<button type="submit" name="submit" id="submit" value="submit" class="btn btn-info">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function getEmployeeDetails(emp_id)
	{
		var emp_name = $('#emp_name_'+emp_id).val();
		var emp_position = $('#emp_position_'+emp_id).val();
		var emp_start_date = $('#emp_start_date_'+emp_id).val();
		
		$('#ppaf_employee_id').val(emp_id);

		$('#emp_name_add').text(emp_name);
		$('#emp_position_add').text(emp_position);
		$('#emp_start_date_add').text(emp_start_date);
	}

	$('.question input[type="radio"]').click(function() { 
       var currScore = 0;
       var totalScore = 0;
       $('.question input[type="radio"]:checked').each(function(i, val) {
           var value = $(this).val() * 1;
           currScore += value;
           totalScore += 5;
       });
       
       $('#overall_criteria').html(currScore);
       $('#overall_criteria_h').val(currScore);
       $('#total_criteria').html(totalScore);                   
       $('#total_criteria_h').val(totalScore);                   
    });

	/* Searching */
	function searchEmployees(field_name, field_value) 
	{
		var str = 'field_name='+field_name+'&field_value='+field_value;
		var PAGE = '<?php echo base_url(); ?>ppaf/searchFun';
		
		jQuery.ajax({
			type :"POST",
			url  :PAGE,
			data : str,
			success:function(data)
			{			
				if(data != "")
				{
					$('#searchResult').html(data);
				}
				else
				{
					$('#searchResult').html('<tr><td colspan="10">No Records Found</td></tr>');
				}
			} 
		});
	}
</script>
<style>
	.div_block{
		pointer-events:none; 
		color:#808080;
		background-color:rgba(128, 128, 128, 0.06);
		display:inline-block;
	 	width: 100%;
	}
	

#footer {
	   position: static !important;
}

</style>

<div class="container">
	<div class="row tablerow">
		<div class="col-md-12">
			<div class="container main">
				<div class="col-md-12 tablemargin">
					<div id="msg_div">
						<?php echo $this->session->flashdata('message');?>
					</div>	
					<div class="box-header">
						<div class="box-tools pull-left">
							<h3 class="box-title">Course Details</h3>
						</div>
						
					</div>
					<span class="counter pull-right"></span>
<div class="over_flow">
					<table class="table table-hover table-bordered results">
						<thead>
							<tr>  		
								<th>NAME </th>
								<th>DESCRIPTION </th>
								<th>TYPE </th>
								<th>CAT </th> 
								<th>Status</th>
								<th>Action</th>  			
							</tr> 
							<tr>  		
								<th>
									<input type="text" class="form-control" name="course_name" value="" onkeyup="searchCourse('course_name', this.value)" placeholder="">
								</th>
								<th>
									<input type="text" class="form-control" name="course_description" value="" onkeyup="searchCourse('course_description', this.value)" placeholder="">
								</th>
								<th>
									<input type="email" class="form-control" name="course_type" value="" onkeyup="searchCourse('course_type', this.value)" placeholder="">
								</th>
								<th>
									<select class="form-control" name="course_category_id" value="" onchange="searchCourse('course_category_id', this.value)" >
										
                                        <option value=""></option>
                                        <?php
                                            if(!empty($course_categories_list))
                                            {
                                                foreach ($course_categories_list as $course_category_list) {
                                                    if($course_category_list->course_category_id == $course_result->course_category_id){?>
													 	<option value="<?php echo $course_category_list->course_category_id; ?>" selected="selected"> <?php echo $course_category_list->course_category_name; ?></option>
                                                    <? 
													}else{
														?>    
                                                        <option value="<?php echo $course_category_list->course_category_id; ?>"> <?php echo $course_category_list->course_category_name; ?></option>
                                                    <?php
													}
                                                }
                                            }
                                        ?>
                                    </select>
								</th> 
								<th></th>
								<th></th>
							</tr>  	 			
						</thead>
						<tbody id="searchResult">							
						<?php 
							if($course_result) 
							{
								foreach ($course_result as $row)
								{   
									?> 
									<tr> 		
										<td><?php echo substr($row->course_name,0,20);?></a></td>
										<td><?php echo substr($row->course_description,0,20);?></a></td>
										<td><?php echo $row->course_type;?></a></td>
										<td><?php 
												$course_category	= $class_object->trainingdb->Select(array('tablename'=>'course_category','AndCondition'=>array('course_category_id'=>$row->course_category_id)));
												echo $course_category[0]->course_category_name;
											?></a>
                                        </td> 
										<td width="20%" class="text-center">
											<a href="#" id="active_<?php echo $row->course_id;?>" <?php if($row->status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->course_id;?>,'<?php echo base_url();?>training/setStatus','0')">
												<button class="btn btn-sm btn-success">Active</button>
												<button class="btn btn-sm btn-default">Inactive</button>
											</a>
											<a href="#" id="inactive_<?php echo $row->course_id;?>" <?php if($row->status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->course_id;?>,'<?php echo base_url();?>training/setStatus','1')">
												<button class="btn btn-sm btn-default">Active</button>
												<button class="btn btn-sm btn-success">Inactive</button>
											</a>
										</td>
										<td width="10%" class="text-center">
											<?php
											foreach($getAllTabAsPerRole as $role)
											{
												if($this->uri->segment(1) == $role->controller_name && $role->userEdit == '1')
												{
													?>
														<span  style="cursor:pointer" onclick="updateEmployess(<?php echo $row->course_id; ?>)" title="Edit"><i class="fa fa-edit fa-2x "></i></span>&nbsp;&nbsp;
														
															<?php /*?><a href="<?php echo base_url();?>training/index/<?php echo $row->course_id; ?>" title="Edit"><i class="fa fa-edit fa-2x "></i></a><?php */?>&nbsp;&nbsp;
														
													<?php
												}
												if($this->uri->segment(1) == $role->controller_name && $role->userDelete == '1')
												{
													?>
														<a class="confirm" onclick="return delete_employeesDetails(<?php echo $row->course_id;?>);" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>										
													<?php
												}
											}
											?>	
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





					<!--************************ Start Add Form *******************************-->
					<br/>
					<div class="box-tools pull-right">
							<?php
							if(isset($getAllTabAsPerRole) and !empty($getAllTabAsPerRole)){
							
								foreach($getAllTabAsPerRole as $role)
								{
								if($this->uri->segment(1) == $role->controller_name && $role->userAdd == '1')
								{
									?>
										<!--
										<a href="<?php echo base_url();?>employees/employeesAdd" title="User Role"class="btn btn-info btn-sm">Add New</a>
										-->		
										<span id="add_btn" class="btn btn-info btn-sm">Add New</span>
									<?php
								}
							}
							
							}
							?><br/><br/>
						</div><br/><br/><br/>
				  <div id="addEdit" class="div_block">

       <form class="form-horizontal" onsubmit="return checkemployeeForm()" id="employee_add_form" action="<?php echo site_url('training/coursePost');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
							<ul class="nav nav-tabs">
					            <li id="t1"><a data-toggle="tab" href="#tab1">Create a Course</a></li> 
					        </ul>
					        <div class="tab-content">
				          		<div id="tab1" class="tab-pane fade in active">
				          			<div class="col-md-12 tabborder">
				          				<div class="row">
					          				<div class="col-md-8">
					          					<div class="form-group row">
													<label class="control-label col-sm-4" for="course_category_id">Course Category </label>
													<div class="col-sm-4">
														<select class="form-control" name="course_category_id" id="course_category_id" required>
															<option value=""></option>
															<?php
																if(!empty($course_categories_list))
																{
																	foreach ($course_categories_list as $course_category_list) {
																		?>
																			<option value="<?php echo $course_category_list->course_category_id; ?>"> <?php echo $course_category_list->course_category_name; ?></option>
																		<?php
																	}
																}
															?>
														</select>
                                                        
														<span id="errormsg_emp_fname" style="display:none;" class="text-danger" >Enter course</span>
													</div>
                                                    <div class="col-sm-4">
                                                    	<a href="#" class="btn btn-sm btn-link" >create and manage categories</a>
                                                    </div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="course_type">Select course type </label>
													
                                                    <div class="col-md-8 text-left">
                                                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td width="40%">Multiple Choice </td>
                                                            <td width="30%"><input type="radio" name="course_type" value="Multiple Choice" checked="checked"></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="40%">Questions And Answers </td>
                                                            <td width="30%"><input type="radio" name="course_type" value="Questions And Answers" ></td>
                                                          </tr>
                                                        </table> 
                                                    
                                                    </div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-4" for="course_name">Enter course name </label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="course_name" id="course_name" placeholder="" value="" >
														<span id="errormsg_course_name" style="display:none;" class="text-danger" >Enter course_name</span>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="control-label col-sm-4" for="course_description">Enter course description </label>
													<div class="col-sm-8">
														<textarea maxlength="256" class="form-control" name="course_description" id="course_description" placeholder="" value="" ></textarea>
														<span id="errormsg_course_description" style="display:none;" class="text-danger" >Enter course description</span>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="control-label col-sm-4" for="emp_state_id">Active Course</label>
                                                    <div class="col-md-8 text-left">
                                                     <table width="50%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td width="10%">Active </td>
                                                            <td width="10%"><input type="radio" name="status" value="1" checked="checked"></td>
                                                            <td width="10%">Inactive </td>
                                                            <td width="10%"><input type="radio" name="status"  value="0" ></td>
                                                          </tr>
                                                        </table>                                                  
                                                   </div>
												</div>
												
												
					          				</div>						          					
				          				</div>
				          			</div>
				          		</div> 
				          	</div>	
							<div class="col-md-6 col-md-offset-5 butsave">
						        <button type="submit" name="Submit" id="Submit_btn" value="Submit" class="btn btn-primary">SAVE</button>
                                <button type="submit" name="Submit" id="Submit_btn" value="Submit" class="btn btn-primary">ADD COURSE</button>
						        <button type="reset" id="Clear_btn" class="btn btn-info">CANCEL</button>
						    </div>
						</form>
						
					</div>
					<!--************************ END Add Form *********************************-->
					<div style="display: none;" id="editEmpData"></div>


				</div>
			</div>
		</div>
	</div>
</div>
	<script src="<?php echo base_url(); ?>webroot/js/validation/employees_validation.js"></script>
<script>

function show_calander(str){
	  $('#emp_dob'+str).datetimepicker({
			 //format: 'Y-M-D'
			 format: 'DD-MM-Y'
		});
	   $('#emp_visa_expiry'+str).datetimepicker({
			 //format: 'Y-M-D'
			 format: 'DD-MM-Y'
		});
	    $('#empw_start_date'+str).datetimepicker({
			 //format: 'Y-M-D'
			 format: 'DD-MM-Y'
		});
		 $('#empw_end_date'+str).datetimepicker({
			 //format: 'Y-M-D'
			 format: 'DD-MM-Y'
		});
}
	function delete_employeesDetails(emp_id)
	{
		bootbox.confirm("Are you sure you want to delete employees details",function(confirmed){
			if(confirmed)
			{
				location.href="<?php echo base_url();?>employees/delete_employeesDetails/"+emp_id;
			}
		});
	}
	
	//Slider Active/Inactive Status
	function setStatus(ID, PAGE, status) 
	{
		var str = 'id='+ID+'&status='+status;
		jQuery.ajax({
			type :"POST",
			url  :PAGE,
			data : str,
			success:function(data)
			{			
				if(data==1)
				{
					var a_spanid = 'active_'+ID ;
					var d_spanid = 'inactive_'+ID ;
					if(status !="1")
					{
						$("#"+a_spanid).hide();
						$("#"+d_spanid).show();						
						jQuery("#msg_div").html();				
					}
					else
					{			
						$("#"+d_spanid).hide();
						$("#"+a_spanid).show();				
						jQuery("#msg_div").html();					
					}
				}
			} 
		});
	}

	/* Searching */
	function searchCourse(field_name, field_value) 
	{
		var str = 'field_name='+field_name+'&field_value='+field_value;
		var PAGE = '<?php echo base_url(); ?>training/searchFun';
		
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
	$('#add_btn').on('click', function(){
		$('#addEdit').removeClass();
		$('#t1').addClass('active');
		$("#editEmpData").hide();
		$("#addEdit").show();
	});

	function updateEmployess(emp_id)
	{		
		var str = 'emp_id='+emp_id;
		var PAGE = '<?php echo base_url(); ?>employees/updateEmployess';
		
		jQuery.ajax({
			type :"POST",
			url  :PAGE,
			data : str,
			success:function(data)
			{	
				if(data)
				{
					$("#addEdit").hide();
					$('#t1').addClass('active');
					$('#editEmpData').show();					
					$('#editEmpData').html(data);
					//$('#searchResult').html(data);
				}
			} 
		});
	}
</script>

<script type="text/javascript">
    $(function () {
       
        $('#emp_dob_ii').datetimepicker({
			 //format: 'Y-M-D'
			 format: 'DD-MM-Y'
		});
         $('#emp_dob_i').datetimepicker({
			 //format: 'Y-M-D'
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

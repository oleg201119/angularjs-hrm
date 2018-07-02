
<div class="container">
	<div class="row tablerow">
		<div class="col-md-12">
			<div class="container">
				<div class="col-md-12 tablemargin" style="padding-right: 100px; padding-left: 60px;">
					<div id="msg_div">
						<?php echo $this->session->flashdata('message');?>
					</div>	
					<div class="box-header">
						<div class="box-tools pull-left">
							<h3 class="box-title">Employer Details</h3>
						</div>
						<div class="box-tools pull-right">
							<?php
							foreach($getAllTabAsPerRole as $role)
							{
								if($this->uri->segment(1) == $role->controller_name && $role->userAdd == '1')
								{
									?>
										<a href="<?php echo base_url();?>employerAdd" title="User Role"class="btn btn-info btn-sm">Add New</a>									
									<?php
								}
							}
							?><br/><br/>
						</div>
					</div>
					<span class="counter pull-right"></span>
					<table class="table table-hover table-bordered results">
						<thead>
							<tr>  		
								<th>Name</th>
								<th>Email</th>
								<th>Address</th>
								<th>Phone Number</th>
								<th>Role</th>
								<th>Status</th>
								<th>Action</th>  			
							</tr> 
							<tr>  		
								<th>
									<input type="text" class="form-control" id="employer_name" name="employer_name" value="" onkeyup="searchEmployer('employer_name', this.value)" placeholder="">
								</th>
								<th>
									<input type="email" class="form-control" id="employer_email" name="employer_email" value="" onkeyup="searchEmployer('employer_email', this.value)" placeholder="">
								</th>
								<th></th>
								<th>
									<input type="text" class="form-control" id="employer_phone_no" name="employer_phone_no" value="" onkeyup="searchEmployer('employer_phone_no', this.value)" placeholder="">
								</th>
								<th>
									<input type="text" class="form-control" id="role_name" name="role_name" value="" onkeyup="searchEmployer('role_name', this.value)" placeholder="">
								</th>
								<th></th>
								<th></th>  			
							</tr>  			
						</thead>
						<tbody id="searchResult">						
						<?php 
							if($employer_result) 
							{
								foreach ($employer_result as $row)
								{ 
									?>
									<tr> 		
										<td><?php echo $row->employer_name;?></a></td>
										<td><?php echo $row->employer_email;?></a></td>
										<td><?php echo $row->employer_address;?></a></td>
										<td><?php echo $row->employer_phone_no;?></a></td>
										<td><?php echo $row->role_name;?></a></td>
										<td width="20%" class="text-center">
											<a href="#" id="active_<?php echo $row->employer_id;?>" <?php if($row->employer_active_status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->employer_id;?>,'<?php echo base_url();?>setStatus','0')">
												<button class="btn btn-sm btn-success">Active</button>
												<button class="btn btn-sm btn-default">Inactive</button>
											</a>
											<a href="#" id="inactive_<?php echo $row->employer_id;?>" <?php if($row->employer_active_status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->employer_id;?>,'<?php echo base_url();?>setStatus','1')">
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
														<a href="<?php echo base_url();?>employerAdd/<?php echo $row->employer_id; ?>" title="Edit"><i class="fa fa-edit fa-2x "></i></a>&nbsp;&nbsp;
													<?php
												}
												if($this->uri->segment(1) == $role->controller_name && $role->userDelete == '1')
												{
													?>
														<a class="confirm" onclick="return delete_employerDetails(<?php echo $row->employer_id;?>);" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>										
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
			</div>
		</div>
	</div>
</div>

<script>
	function delete_employerDetails(employer_id)
	{
		bootbox.confirm("Are you sure you want to delete employer details",function(confirmed){
			if(confirmed)
			{
				location.href="<?php echo base_url();?>delete_employerDetails/"+employer_id;
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
	function searchEmployer(field_name, field_value) 
	{
		var str = 'field_name='+field_name+'&field_value='+field_value;
		var PAGE = '<?php echo base_url(); ?>searchFun';
		
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
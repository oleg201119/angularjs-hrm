<style>
	.div_block{
	pointer-events:none; 
	color:#808080;
	background-color:rgba(128, 128, 128, 0.06);
	display:inline-block;
	width: 100%;
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
							<h3 class="box-title">Role Details</h3>
						</div>
						
					</div>
					<span class="counter pull-right"></span>
					<div style="width: 100%;
    overflow: auto;
    height: 270px;
    border: 1px solid #b3dce6;">
<table class="table table-hover table-bordered results">
						<thead>
							<tr>  		
								<th>Role Name</th>
								<th>Status</th>
								<th>Action</th>  			
							</tr>  
							<tr>  		
								<th>
									<input type="text" class="form-control" id="role_name" name="role_name" value="" onkeyup="searchRole('role_name', this.value)" placeholder="">
								</th>
								<th></th>
								<th></th>
							</tr>  			
						</thead>

						<tbody id="searchResult">								
						<?php 
							if($role_result) 
							{
								foreach ($role_result as $row)
								{
									$role_t = explode(',', $row->role_type);
									if(in_array('Employer', $role_t))
									{
										?>
										<tr> 		
											<td><?php echo $row->role_name;?></a></td>
											<td width="20%" class="text-center">
												<a href="#" id="active_<?php echo $row->role_id;?>" <?php if($row->role_active_status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->role_id;?>,'<?php echo base_url();?>role/setStatus','0')">
													<button class="btn btn-sm btn-success">Active</button>
													<button class="btn btn-sm btn-default">Inactive</button>
												</a>
												<a href="#" id="inactive_<?php echo $row->role_id;?>" <?php if($row->role_active_status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->role_id;?>,'<?php echo base_url();?>role/setStatus','1')">
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
															<span style="cursor:pointer" onclick="updateRole(<?php echo $row->role_id; ?>)" title="Edit"><i class="fa fa-edit fa-2x "></i></span>&nbsp;&nbsp;				
														<?php
													}
													if($this->uri->segment(1) == $role->controller_name && $role->userDelete == '1')
													{
														?>
															<a class="confirm" onclick="return delete_roleDetails(<?php echo $row->role_id;?>);" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>										
														<?php
													}
												}
												?>												
											</td>															
										</tr>  
										<?php 												
									}
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
						foreach($getAllTabAsPerRole as $role)
						{
							if($this->uri->segment(1) == $role->controller_name && $role->userAdd == '1')
							{
								?>
									<span id="addNew" title="User Role"class="btn btn-info btn-sm">Add New</span>
								<?php
							}
						}
						?><br/><br/>
					</div>
					<br/><br/>
					<div id="addEdit">
						<div id="addEdit1" class="col-md-12 tabborderone div_block">
							<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="box-body">
									<div class="row col-md-12">
										<div class="form-group col-md-6">
											<div class="input text">
												<label>Role Name<span class="text-danger">*</span></label>
												<input name="a_role_name" class="form-control" type="text" id="role_name" value="<?php echo set_value('a_role_name'); ?>" />
												<?php echo form_error('a_role_name','<span class="text-danger">','</span>'); ?>
											</div>
										</div><br/><br/>
									</div>	
									<div class="row col-md-12">
										<div class="table-responsive">
											<div class="box-header">
												<label>Permission</label> 
											</div><!-- form start -->
											<table class="table table-bordered table-striped">
												<thead>
													<tr>  		
														<th>Tab Name</th>
														<th>View</th>
														<th>Add</th>  			
														<th>Edit</th>  			
														<th>Delete</th>  			
													</tr>  			
												</thead>
												<tbody>								
													<?php
														if(!empty($tab_list))
														{
															foreach($tab_list as $res)
															{
																?>
																<tr>  		
																	<td>
																		<?php echo $res->tabname; ?>
																	</td>
																	<td><input type="checkbox" name="a_view_<?php echo $res->tab_id; ?>" id="a_view_<?php echo $res->tab_id; ?>" value="1" ></td>
																	<td><input type="checkbox" name="a_add_<?php echo $res->tab_id; ?>" id="a_add_<?php echo $res->tab_id; ?>" value="1" ></td>
																	<td><input type="checkbox" name="a_edit_<?php echo $res->tab_id; ?>" id="a_edit_<?php echo $res->tab_id; ?>" value="1" ></td>
																	<td><input type="checkbox" name="a_delete_<?php echo $res->tab_id; ?>" id="a_delete_<?php echo $res->tab_id; ?>" value="1" ></td>
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
											<div class="row"></div>
											<!-- Pagination end -->
										</div>
									</div>
								</div><!-- /.box-body -->								
								<div class="box-footer">
									<button class="btn btn-success btn-sm" data-toggle="model" type="submit" name="Submit" value="Submit" >Submit</button>
									<!--
									<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>role">Cancel</a>
									-->
								</div>
							</form>
						</div>
					</div>
					<!--************************ END Add Form *********************************-->
					<div style="display: none;" id="editEmpData"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('#addNew').on('click', function(){
	$('#addEdit1').removeClass('div_block');
	$('#editEmpData').hide();
	$('#addEdit').show();
});
function updateRole(role_id)
	{		
		var str = 'role_id='+role_id;
		var PAGE = '<?php echo base_url(); ?>role/updateRole';
		
		jQuery.ajax({
			type :"POST",
			url  :PAGE,
			data : str,
			success:function(data)
			{	
				
				if(data)
				{
					$('#addEdit').hide();
					$('#editEmpData').show();					
					$('#editEmpData').html(data);
					//$('#searchResult').html(data);
				}
			} 
		});
	}
	function delete_roleDetails(role_id)
	{
		bootbox.confirm("Are you sure you want to delete role details",function(confirmed){
			if(confirmed)
			{
				location.href="<?php echo base_url();?>role/delete_roleDetails/"+role_id;
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
	function searchRole(field_name, field_value) 
	{
		var str = 'field_name='+field_name+'&field_value='+field_value;
		var PAGE = 'role/searchFun';
		
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
<div class="container main">
	<div class="row tablerow">
		<div class="col-md-12">
			<div class="container">
				<div class="col-md-12 tablemargin" style="padding-right: 100px; padding-left: 60px;">
					<div id="msg_div">
						<?php echo $this->session->flashdata('message');?>
					</div>	
					<div class="box-header">
						<div class="box-tools pull-left">
							<h3 class="box-title">PPAF Admin Details</h3>
						</div>
						<div class="box-tools pull-right">
							<?php
							foreach($getAllTabAsPerRole as $role)
							{
								if($this->uri->segment(1) == $role->controller_name && $role->userAdd == '1')
								{
									?>
										<a href="<?php echo base_url();?>ppafAdmin/ppafAdminAdd" title="User department"class="btn btn-info btn-sm">Add New</a>					
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
								<th>Page</th>
								<th>Question</th>
								<th>Order</th>
								<th>Active</th>
								<th>Action</th>  			
							</tr>  
							<tr>  		
								<th>
									<input type="text" class="form-control" id="ppaf_a_page" name="ppaf_a_page" value="" onkeyup="searchPpafAdmin('ppaf_a_page', this.value)" placeholder="">
								</th>
								<th>
									<input type="text" class="form-control" id="ppaf_a_question" name="ppaf_a_question" value="" onkeyup="searchPpafAdmin('ppaf_a_question', this.value)" placeholder="">
								</th>
								<th>
									<input type="text" class="form-control" id="ppaf_a_order" name="ppaf_a_order" value="" onkeyup="searchPpafAdmin('ppaf_a_order', this.value)" placeholder="">
								</th>
								<th>
									<select class="form-control" id="ppaf_a_active_status" name="ppaf_a_active_status" value="" onchange="searchPpafAdmin('ppaf_a_active_status', this.value)" >
										<option value=""></option>>
										<option value="1">Yes</option>>
										<option value="0">No</option>>
									</select>
								</th>
								<th></th>  			
							</tr>  
						</thead>
						<tbody id="searchResult">								
						<?php 
							if($ppafAdmin_result) 
							{
								foreach ($ppafAdmin_result as $row)
								{ 
									?>
									<tr> 		
										<td><?php echo $row->ppaf_a_page;?></a></td>
										<td><?php echo $row->ppaf_a_question;?></a></td>
										<td><?php echo $row->ppaf_a_order;?></a></td>
										<td width="20%" class="text-center">
											<a href="#" id="active_<?php echo $row->ppaf_a_id;?>" <?php if($row->ppaf_a_active_status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->ppaf_a_id;?>,'<?php echo base_url();?>ppafAdmin/setStatus','0')">
												<button class="btn btn-sm btn-success">Active</button>
												<button class="btn btn-sm btn-default">Inactive</button>
											</a>
											<a href="#" id="inactive_<?php echo $row->ppaf_a_id;?>" <?php if($row->ppaf_a_active_status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->ppaf_a_id;?>,'<?php echo base_url();?>ppafAdmin/setStatus','1')">
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
														<a href="<?php echo base_url();?>ppafAdmin/ppafAdminAdd/<?php echo $row->ppaf_a_id; ?>" title="Edit"><i class="fa fa-edit fa-2x "></i></a>&nbsp;&nbsp;				
													<?php
												}
												if($this->uri->segment(1) == $role->controller_name && $role->userDelete == '1')
												{
													?>
														<a class="confirm" onclick="return delete_ppafAdminDetails(<?php echo $row->ppaf_a_id;?>);" href="" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>										
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
	function delete_ppafAdminDetails(ppaf_a_id)
	{
		bootbox.confirm("Are you sure you want to delete department details",function(confirmed){
			if(confirmed)
			{
				location.href="<?php echo base_url();?>ppafAdmin/delete_ppafAdminDetails/"+ppaf_a_id;
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
	function searchPpafAdmin(field_name, field_value) 
	{
		var str = 'field_name='+field_name+'&field_value='+field_value;
		var PAGE = '<?php echo base_url(); ?>ppafAdmin/searchFun';
		
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
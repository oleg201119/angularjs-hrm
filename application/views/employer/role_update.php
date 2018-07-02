
<!-- end of top-nav -->
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<br/>
		<div class="box-header">
			<div class="box-tools pull-left">
				<h3 class="box-title">Update Role</h3>  
			</div>
			<div class="box-tools pull-right">
				<a href="<?php echo base_url();?>role" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
		<div class="col-md-12 tabborderone">
			<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php
					if(!empty($editRole))
					{
						foreach($editRole as $res)
						{
							?>
								<div class="box-body">
									<div class="row col-md-12">
										<div class="form-group col-md-6">
											<div class="input text">
												<label>Name<span class="text-danger">*</span></label>
												<input name="role_name" class="form-control" type="text" id="role_name" value="<?php echo $res->role_name; ?>" />
												<?php echo form_error('role_name','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
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
														if(!empty($role_permissions))
														{
															foreach($role_permissions as $res)
															{
																foreach($tab_list as $t_list)
																{
																	if($t_list->tab_id == $res->tab_id)
																	{
																		?>
																		<tr>  		
																			<td>
																				<?php echo $res->tabname; ?>
																				<input type="hidden" name="user_permission_id_<?php echo $res->tab_id; ?>" id="user_permission_id_<?php echo $res->tab_id; ?>" value="<?php echo $res->user_permission_id; ?>" >
																			</td>
																			<td><input type="checkbox" name="view_<?php echo $res->tab_id; ?>" id="view_<?php echo $res->tab_id; ?>" <?php if($res->userView == '1'){ echo 'checked'; } ?> value="1" ></td>
																			<td><input type="checkbox" name="add_<?php echo $res->tab_id; ?>" id="add_<?php echo $res->tab_id; ?>" <?php if($res->userAdd == '1'){ echo 'checked'; } ?> value="1" ></td>
																			<td><input type="checkbox" name="edit_<?php echo $res->tab_id; ?>" id="edit_<?php echo $res->tab_id; ?>" <?php if($res->userEdit == '1'){ echo 'checked'; } ?> value="1" ></td>
																			<td><input type="checkbox" name="delete_<?php echo $res->tab_id; ?>" id="delete_<?php echo $res->tab_id; ?>" <?php if($res->userDelete == '1'){ echo 'checked'; } ?> value="1" ></td>
																		</tr> 
																		<?php
																	}
																}																			
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
										</div><!-- /.box-body -->	
									</div><!-- /.box-body -->	
								</div><!-- /.box-body -->								
								<div class="box-footer">
									<button class="btn btn-success btn-sm" data-toggle="model" type="submit" name="Submit" value="Update" >Update</button>
									<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>role">Cancel</a>
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
</div>

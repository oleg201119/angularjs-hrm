<!-- end of top-nav -->
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<br/>
		<div class="box-header">
			<div class="box-tools pull-left">
				<h3 class="box-title">Add New Role</h3>  
			</div>
			<div class="box-tools pull-right">
				<a href="<?php echo base_url();?>role" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
		<div class="col-md-12 tabborderone">
			<form class="form-horizontal" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row col-md-12">
						<div class="form-group col-md-6">
							<div class="input text">
								<label>Role Name<span class="text-danger">*</span></label>
								<input name="role_name" class="form-control" type="text" id="role_name" value="<?php echo set_value('role_name'); ?>" />
								<?php echo form_error('role_name','<span class="text-danger">','</span>'); ?>
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
													<td><input type="checkbox" name="view_<?php echo $res->tab_id; ?>" id="view_<?php echo $res->tab_id; ?>" value="1" ></td>
													<td><input type="checkbox" name="add_<?php echo $res->tab_id; ?>" id="add_<?php echo $res->tab_id; ?>" value="1" ></td>
													<td><input type="checkbox" name="edit_<?php echo $res->tab_id; ?>" id="edit_<?php echo $res->tab_id; ?>" value="1" ></td>
													<td><input type="checkbox" name="delete_<?php echo $res->tab_id; ?>" id="delete_<?php echo $res->tab_id; ?>" value="1" ></td>
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
					<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>role">Cancel</a>
				</div>
			</form>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
</div>
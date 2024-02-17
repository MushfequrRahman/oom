<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">OUT OF OFFICE MANAGEMENT(version-2)</li>
           										 
                                                 
                                                 <!--ADMIN-->
			
			
			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '1') { ?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Department Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Designation</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
							</ul>
						</li>
                        
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Status</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Line Manager</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/line_manager_insert_form"><i class="fa fa-circle-o"></i>Add Line Manager</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/linemanager_list"><i class="fa fa-circle-o"></i>Line Manager List</a></li>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Department Head</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/depthhead_user_insert_form"><i class="fa fa-circle-o"></i>Add Department Head</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/depthhead_list"><i class="fa fa-circle-o"></i>Department Head List</a></li>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Accounts</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/accounts_user_insert_form"><i class="fa fa-circle-o"></i>Add Accountants</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/accounts_list"><i class="fa fa-circle-o"></i>Accounts User List</a></li>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Accounts Head</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/accountshead_user_insert_form"><i class="fa fa-circle-o"></i>Add Accountants Head</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/accountshead_list"><i class="fa fa-circle-o"></i>Accounts Head List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Transit Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/transittype_insert_form"><i class="fa fa-circle-o"></i> Add Transit Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/transittype_list"><i class="fa fa-circle-o"></i>Transit Type List</a></li>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Transit mode</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/transitmode_insert_form"><i class="fa fa-circle-o"></i> Add Transit Mode</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/transitmode_list"><i class="fa fa-circle-o"></i>Transit mode List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Employee Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/user_list"><i class="fa fa-circle-o"></i>User List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
							
                                <li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form1"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/approval_pending_list"><i class="fa fa-circle-o"></i>Pending List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_details_list_form"><i class="fa fa-circle-o"></i>Date Wise Details List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Acc. Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Acc. Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/approval_pending_list"><i class="fa fa-circle-o"></i>Pending List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_details_list_form"><i class="fa fa-circle-o"></i>Date Wise Details List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/unit_wise_summary_list_form"><i class="fa fa-circle-o"></i>Unit Wise List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/bill_type_wise_summary_list_form"><i class="fa fa-circle-o"></i>Bill Type Wise List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				
				
			<?php
			} ?>

			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '2') { ?>
            
            												<!--USER-->
				
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form1"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
                               
							</ul>
						</li>
					</ul>
				</li>
				
				
			<?php
			} ?>
            
            													<!--LINE MANAGER-->
            
            <?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '3') { ?>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form1"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/approval_pending_list"><i class="fa fa-circle-o"></i>Pending List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/user_wise_approval_list_form"><i class="fa fa-circle-o"></i>User Wise List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				
				
			<?php
			} ?>
            
            
            
            <?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '4') { ?>
            
            											<!--DEPARTMENT HEAD-->
                            
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form1"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/approval_pending_list"><i class="fa fa-circle-o"></i>Pending List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
                                <?php /*?><li><a href="<?php echo base_url(); ?>Dashboard/user_wise_approval_list_form"><i class="fa fa-circle-o"></i>User Wise List</a></li><?php */?>
							</ul>
						</li>
					</ul>
				</li>
				
				
			<?php
			} ?>
            
            
            
             <?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '5') { ?>
            
            												<!--ACCOUNTS-->
                            
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form1"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Acc. Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Acc. Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/approval_pending_list"><i class="fa fa-circle-o"></i>Pending List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_details_list_form"><i class="fa fa-circle-o"></i>Date Wise Details List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				
				
			<?php
			} ?>
            
            <?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '6') { ?>
            
            												<!--ACCOUNTS-->
                            
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form1"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Acc. Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Acc. Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/approval_pending_list"><i class="fa fa-circle-o"></i>Pending List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_details_list_form"><i class="fa fa-circle-o"></i>Date Wise Details List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				
				
			<?php
			} ?>
            
             <?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '7') { ?>
            
            												<!--COMMON ACCOUNTS-->
                            
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Movement</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Movement</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_insert_form1"><i class="fa fa-circle-o"></i>Add Movement Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/movement_list"><i class="fa fa-circle-o"></i>Movement List</a></li>
							</ul>
						</li>
					</ul>
				</li>
                <li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Acc. Approval</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Acc. Approval</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/approval_pending_list"><i class="fa fa-circle-o"></i>Pending List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_list_form"><i class="fa fa-circle-o"></i>Date Wise List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/date_wise_approval_details_list_form"><i class="fa fa-circle-o"></i>Date Wise Details List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/unit_wise_summary_list_form"><i class="fa fa-circle-o"></i>Unit Wise List</a></li>
                                <li><a href="<?php echo base_url(); ?>Dashboard/bill_type_wise_summary_list_form"><i class="fa fa-circle-o"></i>Bill Type Wise List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				
				
			<?php
			} ?>




			<?php //endif;
			?>
		</ul>
	</section>
</aside>
<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled" style="background-color: rgb(20,21,98);">
							    <li><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i> DashBoard </a></li>
							</ul>



<ul class="widget widget-menu unstyled">
							    <li><a href="notify_all.php"><i class="menu-icon icon-bullhorn"></i> Post Notification </a></li>
							</ul>
							    <ul class="widget widget-menu unstyled">
                            
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Manage Projects
								</a>
								<ul id="togglePages" class="collapse unstyled">
				
									<li>
										<a href="completed-project.php">
											<i class="icon-inbox"></i>
											Awaiting Projects Upload 
	     <?php 
  $status="published";                   
$rt = mysqli_query($con,"SELECT * FROM students where NewStatus ='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
									 <li>
										<a href="Project-details.php">
											<i class="menu-icon icon-book unstyled"></i>
	     <?php 
 // $status="Completed";                   
$rt = mysqli_query($con,"SELECT * FROM tblproject where projectType = 'proposal' and Mstatus='Approved'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
											Compare Topics


										</a>
									</li> 
									<li>
										<a href="published.php">
											<i class="menu-icon icon-file"></i>
											Publish Project
	     <?php 
  $status="UPLOADED";                   
$rt = mysqli_query($con,"SELECT * FROM students where NewStatus ='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>


										</a>
									</li>
									
								</ul>
							</li>
						</ul>
					
						<ul class="widget widget-menu unstyled">
							
							<li>
	     <?php 
  $status="Completed";                   
$rt = mysqli_query($con,"SELECT * FROM Students");
$num1 = mysqli_num_rows($rt);
{?>							<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Manage Students
									<b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
	
								</a>
	
<?php } ?>
	
							</li>
							<li>

								     <?php 
  $status="Completed";                   
$rt = mysqli_query($con,"SELECT * FROM tblsupervisor");
$num1 = mysqli_num_rows($rt);
{?>	
								<a href="manage-supervisors.php">
									<i class="menu-icon icon-user"></i>
									Manage Supervisors
									<b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
	
								</a>
								<?php } ?>
							</li>
						</ul>

<ul class="widget widget-menu unstyled">

							<li>
								<a href="sugg.php">
									<i class="menu-icon icon-briefcase"></i>
									Suggested Topic Approval
								</a>
							</li>	
						
							<li>
								<a href="grade.php">
									<i class="menu-icon icon-laptop"></i>
									Project Grading
								</a>
							</li>	
						</ul>

						

	<ul class="widget widget-menu unstyled">
                                <li><a href="category.php"><i class="menu-icon icon-book"></i>Add Project Category </a></li>
                                <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Add Project Sub-Field </a></li>
                               
                        
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">

							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>	
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->

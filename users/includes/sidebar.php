<aside>
          <div id="sidebar"  class="nav-collapse " style="background-color: rgb(84, 87, 83);">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <?php $query=mysqli_query($con,"select * from students where RegNo='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>
      <p class="centered mt" >         	
<?php if($row['StudentImage']==null){ ?>
                <img src="ppic/noimage.png"  height="50px" class="img-thumbnail" width="70%">
                <?php } else {?>
   <img src="<?php echo htmlentities($row['StudentImage']);?>"  height="50px" class="img-thumbnail" width="70%"> 
   <?php } ?>
                 </p>
                 <p class="centered mt text-primary">
              	  <?php echo htmlentities($row['RegNo']);?><br><br>
                   <?php echo htmlentities($row['fullName']);?>
                  <?php } ?>
                  </p>
              	  	
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-cog"></i>
                          <span >Dashboard</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Account Setting</span>
                      </a>
                    
                      <ul class="sub">
                      <a href="profile.php" >
                          <i class="fa fa-user"></i>
                          <span class="text-primary">Profile</span>
                      </a>
                   </ul>
                    <ul class="sub">
                      <a href="change-password.php" >
                          <i class="fa fa-key"></i>
                          <span class="text-primary">Change Password</span>
                      </a>
                   </ul>
                
                  </li>
        
                            <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-send"></i>
                          <span>FeedBack</span>
                      </a>
                    
                      <ul class="sub">
                      <a href="feedback.php" >
                          <i class="fa fa-inbox"></i>
                          <span class="text-primary">InBox</span>
                      </a>
                   </ul>
                    <ul class="sub">
                      <a href="compose.php" >
                          <i class="fa fa-pencil"></i>
                          <span class="text-primary">Compose</span>
                      </a>
                   </ul>
                      <ul class="sub">
                      <a href="Sent.php" >
                          <i class="fa fa-bars"></i>
                          <span class="text-primary">Sent History</span>
                      </a>
                   </ul>
                
                  </li>              
                  
                 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-archive"></i>
                          <span>Project Box</span>
                      </a>
                                  
                    <ul class="sub">
                      <a href="selectSupervisor.php" >
                          <i class="fa fa-user"></i>
                          <span class="text-primary">Supervisor Generator</span>
                      </a>
                   </ul>
                    <ul class="sub">
                      <a href="submit.php" >
                          <i class="fa fa-book"></i>
                          <span class="text-primary">Submit Project Proposal</span>
                      </a>
                   </ul>
                   <ul class="sub">
                      <a href="uploadChapters.php" >
                          <i class="fa fa-file"></i>
                          <span class="text-primary">Upload Documents</span>
                      </a>
                   
                 </ul>
                   


                  </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
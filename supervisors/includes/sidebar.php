<aside >
          <div id="sidebar"  class="nav-collapse" style="background-color: rgb(84, 87, 83); border:dotted; border-radius: 10px">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion" ">
              
                  <p class="centered"><a href="profile.html"></a></p>
                   <?php $query=mysqli_query($con,"select fullName from tblsupervisor where username='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                  <h5 class="centered"><?php echo htmlentities($row['fullName']);?></h5>
                  <?php } ?>
                    
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                <li class="sub-menu">
                      <a href="profile.php" >
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                      </a>
                  </li><!-- 
                   <li class="sub-menu">
                      <a href="#" >
                          <i class="fa fa-info"></i>
                          <span>information</span>
                      </a>
                  </li> -->


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
                      <a href="Notification.php" >
                          <i class="fa fa-edit"></i>
                          <span class="text-primary">Compose</span>
                      </a>
                   </ul>
                   <ul class="sub">
                      <a href="history.php" >
                          <i class="fa fa-list"></i>
                          <span class="text-primary">Sent History</span>
                      </a>
                   </ul>
                
                  </li>
        

                  
                <li class="sub-menu">
                      <a href="manageproposal.php" >
                          <i class="fa fa-file-text-o"></i>
                          <span>Project Proposals</span>
                      </a>
                    </li>
                

                  
                  <li class="sub-menu">
                      <a href="manageproject.php" >
                          <i class="fa fa-file-text"></i>
                          <span>Manage Documentations</span>
                      </a>
                    </li>
                 
                   <li class="sub-menu">
                      <a href="Publish.php" >
                          <i class="fa fa-file-text-o"></i>
                          <span>Publish Project </span>
                      </a>
                    </li>
                 
                <!--   <li class="sub-menu">
                      <a href="addStudent.php" >
                          <i class="fa fa-users"></i>
                          <span>Assigned Student</span>
                      </a>
                      
                  </li> -->
                    <li class="sub-menu">
                      <a href="Suggest.php" >
                          <i class="fa fa-question-circle"></i>
                          <span>Suggest Topic</span>
                      </a>
                      
                  </li>
              <li class="sub-menu">
                      <a href="egrader.php" >
                          <i class="fa fa-eye"></i>
                          <span>Grading</span>
                      </a>
                      
                  </li> 
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

 <header class="header black-bg" style="background-color: rgb(45, 61, 60); border-color: white;">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="dashboard.php" class="logo "><b><marquee>OSPMS buk</marquee></b></a>
                
            <div class="top-menu">
            	<ul class="nav pull-right top-menu" >
                    <li><a class="logout fa fa-bullhorn btn btn-lg" data-toggle="modal" href="#myAuth" style="background-color: blue; color: black;">Announcement</a></li>
            	
                    <li><a class="logout fa fa-sign-out" href="logout.php">Logout</a></li>
              </ul>
            </div>
        </header>


              <!-- Modal -->
             
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myAuth" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                            
                              <h4 class="modal-title text-center">From Project Coordinator.</h4>
                          </div>
                          <div class="modal-body ">
                              <p class="text-center">From Project Coordinator.</p>

<?php
$sql=mysqli_query($con,"SELECT * FROM `notify` WHERE category = 'allStudents' order by id asc");

while($row=mysqli_fetch_array($sql))
{
?>

 <div style="padding: 10px;">
       <!--  <h4><i class="fa fa-send"> <strong>:</strong> </i> <?php echo $row['sender'];?> </h4>
      -->  <h3> <i class="fa fa-inbox"> :: </i> <?php echo $row['Message'];?></h3> <br>
        <p class="pull-left text-primary"><i class=""></i>  <strong></strong>  <?php echo $row['PostDate'];?> </p>
        
        </div>
        <hr>
          

           <?php 
   
}?>

          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->
              
              <!-- Modal -->
             
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myProject" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                            
                              <h4 class="modal-title text-center">From Project Coordinator.</h4>
                          </div>
                          <div class="modal-body ">
                              <p class="text-center">Suggested Topics</p>

<?php
$sql=mysqli_query($con,"SELECT * FROM `tblsuggest` WHERE publish = 'Approved' order by id asc");

while($row=mysqli_fetch_array($sql))
{
?>

 <div  class="text-center" style="padding: 10px; background-color: rgb(193, 214, 200); border-radius: 10px;">
       <h3> <i >Title  </i> <br><?php echo $row['topic'];?></h3> 
       <h3> <i>Case Study  </i> <br><?php echo strtoupper( $row['caseStudy']);?></h3>
       <h3> <i>Category <span class="fa fa-briefcase"></span> </i> <?php echo $row['radio'];?></h3>

        
        
        </div>
        <hr>
          

           <?php 
   
}?>

          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            
                          </div>
                      </div>
                  </div>
              </div>
              <!-- modal -->
              
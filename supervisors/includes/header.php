 <header class="header black-bg" style="background-color: rgb(45, 61, 60); border: double; border-radius: 10px; ">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="dashboard.php" class="logo hidden-xs"><b>Online Student Project Management System</b></a>
                
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                  <li><a class="logout" data-toggle="modal" href="#myAuth" style="background-color: blue; color: black;">Notification</a></li>
              
                    <li><a class="logout" href="logout.php">Logout</a></li>
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
$sql=mysqli_query($con,"SELECT * FROM `notify` WHERE category = 'allSupervisor' order by id asc");

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
              
<?php require('dashlink.php');
session_start();
require('session.php');

if(isset($_GET['did']))
  {
    $did=$_GET['did'];
    $delete=mysqli_query($conn, "DELETE FROM login WHERE id='$did'");
    if($delete == true)
    {
      echo '<script> alert("user deleted sucessful") </script>';
    }
  }
  
    $select=mysqli_query($conn, "SELECT * FROM login WHERE usertype != 'admin'");
    $row=mysqli_num_rows($select);
    $fetchs=mysqli_fetch_all($select, MYSQLI_ASSOC);
?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php  include ('sidedash.php');?>
    <!-- End of Sidebar -->
<!-- Content Wrapper -->
  

      

        <!-- Begin Page Content -->
        <div class="container-fluid">
         
         <table class="table table-responsive">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th colspan="2">ACTION</th>
            </tr>
            <?php
                if($row > 0)
                {
                    foreach($fetchs as $fetch):?>
                    <tr>
                       <td> <?php echo $fetch['id']; ?> </td>
                       <td> <?php echo $fetch['surname']. " " .$fetch['othername']; ?> </td>
                       <td> <?php echo $fetch['username']; ?> </td>
                       <td> <?php echo $fetch['email']; ?> </td>
                       <td> <?php echo $fetch['phone']; ?> </td>
                       <td> <a class= "btn btn-danger"  data-toggle="modal" data-target="#deletemodal"> Delete</a> </td>
                       <td><a class="btn btn-primary" href="admin_adddesign.php?vid=<?php echo $fetch['id']; ?>">Add Design</a></td>
                    </tr>
                  <?php endforeach; 

                }

                  ?>
                
            
        </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('dashfooter.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  
  <!--End of logout modal -->
  <!-- Bootstrap core JavaScript-->
  <?php include('dashscript.php');
  include('modal.php');

  ?>

  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User Record</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to delete this record?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="viewuser.php?did=<?php echo $fetch['id']; ?>">Proceed</a>
        </div>
      </div>
    </div>
  </div>

</body>


</html>
 

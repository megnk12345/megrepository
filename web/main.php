<?php include ('dashlink.php');

session_start();
include('session.php');

  $select=mysqli_query($conn,"SELECT * FROM login WHERE id='".$_SESSION['id']."'");
  $row=mysqli_num_rows($select);
  if($row > 0)
  {
        $fetch=mysqli_fetch_array($select);
        $id=$fetch['id']; 
        $surname=$fetch['surname'];
        $othername=$fetch['othername']; 
        $username=$fetch['username']; 
        $email= $fetch['email']; 
        $phone= $fetch['phone']; 
        $design=$fetch['profile_image'];
  }

?>

<title>MegAdvert</title>
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
        <div class="row">
          
          <div class="col-md-4">
   
            
              <div class="card text text-white" style="height:50%;">
              <img style="" class="card-img-top d-block w-100  img-responsive" src="<?php echo $design;?>">
              
          
          </div>

          </div>
        <div class="col-md-6 offset-1">
          <div class="card" style="height">
            <div class="card-header text-center bg-danger text-white">Profile Details </div>
            <div class="card-body">
            <table class="table">
              <tr><th>ID:</th> <td><?php echo $id; ?> </td></tr>
              <tr><th>NAME:</th> <td><?php echo $surname." ".$othername; ?> </td></tr>
              <tr><th>USERNAME:</th> <td><?php echo $username; ?> </td></tr>
              <tr><th>EMAIL:</th> <td><?php echo $email; ?> </td></tr>
              <tr><th>PHONE NUMBER:</th> <td><?php echo $phone; ?> </td></tr>
            </table> 
            
                
            </div>
            <div class="card-footer">
            
            </div>
          </div>
        
        </div>

        </div>
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

</body>


</html>
 

<?php include ('dashlink.php');
session_start();
    include('session.php');

    //empty array
    $error=array();


       if(isset($_GET['vid']))
       {
            $designer_id =$_GET['vid'];

       }

    if(isset($_POST['submit']))
    {
        //collect data from form
        
        $description =$_POST['description'];
        $category=$_POST['category'];
        $design = $_FILES['image']['name'];
        $tmp_name= $_FILES['image']['tmp_name'];
       // $size_design= $_FILES['design']['size'];


                    //display error massege
       if(empty($design))
        {
            array_push($error, 'please enter your design ');
        }
        if(empty($description))
        {
            array_push($error, 'please enter your design description');
        }
        /*if($size_design > 1000000)
        {
           array_push($error, "file size can not be more than 1mb" ); 
        }*/
        else if (count($error)==0)
        {
            $file_ext=explode('.', $design);
            $design_ext=$file_ext['1'];
            $design=(rand(1,1000).time().".".$design_ext);
            
            if($design_ext=='jpg' || $design_ext=='JPG'|| $design_ext=='jpeg'|| 
            $design_ext=='JPEG'|| $design_ext=='png' ||$design_ext=='PNG')
            {

            } 

            else
            {
                array_push($error, "Unsupported file format");
            }
            if($category == "card")
            {
               $insert=mysqli_query($conn,"INSERT INTO cards (designer_id, image, description)
                                   VALUES('$designer_id', '$design', '$description') ");
            }
            if($category == "calendar")
            {
               $insert=mysqli_query($conn,"INSERT INTO calendars (designer_id, image, description)
                                   VALUES('$designer_id', '$design', '$description') ");
            }
            if($category == "background")
            {
               $insert=mysqli_query($conn,"INSERT INTO backgrounds (designer_id, image, description)
                                   VALUES('$designer_id', '$design', '$description') ");
            }
            if($category == "template")
            {
               $insert=mysqli_query($conn,"INSERT INTO templates (designer_id, image, description)
                                   VALUES('$designer_id', '$design', '$description') ");
            }
            if($category == "others")
            {
               $insert=mysqli_query($conn,"INSERT INTO others (designer_id, image, description)
                                   VALUES('$designer_id', '$design', '$description') ");
            }
            if($category == "certificate")
            {
               $insert=mysqli_query($conn,"INSERT INTO certificates (designer_id, image, description)
                                   VALUES('$designer_id', '$design', '$description') ");
            }
            if($insert)
            {
                move_uploaded_file($tmp_name, '../uploads/'.$design);
                echo '<script> alert("design uploaded successfully") </script>';
            }
        }
    }


    
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
        <form method="POST" enctype="multipart/form-data">
        <div class='form-group'>
        <input type="file" name="image" placeholder="Design type"><br/><br/>
        </div>
        <div class='form-group'>
            <select name="category">
                <option value="">choose design type</option>
                <option value="card">card</option>
                <option value="calendar">calendar</option>
                <option value="certificate">certificate</option>
                <option value="background">background</option>
                <option value="others">others</option>
                <option value="template">template</option>
            </select>
        </div>
        <div class='form-group'>
        <input type="text" name="description"  placeholder="Design description"><br/><br/>
        </div>
        <div class='form-group'>
        <button class="btn btn-success" type="submit" name="submit">
            SUBMIT
        </button>
        </div>
    </form>
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
 

<?php 
require_once 'core/init.php';
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/gallery.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
<?php
      if (Session::exists('home')) {
  # code...
  echo '<p>'. Session::flash('home') .'</p>';
      
  }   
     $user = new User();

     if ($user->isLoggedIn()) {
      # code...
  
     // if (!$user->hasPermission('admin')) {
     //  # code...
     //  redirect::to('index.php');
     // }

?>           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logo.png" />
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
          
 		 <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>

                    <li>
                        <a href="update.php"><i class="fa fa-qrcode "></i>Update</a>
                    </li>

                    <li>
                        <a href="changepassword.php"><i class="fa fa-bar-chart-o"></i>Change Password</a>
                    </li>
                    
                    <li>
                        <a href="gallery.php"><i class="fa fa-table "></i>Gallery Upload<span class="badge">Included</span></a>
                    </li>

                    <li>
                        <a href="register.php"><i class="fa fa-table "></i>Register<span class="badge">Included</span></a>
                    </li>

                    <li>
                        <a href="blank.html"><i class="fa fa-edit "></i>Blank Page  <span class="badge">Included</span></a>
                    </li>
                </ul>
            </div>

      	</nav><!-- /. NAV SIDE  -->

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>GALLERY UPLOAD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                
                <hr />

        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">  
              
              <form method="POST" enctype="multipart/form-data">
              <div class="avatar-upload">
              <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg, .pdf, .docx, .gif" required/>
              <label for="imageUpload"></label>  
              <div class="avatar-preview">
              <div id="imagePreview" style="background-image: url();"> </div><br/>
              <input type="hidden" name="token" value="<?php echo Token::generate();?>">
              <input type="submit" name="Upload" value="UPLOAD">
              <?php require 'gprocess.php'; ?>
              </div>
              </div>
              </form>
            
            </div>
                
          </div>
          
        </div>
            

</div>
  
</div>
        
</div> 
    

    <div class="footer">   
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2019 
                </div>
        	</div>
    </div>
   
<?php

}

else
{
  redirect::to('login.php');
}

?>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/gallery.js"></script>
    
   
</body>
</html>

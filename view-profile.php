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
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
        <?php 

            $user = new user;
             if ($user->isLoggedIn() && $user->hasPermission('admin')) {
              # code...
            
            $id = $_GET['id'];
            $sql = DB::getInstance()->query("SELECT * FROM users where users_id ='$id'");
            if (!$sql->count()) {
              echo "ERRO!";               
            }
            else{
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
                        <a href="admin.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>

                    <li>
                        <a href="users.php"><i class="fa fa-qrcode "></i>All Users</a>
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
                     <h2>ADMIN</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                
                <hr/>

                 <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
            <strong><?php echo $sql->first()->username; ?></strong>
                        </div>
                    </div>
                </div>
        </hr>

            <p>Username: <?php echo $sql->first()->username; ?></p>
            <p>Email: <?php echo $sql->first()->email; ?></p>
            <p>Fullname: <?php echo $sql->first()->name; ?></p>
            <p>Photo: <?php echo "<a href='gallery/".$sql->first()->file."'>
     <img src='gallery/".$sql->first()->file."' alt='".$sql->first()->file."'> </a>";?></p>

    		</div> <!-- /. PAGE INNER  -->
        </div> <!-- /. PAGE WRAPPER  -->
    
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
 }else{
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
    
   
</body>
</html>

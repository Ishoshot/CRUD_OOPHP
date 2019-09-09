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
      if (Session::exists('home')) {
  # code...
  echo '<p>'. Session::flash('home') .'</p>';
      
  }   
     $user = new User();

     if ($user->isLoggedIn()) {
      # code...
  
     if (!$user->hasPermission('admin')) {
      # code...
      redirect::to('index.php');
     }

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
                     <h2>ALL USERS</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                
                <hr />

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
     <h5>STAFFS</h5>
           <table class="table">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Icon</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>View</th>
                <th>Delete</th>
              </tr>
          </thead>
        <?php 
      $sql = DB::getInstance()->query("SELECT * FROM users");

      if ($sql->count($sql)) 
      {
        foreach ($sql->results() as $sql) {?>
      <tbody>
       <tr>
        <td>
            <?php echo $sql->users_id;?>
          </td>

          <td>
            <a href="#">
             <img class="media-object" src="src/media/view.jpg" alt="...">
            </a>
         </td>
  
          <td>
            <?php echo $sql->username;?>
          </td>

            <td>
            <?php echo $sql->name;?>
            </td>

            <td>
            <?php echo $sql->email;?>
            </td>

            <td>
            <a href="view-profile.php?id=<?php echo $sql->users_id; ?>"><button>VIEW</button></a>
            </td>

            <td>
            <a href="delete-user.php?id=<?php echo $sql->users_id; ?>"><button>DELETE</button></a>
            </td>
          </tr>

        </tbody>

          <?php
          }
          }
          else {
            # code..
            echo "error";
          }

          ?>
        </table>
    </div>
    </div>
    </div>  

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
else{
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

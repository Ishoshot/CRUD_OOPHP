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
    <link href="assets/css/login.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
           
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
                     <h2>COMPLETE TO CONTINUE</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                
                <hr />

<?php
if(Input::exists()){
		if (Token::check(Input::get('token'))) {

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
					'username' => array(
						'required' => true,
						'min'=>2,
						'max'=>20
                    ),


					'password' =>array(
						'required' => true,
						'min' =>6	
					),


					'password_again' =>array(
						'required' => true,
						'matches' => 'password'	

					),


					'name' =>array(
						'required' => true,
						'min'=>2,
						'max'=>50
					),

                    'email' =>array(
                        'required' => true,
                        'min'=>2,
                        'max'=>50,
                        'unique' => 'users'
                    )


			));
			if ($validation->passed()) {
					$user = new User();
					$salt = Hash::salt(32);

					try{

						$user->Create(array(
							'username' => Input::get('username'),
							'password' => Hash::make(Input::get('password'), $salt),
							'salt' => $salt,
                            'name' => Input::get('name'),
							'email' => Input::get('email'),
							'joined' => date('Y-m-d H:i:s'),
							'group' => 1

						));

						Session::flash('home', 'You have been registered and can now login');
							Redirect::to('login.php');

					}
                    catch(Exception $e){
						die($e->getMessage());
					}
					
				}else{
					
					foreach ($validation->errors() as $error) {
						echo $error, '<br>';
					}
				}
		}
}
?>
<form action="" method="post">

	<input type="text" placeholder="Pick a Username" name="username" autocomplete="off" ><br/>

	<input type="password" placeholder="Pick a Password" name="password"><br/> 

	<input type="password" placeholder="Enter Password Again" name="password_again"><br/>

    <input type="text" placeholder="Enter Name" name="name" autocomplete="off"><br/>

	<input type="text" placeholder="Enter Email" name="email" autocomplete="off"><br/>

    <input type="hidden" name="token" value="<?php echo Token::generate();?>">

    <input type="submit" value="Submit">


</form>

</div><!-- /. PAGE INNER  -->
             
            </div><!-- /. PAGE WRAPPER  -->
         
        </div>
    
    <div class="footer">    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2019 
                </div>
        	</div>
    </div>
          

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


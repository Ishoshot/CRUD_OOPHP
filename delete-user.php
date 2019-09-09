<?php require 'core/init.php';
            $user = new user;

             if ($user->isLoggedIn() && $user->hasPermission('admin')) {
              # code...
            
            $id = $_GET['id'];
            $sql = DB::getInstance()->query("DELETE FROM users where users_id ='$id'");
            if (!$sql->count()) {
              echo "ERROR!";               
            }
            else{
                Redirect::to('users.php');
            }
          }
      
?>
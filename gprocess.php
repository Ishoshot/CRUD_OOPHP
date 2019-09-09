  <?php 

  if (isset($_POST) && !empty($_POST)) {
    # code...

      $file = $_FILES['file']['name'];
      
      $user->update(array(
              'file' => $file
            ));

      $uploadfile = $_FILES["file"]["tmp_name"];

      $target = "gallery/".basename ($_FILES ['file']['name']);

      if (move_uploaded_file( $uploadfile , $target )) {
      # code...

        echo "SUCESS!!!";
      
      }

      else

      {

      echo  "Error encountered while uploading, Please Retry!!!";

      }

  }

 ?>

<?php
session_start();
ob_start();
?>
<?php include 'header.php';?>

<?php

include 'dbcon.php';
if(isset($_POST['submit'])){

    if(isset($_GET['token'])){

    $token = $_GET['token'];

    $newpassword = mysqli_real_escape_string($con, $_POST['password']) ;
    $rpassword = mysqli_real_escape_string($con, $_POST['rpassword']) ;

    $pass = password_hash($newpassword, PASSWORD_BCRYPT);
    $rpass = password_hash($rpassword, PASSWORD_BCRYPT);

      if($newpassword === $rpassword){

        $updatequery = "update registration set password='$pass' where token='$token' ";
          
        $iquery = mysqli_query($con, $updatequery);

        if($iquery){
            $_SESSION['msg']= "Your password has been updated.";
            header('location:signin.php');

        } else{  
            $_SESSION['passmsg']= "Your password is not updated";
            header('location:reset_password.php');
        }

    }else{
        echo "Password is not maching";
    }

}else{
    echo "something is wrong.";
}

}

?>
<div class="container">

  <div class="row col-md-6 col-md-offset-3">
    <div class="spacer">

      <h2>Password Reset</h2>
      <p><?php 
      if(isset($_SESSION['passmsg'])){
        echo $_SESSION['passmsg'];
      }else{
           echo $_SESSION['passmsg']="";
      }  ?></p>

      <!-- Form -->
      <!-- <form action="connect.php" method="post"> -->
      <form action="" method="post">
              <div class="form-group">
                <label for="password">Enter Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password" required
                />
              </div>
              <div class="form-group">
                <label for="password">Confirm Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="rpassword"
                  name="rpassword" required
                />
              </div>
              <button type="submit" name="submit" class="btn btn-default" >Update Password </button> <br><br>
            </form>

        <div class="panel-footer text-right">
        <small>&copy; Short Stay</small>
        </div>
        <!-- form end -->
    </div>
  </div>
</div>
   
<?php include 'footer.php';?>
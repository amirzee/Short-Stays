<?php
session_start();
?>
<?php include 'header.php';?>

<?php

include 'dbcon.php';
if(isset($_POST['submit'])){
   
   $email = mysqli_real_escape_string($con, $_POST['email']) ;

   $emailquery = " select * from registration where email='$email' ";
   $query = mysqli_query($con,$emailquery);

   $emailcount = mysqli_num_rows($query);

   if($emailcount){

    $userdata = mysqli_fetch_array($query);

    $username = $userdata['username'];
    $token = $userdata ['token'];


            $subject = "Password Reset";
            $body = "Hi, $username. Click here to reset your password
            http://localhost:8182/Short-Stays_Team-43/reset_password.php?token=$token ";
            $sender_email = "From: shortstay77@gmail.com";

            if(mail($email, $subject, $body, $sender_email)) {
            $_SESSION['msg'] = "Check your mail to reset your password $email";
            
            header('location:signin.php');
        }else {
        echo "Email sending failed...";
    }

    }else{
        echo "No Email found";
    }

}

?>
<div class="container">

  <div class="row col-md-6 col-md-offset-3">
    <div class="spacer">

      <h2>Recover you Account</h2>

      <!-- Form -->
      <!-- <form action="connect.php" method="post"> -->
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email" required
                />
              </div>
              
              <button type="submit" name="submit" class="btn btn-default" > Send Email </button> <br><br>
              <p>Already a user? <a href="signin.php"><b>Log in</b></a></p>
            </form>

        <div class="panel-footer text-right">
        <small>&copy; Short Stay</small>
        </div>
        <!-- form end -->
    </div>
  </div>
</div>
   
<?php include 'footer.php';?>
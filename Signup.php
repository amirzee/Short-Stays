<?php
session_start();
?>
<?php include 'header.php';?>

<?php

include 'dbcon.php';
if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($con, $_POST['username']) ;
   $email = mysqli_real_escape_string($con, $_POST['email']) ;
   $mobile = mysqli_real_escape_string($con, $_POST['mobile']) ;
   $password = mysqli_real_escape_string($con, $_POST['password']) ;
   $rpassword = mysqli_real_escape_string($con, $_POST['rpassword']) ;

   $pass = password_hash($password, PASSWORD_BCRYPT);
   $rpass = password_hash($rpassword, PASSWORD_BCRYPT);
    
   $token  = bin2hex(random_bytes(15));

   $emailquery = " select * from registration where email='$email' ";
   $query = mysqli_query($con,$emailquery);

   $emailcount = mysqli_num_rows($query);

   if($emailcount>0){
     echo "email already exists";
    }else{
      if($password === $rpassword){

        $insertquery = "insert into registration (username,email,mobile,password,rpassword, token, status) 
        values('$username','$email','$mobile','$pass','$rpass','$token','inactive' )";
          
        $iquery = mysqli_query($con, $insertquery);

        if($iquery){
            $subject = "Email Activation";
            $body = "Hi, $username. Click here to activate your account
            http://localhost:8182/Short-Stays_Team-43/activate.php?token=$token ";
            $sender_email = "From: shortstay77@gmail.com";

            if(mail($email, $subject, $body, $sender_email)) {
            $_SESSION['msg'] = "Check your mail to activate your account $email";
            
            header('location:signin.php');
        }else {
        echo "Email sending failed...";
    }
         
      } else{
      
          ?>
          <script>
              alert("NO Connection");
              </script>
          <?php
      }

      } else{
        
              echo "password are not matching";
        
      }

    }
}

?>
<div class="container">

  <div class="row col-md-6 col-md-offset-3">
    <div class="spacer">

      <h2>Register- ShortStays</h2>

      <!-- Form -->
      <!-- <form action="connect.php" method="post"> -->
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="form-group">
                <label for="username">Full Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username" required
                />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email" required
                />
              </div>
              <div class="form-group">
                <label for="mobile">Phone Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="mobile"
                  name="mobile" required
                />
              </div>
              <div class="form-group">
                <label for="password">Create Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password" required
                />
              </div>
              <div class="form-group">
                <label for="password">Repeat Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="rpassword"
                  name="rpassword" required
                />
              </div>
              <button type="submit" name="submit" class="btn btn-default" > Register </button> <br><br>
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
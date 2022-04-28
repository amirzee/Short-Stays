<?php
session_start();
?>
<?php include 'header.php';?>

<?php 

    include 'dbcon.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $email_search = " select * from registration where email='$email'and
         status='active' ";
        $query = mysqli_query($con,$email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];

            $_SESSION['username']= $email_pass['username'];
            $_SESSION['email']= $email_pass['email'];
            $_SESSION['mobile']= $email_pass['mobile'];

            $pass_decode = password_verify($password, $db_pass);

            if($pass_decode){

                echo "login successful";
                header('location:index.php');
            }else{
            echo "Password Incorrect";
            }

         }
        else{
             echo "Invalid Email";
        }
         


    }



    ?>


    <!-- <link rel="stylesheet" type="text/css" href="style.css">     -->
<div class="container">

    <div class="contact">

        <div class="row">
        <div class="col-sm-6 col-sm-offset-3">   
            <div class="spacer">

            <h2>Login- ShortStays</h2>
            <!--   Form   -->
            <div>
             <p clss ="bg-success text-white px-4" ><?php 
             if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
             }else{
                echo $_SESSION['msg']="You are logged out. Please Login.";
             }
              ?> </p>
         </div>
         <form id="contact-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >
            <div class="form-group">
                <input  type="text"  class="form-control" id="email" name="email" placeholder=" Your Email" required>
            </div>
            <div class="form-group">
            <input  type="password"  name="password" id= "password" class="form-control" placeholder="Your Password" required>
            </div>
            <div class="form-group">
            <input type="submit" name="submit" class="form-control submit btn-default"  value="LOGIN">
            </div>
            <div class="form-group">
            <P> Forgot Password <a href="recover_email.php"><b>Click Here</b></a></p>
            <P> Not a user? <a href="Signup.php"><b>Register Here</b></a></p>
            </div>
            </form>
        
           </div>
           <!--     Form End    -->
            </div>
        </div>
    </div>
</div>      
<?php include 'footer.php';?>

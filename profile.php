<?php
session_start();
?>
<?php include 'header.php';?>

<div class="container">
    <h1 class="title">My Profile</h1>
    <div class="row">

            <div class="col-sm-5 col-md-4">
                <img src="images/logo2.png"  alt="holiday crown" width="75%">
            </div>

    <div class="col-sm-7 col-md-8">
    <?php
    $conn = new mysqli('localhost','root','','test');

    $q =mysqli_query($conn,"select * from registration where firstName = '$_SESSION[username]';");
    ?>

    <?php
        $row=mysqli_fetch_assoc($q);

        echo "<b>";

        echo "<table class=''>";

            echo "<tr class=''>";
                echo "<td class=''>";
                    echo "First Name: ";
                echo "</td>";

                echo "<td class=''>";
                    echo "<div> 
                            $_SESSION[username]
                        </div>";
                echo "</td>";
            echo "</tr>";

            // echo "<tr class=''>";
            //     echo "<td class=''>";
            //         echo "Last Name: ";
            //     echo "</td>";

            //     echo "<td class=''>";
            //         echo "<div>
            //             $_SESSION[lastName]
            //         </div>";
            //     echo "</td>";
            // echo "</tr>";

            echo "<tr class=''>";
                echo "<td class=''>";
                    echo "E-mail: ";
                echo "</td>";

                echo "<td class=''>";
                    echo "<div>
                        $_SESSION[email]
                    </div>";
                echo "</td>";
            echo "</tr>";

            echo "<tr class=''>";
                echo "<td class=''>";
                    echo "Number: ";
                echo "</td>";

                echo "<td class=''>";
                    echo "<div>
                        $_SESSION[mobile]
                    </div>";
                echo "</td>";
            echo "</tr>";

            // echo "<tr class=''>";
            //     echo "<td class=''>";
            //         echo "Address: ";
            //     echo "</td>";

            //     echo "<td class=''>";
            //         echo "<div>
            //             $_SESSION[address]
            //         </div>";
            //     echo "</td>";
            // echo "</tr>";

        echo "</table>";
        echo "</b>";
    ?>

    </div>

    </div>

    
</div>

<?php include 'footer.php';?>
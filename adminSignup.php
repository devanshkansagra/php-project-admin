<?php
include('../PHP-Project/php/config.php');
?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Declaring the variables
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // check if admin email already exists
        $quer2 = "SELECT * FROM admin WHERE Email = '$email'";
        $result = mysqli_query($conn, $quer2);
          
        if(mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email Already Exists')</script>";
        }
        else {
            
            $query = mysqli_query($conn, "INSERT INTO admin(firstName, lastName, Email, Password) VALUES ('$firstName', '$lastName','$email','$password')");

            echo "
                <script>
                    alert('Submitted Successfully')
                    window.location.href='/admin';
                </script>
            ";
        }
    }
?>
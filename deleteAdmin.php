<?php
    include('./config.php');
    $id = $_GET["id"];
    if(isset($_GET["id"])) {
        $query = mysqli_query($conn, "DELETE FROM admin WHERE id=$id");
        header("location:../../admin/adminDashboard.php");
    }
?>
<?php
    $conn=new mysqli("localhost","root","","acmegrade_project");
    if($conn->connect_error)
    {
        die("Connection failed");
    }
?>
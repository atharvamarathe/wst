<?php
    $conn = mysqli_connect("localhost", "root", "Marks@199", "webapp");

    if ($conn == false) {
        exit('<script>alert("Error:Cannot connect to database.")</script>');
    }
?>
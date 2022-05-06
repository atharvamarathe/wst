<?php
    session_start();
    $usernm = $_SESSION['user_name'];
?>

<head>
    <title>Welcome to Home Page!</title>
    <link rel="stylesheet" href="style.css">
</head>
<html>

<body>
    <?php
    include('navbar_loggedin.php');
    ?>
    <br>
    <div class="text-center">
        <h1 class="text-center mt-3">Welcome to home Page<?php echo '@' . $usernm; ?></h1>
        <div style="margin-top:24px;margin-left:350px;border:5px solid black;box-shadow:20px;width:40%">
            <a href="show_profile.php" style="font-size:1.2rem;width:50%;" class="btn btn-primary m-2">View My Profile</a><br>
            <a href="viewall_profiles.php" style="font-size:1.2rem;width:50%;" class="btn btn-success m-2">View All Users Profile</a><br>
        </div>
        
    </div>
</body>


</html>
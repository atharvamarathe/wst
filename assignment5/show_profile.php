<?php
    session_start();
    $username = $_SESSION['user_name'];
    include('navbar_loggedin.php');
    include('connect_database.php');
    $q = "SELECT * from person_profile WHERE username = '$username'";
    $res = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($res);
?>

<head>
    <title><?php echo $username . "'s Profile"; ?></title>
    <style>
        .card {
            align-items: center;
            width: 70%;
            margin: auto;
            margin-top: 5%;
            border:2px solid red;
            box-shadow:20px;
        }

        .card-img-top {
            width: 30%;
            height: 30%;
            border: 2px solid black;
            border-radius: 50%;
        }

        .un {
            color: brown;
        }
    </style>
</head>

<body>
    <div class="card p-3">
        <img src=<?php echo $row['profile_pic']; ?> class="card-img-top" alt="Profile image">
        <div class="card-body">
            <h3 class="card-title text-center"><?php echo $row['name']; ?></h3>
            <h5 class="text-center un">Username: <?php echo $row['username']; ?></h5>
            <br>
            <h5>Email ID: <span style="color: blue;"><?php echo $row['email']; ?></span></h5>
            <h5>Phone Number: <span style="color:blue;"><?php echo $row['contact']; ?> </span></h5>
            <h5>About yourself:<span style="color:blue;"> <?php echo $row['about']; ?></span> </h5>
            <h5>Address: <span style="color:blue;"><?php echo $row['address']; ?></span> </h5>
            <h5>Highest Education: <span style="color:blue;"><?php echo $row['education']; ?></span> </h5>
            <h5>Skills: <span style="color:blue;"><?php echo $row['skills']; ?></span> </h5>
            <h5>Interests: <span style="color:blue;"><?php echo $row['interests']; ?> </span></h5>
            <h5>Upvotes: <span style="color:blue;"><?php echo $row['upvotes']; ?> </span></h5>
            <h5>Downvotes: <span style="color:blue;"><?php echo $row['downvotes']; ?> </span></h5>
        </div>
    </div>
</body>
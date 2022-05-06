<?php
include("navbar.php");
include_once("connect_database.php");
$uploadDir = "profile_pics/";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $img_file = $_FILES['profileImg']["name"];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $interests = $_POST['interests'];
    $password = $_POST['password'];

    //Check if username already exists
    $existing = mysqli_query($conn, "SELECT * FROM person_profile WHERE username = '" . $username . "'");
    if (mysqli_num_rows($existing)) {
        exit('<script>alert("This username already exists, please enter different username");</script>');
    }

    //Check if email already exists
    $existing_email = mysqli_query($conn, "SELECT * FROM person_profile WHERE email = '" . $email . "'");
    if (mysqli_num_rows($existing_email)) {
        exit('<script>alert("This Email ID already exists, please enter different email address");</script>');
    }

    //Upload profile image in local folder
    $uploadFile = $uploadDir . $img_file;
    if (move_uploaded_file($_FILES['profileImg']['tmp_name'], $uploadFile))
        echo '<script>alert("File uploaded successfully ")</script>';
    else
        echo '<script>alert("Error in file upload ")</script>';

    //Insert into table
    //todo: 2 tables - signin - for login-register - try later 
    //1 table for all details
    $insert_q = "INSERT INTO person_profile (name, email, username, contact, profile_pic, about, address, education, skills, interests, password,upvotes,downvotes) VALUES ('$name', '$email', '$username','$phone','$uploadFile','$about','$address', '$education','$skills','$interests','$password',0,0)";
    if (mysqli_query($conn, $insert_q)) {
        echo "<script>alert('Registration successful!')</script>";
    } else {
        echo "<script>alert('Error in Registration')</script>";
    }
}
mysqli_close($conn);
?>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>

<div class="container" style="margin-left:300px;margin-top:50px;">
    <h1>Register</h1>
    <form method="POST" action="" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Name</label>
            <input type="text" style="width:50%" class="form-control" name="name" id="name" placeholder="Enter Name" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Email address</label>
            <input type="email" style="width:50%" class="form-control" name="email" id="email" placeholder="Enter Email Address" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Username</label>
            <input type="uname" style="width:50%"  class="form-control" name="uname" id="uname" placeholder="Enter Username" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Phone Number</label>
            <input type="tel" style="width:50%"  class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Profile Image</label>
            <input type="file" style="width:50%"  class="form-control" name="profileImg" id="profileImg" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">About</label>
            <input type="text" style="width:50%" class="form-control" name="about" id="about" placeholder="Enter About yourself" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Address(City, State, Country)</label>
            <input type="text" style="width:50%"  class="form-control" name="address" id="address" placeholder="Enter Address(City, State, Country)" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Highest Education</label>
            <input type="text" style="width:50%" class="form-control" name="education" id="education" placeholder="Enter Highest Education" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Skills</label>
            <input type="text" style="width:50%" class="form-control" name="skills" id="skills" placeholder="Enter Skills" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Interests</label>
            <input type="text"style="width:50%"  class="form-control" name="interests" id="interests" placeholder="Enter Interests" required>
        </div>
        <div class="mb-3">
            <label class="form-label" style="font-size:1.2rem;">Password</label>
            <input type="password" style="width:50%" class="form-control" name="password" id="password" placeholder="Enter Password" required>
        </div>
        <div>
            <button type="submit" style="width:25%;height:40px;font-size:1.2rem;" name="submit" class="btn btn-primary">Submit</button>
            <button type="reset" style="width:25%;height:40px;font-size:1.2rem;" name="reset" class="btn btn-danger">Clear</button>
        </div>
        <h5 class="mt-3">Already Registered User, Click on <a href="index.php">Login Page!</a></h5>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

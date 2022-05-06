<?php
session_start();
include('navbar_loggedin.php');
$username = $_SESSION['user_name'];
include('connect_database.php');
//$sql = "SELECT * FROM person_profile WHERE username != '$username' ORDER BY upvotes DESC ";
$sql = "SELECT * FROM person_profile  ORDER BY upvotes DESC ";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0) {
    echo "<center><h3 class='mt-3'> No Results </h3></center>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['viewprof'])){
        $username = $_POST['username'];
        header("location: view_profile.php?name=".$username);
        exit();
    }
    if (isset($_POST['upvote'])) {
        $username = $_POST['username'];
        $sql_up = "SELECT * from person_profile WHERE username='$username'";
        $up_res = mysqli_query($conn, $sql_up);
        $up_row = mysqli_fetch_assoc($up_res);
        $up_row['upvotes']++;
        $votes = $up_row['upvotes'];
        $sql_upd = "UPDATE person_profile SET upvotes='$votes' WHERE username='$username'";
        mysqli_query($conn, $sql_upd);
        header("location: viewall_profiles.php");
    }
    if (isset($_POST['downvote'])) {
        include_once('connect_database.php');
        $username = $_POST['username'];
        $sql_up = "SELECT * from person_profile WHERE username='$username'";
        $down_res = mysqli_query($conn, $sql_up);
        $down_row = mysqli_fetch_assoc($down_res);
        $down_row['downvotes']++;
        $votes = $down_row['downvotes'];
        $sql_upd = "UPDATE person_profile SET downvotes='$votes' WHERE username='$username'";
        mysqli_query($conn, $sql_upd);
        header("location: viewall_profiles.php");
    }
}
while ($row = mysqli_fetch_assoc($result)) {

?>

    <head>
        <title>View All Users</title>
        <style>
            .card {
                width: 20%;
                height: 8%;
                border: 2px solid red;
                border-radius:20px;
                margin: auto;
            }

            .card-img-top {
                height: 20%;
                margin: auto;
                border: 1px solid grey;
            }
            img{
                border-radius:50%;
            }
            .un {
                color: grey;
            }
        </style>
    </head>
    <div class="card mt-2 p-2">
        <img src=<?php echo $row['profile_pic']; ?> class="card-img-top" alt="Profile image">
        <div class="card-body p-2 text-center">
            <h3 class="card-title text-center"><?php echo $row['name']; ?></h3>
            <h5 class="text-center un">@<?php echo $row['username']; ?></h5>
            <form method="POST" class="text-center">
                <input type="hidden" name="username" id="username" value=<?php echo $row['username'];?>>
                <input type="submit" style="font-size:1.1rem;width:80%"  class="btn btn-info m-2" name="viewprof" value="View Profile"><br>
                <?php if($row['username']!=$username){
                ?>
                <input type="submit" style="font-size:1.1rem;width:80%" class="btn btn-success m-2" name="upvote" value=<?php echo 'Upvotes:' . $row['upvotes']; ?>><br>
                <input type="submit" style="font-size:1.1rem;width:80%" class="btn btn-danger m-2" name="downvote" value=<?php echo 'Downvotes:' . $row['downvotes']; ?> ><br>
                <?php
                }?>
                <?php if($row['username']==$username){
                ?>
                     <input type="submit" style="font-size:1.2rem;width:80%"  class="btn btn-success m-2" name="upvote" value="Upvote" id="up" disabled><br>
                    <input type="submit" style="font-size:1.2rem;width:80%"  class="btn btn-danger m-2" name="downvote" value="Downvote" disabled><br>
                <?php
                }?>
            </form>
        </div>
    </div>
<?php

}

mysqli_close($conn);

?>
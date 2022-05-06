<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// define variables and set to empty values
$fname = $lname = $uname = $email = $state = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["name"]);
    $uname = test_input($_POST["uname"]);
    $email = test_input($_POST["email"]);
    $state = test_input($_POST["state"]);
    $country = test_input($_POST["country"]);
    $skills = test_input($_POST["skills"]);
    $interests = test_input($_POST["interests"]);
}

// Variables for interacting with mysql
$servername = "localhost";
$username = "admin";
$password = "Spacex@1251";
$dbname = "UserDB";

function create_database($dbname) {
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"]);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();
}

create_database($dbname);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS User (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    uname VARCHAR(255),
    email VARCHAR(255),
    state VARCHAR(255),
    country VARCHAR(255),
    skills VARCHAR(255),
    interests VARCHAR(255),
    highestedu VARCHAR(255)
    );";
    
if ($conn->query($sql) === TRUE) {
    echo "Table User created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

function is_unique($column, $value) {
    $sql = "SELECT id FROM User WHERE $column='$value';";
    $result = $GLOBALS["conn"]->query($sql);
    if ($result->num_rows > 0) {
        return false;
    }
    return true;
}
$saved = 1;
$email_unique = is_unique("email", $email);
$uname_unique = is_unique("uname", $uname);
if ($email_unique && $uname_unique) {
    $sql = "INSERT INTO User (fname, lname, uname, email, state, country) 
            VALUES ('$fname', '$lname', '$uname', '$email', '$state', '$country');";
    if ($conn->query($sql) === TRUE) {
        echo "Record added into User";
    } else {
        echo "Error adding record: " . $conn->error;
        $saved = 0;

    }
} else {
    echo "Cannot add details into the database<br>";
    $saved = 0;
}

if (!$uname_unique) {
    echo "$uname is taken already<br>";
}
if (!$email_unique) {
    echo "$email is taken already<br>";
}

$conn->close();
header("Location: http://localhost/form.php?data=$saved"); /* Redirect browser */
exit();
?>


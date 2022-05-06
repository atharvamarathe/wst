<a href="form.php">Go back </a>
<br>
<br>
<?php
$servername = "localhost";
$username = "admin";
$password = "Spacex@1251";
$dbname = "UserDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM User";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo ('<div class="card">' . "ID: ".$row['id'] . "<br> Name : " . $row['fname'] . " " . $row['lname'] . "<br> Username : " . $row['uname'] . "<br> Email: " . $row['email'] . "<br>State: " . $row['state'] . "<br>Country : " . $row['country'] . "<br><br>" . "</div>");
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<link rel="stylesheet" href="/styles_cards.css">
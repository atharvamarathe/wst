<html>
<?php
$servername = "localhost";
$username="admin";
$password="Spacex@1251";
$dbname="labexam";

// $name = $_GET['name'];
// $age = $_GET['age'];
$conn = new mysqli($servername,$username,$password,$dbname);
// $sql = "insert into info(name,age) values('$name','$age')";
$sql = "select * from info";
$result = $conn->query($sql);
$str = "<tr><td>id</td><td>name</td><td>age</td></tr>";
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $str .= "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td></tr>"; 
    }
    echo $str;
}
else {
    echo "Not able to get data!";
}
// conn->close();
// if($conn->query($sql) == TRUE) {
//     echo "Table created successfully!";
//     header("Location: http://localhost/final/index.html?q=success");
//     $conn->close();
//     exit();
// }
// echo "done";
// header("Location: http://localhost/final/index.html?q=$conn->error");
// exit();
?>
</html>
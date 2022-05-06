<?php

$db = new mysqli('localhost', 'admin', 'Spacex@1251', 'quiz','3306');
$sql = "select count(*) from questions;";
 $result = mysqli_query($db,$sql);
 $qno = mysqli_fetch_array($result);
$qno = $qno[0];

$sql = "select * from questions;";
 $result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result);

$index = 1;
$count = $_POST["num"];
if($count <= 0){
	echo "";
}

if($count > $row[0]){
	echo "";
}

while($index <= $count){
	$row = mysqli_fetch_array($result);
	$index = $index + 1;
}


 

echo $row[0]."@".$row[1]."@".$row[2]."@".$row[3]."@".$row[4]."@".$qno;
?>
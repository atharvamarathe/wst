<?php  

$ans_paper =  $_POST["num"];
$db = new mysqli('localhost', 'admin', 'Spacex@1251', 'quiz','3306');

$sql = "select count(*) from questions;";
 $result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result);
$count = $row[0];
$sql = "select * from questions;";
 $result = mysqli_query($db,$sql);
$score = 0;
 $index = 0;
 $ans_paper = explode(",",$ans_paper);
 while($index < $count){
 	$row = mysqli_fetch_array($result);
 	$opt = $ans_paper[$index];	
	 
 	if($opt == 5){
 		$index = $index + 1;
 		continue;
 	}
 	if(strcmp($row[$opt], $row[5]) == 0){
 		$score = $score + 1;

 	}
 	$index = $index + 1;

 }

 echo "Your score is : ".$score;

?>
<?php  

    $ans_paper =  $_POST["num1"];
    $db = new mysqli('localhost', 'root', '$iddh@13M', 'student','3306');

    $sql = "select count(*) from qbank;";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $count = $row[0];
    $sql = "select * from qbank;";
    $result = mysqli_query($db,$sql);
    $score = 0;
    $index = 0;
    $ans_paper = explode(",",$ans_paper);
    while($index < $count){
    //	echo " f".$index."f ";
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
<?php  

    $ans_paper =  $_REQUEST["ans"];
    //echo "Answerpapser is :".$ans_paper;
    $db = new mysqli('localhost', 'root', 'Marks@199','quiz');

    $sql = "select count(*) from question_bank;";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $count = $row[0];
    $sql = "select * from question_bank;";
    $result = mysqli_query($db,$sql);
    $score = 0;
    $index = 0;
    $ans_paper = explode(",",$ans_paper);
    while($index < $count){
        $row = mysqli_fetch_array($result);
        $opt = $ans_paper[$index];
        //echo "My answer is :".$opt."and act ans : ".$row[5]."\n";
        if($opt == 0){
            $index = $index + 1;
            continue;
        }
        if(strcmp($opt, $row[5]) == 0){
            //echo "Answer is correct1";
            $score = $score + 1;
        }
        $index = $index + 1;

    }

    echo "Score for this quiz: ".$score;
?>
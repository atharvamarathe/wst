<?php
    $db = new mysqli('localhost', 'root', 'Marks@199', 'quiz');
    $sql = "select count(*) from question_bank;";
    $result = mysqli_query($db,$sql);
    $qno = mysqli_fetch_array($result);
    $qno = $qno[0];
    $sql = "select * from question_bank;";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    $index = 1;
    $count = $_REQUEST["q_no"];

    if($count <= 0 || $count > $qno){
        echo "";
    }
    while($index < $count){
        $row = mysqli_fetch_array($result);
        $index = $index + 1;
    }
    echo $row[0]."#".$row[1]."#".$row[2]."#".$row[3]."#".$row[4]."#".$qno;
?>

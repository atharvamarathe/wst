<?php
		$question = $_POST["question"];
		$a = $_POST["a"];
		$b = $_POST["b"];
		$c = $_POST["c"];
		$d = $_POST["d"];
		$answer = $_POST["answer"];
		$state = 0;
		if(array_key_exists('button1', $_POST)) {
			$state = 0;
		}
		else if(array_key_exists('button2', $_POST)) {
			$state = 1;
		}

		$db = new mysqli('localhost', 'root', 'Marks@199', 'quiz');
		$sql = "select count(*) from question_bank where question = '$question' and option1 = '$a' and option2 = '$b' and option3 = '$c' and option4 = '$d';";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result);
		if($row[0] >= 1){
			{
				echo 	"<SCRIPT>alert('Question added already');</SCRIPT>";
			}
		}
		else if($state === 0){
			$sql = "insert into question_bank (question, option1, option2,  option3,  option4, answer) values ('$question', '$a', '$b',  '$c',  '$d' , '$answer');";
			$result = mysqli_query($db,$sql);
			//	$row = mysqli_fetch_array($result); 
		}
		else if($state === 1){
			$sql = "delete from question_bank where question = '$question';";
			$result = mysqli_query($db,$sql);
		}
		header("Location: add_question.php");
?>
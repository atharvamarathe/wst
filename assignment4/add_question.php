<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Online Quiz Portal</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <form method = "POST" action = "add_questionDB.php">
<div>
<h2 style="margin-left:200px;font-size:1.8rem;margin-top:40px;">Add Question to Quiz : </h2>
<input style="margin-left:200px;font-size:1.4rem;width:40rem" type = "text" name = "question" class = "input"></input>

<h3 style="margin-left:200px;font-size:1.4rem;margin-top:4px;">Option A : </h3>
<input style="margin-left:200px;width:20rem;"type = "text" name = "a"  class = "input"></input>

<h3 style="margin-left:200px;font-size:1.4rem;margin-top:4px;">Option B : </h3>
<input style="margin-left:200px;width:20rem" type = "text" name = "b"  class = "input"></input>

<h3 style="margin-left:200px;font-size:1.4rem;margin-top:4px;">Option C : </h3>
<input style="margin-left:200px;width:20rem"type = "text" name = "c"  class = "input"></input>

<h3 style="margin-left:200px;font-size:1.4rem;margin-top:4px;">Option D : </h3>
<input style="margin-left:200px;width:20rem"type = "text" name = "d"  class = "input"></input>
<h2 style="margin-left:200px;font-size:1.4rem;margin-top:4px;">Answer : </h2>
<input style="margin-left:200px;width:20rem" type = "text" name = "answer"  class = "input"></input>
</div>


<div style="margin-left:200px;margin-top:20px;">
<input type = "submit" value = "Add Question" name = "button1" class = "button1"></input>
<input style="margin-left:60px;"type = "submit" value = "Delete Question" name = "button2" class = "button1"></input>
<input style="margin-left:50px;height:40px;width:100px;border:2px solid red;"type="button" name="submit" value="HomePage" onclick = "loaddoc();">
</div>
</form>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function loaddoc(){
            window.location = 'index.php';
        }
    </script>
</body>
</html>
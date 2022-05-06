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
 <div id ="display_condition">
    <h3 id = "total_score"></h3>
    <h3 style="margin-left:50px;margin-top:40px;" id = "total"></h3>
    <h4 style="margin-left:50px;" id="qno">Question No:</h4>
    <div class="question-card">
        <h4 id="h"></h4>
    </div>
    <div>
    <p class="option">
        <input type="radio" name="a" id = "a" value="">
        <label id = "aa" value = ""> </label>
    </p>
    <p class="option">
        <input type="radio" name="a" id = "b" value="">
        <label id = "bb" value = ""> </label>
    </p>
    <p class="option">
        <input type="radio" name="a" id = "c" value="">
        <label id = "cc" value = ""> </label>
    </p>
    <p class="option">
       <input type="radio" name="a" id = "d" value="">
       <label id = "dd" value = ""> </label>
    </p>
    <h3 style="margin-left:50px;margin-top:50px" id = "total_score"></h3>
    <div>
    <input style="height:50px;width:80px;margin-left:200px;background-color:grey;" type = "button" onclick = "prev();" value = "Previous"/>
    <input style="height:50px;width:80px;margin-left:20px;background-color:grey;" type = "button" onclick = "next();" value = "next"/>
    <input style="height:50px;width:80px;margin-left:20px;background-color:grey;" type="button" name="submit" value="Save" onclick = "Select();">
    <input style="height:50px;width:80px;margin-left:20px;background-color:grey;"type="button" name="submit" value="Clear" onclick = "Clear();">
    <br>
    <br>
    <input style="margin-left:200px;height:40px;width:100px;border:2px solid red;"type="button" name="submit" value="Finish Quiz" onclick = "Submit();">
    <input style="margin-left:50px;height:40px;width:100px;border:2px solid red;"type="button" name="submit" value="HomePage" onclick = "loaddoc();">
</div>
    <!--<submit button> <clear button><prev button><next button> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var count = 0;
        var max_count = 0, solnArray, selected, curr_count = 1;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = this.responseText;
                var q = result.split("#");
                console.log(q);
                document.getElementById('qno').innerHTML = document.getElementById('qno').innerHTML  + curr_count.toString();
                document.getElementById('h').innerHTML = document.getElementById('h').innerHTML  + q[0];
                document.getElementById("aa").innerHTML = q[1];
                document.getElementById("bb").innerHTML = q[2];
                document.getElementById("cc").innerHTML = q[3];
                document.getElementById("dd").innerHTML = q[4];
                max_count = q[5];
                //var answer = q[5];
                document.getElementById("total").innerHTML =  "Total Questions : " + q[5];
                solnArray = new Array(max_count);
                selected = new Array(max_count);
                for(var i = 0; i < max_count; i++){
                    solnArray[i] = 0;
                    selected[i] = "";
                }
                console.log(max_count);
                console.log(solnArray);
            }
        };
        xmlhttp.open("GET","load_questions.php?q_no=1",true);
        xmlhttp.send();
        function next(){
            if(curr_count < max_count)
                    curr_count = curr_count + 1;
            document.getElementById('h').innerHTML=""
            document.getElementById("a").checked = false;
            document.getElementById("b").checked = false;
            document.getElementById("c").checked = false;
            document.getElementById("d").checked = false;
            if(selected[curr_count-1].length == 1){
                console.log(document.getElementById(selected[curr_count-1]).checked)
		        document.getElementById(selected[curr_count-1]).checked = true;
            }
           
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var result = this.responseText;
                    var q = result.split("#");
                    console.log(q);
                    document.getElementById('qno').innerHTML = 'Question No:'
                    document.getElementById('qno').innerHTML = document.getElementById('qno').innerHTML  + curr_count.toString();
                    document.getElementById("total").innerHTML =  "Total Questions : " + q[5];
                    document.getElementById('h').innerHTML = q[0];
                    document.getElementById("aa").innerHTML = q[1];
                    document.getElementById("bb").innerHTML = q[2];
                    document.getElementById("cc").innerHTML = q[3];
                    document.getElementById("dd").innerHTML = q[4];
                }
            };  
            xmlhttp.open("GET","load_questions.php?q_no="+curr_count.toString(),true);
            xmlhttp.send();
        }


        function prev(){
            if(curr_count >= 2)
                    curr_count = curr_count - 1;
            console.log(selected,curr_count-1);
            document.getElementById('h').innerHTML="";
            document.getElementById("a").checked = false;
            document.getElementById("b").checked = false;
            document.getElementById("c").checked = false;
            document.getElementById("d").checked = false;
            if(selected[curr_count-1].length == 1){
                console.log(document.getElementById(selected[curr_count-1]).checked)
		        document.getElementById(selected[curr_count-1]).checked = true;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var result = this.responseText;
                    var q = result.split("#");
                    console.log(q);
                    document.getElementById('qno').innerHTML = 'Question No:'
                    document.getElementById('qno').innerHTML = document.getElementById('qno').innerHTML  + curr_count.toString();
                    document.getElementById("total").innerHTML =  "Total Questions : " + q[5];
                    document.getElementById('h').innerHTML = q[0];
                    document.getElementById("aa").innerHTML = q[1];
                    document.getElementById("bb").innerHTML = q[2];
                    document.getElementById("cc").innerHTML = q[3];
                    document.getElementById("dd").innerHTML = q[4];
                }
            };  
            xmlhttp.open("GET","load_questions.php?q_no="+curr_count.toString(),true);
            xmlhttp.send();

        }

        function radio(){
            if(document.getElementById("a").checked == true)
                return "aa";
            if(document.getElementById("b").checked == true)
                return "bb";
            if(document.getElementById("c").checked == true)
                return "cc";
            if(document.getElementById("d").checked == true)
                return "dd";
            else
                return "FF";
        }

        function Select(){
            selected[curr_count-1] = radio()[0];
            console.log(selected);
        }

        function Clear(){
            if(selected[curr_count-1].length == 1){
                //console.log("fjjf");
                document.getElementById(selected[curr_count-1]).checked = false;
            }
            selected[curr_count-1] = "";
            console.log(selected);
        }

        function Submit(){
            for(var i = 0; i < selected.length; i++){
                selected[i] = selected[i].toString();
                if(selected[i].localeCompare('a') == 0)
                    selected[i] = 1;
                else if(selected[i].localeCompare('b') == 0)
                    selected[i] = 2;
                else if(selected[i].localeCompare('c') == 0)
                    selected[i] = 3;
                else if(selected[i].localeCompare('d') == 0)
                    selected[i] = 4;
                else
                    selected[i] = 0;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var result = this.responseText;
                    k=document.getElementById('total_score')
                    console.log(k)
                    document.getElementById('total_score').innerHTML = result;
                    alert(result);
                }
            };  
            console.log(selected)
            xmlhttp.open("GET","check_solution.php?ans="+selected,true);
            xmlhttp.send();       
        }
        function loaddoc(){
            window.location='index.php';
        }
    </script>
</body>
</html>
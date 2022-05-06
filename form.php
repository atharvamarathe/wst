<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <nav class="navbar navbar-default">
  
  <div class="container-fluid">
      <div class="navbar-header">
          <a class="navbar-brand" href="#">
              WST Assignment 
          </a>
      </div>
      <ul class="nav navbar-nav">
          <li class="active"><a href="gallery.php">
              Gallery
          </a></li>
      </ul>
  </div>
</nav>
    <center>
      <form action="/index.php" method="post" id="userform">
             <input type="text" name="fname" id="fname" class="form-control" placeholder="First name" /><br>
             <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name"/>  <br>
             <input type="text" name="uname" id="uname" class="form-control" placeholder="Username"/>  <br>
             <input type="email" class="form-control"  aria-describedby="emailHelp"  name="email" id="emailid" placeholder="Email"/>  <br>
             <input type="text" name="state" id="state"class="form-control" placeholder="State"/>  <br>
             <input type="text" name="country" id="country" class="form-control" placeholder="Country"/>  <br>
            <button type="button" id="submit_button" class="btn btn-primary">Submit</button>
             <button type="reset" id="reset" class="btn btn-primary">Reset</button>  
      </form>
    </center>

    <script src="./index.js"></script>
    <?php
      if($_GET['data'] == 1) {
      ?>
      <script>alert("Record Saved Successfully !")</script>
      <?php
      } 
      ?>
  </body>
</html>

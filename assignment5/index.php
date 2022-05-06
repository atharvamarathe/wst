<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php'?>
    <div class="login">
        <h1>Login</h1>
        <form method="POST" action="authenticate.php">
            <div class="mb-3">
                <label class="form-label" style="font-size:1.2rem;">Username</label>
                <input type="text" style="width:50%" class="form-control" id="uname" placeholder="Enter Username" name="uname" required>
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-size:1.2rem;">Password</label>
                <input type="password" style="width:50%"class="form-control" id="password" placeholder="Enter Password" name="password" required>
            </div>
            <button type="submit" style="width:50%;height:40px;font-size:1.2rem;" class="btn btn-success" name="submit">Login</button>
            <h5 class="mt-3">Don't have an account?<a href="register.php"> Register here!</a></h5>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
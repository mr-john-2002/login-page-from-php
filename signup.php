<?php
    $alr = false;
    $showerror = false;
    $userexist = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){   
        include 'parsel/db_connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        // $exists = false;

        // chacking that wather this user is exist in db or not 
        $existsql = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($con, $existsql);
        $existnumRow = mysqli_num_rows($result);
        if($existnumRow>0){
            // write dow what you want to do when user name is alrady exist in db 
            $userexist = true;
        }
        else{
            if (($password == $cpassword)){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql ="INSERT INTO `user1234`.`users` (`username`, `pass`, `dt`) VALUES ( '$username', '$hash', current_timestamp());";
                $result = mysqli_query($con, $sql);
                if ($result == true) {
                    $alr = true;
                }
            }
            else{
                $showerror = 'ERROR : Password do not match or username is taken';
            }
        }

        

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>

    <?php require 'parsel/_nav.php' ?>
    <?php
        if($alr) {
            echo '<div class="alert alert-success" role="alert">
            <strong>Success ! </strong>ACCOUNT IS CREAATED 🙂 you can now Login</div>';
        }
        if($showerror) {
            echo '<div class="alert alert-danger" role="alert">
            <strong>ERROR ❗</strong>Password you enter do not match </div>';
        }
        if($userexist) {
            echo '<div class="alert alert-danger" role="alert">
            <strong>ERROR ❗</strong> The usename is already taken</div>';
        }
    ?>
    <div class="container">
        <h1 class='text-center'>Sign up to our Website</h1>
        <form action='/programs/cwh/oop/signup.php'method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group my-4">
                <label for="username">User name</label>
                <input type="text" maxlength="11" class="form-control" id="username" name="username">
                <small id="emailHelp" class="form-text text-muted">lowercase username is same as uppercase & username should be 11 character long</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" maxlength="23" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Conform Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">make sure to type the same password.</small>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
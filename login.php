<?php
    $login = false;
    $showerror = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){   
        include 'parsel/db_connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql ="Select * from users where username='$username'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while($row=mysqli_fetch_assoc($result)){
                if (password_verify($password, $row['pass'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location:welcome.php");
                }
            }
        }
        else{
            $showerror = 'Password do not match';
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

    <title>Login</title>
  </head>
  <body>

    <?php require 'parsel/_nav.php' ?>
    <?php
        if($login) {
            echo '<div class="alert alert-success" role="alert">
            <strong>Success ! </strong>ACCOUNT IS CREAATED 🙂</div>';
        }
        if($showerror) {
            echo '<div class="alert alert-danger" role="alert">
            <strong>ERROR ❗</strong>Password you enter do not match </div>';
        }
    ?>
    <div class="container">
        <h1 class='text-center'>Login to our Website</h1>
        <form action='/programs/cwh/oop/login.php'method='post'>
            <div class="form-group my-4">
                <label for="username">User name</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
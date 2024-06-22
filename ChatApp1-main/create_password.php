<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signin.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
    </style>
</head>
<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Create New Password</h2>
                <p>MyChat</p>
            </div>
            <div class="form-group">
                <label for="">Enter Password</label>
                <input class="form-control" type="password" name="pass1" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input class="form-control" type="password" name="pass2" placeholder="Confirm Password" autocomplete="off" required>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>
            </div>
            <?php include("signin_user.php");?>
        </form>
    </div>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include("include/connection.php");

    if(isset($_POST['change'])){
        $user = $_SESSION['user_email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if($pass1 != $pass2){
            echo "
            <div class='alert alert-danger'>
                <strong>Passwords dont match, try again/strong>
            </div>
            ";
        } elseif (strlen($pass1) < 9 || strlen($pass2) < 9){
            echo "
            <div class='alert alert-danger'>
                <strong>Use 9 or more characters</strong>
            </div>
            ";
        } else {
            $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
            session_destroy();
            echo "<script>alert('Go ahead and sign in');</script>";
            echo "<script>window.open('signin.php', '_self');</script>";
        }
    }
    ?>
</body>
</html>

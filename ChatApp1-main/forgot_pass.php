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
                <h2>Forgot Password</h2>
                <p>MyChat</p>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="email" name="email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Your first best friend's name</label>
                <input class="form-control" type="text" name="bf" placeholder="Name of first best friend" autocomplete="off" required>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
            </div>
        </form>
        <div class="text-center small" style="color:#67428B;">Back to Sign in? <a href="signin.php">Click here</a></div>
    </div>
    <?php

    session_start();

    include("include/connection.php");

        if(isset($_POST['submit']))
        {
            $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
            $recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['bf']));

            $select_user = "select * FROM users where user_email='$email' AND forgotten_answer='$recovery_account'";

            $query = mysqli_query($con, $select_user);

            $check_user = mysqli_num_rows($query);

            if($check_user==1){

                $_SESSION['user_email']=$email;

                echo"<script>window.open('create_password.php', '_self')</script>";
            }
            else{
                echo "<script>alert('Your email or best friend's name are wrong')</script>";
                echo"<script>window.open('forgot_pass.php', '_self')</script>";
            }
            }
    ?>
</body>
</html>

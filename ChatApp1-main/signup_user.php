<?php
include("include/connection.php");

if (isset($_POST['sign_up'])) {
    $name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
    $country = htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
    $gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
    $bf_name = htmlentities(mysqli_real_escape_string($con, $_POST['bf_name']));
    $rand = rand(1, 2);

    if (empty($name)) {
        echo "<script>alert('Cannot verify your username')</script>";
        exit();
    }
    if (strlen($name) < 3 || strlen($name) >25) {
        echo "<script>alert('Username must be between 9 and 25 characters')</script>";
        exit();
    }

    if (strlen($pass) < 9 || strlen($pass) >25) {
        echo "<script>alert('Password must be between 9 and 25 characters')</script>";
        exit();
    }

    $check_email = "SELECT * FROM users WHERE user_email='$email'";
    $run_email = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($run_email);

    if ($check == 1) {
        echo "<script>alert('The Email is already in use, try again')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
        exit();
    }

    if ($rand == 1) {
        $profile_pic = "images/slika1.jpg";
    } else {
        $profile_pic = "images/slika2.jpg";
    }

    //$insert = "INSERT INTO users (user_name, user_pass, user_email, user_profile, user_country, user_gender) VALUES ('$name', '$pass', '$email', '$profile_pic', '$country', '$gender')";
    $insert = "insert into users (user_name, user_pass, user_email, user_profile, user_country, user_gender, forgotten_answer) values ('$name', '$pass', '$email', '$profile_pic', '$country', '$gender', '$bf_name')";

    $query = mysqli_query($con, $insert);

    if ($query) {
        echo "<script>alert('Congratulations , $name, Your account was created sucessfully')</script>";
        echo "<script>window.open('signin.php', '_self')</script>";
    } else {
        echo "<script>alert('Unfortunately, Your account was not created.')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
    }
}
?>

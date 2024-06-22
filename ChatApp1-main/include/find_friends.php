<!DOCTYPE html>
<?php
include("connection.php");
include("find_friends_script.php");
include("header.php");

// Check if session is not started, then start it
if (!isset($_SESSION)) {
    session_start();
}

// Redirect to signin.php if user is not logged in
if (!isset($_SESSION['user_email'])) {
    header("location: signin.php");
    exit(); // Exit after redirection
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for friends</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/find_friends.css">
</head>

<body>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <form class="search_form" action="">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_query" placeholder="Search Friends" autocomplete="off" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search_btn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <?php search_user(); ?>
        </div>
    </div>
</body>

</html>

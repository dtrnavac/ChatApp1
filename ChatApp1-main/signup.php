<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signup.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
    </style>
</head>
<body>
    
    <div class="signup-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Fill out this form and start chatting with your friends</p>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input class="form-control" type="text" name="user_name" placeholder="Example: Ivan" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" type="password" name="user_pass" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="email" name="user_email" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <select class="form-control" name="user_country" required>
                    <option disabled="" selected>Select a Country</option>
                    <option>Serbia</option>
                    <option>France</option>
                    <option>Great Britain</option>
                    <option>Germany</option>
                    <option>Croatia</option>
                    <option>Hungary</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Gender</label>
                <select class="form-control" name="user_gender" required>
                    <option disabled="" selected>Select a Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Name of your first best friend</label>
                <input class="form-control" type="text" name="bf_name" placeholder="Your first best friend's name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="checkbox-inline" for=""><input type="checkbox" required> I accept the <a href="#">Terms of use</a> &amp <a href="#">Privacy policy</a></label>
            </div>

            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
            </div>
            <?php include("signup_user.php");?>
        </form>
        <div class="text-center small" style="color:#67428B;">Already signed up? <a href="signin.php">Sign in here</a></div>
    </div>
</body>
</html>

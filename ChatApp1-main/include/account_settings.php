<?php
include("../include/connection.php");
include("../include/header.php");

// Check if session is set
if (!isset($_SESSION)) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("location: signin.php");
    exit();
}

// Handle form submission for updating user information
if (isset($_POST['save'])) {
    // Fetch form data
    $user = $_SESSION['user_email'];
    $user_name = $_POST['u_name'];
    $user_email = $_POST['u_email'];
    $user_country = $_POST['u_country'];
    $user_gender = $_POST['u_gender'];

    // Validation
    $errors = array();

    // Check for username
    if (empty($user_name)) {
        $errors[] = "Username is required";
    } elseif (strlen($user_name) > 25) {
        $errors[] = "Username cannot exceed 25 characters";
    }

    // Check for email
    if (empty($user_email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } elseif (strlen($user_email) > 25) {
        $errors[] = "Email cannot exceed 25 characters";
    }

    // If there are no validation errors, proceed to update the user information
    if (empty($errors)) {
        // Check if the new email is already taken
        $check_email_query = "SELECT * FROM users WHERE user_email='$user_email' AND user_email <> '$user'";
        $run_check_email = mysqli_query($con, $check_email_query);

        if (mysqli_num_rows($run_check_email) > 0) {
            $errors[] = "Email already exists. Please choose a different email.";
        } else {
            // Update user information
            $update_user = "UPDATE users SET user_name='$user_name', user_email='$user_email', user_country='$user_country', user_gender='$user_gender' WHERE user_email='$user'";
            $run_update = mysqli_query($con, $update_user);

            if ($run_update) {
                $_SESSION['user_email'] = $user_email; // Update session email if it changes

                echo "<script>alert('User information updated successfully.')</script>";
                echo "<script>window.open('account_settings.php', '_self')</script>";
            } else {
                echo "<script>alert('Failed to update user information. Please try again.')</script>";
            }
        }
    }

    // Display validation errors if any
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error')</script>";
        }
    }
}

// Fetch user data for displaying in form
$user = $_SESSION['user_email'];
$get_user = "SELECT * FROM users WHERE user_email='$user'";
$run_user = mysqli_query($con, $get_user);

if ($run_user) {
    $row = mysqli_fetch_array($run_user);

    if ($row) {
        $user_name = $row['user_name'];
        $user_pass = $row['user_pass'];
        $user_email = $row['user_email'];
        $user_profile = $row['user_profile'];
        $user_country = $row['user_country'];
        $user_gender = $row['user_gender'];
    } else {
        die("User not found in database."); // Handle the case where user is not found
    }
} else {
    die("Error fetching user details: " . mysqli_error($con)); // Handle query execution error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/account_settings.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <form action="" method="post">
                    <table class="table table-bordered table-hover">
                        <tr align="center">
                            <td colspan="6" class="active">
                                <h2>Change Account Settings</h2>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Change Your Username</td>
                            <td>
                                <input type="text" name="u_name" class="form-control" required maxlength="25" value="<?php echo isset($user_name) ? $user_name : ''; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Change Your Email</td>
                            <td>
                                <input type="email" name="u_email" class="form-control" required maxlength="25" value="<?php echo isset($user_email) ? $user_email : ''; ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Country</td>
                            <td>
                                <select class="form-control" name="u_country">
                                    <option value="<?php echo isset($user_country) ? $user_country : ''; ?>"><?php echo isset($user_country) ? $user_country : ''; ?></option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="France">France</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Hungary">Hungary</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight: bold;">Gender</td>
                            <td>
                                <select class="form-control" name="u_gender">
                                    <option value="<?php echo isset($user_gender) ? $user_gender : ''; ?>"><?php echo isset($user_gender) ? $user_gender : ''; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                <div class="form-group">
                                    <input type="submit" name="save" class="btn btn-primary" value="Save">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                <div class="form-group">
                                    <a href="change_password.php" class="btn btn-primary">Change Password</a>
                                </div>
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

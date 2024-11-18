<?php
    include 'koneksi.php';
    session_start();

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($koneksi, $_POST['name']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $pass = mysqli_real_escape_string($koneksi, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($koneksi, md5($_POST['cpassword']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/'.$image;

        $select = mysqli_query($koneksi, "SELECT * FROM `akun` WHERE email = '$email' AND password = '$pass'") or die ('query failed');

        if (mysqli_num_rows($select) > 0) {
            $message[] = 'user already exist';
        } else {
            if ($pass != $cpass) {
                $message[] = 'confirm password not matched!';
            } elseif ($image_size > 2000000) {
                $message[] = 'image size is too large!';
            } else {
                $insert = mysqli_query($koneksi, "INSERT INTO `akun` (name, email, password, image) VALUES ('$name', '$email', '$pass', '$image')") or die ('query failed');

                if ($insert) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'registered successfully!';
                    header('location:index.php');
                } else {
                    $message[] = 'registeration failed!';
                }
            }
        }
    }

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $pass = mysqli_real_escape_string($koneksi, md5($_POST['password']));

        $select = mysqli_query($koneksi, "SELECT * FROM `akun` WHERE email = '$email' AND password = '$pass'") or die ('query failed');

        if (mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['id_akun'];
            header('location:home.php');
        } else {
            $message[] = 'user already exist';
        }
    }

    if (isset($_POST['forgot'])) {
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $new_pass = mysqli_real_escape_string($koneksi, md5($_POST['new_password']));
        $confirm_pass = mysqli_real_escape_string($koneksi, md5($_POST['confirm_password']));

        if (!empty($new_pass) || !empty($confirm_pass)) {
            if ($new_pass != $confirm_pass) {
                $message[] = 'Confirm Password Not Matched!';
            } else {
                mysqli_query($koneksi, "UPDATE `akun` SET password = '$confirm_pass' WHERE id_akun") or die ('query failed');
                $message[] = 'Password Updated Succesfully!';
            } 
        } 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../DashboardAku/assets/css/style-login.css">
</head>
<body>
    <div class="wrapper">
        <!-- Login Form -->
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <?php
                    if (isset($message)) {
                        foreach ($message as $message) {
                            echo '<div class="message">'.$message.'</div>';
                        }
                    }
                ?>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">Remember Me
                    </label>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? 
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="name" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="cpassword" required>
                    <label>Confirm Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="image"></ion-icon>
                    </span>
                    <input id="file-upload" name="image" type="file" accept="image/jpg, image/jpeg, image/png">
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">I agree to the terms & conditions
                    </label>
                </div>
                <button type="submit" class="btn" name="submit">Register</button>
                <div class="login-register">
                    <p>Already have an account? 
                        <a href="index.php" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Forgot Password Form -->
        <div class="form-box forgot">
            <h2>Forgot Password</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <?php
                    if (isset($message) && is_array($message)) {
                        foreach ($message as $message) {
                            echo '<div class="message">' . htmlspecialchars($message) . '</div>';
                        }
                    }                    
                ?>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email Address</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="new_password" required>
                    <label>New Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="confirm_password" required>
                    <label>Confirm Password</label>
                </div>
                <button type="submit" class="btn" name="forgot">Reset Password</button>
                <div class="login-forgot">
                    <p> 
                        <a href="index.php" class="login-link">Back</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="../DashboardAku/assets/js/script-login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

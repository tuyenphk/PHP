<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>
<?php
    if (isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
    //     $error = [
    //         'username' => '',
    //         'email' => '',
    //         'password' => ''
    //     ];

    //     if (strlen($username) < 4){
    //         $error['username'] = 'Username needs to be longer';
    //     }
    //     if ($username == ''){
    //         $error['username'] = 'Username can not be empty';
    //     }
    //     if (username_exists($username)){
    //         $error['username'] = 'Username already exists, please pick another one';
    //     } 

    //     if ($email = ''){
    //         $error['email'] = 'Email can not be empty';
    //     }
    //     if (email_exists($email)){
    //         $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';
    //     }

    //     if ($password = ''){
    //         $error['password'] = 'Password can not be empty';
    //     }

    //     foreach ($error as $key => $value){
    //         if (empty($value)){
    //             unset($error[$key]);
    //         }
    //     }

    //     if (empty($error)){
    //         register_user($username, $email, $password);
    //     }

    // }

        if (!empty($username) && !empty($email) && !empty($password)){
            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);
            
            // Password Encryption
            $hashFormat = "$2y$10$";
            $salt = "iusesomecrazystrings22";
            $hashF_and_salt = $hashFormat . $salt;
            $password = crypt ($password, $hashF_and_salt);

            $query = "INSERT INTO users(user_name, user_email, user_password, user_role) ";
            $query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber') ";
            $register_user_query = mysqli_query($connection, $query);
            confirmQuery($register_user_query);

            $message = "Your Registration has been submitted";
        } 
        else {
            $message = "Fields cannot be empty";
        }
    } else {
        $message = "";
    }
?>

    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                        <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="on">
                                <h6 class="text-center"><?php echo $message; ?></h6>
                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" 
                                       autocomplete="on" value="<?php echo isset($username) ? $username : ''; ?> ";
                                    >
                                   
                                   
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                                        autocomplete="on" value="<?php echo isset($email) ? $email : ''; ?> ";
                                    >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                   
                                </div>
                        
                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>
                        
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>

        <hr>

<?php include "includes/footer.php";?>

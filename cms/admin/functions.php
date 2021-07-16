
<?php
    function confirmQuery($result){
        global $connection;
        if (!$result){
            die ("Post Query failed" . mysqli_error($connection));
        } 
    }

    function redirect($location){
        header("Locations: " . $location);
        exit;
    }

    function ifItIsMethod($method=null){
        if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
            return true;
        } 
        return false;
    }

    function isLoggedIn(){
        if (isset($_SESSION['user_role'])){
            return true;
        }
        return false;
    }

    function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
        if (isLoggedIn()){
            redirect($redirectLocation);
        }
    }

    function insert_categories(){
        global $connection;
        if (isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if ($cat_title == "" || empty($cat_title)){
                echo "This field should not be empty";
            } else {
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE ('{$cat_title}') ";

                $create_category = mysqli_query($connection, $query);
                if (!$create_category){
                    die ("failed added category" . mysqli_connect($connection));
                }
            }
        }
    }

    function findAllCategories(){
        global $connection;
        $query = "SELECT * FROM categories ";
        $select_categories = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            echo "<td>{$cat_id}</td>"; 
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>"; 
        }
    }

    function deleteCategories(){
        global $connection;
        if (isset($_GET['delete'])){
            $cat_id_delete = $_GET['delete'];

            $query = "DELETE FROM categories WHERE cat_id= {$cat_id_delete} ";
            $delete_category = mysqli_query($connection, $query);

            // Refresh the page when sending request
            header("Location: categories.php");
        }
    }

    function users_online(){
        // if (isset($_GET['onlineusers'])){
            global $connection;
            // if (!$connection){
                // session_start();
                // include("../includes/db.php");

                $session = session_id();
                $time = time();
                $tim_out_in_seconds = 05;
                $time_out = $time - $tim_out_in_seconds;
    
                $query = "SELECT * FROM users_online WHERE session = '$session' ";
                $send_query = mysqli_query($connection, $query);
                $count = mysqli_num_rows($send_query);
    
                if ($count == NULL){
                    mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
                } else {
                    mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session' ");
                }
                $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out' ");
                echo $count_user = mysqli_num_rows($users_online_query);
            // }
        // } //get request isset()
    }

    users_online();

    function escape($string){
        global $connection;
        return mysqli_real_escape_string($connection, trim(strip_tags($string)));

    }

    function isAdmin($username){
        global $connection;
        $query = "SELECT user_role FROM users WHERE user_name = '$username' ";
        $result = mysqli_query($connection, $query);
        confirmQuery($result);

        $row = mysqli_fetch_array($result);
        if ($row['user_role'] == 'admin'){
            return true;
        } else {
            return false;
        }
    }

    function username_exists($username){
        global $connection;

        $query = "SELECT user_name FROM users WHERE user_name = '$username' ";
        $result = mysqli_query($connection, $query);
        confirmQuery($result);

        if (mysqli_num_rows($result) > 0){
            return true;
        } else {
            return false;
        }
    }

    function email_exists($email){
        global $connection;

        $query = "SELECT user_email FROM users WHERE user_email = '$email' ";
        $result = mysqli_query($connection, $query);
        confirmQuery($result);

        if (mysqli_num_rows($result) > 0){
            return true;
        } else {
            return false;
        }
    }

    function register_user($username, $email, $password){
        global $connection;

        if (!empty($username) && !empty($email) && !empty($password)){
            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);
    
            // $query = "SELECT randSalt FROM users ";
            // $select_randsalt_query = mysqli_query($connection, $query);
            // confirmQuery($select_randsalt_query);
    
            // $row = mysqli_fetch_array($select_randsalt_query);
            // $salt = $row['randSalt'];
            // $password = crypt($password, $salt);

            // $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            
             // Password Encryption
            $hashFormat = "$2y$10$";
            $salt = "iusesomecrazystrings22";
            $hashF_and_salt = $hashFormat . $salt;
            $password = crypt ($password, $hashF_and_salt);
    
            $query = "INSERT INTO users(user_name, user_email, user_password, user_role) ";
            $query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber') ";
            $register_user_query = mysqli_query($connection, $query);
            confirmQuery($register_user_query);

            // $message = "Your Registration has been submitted";
        } 
        // else {
        //     $message = "Fields cannot be empty";
        // }
    }

    function login_user($username, $password){
        global $connection;

        $username = trim($username);
        $password = trim($password);
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);
        confirmQuery($select_user_query);

        while ($row = mysqli_fetch_array($select_user_query)){
            $db_user_id = $row['user_id'];
            $db_username = $row['user_name'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
        }
        // $password = crypt($password, $db_user_password);

        if ($username !== $db_username && $password !== $db_user_password){
            header("Location: ../index.php");
        } else if ($username == $db_username && $password == $db_user_password){
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;

            header ("Location: ../admin");
        } else {
            header("Location: ../index.php");
        }
    }
?>
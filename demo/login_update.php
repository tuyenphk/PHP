<?php include "db.php"; ?>
<?php include "function.php"; ?>
<?php
    if (isset($_POST['submit'])){
        updateTable();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <div class="col-xs-6">
            <form action="login_update.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control ">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control ">
                </div>
                <div class="form-group">
                    <select name="id" id="">
                        <?php 
                            showAllData();
                        ?>
                    </select>
                </div>
                <input class="btn-primary" type="submit" name="submit" value="UPDATE">
            </form>
        </div>
    </div>
</body>
</html>
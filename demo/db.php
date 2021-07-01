<!-- // Connect database -->
<?php 
    $connect = mysqli_connect('localhost', 'root', '', 'loginapp');
    if ($connect){
        echo "We are connected";
    } else {
        die ("Database connection failed");
    }
?>
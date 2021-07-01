<?php include "db.php";
    function showAllData(){
        global $connect;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connect, $query);
        if (!$result){
            die ('Query failed!' . mysqli_error($connect));
        }

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            echo "<option value=''>$id</option>";
        }
    }

    function updateTable (){
        global $connect;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id  ";
        // $query .= "username = '$username', ";
        // $query .= "password = '$password' ";
        // $query .= "WHERE id = $id ";

        $result = mysqli_query($connect, $query);
        if (!$result){
            die ('Query failed' . mysqli_error($connect));
        }
    }

    function deleteRows (){
        global $connect;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "DELETE FROM users, ";
        $query .= "WHERE id = '$id' ";

        $result = mysqli_query($connect, $query);
        if (!$result){
            die ('Query failed' . mysqli_error($connect));
        }
    }
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        
        <?php 
            $query = "SELECT * FROM users ";
            $select_users = mysqli_query($connection, $query);
    
            while ($row = mysqli_fetch_assoc($select_users)){
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];

                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$user_name</td>";
                echo "<td>$user_firstname</td>";

                // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                // $edit_categories = mysqli_query($connection, $query);

                // while ($row = mysqli_fetch_assoc($edit_categories)){
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];

                //     echo "<td>{$cat_title}</td>";
                // }

                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_role</td>";

                // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                // $select_post_id_query = mysqli_query($connection, $query);
                // while ($row = mysqli_fetch_assoc($select_post_id_query)){
                //     $post_id = $row['post_id'];
                //     $post_title = $row['post_title'];

                //     echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                // }
                
                echo "<td><a href='comments.php?approve='>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove='>Unapprove</a></td>";
                echo "<td><a href='comments.php?delete='>Delete</a></td>";
                echo "</tr>";
            }
        
        ?>

    </tbody>
</table>

<?php
    // approve comment status
    if (isset($_GET['approve'])){
        $approve_comment = $_GET['approve'];

        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment ";
        $approve_query = mysqli_query($connection, $query);

        // refresh the comments page when delete it
        header("Location: comments.php");
    }

    // unapprove comment status
    if (isset($_GET['unapprove'])){
        $unapprove_comment = $_GET['unapprove'];

        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment ";
        $unapprove_query = mysqli_query($connection, $query);

        // refresh the comments page when delete it
        header("Location: comments.php");
    }

    // delete comment
    if (isset($_GET['delete'])){
        $delete_comment = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id={$delete_comment} ";
        $delete_query = mysqli_query($connection, $query);

        // refresh the comments page when delete it
        header("Location: comments.php");
    }

?>
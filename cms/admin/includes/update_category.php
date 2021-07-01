<!-- Edit and Update category -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php 
            if (isset($_GET['edit'])){
                $cat_id_edit = $_GET['edit'];

                $query = "SELECT * FROM categories WHERE cat_id = $cat_id_edit ";
                $edit_categories = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($edit_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

        ?>
            <input value="<?php if (isset($cat_title)){ echo $cat_title; }?>" type="text" class="form-control" name="cat_title">
        <?php }} ?>
        
        <!-- update query -->
        <?php 
            if (isset($_POST['update_category'])){
                $cat_id_update = $_POST['cat_title'];

                $query = "UPDATE categories SET cat_title = '{$cat_id_update}' WHERE cat_id= {$cat_id} ";
                $update_category = mysqli_query($connection, $query);

                if (!$update_category){
                    die ("Update query failed" . mysqli_error($connection));
                }
            }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>
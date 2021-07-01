<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	<form action="7.php" method="post">
		Username: <input type="text" name="username" placeholder="Enter your username"> <br>
		Password: <input type="text" name="password" placeholder="Enter your password"> <br>
		<input type="submit" name="submit" value="SUBMIT">
	</form>
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data

*/
		if (isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			// if ($username & $password){
			// 	echo "Fill in completed";
			// }

			$connect = mysqli_connect ('localhost', 'root', '', 'loginapp');
			if ($connect){
				echo 'Database connected';
			} else {
				die ('Database failed connect');
			}

			$query = 'INSERT INTO users(username, password)';
			$query .= "VALUES ('$username', '$password')";
			$result = mysqli_query($connect, $query);
			if (!$result){
				die ('Query failed!' . mysqli_error($connect));
			}
		}
	
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>

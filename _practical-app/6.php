
<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">
		
		<?php Navigation();?>
			
		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	<form action="6.php" method="post">
		<input type="text" name="name" placeholder="Enter your name"> <br>
		<input type="text" name="password" placeholder="Enter your password"> <br>
		<input type="submit" name="submit" value="SUBMIT">
	</form>

	<?php  

/*  Step1: Make a form that submits one value to POST super global
 */
		// echo $_POST["name"];
		// echo "<br>";
		// echo $_POST["password"];

		if (isset($_POST['submit'])){
			$name = $_POST['name'];
			$password = $_POST['password'];
			if (strlen($name) < 5){
				echo "Name has to be longer than 5";
			} else {
				echo $_POST['name'];
			}
		}
	?>


</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>
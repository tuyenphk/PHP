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
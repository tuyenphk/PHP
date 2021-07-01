<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */
	$num = 1;
	if ($num > 0){
		echo "Hi <br>";
	} else if ($num <2){
		echo "Hello";
	} else {
		echo "I love PHP";
	}


	for ($i=0; $i<10; $i++){
		echo $i;
	}
	

	$index = 5;
	switch($index){
		case 24:
			echo "<br> Love";
			break;
		case 5:
			echo "<br> Hate";
			break;
	}
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>
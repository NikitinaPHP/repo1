<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/css.css">
	<script src="js/ajax.js"></script>
</head>
<body>
<?php 
	include_once('pages/functions.php');
 ?>

<div class="bodi">
<div class="mainslider-place"></div>



<nav class="navbar navbar-inverse">
<div class="container-fluid">

	<?php 
		include_once("pages/menu.php");
	 ?>
</div>
</nav>

<div class="mainslider-place"></div>

<div class="white-block">
  	<div class="white-block-conteiner">
    	<div class="white-block-top-shadow"></div>
   		 <div class="white-block-bottom-shadow"></div> 
		<section class="content">
	<?php 
		if(isset($_GET['page'])){
			$page=$_GET['page'];

			if($page==1) include_once("pages/tours.php");
			if($page==2) include_once("pages/admin.php");
			if($page==3) include_once("pages/rewiew.php");
			if($page==4) include_once("pages/register.php");
		}
	 ?>
		</section>
	</div>	
</div>




<div class="mainslider-place"></div>



<div class="footer">
  	<div class="footer-conteiner">
      
   <p><img src="images/pat_copy_bot.png" alt=""></p>
    
	</div>
</div>

</div>


</body>
</html>
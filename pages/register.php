<form action="index.php?page=4" method="post">

<div class="css">
	<div class="form-group">
		<label>Enter your name:</label>
			<input type="text" name="login" class="form-control">
	</div>

	<div class="form-group">
		<label>Enter your password:</label>
			<input type="password" name="pass" class="form-control">
	</div>

	<input type="checkbox" name="cb1">&nbsp;Registration

	<div class="form-group">
		<label>Confirm pass:</label>
			<input type="password" name="pass2" class="form-control">
	</div>

	<div class="form-group">
		<label>Enter your e-mail:</label>
			<input type="email" name="email" class="form-control">
	</div>



<input type="submit" name="reg" class="btn btn-primary" value="Add User">
</form>
</div>

<?php 

include_once('pages/functions.php');

	if(isset($_REQUEST['reg']))
	{
		if(isset($_REQUEST['cb1']))
		{

		}
		else
		{

		}
	}






 ?>
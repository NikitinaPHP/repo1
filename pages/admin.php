<div class = "row">
	<div class = "left col-md-6 col-sm-6 col-lg-6">
		<?php 




$ins1 = 'insert into Countries(country) values ("Argentina")';

connect();

$sel = 'select * from Countries';
$res = mysql_query($sel);

echo '<form action = "index.php?page=2" method = "post">';
echo '<table width = "30%" align = "center">';

while ($row = mysql_fetch_array($res, MYSQL_NUM))
	{
		echo '<tr>';
		echo '<td>'.$row[0].'</td><td>'.$row[1].'</td>';
		echo '<td><input type = "checkbox" name = "cb'.$row[0].'"></td>';
		echo '</tr>';
	}
echo '</table>';

mysql_free_result($res);//очищаем память


echo '<input type = "text" name = "country">';
echo '<input type = "submit" name = "add_country" value = "AddCountry">';
echo '<input type = "submit" name = "del_country" value = "DelCountry">';
echo '</form>';

if (isset($_POST['add_country']))
{
	$country = trim(htmlspecialchars($_POST['country']));

	if ($country == "") exit();
	$ins = 'insert into Countries (country) values ("'.$country.'")';

	mysql_query($ins);

	//header("Location: index.php?page=2");


	echo '<script>window.location.href = document.URL;</script>';

}



if(isset($_POST['del_country']))
{
	foreach($_POST as $k => $v)
	{
		if(substr($k, 0, 2) == "cb")
		{
			$idc = substr($k,2);
			$del = 'delete from countries where id = '.$idc;
			mysql_query($del);
		}
	}

	echo '<script>window.location.href = document.URL;</script>';
}

?>

	</div>
	
	<div class = "right col-md-6 col-sm-6 col-lg-6">

<?php 
			echo '<form action = "index.php?page=2" method = "post">';
$sel = 'select ci.id, ci.city, co.country from cities ci, countries co where ci.country_id = co.id';
$res = mysql_query($sel);

echo '<table width = "30%" align = "center">';

while($row = mysql_fetch_array($res, MYSQL_NUM))
{
	echo '<tr>';
	echo '<td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td>';
	echo '</tr>';
}
echo '</table>';

mysql_free_result($res);
$res = mysql_query('select * from Countries');

echo '<select name = "country_name">';

while($row = mysql_fetch_array($res, MYSQL_NUM))
{
	echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
echo '</select>';

echo '<input type = "text" name = "city">';
echo '<input type = "submit" name = "AddCity" value = "AddCity">';
echo '</form>';

if(isset($_POST['AddCity']))
{
	$city = trim(htmlspecialchars($_POST['city']));
	if($city == "") exit();
	$country_id = $_POST['country_name'];

	$ins = 'insert into cities (city, country_id) values ("'.$city.'", '.$country_id.')';
	mysql_query($ins);

	echo '<script>window.location.href = document.URL;</script>';
}





?>


	</div>
</div>



<div class="row">

<?php

echo '<input type = "text" name = "hotel">';
echo '<input type = "submit" name = "AddHotel" value = "AddHotel">';
echo '</form>';


	if(isset($_POST['AddHotel']))
{
	$hotel = trim(htmlspecialchars($_POST['hotel']));
	if($hotel == "") exit();
	$hotel_id = $_POST['hotel_name'];

	$ins = 'insert into hotels (hotel, hotel_id) values ("'.$hotel.'", '.$hotel_id.')';
	mysql_query($ins);

	echo '<script>window.location.href = document.URL;</script>';
}
?>

</div>


<div class="row">



<form action = "index.php?page=2" method="post" enctype = "multipart/form-data">

<select name="hotel_id">

<?php

$sel = 'select ho.id, co.country, ci.city, ho.hotel 
from countries co, cities ci, hotels ho 
where co.id = ho.country_id and 
ci.id = ho.city_id 
order by co.country';

$res = mysql_query($sel);
while($row = mysql_fetch_array($res, MYSQL_NUM))
{
	echo '<option value = "'.$row[0].'">';
	echo $row[1].'&nbsp;&nbsp;'.$row[2].'&nbsp;&nbsp;'.$row[3].'</option>';
}
mysql_free_result($res);

?>
</select>

<iput type= ="file" name = "file[]" multiple accept = "image/*">
<input type = "submit" name = "AddImage" value = "AddImage">
</form>

<?php 

if(isset($_REQUEST['addImage']))
{
	foreach($_FILES['file'] [name] as $k=>$v)
	{
		if($_FILES['file']['error'] [$k] !=0)
			{
				echo '<script>allert("Wrong file size:'.$v.'")</script>'; 
				continue;
			}

		if(move_uploaded_file($_FILES['file'] ['tmp_name'] [$k], 'images/'.$v))
		{
			$ins = 'insert into images(hotel_id, image_path)values ('.$_REQUEST['hotel_id'].', "images/'.$v.'")';
			mysql_query($ins);
		}
	}

}



 ?>
</div>









 
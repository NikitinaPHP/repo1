<?php 	

include_once("functions.php");
$ho_id = $_POST['hid'];
$res = mysql_query('select id, hotel, stars, cost from hotels where city_id = '.$ho_id);
echo '<table align = "center" class = "table table-stripped">';

echo '<tr><th>Hotel</th><th>Stars</th><th>Cost</th><th>Info</th></tr>';

while($row=mysql_fetch_array($res, MYSQL_NUM))
{
	echo '<tr>';
	echo '<td>'.$row[1].'</td><td>'.$row[2].'</td>';
	echo '<td>'.$row[3].'</td><td><a target="blank" href="hotelinfo.php?ho_id='.$row[0].'">...</a></td>';
	echo '</tr>';
}

echo '</table>';
mysql_free_result($res);













 ?>
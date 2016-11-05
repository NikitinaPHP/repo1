<?php 

include_once('functions.php');
connect();
$co_id = $_GET['co_id'];
$sel = 'select * from cities where country_id='.$co_id;
$res = mysql_query($sel);

echo '<select name="city_id" onclick="showHotels(this.value)">';

while($row = mysql_fetch_array($res, MYSQL_NUM))
{
	echo '<tr><td>'.$row[1].'</td></tr>';
}
echo '</select>';

mysql_free_result($res);


 ?>
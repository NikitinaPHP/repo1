<?php 
connect();
echo '<select name="country_id" id="country_id" onchange = "showCities(this.value)">';


$res = mysql_query("select * from countries");

while($row = mysql_fetch_array($res, MYSQL_NUM))
{
	echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
echo '</select>';

echo '<div id="city_list"></div>';


echo '<div id="hotel_list"></div>';


 ?>
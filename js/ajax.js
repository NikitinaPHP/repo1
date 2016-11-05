function showCities(country_id)
{
	if(country_id=="")
	{
		document.getElementById('city_list').innerHTML="";
		exit();
	}
	if(window.XMLHttpRequest)
	{
		ao = new XMLHttpRequest();
	}
	else
	{
		ao = new ActiveXObject('Microsoft.XMLHTTP');
	}

	ao.onreadystatechange = function()
	{
		if(ao.readyState==4 && ao.status==200)
		{
			document.getElementById('city_list').innerHTML = ao.responseText;
		}
	}

	ao.open("GET", "pages/ajax1.php?co_id="+country_id, true);
	ao.send(null);

}


function showHotels(city_id)
{
	alert (city_id);
	if (city_id = "")
	{
		document.getElementById('hotel_list').innerHTML="";
		exit();
	}

	if(window.XMLHttpRequest)
	{
		ao = new XMLHttpRequest();
	}
	else
	{
		ao = new ActiveXObject('Microsoft.XMLHTTP');
	}

	ao.onreadystatechange = function()
	{
		if(ao.readyState==4 && ao.status==200)
		{
			document.getElementById('city_list').innerHTML = ao.responseText;
		}
	}

	//ao.open("GET", "pages/ajax2.php?ho_id="+city_id, true);
	ao.open("POST","pages/ajax2.php", true);
	ao.setRequestHeader("Conteny-Type", "application/x-www-form-urlencoded");
	ao.send("ho_id ="+ city_id);

}
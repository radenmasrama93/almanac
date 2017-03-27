<?php
	 $json_string3 = file_get_contents("http://api.wunderground.com/api/59aff698dad25e5b/almanac/q/ID/Semarang.json");
	$json_string1 = file_get_contents("http://api.wunderground.com/api/59aff698dad25e5b/astronomy/q/IA/Mugas.json");
	$json_string2 = file_get_contents("http://api.wunderground.com/api/59aff698dad25e5b/planner_07010731/q/IA/Mugas.json");
	
	$parsed_json1 = json_decode ($json_string1);
	$parsed_json2 = json_decode ($json_string2);
	$parsed_json3 = json_decode ($json_string3);
	
	
	$ageOfMoon = $parsed_json1->{'moon_phase'}->{'ageOfMoon'};
	$sunrise = $parsed_json1->{'moon_phase'}->{'sunrise'}->{'hour'};
	$sunset = $parsed_json1->{'moon_phase'}->{'sunset'}->{'hour'};
	
	$min = $parsed_json2->{'trip'}->{'temp_high'}->{'min'}->{'C'};
	$max = $parsed_json2->{'trip'}->{'temp_high'}->{'max'}->{'C'};
	$avg = $parsed_json2->{'trip'}->{'temp_high'}->{'avg'}->{'C'};
	
	$negara = $parsed_json3->response->results[0]->country_name;
  	$kota = $parsed_json3->response->results[0]->city;
	
	
	echo "Pada daerah Mugas, dapat diketahui bahwa : ";
	echo "<br>";
	echo "Umur bulan : ${ageOfMoon}\n";
	echo "<br>";
	echo "Sunrise pada pukul : ${sunrise}\n";
	echo "<br>";
	echo "Sunset pada pukul : ${sunset}\n";
	
	echo "<br>";
	
	echo "<br>";
	echo "Suhu ";
	echo "<br>";
	echo "Minimal : ${min}\n";
	echo "<br>";
	echo "Maximal : ${max}\n";
	echo "<br>";
	echo "Rata-rata : ${avg}\n";
	
	echo "<br>";
	echo "<br>";
	
	echo "Nama Negara : $negara<br>";
  	echo "Nama Kota : $kota<br>";
	//echo "Benua / ibu kota : ${benua}\n";
	
 $json_string = file_get_contents("http://api.wunderground.com/api/a70f437baf260ac4/geolookup/conditions/q/IA/Cedar_Rapids.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  echo "Current temperature in ${location} is: ${temp_f}\n";

  $stations = $parsed_json->{'location'}->{'nearby_weather_stations'}->{'pws'}->{'station'};
  $count = count($stations);
  for($i = 0; $i < $count; $i++)
  {
     $station = $stations[$i];
     if (strcmp($station->{'id'}, "KIACEDAR22") == 0)
     {
        echo "Neighborhood: " . $station->{'neighborhood'} . "\n";
        echo "City: " . $station->{'city'} . "\n";
        echo "State: " . $station->{'state'} . "\n";
        echo "Latitude: " . $station->{'lat'} . "\n";
        echo "Longitude: " . $station->{'lon'} . "\n";
        break;
     }
  }	
   
?>
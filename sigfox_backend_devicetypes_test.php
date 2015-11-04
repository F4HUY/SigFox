<?php

// url backend
$url = 'https://backend.sigfox.com/api/devicetypes'; // ask for device-types

// init, username & passwd
$curl = curl_init();
$login = 'xxxxxxxxxxxxxxxxxxxxxxxx'; // from your Api access
$pass = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // from your Api access

// set up
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPGET, true);

//curl_setopt($curl, CURLOPT_COOKIESESSION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY); // Need SSL
curl_setopt($curl, CURLOPT_USERPWD,"$login:$pass"); 

// store data
$data  = curl_exec ($curl);

// open file and write data
$fl = fopen('sigfoxData.json','a'); // write json file sigfoxData.json for test
{      fwrite($fl, $data);
       fclose($fl);
}
	 
// displaying data	 
$json_url = "http://yoururl/sigfoxData.json";
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
echo "<pre>";
print_r($data);
echo "</pre>";

curl_close($curl);
?> 
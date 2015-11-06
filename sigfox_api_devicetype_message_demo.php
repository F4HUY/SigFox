<style type="text/css">
body,td,th {
	color: #000;
}
body {
	background-color: #FFF;
}
</style>
<script>
 $(document).ready(function(){
 setInterval(function(){cache_clear()},6000);
 });
 function cache_clear()
{
 window.location.reload(true);
}
</script>
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
 
<p><strong>Device Type Infos:</strong></p>
<table width="500" height="179" border="1">
  <tr>
    <td width="90"><strong>
    Id</strong></td>
    <td width="365" height="23"><? echo "<pre>";
	echo $dt['data'][0]['id'];
	echo "</pre>";?></td>
  </tr>
  <tr>
    <td><strong>
    Name</strong></td>
    <td height="10"><? echo "<pre>";
	echo $dt['data'][0]['name'];
	echo "</pre>";?></td>
  </tr>
  <tr>
    <td><strong>
    Group</strong></td>
    <td height="10"><? echo "<pre>";
	echo $dt['data'][0]['group'];
	echo "</pre>";?></td>
  </tr>
  <tr>
    <td><strong>
    Description</strong></td>
    <td height="10">
    
	<? echo "<pre>";
	//echo $dt['data'][0]['description'];
	//echo "</pre>";
	?>

    </td>
  </tr>
  <tr>
    <td><strong>
    PayloadType</strong></td>
    <td height="10">
	<? echo "<pre>";
	echo $dt['data'][0]['payloadType'];
	echo "</pre>";?>
    </td>
  </tr>
  <tr>
    <td><strong>
    Contract</strong></td>
    <td height="23">

	<? echo "<pre>";
	//echo $dt['data'][0]['contract'];
	//echo "</pre>";?>

    </td>
  </tr>
  <tr>
    <td><strong>
    KeepAlive</strong></td>
    <td height="23"><? echo "<pre>";
	echo $dt['data'][0]['keepAlive'];
	echo "</pre>";?></td>
  </tr>
</table>

<?php

$url = 'https://backend.sigfox.com/api/devices/{device-id}/messages'; // put your device-id

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
$fl = fopen('sigfoxMsg.json','a'); // write json file sigfoxMsg.json for test
{      fwrite($fl, $data);
       fclose($fl);
}
	 
// displaying data	 
$json_url = "http://yoururl/sigfoxMsg.json";
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
echo "<pre>";
print_r($data);
echo "</pre>";

curl_close($curl);
?> 

<p><strong>Messages list (last message):</strong></p>
<table width="533" height="129" border="1">
  <tr>
    <td width="95" height="23"><strong> Device</strong></td>
    <td width="422" height="23"><? echo "<pre>";
	echo $dt['data'][0]['device'];
	echo "</pre>";?></td>
  </tr>
  <tr>
    <td height="23"><strong> Time</strong></td>
    <td height="23">
	<? echo "<pre>";
	echo $dt['data'][0]['time'];
	echo "</pre>";?>
    </td>
  </tr>
  <tr>
    <td height="10"><strong> Data</strong></td>
    <td height="10"><? echo "<pre>";
	echo $dt['data'][0]['data'];
	echo "</pre>";?></td>
  </tr>
  <tr>
    <td height="10"><strong> SNR</strong></td>
    <td height="10"><? echo "<pre>";
	echo $dt['data'][0]['snr'];
	echo "</pre>";?></td>
  </tr>
  <tr>
    <td height="23"><strong> Link Quality</strong></td>
    <td height="23"><? echo "<pre>";
	echo $dt['data'][0]['linkQuality'];
	echo "</pre>";?></td>
  </tr>
</table>

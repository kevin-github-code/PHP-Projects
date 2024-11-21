// root-point: https://jobs.dilla.co.mz/objects-iuo926np9c/wp/v2/


$url = "https://api.example.com/endpoint?key1=value1&key2=value2";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;

<?php
    echo "users";
?>
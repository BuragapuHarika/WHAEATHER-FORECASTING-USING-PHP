<?php
header("Content-Type: application/json");

$apiKey = "3b54ab434f797dc111ba0f07958203a3";  // Keep it secure
$city = isset($_GET['city']) ? $_GET['city'] : '';
$lat = isset($_GET['lat']) ? $_GET['lat'] : '';
$lon = isset($_GET['lon']) ? $_GET['lon'] : '';

if ($city) {
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid=$apiKey";
} elseif ($lat && $lon) {
    $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&appid=$apiKey";
} else {
    echo json_encode(["error" => "City or coordinates required"]);
    exit;
}

$response = file_get_contents($url);
echo $response;
?>

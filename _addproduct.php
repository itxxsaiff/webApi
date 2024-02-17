<?php


// API endpoint URL
$url = "http://localhost/Invenroty_system/_addProduct.php";


if(isset($_POST['type'])) {
    $productType = htmlspecialchars($_POST['type']);
} else {
    $productType = "";
}
$productName = htmlspecialchars($_POST['product_name']);
$productSKU = htmlspecialchars($_POST['product_sku']);
$productUnit = htmlspecialchars($_POST['unit']);
$productImage = $_FILES['product_image'];
$productWeight = htmlspecialchars($_POST['product_weight']);
$productLength = htmlspecialchars($_POST['product_length']);
$productHeight = htmlspecialchars($_POST['product_height']);
$productWidth = htmlspecialchars($_POST['product_width']);
$productBrand = htmlspecialchars($_POST['product_brand']);
$productManufacturere = htmlspecialchars($_POST['product_manufacturer']);
$productUCP = htmlspecialchars($_POST['product_upc']);
$productSPrice = htmlspecialchars($_POST['selling_price']);
$productSDesc = htmlspecialchars($_POST['selling_desc']);
$productSTax = htmlspecialchars($_POST['selling_Tax']);
$productCPrice = htmlspecialchars($_POST['cost_price']);
$productCDesc = htmlspecialchars($_POST['cost_desc']);
$productCTax = htmlspecialchars($_POST['cost_Tax']);
$productQty = htmlspecialchars($_POST['product_qty']);
$productOQty = htmlspecialchars($_POST['product_Openqty']);

// Initialize cURL session
$curl = curl_init($url);

// Data to be sent to the API
$data = array(
    'product_name' => $productName,
    'product_sku' => $productSKU,
    'product_image' => curl_file_create($productImage['tmp_name'], $productImage['type'], $productImage['name']),
    'selling_price' => $productSPrice,
    'cost_price' => $productCPrice,
    'unit' => $productUnit,
    'type' => $productType,
    'product_weight' => $productWeight,
    'product_length' => $productLength,
    'product_height' => $productHeight,
    'product_width' => $productWidth,
    'product_brand' => $productBrand,
    'product_manufacturer' => $productManufacturere,
    'product_upc' => $productUCP,
    'selling_desc' => $productSDesc,
    'selling_Tax' => $productSTax,
    'cost_desc' => $productCDesc,
    'cost_Tax' => $productCTax,
    'product_qty' => $productQty,
    'product_Openqty' => $productOQty
);




// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    $error = 'cURL error: ' . curl_error($curl);
    header("Location: index.php?error=" . urlencode($error));
} else {
    // Output API response
    if($response === 'Success'){
        header("Location: view.php");
    }
}

// Close cURL session
curl_close($curl);



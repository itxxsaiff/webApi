<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7ccea3ad0c.js" crossorigin="anonymous"></script>
    <title>API - Product</title>
</head>

<body class="bg-light">
    <!-- Header  -->
    <?php require "_header.php";
          if(isset($_GET['productID'])){
            $productID = $_GET['productID'];
        }else{
            header("Location: view.php");
        }
        $productData = file_get_contents("https://saif.ahklogix.com/Invenroty_system/__display_update_data.php?productID=$productID");
        if($productData){
          $data = json_decode($productData, true);
        }else{
          header("Location: view.php");
        }
      ?>

    <div class="container-fluid px-4 py-4">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Product Details - <?php echo $data['product_name'];  ?></h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-9 bg-white shadow shadow-lg p-4 mx-auto rounded-4">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="overviewBtn" onclick="hidehistory()" href="#overview">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="historyBtn" onclick="hideoverview()" href="#history">History</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row pt-4" id="overview">
                    <div class="col-6">
                        <div class="row mb-3">
                            <div class="col-12 text-left">
                                <h4>Primary Details</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-secondary">Item Name:</div>
                            <div class="col-8"> <?php echo $data['product_name'];  ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Type:</div>
                            <div class="col-8"> <?php echo empty($data['product_type']) ? 'null' : $data['product_type']; ?> </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item SKU:</div>
                            <div class="col-8"><?php echo empty($data['product_sku']) ? 'null' : $data['product_sku']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Unit:</div>
                            <div class="col-8"><?php echo empty($data['product_unit']) ? 'null' : $data['product_unit']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Weight:</div>
                            <div class="col-8"><?php echo empty($data['product_weight']) ? 'null' : $data['product_weight']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Length:</div>
                            <div class="col-8"><?php echo empty($data['product_length']) ? 'null' : $data['product_length']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Height:</div>
                            <div class="col-8"><?php echo empty($data['product_height']) ? 'null' : $data['product_height']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Width:</div>
                            <div class="col-8"><?php echo empty($data['product_width']) ? 'null' : $data['product_width']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Brand:</div>
                            <div class="col-8"><?php echo empty($data['product_brand']) ? 'null' : $data['product_brand']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item Manufacturer:</div>
                            <div class="col-8"><?php echo empty($data['product_manufacturer']) ? 'null' : $data['product_manufacturer']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Item UPC:</div>
                            <div class="col-8"><?php echo empty($data['product_upc']) ? 'null' : $data['product_upc']; ?></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row mb-3">
                            <div class="col-12 text-left">
                                <h4>Product View</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                Image:
                            </div>
                            <?php $productImagee = trim($data['product_image']);
                            if($productImagee == null){
                                $productImagee = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/832px-No-Image-Placeholder.svg.png';
                            }else{
                                $d="By";
                            }
                              ?>
                            <div class="col-9 mt-3 ms-4">
                                <img src="<?php echo $productImagee; ?>" class="img-fluid w-50" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <hr width="50%" class="mx-auto">
                    </div>
                    <div class="col-6 mt-5">
                        <div class="row mb-3">
                            <div class="col-12 text-left">
                                <h4>Purchase Information</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-secondary">Cost Price:</div>
                            <div class="col-8">PKR <?php echo $data['cost_price'];  ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Cost Description:</div>
                            <div class="col-8"><?php echo empty($data['cost_desc']) ? 'null' : $data['cost_desc'];  ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Cost Tax:</div>
                            <div class="col-8">PKR <?php echo empty($data['cost_tax']) ? 'null' : $data['cost_tax'];  ?></div>
                        </div>
                    </div>
                    <div class="col-6 mt-5">
                        <div class="row mb-3">
                            <div class="col-12 text-left">
                                <h4>Sale Information</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-secondary">Sales Price:</div>
                            <div class="col-8">PKR <?php echo $data['selling_price'];  ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Sales Description:</div>
                            <div class="col-8"><?php echo empty($data['selling_desc']) ? 'null' : $data['selling_desc'];  ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Sale Tax:</div>
                            <div class="col-8">PKR  <?php echo empty($data['selling_tax']) ? 'null' : $data['selling_tax'];  ?></div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <hr width="50%" class="mx-auto">
                    </div>
                    <div class="col-6 mt-5">
                        <div class="row mb-3">
                            <div class="col-12 text-left">
                                <h4>Quantity Info:</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-secondary">Product Quantity:</div>
                            <div class="col-8"> <?php echo $data['product_qty']; ?></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4 text-secondary">Product Opening Quantity:</div>
                            <div class="col-8"><?php echo $data['product_openqty']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4 d-none pt-3 pb-4" id="history">
                    <div class="col-2 text-secondary">
                        Item Create on:
                    </div>
                    <div class="col-3">
                    <?php echo $data['product_time']; ?>
                    </div>
                    <div class="col-2">
                        By Store's Owner
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const overview = document.querySelector("#overview");
        const history = document.querySelector("#history");
        const oBtn = document.querySelector("#overviewBtn");
        const hBtn = document.querySelector("#historyBtn");
        function hidehistory(){
            history.classList.add("d-none");
            overview.classList.remove("d-none");
            oBtn.classList.add("border");
            hBtn.classList.remove("border");
        }
        function hideoverview(){
            overview.classList.add("d-none");
            history.classList.remove("d-none");
            oBtn.classList.remove("border");
            hBtn.classList.add("border");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Api - Update Items</title>
</head>
<body class="bg-light">

    <!-- Header  -->
    <?php  require "_header.php";
        if(isset($_GET['productID'])){
            $productID = $_GET['productID'];
        }else{
            header("Location: view.php");
        }
    ?>


    <!-- Form  -->

    <div class="container-fluid py-5">
        <div class="row px-5">
            <div class="col-12 text-center">
                <h1 class="fw-bold">UPDATE ITEM</h1>
                <hr class="mx-auto mt-4" width="20%">
            </div>
            <div class="col-10 offset-1 mt-3 rounded-5 p-5 bg-white shadow shadow-lg">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-12 text-left">
                <h2>Basic Info</h2>
            </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 mt-3">
                            <div class="row">
                                <div class="col-3 d-flex">
                                    <p class="me-5 fs-5">Type: </p>
                                </div>
                                <div class="col-9">
                                    <input class="form-check-input" name="type" type="radio" id="" value="Goods" <?php if($rowfetch['product_type'] == 'Goods'){ echo 'checked';}  ?> >
                                    <label class="form-check-label ms-2 " for="">Goods</label>
                                    <input class="form-check-input ms-3" name="type" type="radio" id="" value="Services" <?php if($rowfetch['product_type'] == 'Services'){echo 'checked';}  ?>>
                                    <input type="number" hidden name="productID" value="<?php echo $productID; ?>">
                                    <label class="form-check-label ms-2 " for="">Services</label>
                                  </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="" class="text-danger fs-5">Name: *</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="product_name" class="form-control" value="<?php echo $rowfetch['product_name']; ?>" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="" class="fs-5">SKU:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="product_sku" class="form-control" value="<?php echo $rowfetch['product_sku']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="" class="text-danger fs-5">Unit: *</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-select" name="unit" required>
                                        <option <?php if($rowfetch['product_unit'] == 'box'){ echo 'selected';}  ?> value="box">box</option>
                                        <option <?php if($rowfetch['product_unit'] == 'cm'){ echo 'selected';}  ?>  value="cm">cm</option>
                                        <option <?php if($rowfetch['product_unit'] == 'lg'){ echo 'selected';}  ?>  value="lg">lg</option>
                                        <option <?php if($rowfetch['product_unit'] == 'g'){ echo 'selected';}  ?>  value="g">g</option>
                                        <option <?php if($rowfetch['product_unit'] == 'kg'){ echo 'selected';}  ?>  value="kg">kg</option>
                                        <option <?php if($rowfetch['product_unit'] == 'Inc'){ echo 'selected';}  ?>  value="Inc">Inc</option>
                                        <option <?php if($rowfetch['product_unit'] == 'ft'){ echo 'selected';}  ?>  value="ft">ft</option>
                                        <option <?php if($rowfetch['product_unit'] == 'km'){ echo 'selected';}  ?>  value="km">km</option>
                                        <option <?php if($rowfetch['product_unit'] == 'lb'){ echo 'selected';}  ?>  value="lb">lb</option>
                                      </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="" class="fs-5">Product Image: </label>
                                </div>
                                <?php
                                $productImage = trim($rowfetch['product_image']);
                                if($productImage == null){
                                    $productImage = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/832px-No-Image-Placeholder.svg.png';
                                }
                                 ?>
                                <div class="col-9">
                                    <img src="<?php echo $productImage; ?>" alt="" id="uploadedImage" class="img-fluid mb-3 w-25">
                                    <input type="file" onchange="displayImage(this)" class="form-control" name="product_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <hr class="mx-auto border border-3 border-dark" width="50%">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-left">
                            <h2>Others About Product</h2>
                        </div>
                        <div class="row mt-4">
                            <div class="col-1">
                                <label for="" class="fs-5">Weight:</label>
                            </div>
                            <div class="col-9">
                                <input type="number" name="product_weight" class="form-control" value="<?php echo $rowfetch['product_weight']; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-1">
                                <label for="" class="fs-5">Dimension:</label>
                            </div>
                            <div class="col-12 mt-3">
                               <div class="row ms-5">
                                    <div class="col-1">
                                        <label class="fs-6">Length:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" name="product_length" class="form-control"  value="<?php echo $rowfetch['product_length']; ?>">
                                    </div>
                               </div>
                               <div class="row ms-5 mt-2">
                                <div class="col-1">
                                    <label class="fs-6">Height:</label>
                                </div>
                                <div class="col-8">
                                    <input type="number" name="product_height" class="form-control"  value="<?php echo $rowfetch['product_height']; ?>">
                                </div>
                            </div>
                            <div class="row ms-5 mt-2">
                                <div class="col-1">
                                    <label class="fs-6">Width:</label>
                                </div>
                                <div class="col-8">
                                    <input type="number" name="product_width" class="form-control"  value="<?php echo $rowfetch['product_width']; ?>">
                                </div>
                           </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-1">
                                <label for="" class="fs-5">Brand:</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="product_brand" class="form-control"  value="<?php echo $rowfetch['product_brand']; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2">
                                <label for="" class="fs-5">Manufacturer:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="product_manufacturer" class="form-control" value="<?php echo $rowfetch['product_manufacturer']; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2">
                                <label for="" class="fs-5">UPC:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="product_upc" class="form-control"  value="<?php echo $rowfetch['product_upc']; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr class="mx-auto border border-3 border-dark mx-auto" width="50%">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-left">
                            <h2>Sales & Purchase Information</h2>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="" class="text-danger fs-5">Selling Price: *</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">PKR</span>
                                            <input type="number" class="form-control" name="selling_price" value="<?php echo $rowfetch['selling_price']; ?>" required>
                                          </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <label for="" class="fs-5">Description:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea name="selling_desc" id="" cols="20" rows="3" class="form-control" value="<?php echo $rowfetch['selling_desc']; ?>"></textarea>
                                          </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4">
                                            <label for="" class="fs-5">Tax:</label>
                                        </div>
                                        <div class="col-8">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">PKR</span>
                                                <input type="number" class="form-control" value="<?php echo $rowfetch['selling_tax']; ?>" name="selling_Tax">
                                              </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="" class="text-danger fs-5">Cost Price: *</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">PKR</span>
                                            <input type="number" class="form-control" value="<?php echo $rowfetch['cost_price']; ?>" name="cost_price" required>
                                          </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <label for="" class="fs-5">Description:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea name="cost_desc" id="" cols="20" rows="3" class="form-control" value="<?php echo $rowfetch['cost_desc']; ?>"></textarea>
                                          </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-4">
                                            <label for="" class="fs-5">Tax:</label>
                                        </div>
                                        <div class="col-8">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">PKR</span>
                                                <input type="number" class="form-control" value="<?php echo $rowfetch['cost_tax']; ?>" name="cost_Tax">
                                              </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <hr class="mx-auto border border-3 border-dark" width="50%">
                                </div>
                            </div>
                        </div>
                      <div class="row mt-4">
                        <div class="col-12 text-left">
                            <h2>Quantity</h2>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-2">
                                    <label for="" class="fs-5">Quantity:</label>
                                </div>
                                <div class="col-8">
                                    <input type="number" class="form-control" value="<?php echo $rowfetch['product_qty']; ?>" name="product_qty">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <label for="" class="fs-5">Opening quantity:</label>
                                </div>
                                <div class="col-8">
                                    <input type="number" class="form-control" value="<?php echo $rowfetch['product_openqty']; ?>" name="product_Openqty">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <button class="btn btn-dark px-5 py-2 w-100" type="button" id="addBTN">Update Product</button>
                                </div>
                            </div>
                            <div class="row mt-4">
                        <div class="col-12">
                            <hr class="mx-auto border border-3 border-dark" width="50%">
                        </div>
                    </div>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <script>
        function displayImage(input) {
        const selectedImage = document.getElementById('uploadedImage');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }

    const form = document.querySelector("form");
    const btn = document.querySelector("#addBTN");
    function formStop(e){
        e.preventDefault();
    }
    btn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("post", "_updateProduct.php", true);
        xhr.onload = () => {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(data.match("Error!")){
                       alert(data);
                    }else{
                        window.location.href = "items.php";
                    }
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
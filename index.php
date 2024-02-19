<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>API - Add Product</title>
</head>

<body class="bg-light">

    <!-- Header  -->
    <?php require "_header.php"; ?>
    <?php
if(isset($_GET['error']) && $_GET['error'] === 'true'){
    echo "<script>alert('Please give correct Inputs');</script>";
}
?>



    <!-- Form  -->

    <div class="container-fluid py-5">
        <div class="row px-5">
            <div class="col-12 text-center">
                <h1 class="fw-bold">ADD ITEM</h1>
                <hr class="mx-auto mt-4" width="20%">
            </div>
            <div class="col-10 offset-1 mt-3 rounded-5 p-5 bg-white shadow shadow-lg">
                <form action="_addproduct.php" method="post" enctype="multipart/form-data">
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
                                    <input class="form-check-input" name="type" type="radio" id="" value="Goods">
                                    <label class="form-check-label ms-2 " for="">Goods</label>
                                    <input class="form-check-input ms-3" name="type" type="radio" id=""
                                        value="Services">
                                    <label class="form-check-label ms-2 " for="">Services</label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="" class="text-danger fs-5">Name: *</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="product_name" class="form-control"
                                        placeholder="Enter Product Name" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="" class="fs-5">SKU:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="product_sku" class="form-control"
                                        placeholder="Enter Product SKU">
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
                                        <option value="box">box</option>
                                        <option value="cm">cm</option>
                                        <option value="lg">lg</option>
                                        <option value="g">g</option>
                                        <option value="kg">kg</option>
                                        <option value="Inc">Inc</option>
                                        <option value="ft">ft</option>
                                        <option value="km">km</option>
                                        <option value="lb">lb</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="" class="fs-5">Product Image: </label>
                                </div>
                                <div class="col-9">
                                    <img src="" alt="" id="uploadedImage" class="img-fluid d-none mb-3 w-25">
                                    <input type="file" onchange="displayImage(this)" class="form-control"
                                        name="product_image" accept=".jpg, .png, .jpeg">
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
                                <input type="number" name="product_weight" class="form-control"
                                    placeholder="Product Weight">
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
                                        <input type="number" name="product_length" class="form-control"
                                            placeholder="Enter Product Length">
                                    </div>
                                </div>
                                <div class="row ms-5 mt-2">
                                    <div class="col-1">
                                        <label class="fs-6">Height:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" name="product_height" class="form-control"
                                            placeholder="Enter Product Height">
                                    </div>
                                </div>
                                <div class="row ms-5 mt-2">
                                    <div class="col-1">
                                        <label class="fs-6">Width:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" name="product_width" class="form-control"
                                            placeholder="Enter Product Width">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-1">
                                <label for="" class="fs-5">Brand:</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="product_brand" class="form-control"
                                    placeholder="Product Brand">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2">
                                <label for="" class="fs-5">Manufacturer:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="product_manufacturer" class="form-control"
                                    placeholder="Product Manufacturer">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2">
                                <label for="" class="fs-5">UPC:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="product_upc" class="form-control" placeholder="Product UPC">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <hr class="mx-auto border border-3 border-dark" mx-auto" width="50%">
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
                                            <input type="number" class="form-control" placeholder="Price"
                                                name="selling_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <label for="" class="fs-5">Description:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea name="selling_desc" id="" cols="20" rows="3"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <label for="" class="fs-5">Tax:</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">PKR</span>
                                            <input type="number" class="form-control" placeholder="Selling Tax"
                                                name="selling_Tax">
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
                                            <input type="number" class="form-control" placeholder="Cost Price"
                                                name="cost_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <label for="" class="fs-5">Description:</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea name="cost_desc" id="" cols="20" rows="3"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <label for="" class="fs-5">Tax:</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">PKR</span>
                                            <input type="number" class="form-control" placeholder="Cost Tax"
                                                name="cost_Tax">
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
                                        <input type="number" class="form-control" placeholder="Quantity"
                                            name="product_qty">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-2">
                                        <label for="" class="fs-5">Opening quantity:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" class="form-control" placeholder="Quantity"
                                            name="product_Openqty">
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <button class="btn btn-primary px-5 py-2 w-100" type="submit">Add
                                            Product</button>
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

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
                selectedImage.classList.remove('d-none');
            };

            reader.readAsDataURL(file);
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
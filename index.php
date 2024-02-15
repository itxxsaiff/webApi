<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Header  -->
    <?php require "_header.php";  ?>

    <!-- Form  -->
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Add Product</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-8 bg-white shadow shadow-lg p-4 mt-4 rounded-4 mx-auto">
                <form action="http://localhost/Invenroty_system/_addProduct.php" method="post">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="" class="mb-2 fs-5 text-danger">Product Name: *</label>
                            <input type="text" placeholder="Enter Product Name" class="form-control" name="product_name"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="mb-2 fs-5 text-danger">Selling Price: *</label>
                            <input type="number" placeholder="Enter Selling Price" class="form-control"
                                name="selling_price" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="mb-2 fs-5 text-danger">Cost Price: *</label>
                            <input type="text" placeholder="Enter Cost Price" class="form-control" name="cost_price"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="mb-2 fs-5 text-danger">Unit: *</label>
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
                        <div class="col-12 mt-2">
                            <button class="btn btn-dark w-100" type="button">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
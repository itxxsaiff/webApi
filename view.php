<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>API - Take a look Product</title>
</head>
<body class="bg-light">

    <!-- Header  -->
    <?php require "_header.php"; ?>
    <div class="container-fluid px-4 pt-4">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-6">
                <h1>All Items</h1>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="index.php" class="btn btn-primary">+ NEW</a>
            </div>
        </div>
      </div>

      <!-- Items table  -->
     <div class="container-fluid px-4 my-2">
        <div class="row">
            <table class="table table-striped table-bordered table-hover shadow shadow-lg">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Cost Price</th>
                    <th scope="col" class="text-center">Sale Price</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
    <?php 
        $data = file_get_contents('http://localhost/Invenroty_system/__display_data.php');
        $base_img_url = 'http://localhost/Invenroty_system/';
        $products = json_decode($data, true);
        foreach($products as $product){
            if (trim($product['image']) == null) {
                $product['image'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/832px-No-Image-Placeholder.svg.png';
            }else{
                $product['image'] = $base_img_url . $product['image'];
            }
              echo "
              <tr>
              <td class='p-2 text-center'>
              <img src='" . $product['image'] . "' class='img-fluid' style='width: 50px;'>
              </td>
              <td class='text-center' style='padding-top: 1.9rem'><a href='productView.php?productID=". $product['id'] ."' class='text-decoration-none'>" . htmlspecialchars_decode($product['name']) ." </a></td>
              <td class='text-center' style='padding-top: 1.9rem'>". $product['quantity'] ."</td>
              <td class='text-center' style='padding-top: 1.9rem'>" . $product['cost_price'] . "</td>
              <td class='text-center' style='padding-top: 1.9rem'>" . $product['sale_price'] . "</td>
              <td class='text-center' style='padding-top: 1.9rem'>
              <a href='update.php?productID=". $product['id'] ."' class='btn btn-primary'>Update</a>
              <button class='btn btn-danger ms-3' onclick=\"if(confirm('Are you sure that you want to delete the product?'))window.location.href= '_delete.php?productID=". $product['id'] ."'\">Delete</button>
              </td>
            </tr>
              ";
        }
     ?>

</tbody>
              </table>
        </div>
     </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
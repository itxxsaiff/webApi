<nav class="navbar py-3 navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand fs-4 fw-bold" href="">WebAPI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a aria-current="page" href="index.php" <?php if($_SERVER['PHP_SELF'] == '/mywebsite/index.php'){ echo 'class="nav-link active text-decoration-underline"';}else{echo 'class="nav-link"';} ?>>Add Product</a>
        </li>
        <li class="nav-item">
          <a href="update.php" <?php if($_SERVER['PHP_SELF'] == '/mywebsite/update.php'){ echo 'class="nav-link active text-decoration-underline"';}else{echo 'class="nav-link"';} ?>>Update Product</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

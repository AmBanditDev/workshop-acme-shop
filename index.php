<?php

session_start();
require_once("config/connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ACME Shop</title>
  <link rel="shortcut icon" href="assets/logos/shop.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
</head>

<body>
  <main>
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <h3 class="text-black fs-4">
              <span class="text-warning">ACME</span> SHOP
            </h3>
            <h4 class="text-secondary fs-6">ONLINE SHOPPING</h4>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item ms-4">
                <a class="nav-link active" aria-current="page" href="index.html">Home
                </a>
              </li>
              <li class="nav-item ms-4">
                <a class="nav-link" href="#men-section">Men's</a>
              </li>
              <li class="nav-item ms-4">
                <a class="nav-link" href="#women-section">Women's</a>
              </li>
              <li class="nav-item ms-4 dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pages
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./pages/about.html">About Us</a></li>
                  <li>
                    <a class="dropdown-item" href="./pages/products.html">Products</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./pages/contact.html">Contact Us</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item ms-4">
                <a class="nav-link" href="#">Explore</a>
              </li>
              <?php if (isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->query("SELECT * FROM user WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
              ?>
                <li>
                  <div class="dropdown ms-4">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo $row['firstname'] . " " . $row['lastname']; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                      <a class="dropdown-item text-danger" href="management/logout.php">Logout</a>
                    </div>
                  </div>
                </li>
              <?php } else { ?>
                <li class="nav-item ms-4">
                  <a class="nav-link" href="./pages/login.php">Login</a>
                </li>
                <li class="nav-item ms-4">
                  <a class="nav-link" href="./pages/register.php">Register</a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section class="border-dashed">
      <div class="container py-5">
        <div class="row row-cols-1 row-cols-lg-2">
          <div class="col overflow-hidden mb-4">
            <div class="position-relative">
              <img class="w-100 bg-brightness" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
              <div class="position-absolute top-50 start-50 -translate-middle-x translate-middle z-1 w-75 text-center">
                <h1 class="text-white fs-1">We Are Acme Shop</h1>
                <p class="fs-5">
                  <i class="text-white">Awesome clean & creative HTML5 & Template</i>
                </p>
                <button class="btn btn-outline-light mt-2 py-2 px-4 rounded-0">
                  Purchase Now!
                </button>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="row">
              <div class="col">
                <div class="position-relative mb-4">
                  <img class="w-100 bg-brightness" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
                  <div class="position-absolute top-50 start-50 -translate-middle-x translate-middle z-1 w-75 text-center">
                    <h1 class="text-white fs-4">Men's Clothing</h1>
                    <p><i class="text-white">Best Clothes For Men's</i></p>
                    <button class="btn btn-outline-light mt-2 py-2 px-4 rounded-0">
                      Purchase Now!
                    </button>
                  </div>
                </div>
                <div class="position-relative mb-4">
                  <img class="w-100 bg-brightness" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
                  <div class="position-absolute top-50 start-50 -translate-middle-x translate-middle z-1 w-75 text-center">
                    <h1 class="text-white fs-4">Women's Clothing</h1>
                    <p><i class="text-white">Best Clothes For Women's</i></p>
                    <button class="btn btn-outline-light mt-2 py-2 px-4 rounded-0">
                      Purchase Now!
                    </button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="position-relative mb-4">
                  <img class="w-100 bg-brightness" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
                  <div class="position-absolute top-50 start-50 -translate-middle-x translate-middle z-1 w-75 text-center">
                    <h1 class="text-white fs-4">Jeweleries</h1>
                    <p><i class="text-white">Best jeweleries</i></p>
                    <button class="btn btn-outline-light mt-2 py-2 px-4 rounded-0">
                      Purchase Now!
                    </button>
                  </div>
                </div>
                <div class="position-relative mb-4">
                  <img class="w-100 bg-brightness" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
                  <div class="position-absolute top-50 start-50 -translate-middle-x translate-middle z-1 w-75 text-center">
                    <h1 class="text-white fs-4">Electronics</h1>
                    <p><i class="text-white">Best electronics</i></p>
                    <button class="btn btn-outline-light mt-2 py-2 px-4 rounded-0">
                      Purchase Now!
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5" id="men-section">
      <div class="container">
        <h1 class="fs-2 fw-semibold">Men's Latest</h1>
        <p class="text-secondary">
          <i>Details to details is what makes Hexashop different from the
            other themes.</i>
        </p>

        <div class="row">
          <div class="col-4">
            <div class="card">
              <div class="card-header p-0">
                <img class="w-100" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="fs-4">Classic Spring</h3>
                  <div>star this here</div>
                </div>
                <div>
                  <div class="text-secondary">$120.00</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <div class="card-header p-0">
                <img class="w-100" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="fs-4">Classic Spring</h3>
                  <div>star this here</div>
                </div>
                <div>
                  <div class="text-secondary">$120.00</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <div class="card-header p-0">
                <img class="w-100" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="fs-4">Classic Spring</h3>
                  <div>star this here</div>
                </div>
                <div>
                  <div class="text-secondary">$120.00</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5" id="women-section">
      <div class="container">
        <h1 class="fs-2 fw-semibold">Women's Latest</h1>
        <p class="text-secondary">
          <i>Details to details is what makes Hexashop different from the
            other themes.</i>
        </p>

        <div class="row">
          <div class="col-4">
            <div class="card">
              <div class="card-header p-0">
                <img class="w-100" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="fs-4">Classic Spring</h3>
                  <div>star this here</div>
                </div>
                <div>
                  <div class="text-secondary">$120.00</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <div class="card-header p-0">
                <img class="w-100" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="fs-4">Classic Spring</h3>
                  <div>star this here</div>
                </div>
                <div>
                  <div class="text-secondary">$120.00</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card">
              <div class="card-header p-0">
                <img class="w-100" src="https://images.unsplash.com/photo-1633409361618-c73427e4e206?q=80&w=1160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="fs-4">Classic Spring</h3>
                  <div>star this here</div>
                </div>
                <div>
                  <div class="text-secondary">$120.00</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-footer text-white pt-5 pb-3">
      <div class="container">
        <div class="row text-center text-md-start">
          <!-- footer column 1 -->
          <div class="col-md-6 col-lg-3 mb-4">
            <a class="navbar-brand" href="#">
              <h3 class="text-white fs-4">
                <span class="text-warning">ACME</span> SHOP
              </h3>
              <h4 class="text-secondary fs-6">ONLINE SHOPPING</h4>
            </a>
            <ul class="list-unstyled mt-4">
              <li class="mb-2">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</li>
              <li class="mb-2">acmeshop@company.com</li>
              <li class="mb-2">010-020-0340</li>
            </ul>
          </div>

          <!-- footer column 2 -->
          <div class="col-md-6 col-lg-3 mb-4">
            <h4 class="fs-5 mb-3">Shopping & Categories</h4>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#" class="text-white">Men's Shopping</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">Women's Shopping</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">Jeweleries Shopping</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">Electronics Shopping</a>
              </li>
            </ul>
          </div>

          <!-- footer column 3 -->
          <div class="col-md-6 col-lg-3 mb-4">
            <h4 class="fs-5 mb-3">Useful Links</h4>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#" class="text-white">Homepage</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">About Us</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">Help</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">Contact Us</a>
              </li>
            </ul>
          </div>

          <!-- footer column 4 -->
          <div class="col-md-6 col-lg-3 mb-4">
            <h4 class="fs-5 mb-3">Help & Information</h4>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#" class="text-white">Help</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">FAQ's</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">Shipping</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white">Tracking ID</a>
              </li>
            </ul>
          </div>
        </div>
        <hr />
        <div class="text-center">
          <p>Copyright &copy; 2023 Acme Shop Co.,Ltd. All Rights Reserved</p>
          <div class="d-flex justify-content-center">
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
          </div>
        </div>
      </div>
    </footer>
  </main>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
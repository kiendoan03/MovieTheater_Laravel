<?php 
// require_once "../config/connect_server.php";

// $totalProductQuery = "SELECT count(product_id) as total from product";
// $totalProduct = mysqli_query($connect,$totalProductQuery);
// $total = mysqli_fetch_assoc($totalProduct);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Site</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
             <!-- Header -->

        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../public/img/ThinkPro-Logo-PNG cut.png" alt="" height="35" class="d-inline-block align-text-top">
                </a>
                <div class="dropdown d-flex">
                    <div class=" d-flex">
                        <i class="fa-solid fa-user my-auto mx-3"></i>
                        <p class="my-auto">Admin</p>
                    </div>
                    <button class="dropdown-toggle bg-transparent border-0" style="outline:none;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="?controller=admin&redirect=profile">Profile</a></li>
                      <li><a class="dropdown-item d-block" href="?controller=login&action=logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
        <div class="row">
            <div class="col-10 mx-auto"  style="margin-top:5em;">
                <div class="row">
                    <div class="col-3 shadow p-3 bg-body rounded mb-3 min-vh-100">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="" class="btn border-0 rounded text-start bg-primary text-light" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=user" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Member management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=category" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Category management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=product" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Product management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=order" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Order management</a>
                        
                          </div>
                    </div>
                    <div class="col-9">

                          <div class="row">
                            <div class="col-6">
                                <div class="card text-light bg-body mb-3">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-tag fs-1 text-primary"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-dark text-muted">Different products</h6>
                                            <h3 class="card-text fw-bold text-dark"> <?php echo $totalDiffProduct ?> </h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="card text-light bg-body mb-3">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-shirt  fs-1 text-warning"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-dark text-muted">Total product</h6>
                                            <h3 class="card-text fw-bold text-dark"> <?php foreach($totalProduct as $total){ echo $total['total_prd'];} ?> </h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="card text-light bg-body mb-3">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-user fs-1 text-danger"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-dark text-muted">Total user</h6>
                                            <h3 class="card-text fw-bold text-dark"> <?php echo $totalUser ?> </h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="card text-light bg-body mb-3">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class= "fa-solid fa-money-bill fa-coin fs-1 text-info"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-dark text-muted">Sales</h6>
                                            <h3 class="card-text fw-bold text-dark">  <?php foreach($sales as $sale){ if($sale['sales'] == NULL){echo 0;}else{echo number_format((int)$sale['sales'],0,'','.');}}?> vnd</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                          </div>

                          <div class="row mt-5">
                            
                            <div class="col-5">
                                <canvas id="myChart"></canvas>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-6 my-auto">
                                <div class="card text-light bg-body mb-3">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class= "fa-solid fa-receipt fs-1 text-success"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-dark text-muted">Total receipt</h6>
                                            <h3 class="card-text fw-bold text-dark"> <?php echo $totalReceipt ?> </h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>

                          </div>

                          


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Waiting', 'Accepted', 'Shipping', 'Delivered'],
      datasets: [{
        label: 'Số lượng',
        data: [<?php echo $totalReceiptWait ?>,<?php echo $totalReceiptAccept ?> , <?php echo $totalReceiptShip ?>, <?php echo $totalReceiptComplete ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkPro-Product Management</title>
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
                    <button class="btn dropdown-toggle bg-transparent border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <a href="?controller=<?php echo $controller; ?>" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=user" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Member management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=category" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Category management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=product" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Product management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=order" class="btn border-0 rounded text-start bg-primary text-light" tabindex="-1" role="button" aria-disabled="true">Order management</a>
                        
                        </div>
                    </div>
                    <div class="col-9">
                        <!-- Title -->
                         <div class="row">
                            <div class="col">
                                <h2 class="text-muted">Order management site</h2>
                            </div>
                         </div>
                         <!-- Main -->
                         <div class="row">
                         <div class="col">
                <div class="row">
                    <div class="col-8">
                        <div class="fs-5 fw-bold my-3 text-muted">Customer information</div>

                    <?php
                    foreach($getOrder as $order){

                    ?>

                    <table class="table my-3">
                        <tr>
                            <td class="col-3">ID</td>
                            <td class="col-9"><?php echo $order['customer_id'] ?></td>
                        </tr>
                        <tr>
                            <td class="col-3">Customer name</td>
                            <td class="col-9"><?php echo $order['customer_name'] ?></td>
                        </tr>
                        <tr>
                            <td class="col-3">Customer phone number</td>
                            <td class="col-9"><?php echo $order['customer_phone'] ?></td>
                        </tr>
                        <tr>
                            <td class="col-3">Customer address</td>
                            <td class="col-9"><?php echo $order['customer_address'] ?></td>
                        </tr>
                        <tr>
                            <td class="col-3">Customer note</td>
                            <td class="col-9"><?php echo $order['order_note'] ?></td>
                        </tr>
                        <?php
                        $color = '';
                        $status = '';
                        switch($order['receipt_status']){
                          case 0:{
                            $color = 'bg-danger';
                            $status = 'Chưa xác nhận';
                            break;
                          }
                          case 1:{
                            $color = 'bg-success';
                            $status = 'Đã xác nhận';
                            break;
                          }
                          case 2:{
                            $color = 'bg-warning';
                            $status = 'Đang vận chuyển';
                            break;
                          }
                          case 3:{
                            $color = 'bg-primary';
                            $status = 'Đã giao';
                            break;
                          }
                        }
                        ?>
                        <tr>
                            <td class="col-3">Order status</td>
                            <td class="col-9"><p class="<?php echo $color ?> rounded fs-6 py-1 text-center text-light col-9"> <?php echo $status ?> </p></td>
                        </tr>
                        <?php
                        if($acceptBy != ''){
                        ?>
                        <tr>
                            <td class="col-3">Accepted by</td>
                            <td class="col-9"><?php echo $acceptBy ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <?php
                    }
                    ?>

                    <div class="fs-5 fw-bold my-3 text-muted">Customer's product</div>
                        <!-- Item -->
                        <?php
                        foreach($getDetail as $product){
                        ?>
                        <div class="col-12 border shadow p-4 bg-body my-2 d-flex" style="border-radius: 1em;">
                          <img class="col-2 p-1 border rounded" src="public/upload/<?php echo $product['image_link'] ?>" >
                          <div class="col-7 px-3 my-auto">
                            <p class="fw-bold"><?php echo $product['product_name'] ?> - <?php echo $product['size_name'] ?> (<?php echo $product['product_amount'] ?>)</p>
                            <div class="">
                              <span class="fw-bold text-danger"><?php echo  number_format((int)$product['recent_price'],0,'','.');  ?></span>
                              <del class="mx-1"><?php echo  number_format((int)$product['product_price'],0,'','.');  ?></del>
                            </div>
                          </div>
                          
                          <div class="col-3 my-auto" >
                            <p class="fw-bold text-danger text-end"><?php echo  number_format((int)($product['recent_price']*$product['product_amount']),0,'','.');  ?></p>
                            </p>
                            
                          </div>
                        </div>

                        <?php
                        }
                        ?>

                        <!-- Nav -->
<!-- 
                        <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav> -->
                    </div>
                    <!-- Total -->
                    <div class="col-4">
                        
                        <?php
                        foreach($total as $sumary){
                        ?>
                        
                        <div class="col-12 border shadow px-3 pt-3 bg-body my-2" style="border-radius:1em;">
                            <p class="fs-5 fw-bold">
                                <i class="fa-regular fa-clipboard me-1"></i>
                                Order summary</p>
                            
                            <div class="border-bottom ">
                                <div class="d-flex justify-content-between mt-3">
                                    <span>Provisional</span>
                                    <span><?php echo number_format((int)$sumary['total_price'],0,'','.'); ?></span>
                                </div>
                            </div>
                            <div class="border-bottom ">
                                <div class="d-flex justify-content-between my-3">
                                    <span>Total</span>
                                    <span class="text-danger fw-bold"><?php echo number_format((int)$sumary['total_price'],0,'','.'); ?></span>
                                </div>
                            </div>
                            <div class="row">

                                <?php
                                foreach($getOrder as $status){
                                    if($status['receipt_status'] == 0){
                                ?>
                                <a href="?controller=admin&redirect=order&action=access&id=<?php echo $status['receipt_id'] ?>" class="col-6"><input class="my-3 col-12 border-0 bg-success p-2 text-light fw-bold" type="button" value = "Accept" style="border-radius: .5em;"></input></a>
                                <a href="?controller=admin&redirect=order&action=destroy&id=<?php echo $order['receipt_id'] ?>" class="col-6"><input class="my-3 col-12 border-0 bg-danger p-2 text-light fw-bold" type="button" value = "Deny" style="border-radius: .5em;"></input></a>

                                <?php
                                    }elseif($status['receipt_status'] == 1){
                                ?>
                                <a href="?controller=admin&redirect=order&action=shipping&id=<?php echo $status['receipt_id'] ?>" class="col-6"><input class="my-3 col-12 border-0 bg-warning p-2 text-light fw-bold" type="button" value = "Ship" style="border-radius: .5em;"></input></a>
                                <a href="?controller=admin&redirect=order&action=destroy&id=<?php echo $order['receipt_id'] ?>" class="col-6"><input class="my-3 col-12 border-0 bg-danger p-2 text-light fw-bold" type="button" value = "Delete" style="border-radius: .5em;"></input></a>

                                <?php
                                    }elseif($status['receipt_status'] == 2){

                                ?>
                                <a href="?controller=admin&redirect=order&action=received&id=<?php echo $status['receipt_id'] ?>" class="col-6 mx-auto"><input class="my-3 col-12 border-0 bg-info p-2 text-light fw-bold" type="button" value = "Received" style="border-radius: .5em;"></input></a>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
    
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
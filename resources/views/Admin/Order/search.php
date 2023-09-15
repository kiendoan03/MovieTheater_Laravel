<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkPro-Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="/admin/admin_resource/css/custom.css">
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
                            <div class="container-fluid">
                              <form class="d-flex my-1" method="GET" action="?controller=<?php echo $controller; ?>&redirect=<?php echo $redirect; ?>&action=search">
                                <input class="d-none" name = "controller" value="<?php echo $controller; ?>">
                                <input class="d-none" name = "redirect" value="<?php echo $redirect; ?>">
                                <input class="d-none" name = "action" value="search">
                                <input class="form-control me-2" type="search" name="search" placeholder="Search">
                                <button class="btn btn-outline-info" type="submit" name = "search_btn">Search</button>
                              </form>
                            </div>
                         </div>
                         <div class="row d-flex mt-5">
                            <form class="d-flex  flex-row-reverse" action="?controller=<?php echo $controller; ?>&redirect=<?php echo $redirect; ?>&action=order"  method="GET">
                                <div class="col-2">
                                    <input class="d-none" name = "controller" value="<?php echo $controller; ?>">
                                    <input class="d-none" name = "redirect" value="<?php echo $redirect; ?>">
                                    <input class="d-none" name = "action" value="order">
                                    <select class="form-select" name = "search">
                                          <option value ="0" selected>Tất cả</option>
                                          <option value ="1">Chưa Xác Nhận</option>
                                          <option value ="2">Đã Xác Nhận</option>
                                          <option value ="3">Đang Vận Chuyển</option>
                                          <option value ="4">Đã Giao</option>
                                    </select>
                                </div>
                                <div class="col-1 ms-2"><button class="btn btn-outline-secondary" type="submit" name = "search_btn">Search</button></div>

                            </form>
                                        
                         </div>
                         <div class="row">
                            <div class="col">
                            <table class="table my-3">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Receipt Date</th>
                                        <th scope="col">Customer name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                    <?php
                
                                    $count = 0;
                                    foreach($orders as $order){
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
                                        <td class = "col-1"><?php echo $count ?></td>
                                        <td class="col-2"><?php echo $order['receipt_date'] ?></td>
                                        <td class="col-2"><?php echo $order['customer_name'] ?></td>
                                        <td class="col-3">
                                        <p class="<?php echo $color ?> rounded fs-6 py-1 text-center text-light col-9"> <?php echo $status ?> </p>
                                        </td>
                                        
                                        <!-- Change base status -->
                                        <?php
                                        if($order['receipt_status'] == 0){
                                        ?>

                                        <td class="col-4">
                                            
                                            <a href="?controller=admin&redirect=order&action=access&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-success my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        
                                            <a href="?controller=admin&redirect=order&action=shipping&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-warning my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-truck-fast"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=received&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-info my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check-to-slot"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=view&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-primary my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=destroy&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-danger my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>

                                        <?php
                                        }elseif($order['receipt_status'] == 1){
                                        ?>

                                        <td class="col-4">
                                            
                                            <a href="?controller=admin&redirect=order&action=access&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-success my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        
                                            <a href="?controller=admin&redirect=order&action=shipping&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-warning my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-truck-fast"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=received&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-info my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check-to-slot"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=view&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-primary my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=destroy&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-danger my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>

                                        <?php
                                        }elseif($order['receipt_status'] == 2){
                                        ?>

                                        <td class="col-4">
                                            
                                            <a href="?controller=admin&redirect=order&action=access&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-success my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        
                                            <a href="?controller=admin&redirect=order&action=shipping&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-warning my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-truck-fast"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=received&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-info my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check-to-slot"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=view&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-primary my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=destroy&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-danger my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>

                                        <?php
                                        }elseif($order['receipt_status'] == 3){
                                        ?>

                                        <td class="col-4">
                                            
                                            <a href="?controller=admin&redirect=order&action=access&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-success my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                        
                                            <a href="?controller=admin&redirect=order&action=shipping&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-warning my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-truck-fast"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=received&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-info my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-check-to-slot"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=view&id=<?php echo $order['receipt_id'] ?>" type="button" class="btn btn-outline-primary my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="?controller=admin&redirect=order&action=destroy&id=<?php echo $order['receipt_id'] ?>" style = "pointer-events: none; color: #ccc;" type="button" class="btn btn-outline-danger my-1" tabindex="-1" role="button" aria-disabled="true">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>

                                        <?php
                                        }
                                        ?>
                                      </tr>
                                      
                                    <?php
                                    $count++;
                                    }
                                    ?>

                                    </tbody>
                            </table>
                            </div>
                         </div>
                         
                         <div class="row">
                            <div class="col">
                            <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <?php
                                            if($currentPage > 1){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&action='.$action.'&search='.$searchIn4.'&search_btn=&page='.($currentPage - 1).'" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                      </li>';
                                            }
                                        ?>

                                        <?php
                                            for($i = 0; $i < $totalPage; $i++){
                                                echo '<li class="page-item"><a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&action='.$action.'&search='.$searchIn4.'&search_btn=&page='.($i + 1).'">'.($i + 1).'</a></li>';
                                            }
                                        ?>

                                        <?php
                                            if($currentPage < $totalPage){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&action='.$action.'&search='.$searchIn4.'&search_btn=&page='.($currentPage + 1).'" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                      </li>';
                                            }
                                        ?>

                                    </ul>
                                </nav>
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
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
                            <a href="?controller=<?php echo $controller; ?>" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=user" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Member management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=category" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Category management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=product" class="btn border-0 rounded text-start bg-primary text-light" tabindex="-1" role="button" aria-disabled="true">Product management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=order" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Order management</a>
                        
                        </div>
                    </div>
                    <div class="col-9">

                        <!-- Title -->
                         <div class="row">
                            <div class="col">
                                <h2 class="text-muted">Product management site</h2>
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

                         <div class="row">
                            <div class="col-12">
                                <a href="index.php?controller=<?php echo $controller; ?>&redirect=<?php echo $redirect; ?>&action=create" type="button" class="btn btn-outline-success my-4" tabindex="-1" role="button" aria-disabled="true">
                                    <i class="fa-solid fa-plus"></i>
                                    New product
                                </a>
                            </div>
                         </div>

                         <div class="row">

                            <div class="col">
                                <table class="table my-3">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Product name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Product image</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                      
                                        $index = 0;
                                        foreach($record as $item){

                                    ?>
                                            <tr>
                                            <th scope="row" class = "col-1"> <?php echo $index; ?>  </th>
                                            <td class="col-3"> <?php echo $item['product_name']; ?>  </td>
                                            <td class="col-2"> <?php echo $item['product_price']; ?> vnd</td>
                                            <td class="col-2">
                                                <img class="col-12" src="public/upload/<?php echo $item['image_link']; ?>">
                                            </td>
                                            <td class="col-2">
                                            <?php echo $item['category_name']; ?>
                                            </td>
                                            <td class="col-2">
                                                <a href="?controller=<?php echo $controller; ?>&redirect=<?php echo $redirect; ?>&action=edit&product_id=<?php echo $item['product_id']; ?>" type="button" class="btn btn-outline-primary my-1" tabindex="-1" role="button" aria-disabled="true">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="?controller=<?php echo $controller; ?>&redirect=<?php echo $redirect; ?>&action=destroy&product_id=<?php echo $item['product_id']; ?>" type="button" class="btn btn-outline-danger my-1" tabindex="-1" role="button" aria-disabled="true">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                               
                                            </td>
                                          </tr>
                                    <?php

                                        $index++;
                                        }
                                      
                                    ?>

                                      
                                    </tbody>
                                  </table>

                                
                                  <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <?php
                                            if($currentPage > 1){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&page='.($currentPage - 1).'" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                      </li>';
                                            }
                                        ?>

                                        <?php
                                            for($i = 0; $i < $totalPage; $i++){
                                                echo '<li class="page-item"><a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&page='.($i + 1).'">'.($i + 1).'</a></li>';
                                            }
                                        ?>

                                        <?php
                                            if($currentPage < $totalPage){
                                                echo '<li class="page-item">
                                                        <a class="page-link" href="?controller='.$controller.'&redirect='.$redirect.'&page='.($currentPage + 1).'" aria-label="Next">
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
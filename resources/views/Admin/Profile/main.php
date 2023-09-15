<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkPro-Member Management-Add Menber</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
             <!-- Header -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="">
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
            <div class="col-10 margin_top_custom mx-auto" style="margin-top:5em;">
                <div class="row">
                    <div class="col-3 shadow p-3 bg-body rounded mb-3 min-vh-100">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="?controller=<?php echo $controller; ?>" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=user" class="btn border-0 rounded text-start bg-primary text-light" tabindex="-1" role="button" aria-disabled="true">Member management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=category" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Category management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=product" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Product management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=order" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Order management</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <!-- Title -->
                         <div class="row">
                            <div class="col">
                                <h2 class="text-muted mb-4">User profile</h2>
                            </div>
                         </div>
                         <!-- Main -->
                        <div class="row">
                            <div class="col-10">

                                <?php

                                foreach($record as $item){

                                ?>

                                <form role="form">
                                    <?php 
                                    if(isset($_GET['record']) && $_GET['record'] == 1){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                    Tên đăng nhập đã tồn tại!
                                    </div>
                                    
                                    <?php
                                    }elseif(isset($_GET['record']) && $_GET['record'] == 2){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                    Mật khẩu nhập lại không trùng khớp!
                                    </div>
                                    
                                    <?php
                                    }
                                    ?>  
                                    <div class="mb-3 d-none">
                                        <input type="text" class="form-control" id="user_id" name="user_id" value = "<?php echo $item['id']; ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_name" class="form-label">User name</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value = "<?php echo $item['user_name']; ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                      <label for="fn" class="form-label">Full name</label>
                                      <input type="text" class="form-control" id="fn" name="full_name" value = "<?php echo $item['full_name']; ?>" disabled>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email" value = "<?php echo $item['user_email']; ?>" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <input class="form-control" value = "<?php if($item['user_permission'] == 0){echo "Admin";}else{echo "User";} ?>" disabled>
                                    </div>

                                    <?php

                                    }

                                    ?>

                                    <a href="?controller=admin&redirect=user&action=edit&user_id=<?php echo $_SESSION['user_session']; ?>" class="btn btn-success my-2 col-2">Edit</a>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
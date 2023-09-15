<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThinkPro-Member Management-Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="public/vendor/ckeditor/ckeditor.js"></script>
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
            <div class="col-10 mx-auto" style="margin-top:5em;">
                <div class="row">
                    <div class="col-3 shadow p-3 bg-body rounded mb-3 min-vh-100">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="?controller=<?php echo $controller; ?>" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=user" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Member management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=category" class="btn border-0 rounded text-start bg-primary text-light" tabindex="-1" role="button" aria-disabled="true">Category management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=product" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Product management</a>
                            <a href="?controller=<?php echo $controller; ?>&redirect=order" class="btn border-0 rounded text-start" tabindex="-1" role="button" aria-disabled="true">Order management</a>
                        </div>
                    </div>
                    <div class="col-9">

                        <!-- Title -->
                         <div class="row">
                            <div class="col">
                                <h2 class="text-muted mb-4">Edit category</h2>
                            </div>
                         </div>

                         <!-- Main -->
                        <div class="row">
                            <div class="col-10">
                                <?php
                            
                                foreach($record as $in4){

                                ?>

                                <form role="form" method="post" action="?controller=<?php echo $controller; ?>&redirect=<?php echo $redirect; ?>&action=update">
                                    <div class="mb-3 d-none">
                                        <input type="text" class="form-control" id="category_id" name="category_id" value = "<?php echo $in4['category_id']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_name" class="form-label">Category name</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name" value = "<?php echo $in4['category_name']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingTextarea">Description</label>
                                        <textarea class="form-control" id="category_description" name="category_description"> <?php echo $in4['category_description']; ?> </textarea>
                                    </div>
                                    <div>
                                        <div>
                                            <label >New</label>
                                            <input type = "radio" name = "parent_category" value = "-1" checked required>
                                        </div>
                                        <?php
                                            foreach($getParent as $item){
                                                if($item['category_name'] != $in4['category_name']){
                                        ?>

                                        <div>
                                            <label ><?php echo $item['category_name'] ?></label>
                                            <input type = "radio" name = "parent_category" value = "<?php echo $item['category_id'] ?>" <?php if($in4['parent_id'] == $item['category_id']) { echo "checked";} ?>>
                                        </div>
                                        
                                        <?php

                                                }
                                            }
                                        ?>
                                    </div>
                                    
                                    <input type="submit" class="btn btn-success my-3 col-2" value="Edit" name="submit_btn"></input>

                                </form>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        CKEDITOR.replace(category_description);
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfnix - Customers Management - Custome's information</title>
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href=" {{asset(\Illuminate\Support\Facades\Storage::url('css/scroll/hideScrollBar.css'))}}">


    <style>
        input::file-selector-button {
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color: black;">

    <div class="container-fluid">
        <div class="row">
            <!-- Header -->
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color: black;">
                <div class="container mx-auto p-0">
                    <a class="navbar-brand" href="#">
                        <img src="/img/page_logo/NetFnix Full logo.png" alt="" height="50" class="d-inline-block align-text-top">
                    </a>
                    @if(isset($admin))
                    <div class="dropdown text-center" >
                            <img class="col-12 border  " style="border-radius: 50%;object-fit: cover; overflow: hidden; height: 3vmax; width: 3vmax;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/staff/').$admin -> staff_avatar)}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                            <p class="my-auto text-light">{{$admin -> name}}</p>  
                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                            <li><a class="dropdown-item bg-dark text-light" href="">Profile</a></li>
                            <li><a class="dropdown-item bg-dark text-light" href="{{route('admin.staffs.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                    @else
                    <div class="dropdown">
                        <img class="col-12 border  " style="border-radius: 50%;object-fit: cover; overflow: hidden;height: 3vmax; width: 3vmax;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/netfnix/download-removebg-preview.png'))}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                                <li><a class="dropdown-item bg-dark text-light" href="{{route('admin.staffs.login')}}">Login</a></li>
                            </ul>
                    </div>  
                    @endif
                </div>
            </nav>
        </div>
        <div class="row mt-5">
            <div class="col-10 margin_top_custom mx-auto" style="margin-top:5em;">
                <div class="row">
                    <div class="col-3 shadow p-3 bg-dark rounded mb-3 min-vh-100">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="{{route('admin.dashboard')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="{{route('admin.staffs.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Staffs management</a>
                            <a href="{{route('admin.customers.index')}}" class="btn border-0 rounded text-start text-dark bg-danger shadow-none" tabindex="-1" role="button" aria-disabled="true">Customers management</a>
                            <a href="{{route('admin.categories.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Film genre management</a>
                            <a href="{{route('admin.movies.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Movies management</a>
                            <a href="{{route('admin.rooms.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Room management</a>
                            <a href="{{route('admin.schedules.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Schedules management</a>
                            <a href="{{route('admin.actors.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Actors management</a>
                            <a href="{{route('admin.directors.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Directors management</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <!-- Title -->
                        <div class="row">
                            <div class="col">
                                <h2 class="text-light mb-4">Customer's information</h2>
                            </div>
                        </div>
                        <!-- Main -->
                        <div class="row">
                            <div class="col">
                                <form role="form" method="post" action="">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="user_name" class="form-label text-light">User name</label>
                                                <input type="text" class="form-control text-light bg-dark border-0 shadow-none" readonly id="cus_username" name="cus_username" value="{{$customer -> customer_username}}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fn" class="form-label text-light">Full name</label>
                                                <input type="text" class="form-control text-light bg-dark border-0 shadow-none" readonly id="fn" name="cus_full_name" value="{{$customer -> customer_name}}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="dob" class="form-label text-light">Date of birth</label>
                                                <input type="date" class="form-control text-light bg-dark border-0 shadow-none" readonly id="dob" name="cus_dob" value="{{$customer -> customer_date_of_birth}}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label text-light">Email address</label>
                                                <input type="email" class="form-control text-light bg-dark border-0 shadow-none" readonly id="exampleInputEmail1" aria-describedby="emailHelp" name="cus_email" value="{{$customer -> customer_email}}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pn" class="form-label text-light">Phonenumber</label>
                                                <input type="text" class="form-control text-light bg-dark border-0 shadow-none" readonly id="pn" name="cus_phonenumber" value="{{$customer -> customer_phonenumber}}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label text-light">Address</label>
                                                <input type="text" class="form-control text-light bg-dark border-0 shadow-none" readonly id="a" name="cus_address" value="{{$customer -> customer_address}}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label text-light">Password</label>
                                                <input type="password" class="form-control text-light bg-dark border-0 shadow-none" readonly id="exampleInputPassword1" name="cus_pssw" value="{{$customer -> customer_password}}" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="pn" class="form-label text-light">Watched movies</label>
                                                <input type="text" class="form-control text-light bg-dark border-0 shadow-none" readonly id="pn" name="cus_phonenumber" value="21" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label text-light">Purchased tickets</label>
                                                <input type="text" class="form-control text-light bg-dark border-0 shadow-none" readonly id="a" name="cus_address" value="22" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="col-12">
                                                <div class="row">
                                                    <label for="image" class="form-label text-light">Customer image</label>
                                                    <div class="row my-3" style="width: 20vmax;">
                                                        <img id="cus_img" class="col-12 rounded-3 object-fit-cover mx-auto" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/user/'). $customer -> customer_avatar)}}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function show_img() {
            cus_img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
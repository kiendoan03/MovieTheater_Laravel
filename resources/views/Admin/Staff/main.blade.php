<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfnix - Staff Management</title>
    <link rel="icon" href="../../../../public/img/page_logo/download-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body style="background-color: black;">

    <div class="container-fluid">
        <div class="row">
            <!-- Header -->
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color: black;">
                <div class="container mx-auto p-0">
                    <a class="navbar-brand" href="#">
                        <img src="../../../../public/img/page_logo/NetFnix Full logo.png" alt="" height="50" class="d-inline-block align-text-top">
                    </a>
                    <div class="dropdown d-flex">
                        <div class=" d-flex">
                            <i class="fa-solid fa-user my-auto mx-3 text-light"></i>
                            <p class="my-auto text-light">Admin</p>
                        </div>
                        <button class="dropdown-toggle bg-transparent border-0 text-light" style="outline:none;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item text-light bg-dark" href="">Profile</a></li>
                            <li><a class="dropdown-item d-block text-light bg-dark" href="">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-10 mx-auto" style="margin-top:5em;">
                <div class="row">
                    <div class="col-3 shadow p-3 bg-dark rounded mb-3 min-vh-100">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="" class="btn border-0 rounded text-start text-light" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="" class="btn border-0 rounded text-start text-dark bg-danger" tabindex="-1" role="button" aria-disabled="true">Staffs management</a>
                            <a href="" class="btn border-0 rounded text-start text-light" tabindex="-1" role="button" aria-disabled="true">Customers management</a>
                            <a href="" class="btn border-0 rounded text-start text-light" tabindex="-1" role="button" aria-disabled="true">Film genre management</a>
                            <a href="" class="btn border-0 rounded text-start text-light" tabindex="-1" role="button" aria-disabled="true">Movies management</a>
                            <a href="" class="btn border-0 rounded text-start text-light" tabindex="-1" role="button" aria-disabled="true">Seat management</a>
                            <a href="" class="btn border-0 rounded text-start text-light" tabindex="-1" role="button" aria-disabled="true">Actors management</a>
                            <a href="" class="btn border-0 rounded text-start text-light" tabindex="-1" role="button" aria-disabled="true">Directors management</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <!-- Title -->
                        <div class="row">
                            <div class="col">
                                <h2 class="text-light">Staff management site</h2>
                            </div>
                        </div>
                        <!-- Main -->
                        <div class="row">
                            <div class="container-fluid">
                                <form class="d-flex my-1" method="GET" action="">
                                    <input class="d-none" name="controller" value="">
                                    <input class="d-none" name="redirect" value="">
                                    <input class="d-none" name="action" value="search">
                                    <input class="form-control me-2 bg-dark shadow-none border-0 text-light" type="search" name="search" placeholder="Search">
                                    <button class="btn btn-outline-danger" type="submit" name="search_btn">Search</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{route('admin.staffs.create')}}" type="button" class="btn btn-outline-light my-4" tabindex="-1" role="button" aria-disabled="true">
                                    <i class="fa-solid fa-plus"></i> New user
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table my-3 text-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Full name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($staffs as $staff)

                                        <tr>
                                            <th scope="row" class="col-1">{{$staff -> id}}</th>
                                            <td class="col-3">{{$staff -> staff_name}}</td>
                                            <td class="col-2">{{$staff -> staff_email}}</td>
                                            <td class="col-2">
                                            @if ($staff -> staff_role == 0)
                                                Manager
                                            @else 
                                                Staff
                                            @endif
                                            </td>
                                            <!-- {(
                                            if($staff -> staff_role == 0){
                                                <td class="col-2">Manager</td>
                                            }else{
                                                <td class="col-2">Staff</td>
                                            })} -->
                                            <td class="col-2">
                                            <img class="col-4" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/staff/'). $staff -> staff_avatar)}}">
                                            </td>
                                            <td class="col-2">
                                                <a href="{{route('admin.staffs.edit',$staff)}}" type="button" class="btn btn-outline-light my-1" tabindex="-1" role="button" aria-disabled="true">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form class="d-inline" method="post" action="{{route('admin.staffs.destroy', $staff)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger my-1">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>

                                        @endforeach
                                    
                                    </tbody>
                                </table>


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
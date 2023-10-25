<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfnix - Management</title>
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href=" {{asset(\Illuminate\Support\Facades\Storage::url('css/scroll/hideScrollBar.css'))}}">

    
</head>

<body style="background-color: black;" class="text-light">

    <div class="container-fluid mb-5" >
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
            <div class="col-10  mx-auto" style="margin-top:5em;">
                <div class="row">
                    <div class="col-3 shadow p-3 bg-dark rounded mb-3 min-vh-100">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="{{route('admin.dashboard')}}" class="btn border-0 rounded text-start text-dark bg-danger shadow-none" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="{{route('admin.staffs.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Staffs management</a>
                            <a href="{{route('admin.customers.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Customers management</a>
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
                                <h2 class="text-light">Dashboard Management site</h2>
                            </div>
                        </div>

                        <!-- Main -->
                        <div class="row mt-5">
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-film fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title  text-light">Total Movies</h6>
                                            <h3 class="card-text fw-bold text-light">{{$total_movies}}</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-light">Movie showing</h6>
                                            <h3 class="card-text fw-bold text-light">{{$movie_showing}}</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                             <i class="fa-solid fa-clapperboard fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-light">Movie upcomming</h6>
                                            <h3 class="card-text fw-bold text-light">{{$movie_upcomming}}</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-hourglass-end fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-light">Movie ended</h6>
                                            <h3 class="card-text fw-bold text-light">{{$movie_ended}}</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-user fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-light">Total user</h6>
                                            <h3 class="card-text fw-bold text-light">{{$total_user}}</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-money-bill fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-light">Total income</h6>
                                            <h3 class="card-text fw-bold text-light">{{number_format($total_income)}} VND</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-ticket fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-light">Tickets sold</h6>
                                            <h3 class="card-text fw-bold text-light">{{$tickets_sold}}</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card text-light mb-3 border border-light" style="background-color:black">
                                    <div class="card-body d-flex">
                                        <div class="my-auto ms-5 me-3">
                                            <i class="fa-solid fa-money-check-dollar fa-2xl" style="color: #ff0000;"></i>
                                        </div>
                                        <div>
                                            <h6 class="card-title text-light">Month income: {{$month_year}}</h6>
                                            <h3 class="card-text fw-bold text-light">{{number_format($month_income)}} VND</h3>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <canvas id="myChart"></canvas>
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
        
       
    </script>
    
</body>

</html>
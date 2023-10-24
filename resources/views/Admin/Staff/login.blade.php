<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset(\Illuminate\Support\Facades\Storage::url('css/custom_login.css'))}}">

    <title>Netfnix</title>
</head>

<body style=" background-color:#000;">
    <div class="container-fluid">

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

        <div class="row" style="padding-top:15em;">
            <div class="col-6 mx-auto">
                <div class="col-7 mx-auto pt-5">
                    <h2 class="text-white">Login Adminitrator</h2>
                    <form method="post" class=""  action="{{route('admin.staffs.login.check_login')}}">
                    @csrf

                        <div class="mb-3">
                            <input class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="User name" name="username_or_email" style="outline: none;" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Password" name="password" style="outline: none;" required>
                        </div>
                        <button type="submit" name="submit_btn" class="text-dark py-3 mt-3 col-12 border-0 bg-transparent login__button position-relative">
                            <div class="text-white">Login</div>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/screenProps/setBrowserSize.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
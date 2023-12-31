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
    <header class="row d-flex p-3  justify-content-between" style="background-color:none">
            <section class="col-3">
                <a href="{{route('index')}}">
                    <img class="col-4" src="/img/page_logo/NetFnix Full logo.png" alt="">
                </a>
            </section>

            <section class="col-3 d-flex justify-content-end pe-3">

                <div class=" position-relative border border-0 me-2 rounded-circle text-center" style="height: 3vmax; width: 3vmax; background-color: #ffffff48;">
                    <i class="fa-regular fa-bell position-absolute top-50 start-50 translate-middle" style="font-size: 1.2vmax;color: #ffffff"></i>
                </div>

                <div class="position-relative border border-0 me-2 rounded-circle text-center" style="height: 3vmax; width: 3vmax; background-color: #ffffff48;">
                    <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-50 translate-middle" style="font-size: 1.2vmax;color: #ffffff"></i>
                </div>

                @if(isset($user))
                    <div class="dropdown" style="height: 3vmax; width: 3vmax;">
                        <img class="col-12 border rounded-circle " style="object-fit: cover; overflow: hidden;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/user/').$user -> customer_avatar)}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                            <li><a class="dropdown-item bg-dark text-light" href="{{route('user',$user -> id)}}">Profile</a></li>
                            <li><a class="dropdown-item bg-dark text-light" href="{{route('admin.staffs.login')}}">Admin site</a></li>
                            <li><a class="dropdown-item bg-dark text-light" href="{{route('login.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown" style="height: 3vmax; width: 3vmax;">
                        <img class="col-12 border rounded-circle " style="object-fit: cover; overflow: hidden;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/user/avatar_default.jpg'))}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                                <li><a class="dropdown-item bg-dark text-light" href="{{route('admin.staffs.login')}}">Admin site</a></li>
                                <li><a class="dropdown-item bg-dark text-light" href="{{route('login.login')}}">Login</a></li>
                            </ul>
                    </div>  
                @endif

            </section>

        </header>
        <div class="row" style="padding-top:15em;">
            <div class="col-6">
                <div class="col-7 float-end pe-4">
                    <h2 class="text-white">Login</h2>
                    <form method="post" class="" action="{{route('login.login.check_login')}}">
                        @csrf

                        @if($errors->has('login'))
                            <div class="text-danger" role="alert">
                                {{ $errors->first('login') }}
                            </div>
                        @endif
                       
                        <div class="mb-3">
                            <input class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="User name" name="username_or_email" style="outline: none;" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Password" name="password" style="outline: none;" required>
                        </div>
                         <a class="text-decoration-danger fs-6 text-danger fw-light fst-italic" href="">Forget password???</a>
                        <button type="submit" name="submit_btn" class="text-dark py-3 mt-3 col-12 border-0 bg-transparent login__button position-relative">
                            <div class="text-white">Login</div>
                        </button>

                    </form>
                </div>
            </div>

            <div class="col-6">

                <div class="col-7 ps-4">
                    <h2 class="text-white">New customer</h2>
                    <p class="mt-3 text-white">
                        With just a few simple steps to register, you will receive the following special benefits from Netflix:
                    </p>
                    <p class="mt-3 text-white">
                        - Book tickets conveniently and quickly.
                    </p>
                    <p class="mt-3 text-white">
                        - Receive information about hot movies and special promotions.
                    </p>
                    <a href="{{route('login.register')}}" class="mt-3 text-white">
                        <button class="text-dark py-3 mt-3 col-12 border-0 bg-transparent login__button position-relative">
                            <div class="text-white">Register</div>
                        </button>
                    </a>
                </div>

            </div>

        </div>
    </div>
    <script src="../../js/screenProps/setBrowserSize.js"></script>
    <script src="../../../public/bootstrapLib/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
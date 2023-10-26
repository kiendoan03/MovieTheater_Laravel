<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrapLib/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset(\Illuminate\Support\Facades\Storage::url('css/scroll/hideScrollBar.css'))}}">
    <title>Netfnix</title>

</head>

<body style="background-color: black;">
    <div class="container-fluid p-5">

    <header class="row d-flex fixed-top p-3 justify-content-between" style="background-color:none">
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
                <a href="{{route('search')}}">
                    <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-50 translate-middle" style="font-size: 1.2vmax;color: #ffffff"></i>                    
                </a>

                </div>

                @if(isset($user))
                    <div class="dropdown" >
                        <img class="col-12 border  " style="border-radius: 50%;object-fit: cover; overflow: hidden; height: 3vmax; width: 3vmax;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/user/').$user -> customer_avatar)}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                        <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                            <li><a class="dropdown-item bg-dark text-light" href="{{route('user',$user -> id)}}">Profile</a></li>
                            <li><a class="dropdown-item bg-dark text-light" href="{{route('admin.staffs.login')}}">Admin site</a></li>
                            <li><a class="dropdown-item bg-dark text-light" href="{{route('login.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <img class="col-12 border  " style="border-radius: 50%;object-fit: cover; overflow: hidden;height: 3vmax; width: 3vmax;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/netfnix/download-removebg-preview.png'))}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                            <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                                <li><a class="dropdown-item bg-dark text-light" href="{{route('admin.staffs.login')}}">Admin site</a></li>
                                <li><a class="dropdown-item bg-dark text-light" href="{{route('login.login')}}">Login</a></li>
                            </ul>
                    </div>  
                @endif

            </section>

        </header>

        <section>
            <div class="row mt-5">
                <div class="col-4">
                    <span class="text-muted" style="font-size: 0.8vmax;">Search</span>
                    <div class="input-group mt-2">
                        <input type="text" style="background-color: rgb(75, 75, 75); border-radius: 1vmax 0 0 1vmax; " class="form-control border-0 text-light shadow-none" placeholder="Search">
                        <button class="btn border-0 shadow-none" style="background-color: rgb(75, 75, 75); border-radius: 0 1vmax 1vmax 0;" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass" style="color: white;"></i></button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-4">
                            <span class="text-muted" style="font-size: 0.8vmax;">Genre</span>
                            <select class="form-select form-select-sm mt-2 border-0 shadow-none text-light" aria-label=".form-select-sm example" style="background-color: rgb(75, 75, 75); border-radius: 1vmax; height: 1.82vmax; padding-left: 0.6vmax;">
                            <option selected hidden >Genre</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                        <div class="col-4">
                            <span class="text-muted" style="font-size: 0.8vmax;">Year</span>
                            <select class="form-select form-select-sm mt-2 border-0 shadow-none text-light" aria-label=".form-select-sm example" style="background-color: rgb(75, 75, 75); border-radius: 1vmax; height: 1.82vmax; padding-left: 0.6vmax;">
                            <option selected hidden>Year</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                        <div class="col-4">
                            <span class="text-muted" style="font-size: 0.8vmax;">IMDb rating</span>
                            <select class="form-select form-select-sm mt-2 border-0 shadow-none text-light" aria-label=".form-select-sm example" style="background-color: rgb(75, 75, 75); border-radius: 1vmax; height: 1.82vmax; padding-left: 0.6vmax;">
                            <option selected hidden>IMDb rating</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-center" style="line-height: 5.5;">
                    <button class="btn bg-danger w-100 text-light shadow-none" style="border-radius: 1vmax;">Search</button>
                </div>
            </div>
        </section>
        <section class="mt-5">
            <div class="row">
                <div class="col-6">
                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/thumbnail-the-nun-2.jpg'))}}" class="rounded-3" style=" object-fit: fill;width: 48vmax;">
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6 ">
                               <div class="col-10">
                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('/img/movie_poster/poster-the-nun-2.jpg'))}}" class="rounded-3" style=" object-fit: cover;height: 27vmax;" alt="">
                                </div> 
                        </div>
                        <div class="col-6">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/Thumbnail_Venice.png'))}}" class="rounded-3" style=" object-fit: cover;width: 23vmax;" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/thumbnail_the_exorcist.jpg'))}}" class="rounded-3" style=" object-fit: cover;width: 23vmax;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/thumbnail_the_exorcist.jpg'))}}" class="rounded-3" style=" object-fit: cover;width: 23vmax;" alt="">
                </div>
                <div class="col-3">
                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/thumbnail_the_exorcist.jpg'))}}" class="rounded-3" style=" object-fit: cover;width: 23vmax;" alt="">
                </div>
                <div class="col-3">
                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/thumbnail_the_exorcist.jpg'))}}" class="rounded-3" style=" object-fit: cover;width: 23vmax;" alt="">
                </div>
                <div class="col-3">
                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/thumbnail_the_exorcist.jpg'))}}" class="rounded-3" style=" object-fit: cover;width: 23vmax;" alt="">
                </div>
            </div>
        </section>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js "></script>
    <script src="/bootstrapLib/bootstrap.bundle.min.js"></script>

</body>

</html>
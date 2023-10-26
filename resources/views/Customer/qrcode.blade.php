<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\bootstrapLib\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link rel="stylesheet" href=" {{asset(\Illuminate\Support\Facades\Storage::url('css/scroll/hideScrollBar.css'))}}">
    <title>Netfnix</title>

</head>
<body style="background-color: black;">
    <div class="container mt-4">
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
                    <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-50 translate-middle" style="font-size: 1.2vmax;color: #ffffff"></i>
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
        <div class="row">
                @foreach($info_ticket as $info_ticket)
                    <div class="col-sm-5 mx-auto">
                            <div class="card my-5 border-0" style="border-radius: 3vmax" >
                                <div class="card-header py-3 text-center bg-danger" style="border-radius: 3vmax 3vmax 0 0">
                                    <p class="fs-1 fw-bold">{{$info_ticket -> cus_name}}</p> 
                                    <h3>Netfnix QR Code </h3>
                                </div> 
                                @php
                                    $seats = $info_ticket -> number; 
                                     if($seats <= 12){
                                         $seats = 'A'.$seats;
                                     }elseif($seats <= 24){
                                         $seats = 'B'.($seats-12);
                                     }elseif($seats <= 36){
                                         $seats = 'C'.($seats-24);
                                     }elseif($seats <= 48){
                                         $seats = 'D'.($seats-36);
                                     }elseif($seats <= 60){
                                         $seats = 'E'.($seats-48);
                                     }elseif($seats <= 66){
                                         $seats = 'F'.($seats-60);
                                     }
                                @endphp
                                    <div class="card-body mx-auto py-5">
                                        {!! QrCode::size(350)->generate($info_ticket -> movie_name.
                                            "\n".$info_ticket -> room_name."\n".'Date: '.$info_ticket->date.
                                            "\n".'Start time: ' .$info_ticket->start_time.
                                            "\n".'End time: '.$info_ticket->end_time.
                                            "\n".'Seat: '.$seats.
                                            "\n".'Price: '.number_format($info_ticket->final_price).' VND') !!}
                                    </div> 
                            </div> 
                    </div>
                @endforeach
        </div>
</div>
        
    </div>
</body>
</html>
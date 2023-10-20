<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfnix - Schedules Management - Edit schedule</title>
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

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

            <nav class="navbar navbar-expand-lg fixed-top " style="background-color: black;">
                <div class="container  mx-auto p-0">
                    <a class="navbar-brand" href="#">
                        <img src="/img/page_logo/NetFnix Full logo.png" alt="" height="50" class="d-inline-block align-text-top">
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
                    <div class="col-3 shadow p-3 bg-dark rounded mb-3 min-vh-100 bg">
                        <div class="btn-group-vertical col-12 " role="group" aria-label="Basic example">
                            <a href="" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Dashboard</a>
                            <a href="{{route('admin.staffs.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Staffs management</a>
                            <a href="{{route('admin.customers.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Customers management</a>
                            <a href="{{route('admin.categories.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Film genre management</a>
                            <a href="{{route('admin.movies.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Movies management</a>
                            <a href="{{route('admin.rooms.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Room management</a>
                            <a href="{{route('admin.schedules.index')}}" class="btn border-0 rounded text-start text-dark bg-danger shadow-none" tabindex="-1" role="button" aria-disabled="true">Schedules management</a>
                            <a href="{{route('admin.actors.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Actors management</a>
                            <a href="{{route('admin.directors.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Directors management</a>
                        </div>
                    </div>
                    <div class="col-9 ">

                        <!-- Title -->
                        <div class="row">
                            <div class="col">
                                <h2 class="text-light mb-4">Edit schedule</h2>
                            </div>
                        </div>

                        <!-- Main -->
                        <div class="row">
                            @foreach($schedulesInfo as $schedule)
                            <form role="form" method="post" action="{{route('admin.schedules.update', $schedule -> schedule_id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Date</label>
                                            <input type="date" class="form-control bg-dark border-0 shadow-none text-light" id="date" name="date" value="{{$schedule -> date}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Start</label>
                                            <input type="time" class="form-control bg-dark border-0 shadow-none text-light" id="start_time" name="start_time" value="{{$schedule -> start_time}}" required>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="date" class="form-label text-light">End</label>
                                            <input type="time" class="form-control bg-dark border-0 shadow-none text-light" id="end_time" name="end_time" value="{{$schedule -> end_time}}" required>
                                        </div> -->
                                        
                                    </div>

                                    <div class="col-4">

                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Room</label>
                                            <select name="room_id" id="room" class="form-select bg-dark border-0 shadow-none text-light">

                                                <option value="{{$schedule -> room_id}}" hidden>{{$schedule -> room_name}}</option>

                                                @foreach($rooms as $room)
                                                    <option value="{{$room -> id}}">{{$room -> room_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Movie</label>

                                            <select name="movie_id" id="movie" class="form-select bg-dark border-0 shadow-none text-light">
                                                <option value="{{$schedule-> movie_id}}">{{$schedule-> movie_name}}</option>

                                                @foreach($movies as $movie)
                                                    <option value="{{$movie -> id}}">{{$movie -> movie_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-danger my-2 col-2" value="Edit" name="submit_btn">

                            </form>

                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        CKEDITOR.replace(movie_description);
    </script>
    <script>
        function show_img() {
            director_img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>
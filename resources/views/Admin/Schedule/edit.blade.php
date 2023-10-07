<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfnix - Schedules Management - Edit schedule</title>
    <link rel="icon" href="../../../../public/img/page_logo/download-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="../../../../public/vendor/ckeditor/ckeditor.js"></script>

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
                            <form role="form" method="post" action="{{route('admin.schedules.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Date</label>
                                            <input type="date" class="form-control bg-dark border-0 shadow-none text-light" id="date" name="date" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Start</label>
                                            <input type="time" class="form-control bg-dark border-0 shadow-none text-light" id="date" name="date" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">End</label>
                                            <input type="time" class="form-control bg-dark border-0 shadow-none text-light" id="date" name="date" required>
                                        </div>
                                        
                                    </div>

                                    <div class="col-4">

                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Room</label>
                                            <select name="room" id="room" class="form-select bg-dark border-0 shadow-none text-light">
                                                @foreach($schedule_room as $schedule_room)
                                                    <option value="{{$schedule_room -> room_id}}">{{$schedule_room -> room_name}}</option>
                                                @endforeach

                                                @foreach($rooms as $room)
                                                    <option value="{{$room -> id}}">{{$room -> room_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-light">Movie</label>

                                            <select name="movie" id="movie" class="form-select bg-dark border-0 shadow-none text-light">
                                                @foreach($schedule_movie as $schedule_movie)
                                                    <option value="{{$schedule_movie -> movie_id}}">{{$schedule_movie -> movie_name}}</option>
                                                @endforeach

                                                @foreach($movies as $movie)
                                                    <option value="{{$movie -> id}}">{{$movie -> movie_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-danger my-2 col-2" value="Add" name="submit_btn">

                            </form>
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
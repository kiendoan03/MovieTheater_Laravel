<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfnix - Movie Management - Edit movie</title>
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
                        <img src="img/page_logo/NetFnix Full logo.png" alt="" height="50" class="d-inline-block align-text-top">
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
                            <a href="{{route('admin.movies.index')}}" class="btn border-0 rounded text-start text-dark bg-danger shadow-none" tabindex="-1" role="button" aria-disabled="true">Movies management</a>
                            <a href="{{route('admin.rooms.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Room management</a>
                            <a href="" class="btn border-0 rounded text-start text-light  shadow-none" tabindex="-1" role="button" aria-disabled="true">Schedules management</a>
                            <a href="{{route('admin.actors.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Actors management</a>
                            <a href="{{route('admin.directors.index')}}" class="btn border-0 rounded text-start text-light shadow-none" tabindex="-1" role="button" aria-disabled="true">Directors management</a>
                        </div>
                    </div>
                    <div class="col-9 ">

                        <!-- Title -->
                        <div class="row">
                            <div class="col">
                                <h2 class="text-light mb-4">Edit Movie</h2>
                            </div>
                        </div>

                        <!-- Main -->
                        <div class="row">
                            <form role="form" method="post" action="{{route('admin.movies.update', $movie)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-8">


                                        <div class="mb-3">
                                            <label for="movie_name " class="form-label text-light">Movie name</label>
                                            <input type="text" class="form-control bg-dark border-0 shadow-none text-light" id="movie_name" name="movie_name" value="{{$movie -> movie_name}}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="movie_length" class="form-label text-light">Length(m)</label>
                                            <input type="number" class="form-control bg-dark border-0 shadow-none text-light" id="movie_length" name="movie_length" value="{{$movie -> length}}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="movie_age" class="form-label text-light">Age</label>
                                            <input type="number" class="form-control bg-dark border-0 shadow-none text-light" id="movie_age" name="movie_age" value="{{$movie -> age}}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="language" class="form-label text-light">Language</label>
                                            <select id="language" class="form-select bg-dark border-0 shadow-none text-light" name="movie_language">
                                                        <!-- Get all category -->
                                                        @if($movie -> language == 0)
                                                          <option value = "0" hidden selected class="text-light">English</option>
                                                        @else
                                                          <option value = "1" hidden selected class="text-light ">Vietnamese</option>
                                                        @endif
                                                        <option value= "0">English</option>
                                                        <option value= "1">Vietnamese</option>
                                                </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="category_select" class="form-label text-light">Film genre</label>
                                            
                                            <select id="category_select" class="form-select bg-dark border-0 shadow-none text-light" name="movie_genre">
                                                        <!-- Get all category -->

                                                       @foreach($categories as $cate)

                                                            <option value="{{$cate -> id}}" class="text-light" >{{$cate -> category_name}}</option>

                                                       @endforeach

                                            </select>

                                        </div>


                                        <div class="mb-3">
                                            <label for="actor" class="form-label text-light">Actors</label>
                                            <select id="actor" class="form-select bg-dark border-0 shadow-none text-light" name="movie_actor">
                                                        <!-- Get all category -->
                                                    
                                                       
                                                </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="directors" class="form-label text-light">Directors</label>
                                            <select id="directors" class="form-select bg-dark border-0 shadow-none text-light" name="movie_director">
                                                        <!-- Get all category -->
                                                    

                                                    

                                                </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="movie_release_date" class="form-label text-light">Release date</label>
                                            <input type="date" class="form-control bg-dark border-0 shadow-none text-light" id="movie_release_date" value="{{$date}}" name="movie_release_date"  required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="floatingTextarea" class="text-light form-label">Description</label>
                                            <textarea class="form-control bg-dark border-0 shadow-none text-light" id="movie_description" name="movie_description"></textarea>
                                        </div>
                                    </div>

                                    <!-- File img -->
                                    <div class="col-4">

                                        <div class="col-12">
                                           <div class="row">
                                                <label for="poster" class="form-label text-light">Logo</label>
                                                <input class="form-control bg-dark border-0 shadow-none text-light" type="file" id="poster" name="movie_logo" accept="image/png, image/jpg, image/jpeg" onchange="show_logo()" required>
                                                <div class="row my-3">
                                                    <img id="logo_img" class=" rounded-3" src="Public/images/no_image.jpg" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="poster" class="form-label text-light">Poster</label>
                                                <input class="form-control bg-dark border-0 shadow-none text-light" type="file" id="poster" name="movie_poster" accept="image/png, image/jpg, image/jpeg" onchange="show_poster()" required>
                                                <div class="row my-3">
                                                    <img id="poster_img" class=" rounded-3" src="Public/images/no_image.jpg" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="thumbnail" class="form-label text-light">Thubnail</label>
                                                <input class="form-control bg-dark border-0 shadow-none text-light" type="file" id="thumbnail" name="movie_thumbnail" accept="image/png, image/jpg, image/jpeg" onchange="show_thumbnail()"  required>
                                                <div class="row  my-3">
                                                    <img id="thumbnail_img" class=" rounded-3" src="../../../../public/img/movieThumbnail/no_image_thumbnail.png" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="trailer" class="form-label text-light">Trailer</label>
                                                <input class="form-control bg-dark border-0 shadow-none text-light" type="file" id="trailer" name="movie_trailer" onchange="loadFile(event)"  required>
                                                <div id="trailers_preview" class="my-3"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-danger my-2 col-2" value="Upload" name="submit_btn">
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
        function show_poster() {
            poster_img.src = URL.createObjectURL(event.target.files[0]);
        }

        function show_logo() {
            logo_img.src = URL.createObjectURL(event.target.files[0]);
        }

        function show_thumbnail() {
            thumbnail_img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

    <script>
        const video = (src) => '<video src = "' + src + '" type="video/mp4" class="col-12 rounded-3" muted autoplay></video>';

        function loadFile(event) {
            let output = document.getElementById('trailers_preview');
            output.innerHTML = '';
            output.innerHTML += video(URL.createObjectURL(event.target.files[0]))
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }

        };
    </script>
</body>

</html>
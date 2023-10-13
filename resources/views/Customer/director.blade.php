<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\bootstrapLib\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link rel="stylesheet" href="{{asset(\Illuminate\Support\Facades\Storage::url('css/actor.css'))}}">
    <title>Netfnix</title>
</head>

<body>
    <div class="container-fluid" style="background-color: black;">
        <section id="movie__overview" class="row position:relative">

            <!-- Background Image -->

            <section class="p-0 top-0 start-0 bottom-1 end-0">
                <div class="background">
                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/director/').$director -> director_image)}}" style="object-fit: cover; opacity: 0.8;" class="full-screen-element col-12">
                    </img>
                </div>
            </section>

            <!-- Content -->
            <section class="position-absolute start-0 end-0 fullscreen-height px-0 col-12" style="background: linear-gradient(to top, rgb(0, 0, 0), rgba(0, 0, 0, 0.444));">

                <!-- Information -->

                <div class="position-relative top-50 start-50 translate-middle col-12">
                    <div class="row mt-lg-5">
                        <div class="col-12 d-block">
                            <img class="col-4 d-block my-2 mx-auto" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/director/').$director -> director_image)}}" style="border-radius: 50%; object-fit: cover;overflow: hidden; height: 8vmax; width: 8vmax;" alt="">
                            <p class="text-center text-light fw-bold mb-1" style="font-size: 2vmax;">{{$director -> director_name}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="col-1 text-center">
                                <span class="text-light p-2" style="font-size: 1vmax;"> <p class="text-center text-light fw-bold m-1" style="font-size: 1.5vmax;">30</p>Actor</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-light p-2" style="font-size: 1vmax;"><p  class="text-center text-light fw-bold m-1" style="font-size: 1.5vmax;">2</p>Producer</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-light p-2" style="font-size: 1vmax;"><p  class="text-center text-light fw-bold m-1" style="font-size: 1.5vmax;">12</p>Director</span>
                            </div>
                        </div>
                    </div>


                    <!-- Movie -->

                    <section class="movie_selection row p-5">

                        <div class="row ">
                            <div class=" col-12 ">
                                <h1 class="text-light" style="font-size: 1.8vmax;">Movies</h1>
                            </div>
                        </div>

                        <!-- Movie carousel -->

                        <section class="p-0 ">
                            <div class="slider_actor col-12 ">

                            @foreach($movie_director as $movie)
                                <div class="mx-3 ">
                                    <div class="card border-0 rounded-0 ">
                                        <div class="d-flex bg-opacity-25 justify-content-center align-items-end ">
                                            <a href="{{route('detail', $movie -> movie_id)}}">
                                                <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/').$movie -> thumbnail_img)}}" alt=" ">
                                            </a>
                                        </div>
                                        <div class="card-body ">
                                            <span class="card-text text-light " style="font-size: 1.3vmax; ">{{$movie -> movie_name}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            </div>
                        </section>
                    </section>

                </div>

            </section>

        </section>


    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js "></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js "></script>
    <script src="{{asset(\Illuminate\Support\Facades\Storage::url('js/actor_slider.js'))}}"></script>
    <script src="{{asset(\Illuminate\Support\Facades\Storage::url('js/screenProps/setBrowserSize.js'))}}"></script>
    <script src="{{asset(\Illuminate\Support\Facades\Storage::url('js/screenProps/disableScroll.js'))}}"></script>
    <script src="/bootstrapLib/bootstrap.bundle.min.js"></script>
</body>

</html>
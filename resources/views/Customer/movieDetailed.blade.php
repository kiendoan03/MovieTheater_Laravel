<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\bootstrapLib\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link rel="stylesheet" href=" {{asset(\Illuminate\Support\Facades\Storage::url('css/scroll/hideScrollBar.css'))}}">
    <title>Netfnix</title>
</head>

<body class="" style="background-color: black;">

    <div class="container-fluid p-0">


        <!-- Overview -->

        <section id="movie__overview" class="row position:relative">

            <!-- Background Trailer -->

            <section class="p-0 top-0 start-0 bottom-0 end-0">
                <div>
                    <video style="object-fit: cover; backdrop-filter: brightness(60%);" class="full-screen-element col-12" id="trailerVideo" oncontextmenu="return false;" autoplay muted loop disablePictureInPicture>
                        <source src = "{{asset(\Illuminate\Support\Facades\Storage::url('/movie_trailer/').$movie -> trailer)}}">
                    </video>
                </div>
            </section>

            <!-- Movie Detail -->
            <section class="position-absolute start-0 end-0 fullscreen-height px-0 col-12" style="background: linear-gradient(to top, rgb(0, 0, 0), rgba(0, 0, 0, 0.444));">

                <!-- Information of movie -->

                <div class="position-relative top-50 start-50 translate-middle col-12">

                    <!-- Overview Tags -->
                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="col-1 text-center">
                                <span class="border text-light p-2 rounded-2">{{$movie -> age}}+</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-light p-2">{{$movie -> release_date}}</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-light p-2">{{$movie -> length}} Min</span>
                            </div>
                            <div class="col-1 text-center">
                                <span class="text-light p-2">
                                    @if($movie -> language == 0)
                                        English
                                    @elseif($movie -> language == 1)
                                        Vietnamese
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Movie logo -->
                    <div class="row">
                        <div class="col-12 d-block">
                            <img class="col-4 d-block my-5 mx-auto" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_logo/').$movie -> logo_img)}}" alt="">
                        </div>
                    </div>

                    <div class="row col-12 ps-5">
                        <!-- Movie tags -->
                        <div class="">

                        @foreach($movie_cate as $movie_cate)

                            <span class="border me-2 text-light p-2 rounded-2">{{$movie_cate -> category_name}}</span>
                        
                        @endforeach
                            <!-- <span class="border me-2 text-light p-2 rounded-2">Action</span>
                            <span class="border me-2 text-light p-2 rounded-2">Fantasy</span> -->

                        </div>

                        <div class="d-flex justify-content-between">
                            <!-- Movie Detail -->
                            <div class="col-5 mt-4">
                                <span class="text-light">
                                    {{$movie -> description}}
                                </span>
                            </div>

                            <!-- Sound Button -->
                            <div onclick="turnOnSound()" class="col-1">
                                <div class="sound-button d-inline-block text-light position-relative top-50 start-50 translate-middle" style="font-size: 1.5em; cursor: pointer;">
                                    <i class="fa-solid fa-volume-xmark"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Option -->
                        <div class="mt-4">
                            <span class="border rounded-pill text-light text-center px-3 py-2" onclick="toDetailedPage()" style="cursor: pointer;">
                                <i class="fa-solid fa-circle-info me-1"></i>  More 
                            </span>
                        </div>

                    </div>
                </div>

            </section>

        </section>

        <!-- More Detail Of The Movie -->

        <section id="movie__full--detail" class="row full-height px-5">

            <!-- Back Button -->
            <div class="" style="margin-top: 4vmax;">
                <span onclick="toOverviewPage()" class="border rounded-pill text-light text-center px-3 py-2" style="cursor: pointer;">
                    <i class="fa-solid fa-backward"></i>  Back 
                </span>
            </div>

            <!-- Information about the movie -->
            <section class="d-flex">

                <!-- Movie text in4 -->
                <div class="col-7 hide-scrollbar" style="height: 35vmax; overflow-x: hidden; overflow-y: scroll;">

                    <p class="text-light" style="font-size: 3vmax;">{{$movie -> movie_name}}</p>

                    <span class="border me-2 text-light p-2 rounded-2">
                        <span class="pe-2 fw-bold">IMDb </span>

                    <span class="border-start py-2 ps-2 text-light"> {{$movie -> rating}} / 5 </span>
                    </span>

                    <p class="text-light mt-4">
                        {{$movie -> description}}
                    </p>

                    <!-- Actor and Director -->
                    <section>

                        <!-- Actors -->
                        <div>
                            <span class="text-light" style="font-size: 1.7vmax;"> Actors </span>
                            @foreach($movie_actor as $movie_actor)

                            <div class="d-flex my-4">
                                <img class="d-block me-3" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/actor/').$movie_actor -> actor_image)}}" style="object-fit: cover; border-radius: 50%; overflow: hidden; height: 6vmax; width: 6vmax;" alt="">
                            </div>

                            @endforeach
                        </div>

                        <!-- Director -->
                        <div>
                            <span class="text-light" style="font-size: 1.7vmax;"> Directors </span>
                            <div class="d-flex my-4">
                                @foreach($movie_director as $movie_director)
                                
                                <img class="d-block me-3" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/director/').$movie_director -> director_image)}}" style="object-fit: cover; border-radius: 50%; overflow: hidden; height: 6vmax; width: 6vmax;" alt="">
                            
                                @endforeach
                            </div>
                        </div>

                    </section>

                    <!-- Related Movies -->
                    <section>

                        <span class="text-light" style="font-size: 1.7vmax;"> Related Movies </span>


                        <div class="mt-4 d-flex col-12 border border-0 rounded-3 hide-scrollbar" style="overflow-x: scroll;">


                            <img class="border border-0 rounded-3 me-4" style="height: 13vmax; width: 20vmax; object-fit: cover;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/').$movie -> thumbnail_img)}}" alt="">
                        

                        </div>

                    </section>

                </div>

                <!-- Movie Img -->
                <div class="col-5 d-flex justify-content-end">
                    <img class="col-12 border rounded-3 border-0 " src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_thumbnail/').$movie -> poster_img)}}" alt="" style="object-fit: cover;height: 35vmax; width: 25vmax;">
                </div>

            </section>

        </section>

    </div>

    <script>
        function turnOnSound() {
            var trailer = document.getElementById('trailerVideo');
            trailer.muted = !trailer.muted;
            if (trailer.muted) {
                document.querySelector('.sound-button').innerHTML = '<i class="fa-solid fa-volume-xmark"></i>';
            } else {
                document.querySelector('.sound-button').innerHTML = '<i class="fa-solid fa-volume-high"></i>';
            }
        }
    </script>

    <script src="{{asset(\Illuminate\Support\Facades\Storage::url('js/screenProps/setBrowserSize.js'))}}"></script>
    <script src="{{asset(\Illuminate\Support\Facades\Storage::url('js/screenProps/scrollHalf.js'))}}"></script>
    <script src="{{asset(\Illuminate\Support\Facades\Storage::url('js/screenProps/disableScroll.js'))}}"></script>

</body>

</html>
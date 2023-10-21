<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="public/img/netfnix/download-removebg-preview.png">
    <link rel="stylesheet" href="../../css/scroll/hideScrollBar.css">
    <link rel="stylesheet" href="../../css/custom_login.css">
    <title>Netfnix</title>
</head>

<body style="background-color: black;">
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

                <div class="dropdown" style="height: 3vmax; width: 3vmax;">
               
                    <img class="col-12 border rounded-circle " style="object-fit: cover; overflow: hidden;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/user/avatar_default.jpg'))}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                        <li><a class="dropdown-item bg-dark text-light" href="{{route('user')}}">Profile</a></li>
                        <li><a class="dropdown-item bg-dark text-light" href="#">Admin site</a></li>
                        <li><a class="dropdown-item bg-dark text-light" href="{{route('login.login')}}">Login</a></li>
                    </ul>
                </div>

            </section>

        </header>
        <div class="row mb-5 mt-3">
            <div class="col-6 mx-auto">

                <h2 class="text-light text-center">Register</h2>
                <form method="post" class="" action="{{route('login.store')}}">
                    @csrf

                   
                    <div class="mb-3">
                        <input class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="User name" name="user_name" style="outline: none;" required>
                    </div>
                    @if($errors -> has('username'))
                        <div class="fs-5 my-3 text-danger border-0 pb-2 border-light ">
                            {{$errors -> first('username')}}
                        </div> 
                    @endif
                    <div class="mb-3">
                        <input type="text" class="border-0 border-bottom  col-12 py-3 bg-transparent text-white" placeholder="Full name" name="full_name" style="outline: none;" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="text-secondary">Date of birth</label>
                        <input type="date" class="border-0 border-bottom col-12 py-3 bg-transparent text-light" placeholder="Date of birth" name="date_of_birth" style="outline: none;" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Email" name="cus_email" style="outline: none;" required>
                    </div>
                    @if($errors -> has('cus_email'))
                        <div class="fs-5 my-3 text-danger border-0 pb-2 border-light ">
                            {{$errors -> first('cus_email')}}
                        </div> 
                    @endif
                    <div class="mb-3">
                        <input type="text" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Address" name="cus_address" style="outline: none;" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Phonenumber" name="cus_phonenumber" style="outline: none;" required>
                    </div>
                    @if($errors -> has('cus_phonenumber'))
                        <div class="fs-5 my-3 text-danger border-0 pb-2 border-light ">
                            {{$errors -> first('cus_phonenumber')}}
                        </div> 
                    @endif
                    <div class="mb-3">
                        <input type="password" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Password" name="password" style="outline: none;" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Re-password" name="re_password" style="outline: none;" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif

                    <button type="submit" name="register_btn" class="mb-2 text-dark py-3 mt-3 col-12 border-0 bg-transparent login__button position-relative">
                            <div class="text-light fs-5">Register</div>
                        </button>
                    <a class="text-decoration-danger fs-6 text-danger fw-light fst-italic" href="{{route('login.login')}}">Already have an account?</a>

                </form>
            </div>

        </div>
    </div>
    <script src="js/screenProps/setBrowserSize.js"></script>
    <script src="public/bootstrapLib/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
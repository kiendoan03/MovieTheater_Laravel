<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\bootstrapLib\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="icon" href="/img/page_logo/download-removebg-preview.png">
    <link rel="stylesheet" href="{{asset(\Illuminate\Support\Facades\Storage::url('css/scroll/hideScrollBar.css'))}}">
    <title>Netfnix</title>
</head>

<body style="background-color: black;">
    <div class="container-fluid">

        <section>
            <div class="row mt-5">
                <div class="col-3">
                    <div class="card border-0 rounded-3 p-2" style="background-color:rgb(63, 63, 63);">
                        <div class="text-center my-3 rounded-3">
                            <div class=" position-relative mx-auto" style="width: 9vmax; ">
                                <img src="{{asset(\Illuminate\Support\Facades\Storage::url('img/user/').$user -> customer_avatar)}}" style="border-radius: 50%;object-fit: cover; width: 9vmax; " alt=" ">
                                <div class="edit position-absolute top-100 start-100 translate-middle ">
                                    <i class="fa-regular fa-pen-to-square " style="color: #ffffff; font-size: 1.2vmax; "></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-body ">
                            <p class="text-light fw-bold mb-1 d-inline " style="font-size: 1.5vmax; ">{{$user -> customer_name}}</p>
                            <div class="edit-name d-inline mt-1 " style="float: right ">
                                <i class="fa-regular fa-pen-to-square " style="color: #ffffff; font-size: 1.2vmax; "></i>
                            </div>
                            <p class="text-muted mb-3 " style="font-size: 0.8vmax; ">Member since {{$user -> created_at}}</p>
                            <div class="mt-5 ">
                                <p class="text-muted mb-3 " style="font-size: 1vmax; ">Viewing activity</p>
                                <div class="mb-3 ">
                                    <span class="text-light " style="font-size: 0.8vmax; ">Watched movies</span>
                                    <span class="text-light " style="float: right; font-size: 0.8vmax; ">10</span>
                                </div>
                                <div>
                                    <span class="text-light " style="font-size: 0.8vmax; ">Purchased tickets</span>
                                    <span class="text-light " style="float: right; font-size: 0.8vmax; ">10</span>
                                </div>
                            </div>
                            <div class="action my-5 text-center ">
                                <button class="border-0 p-3 text-center text-light " style="background-color: rgb(94, 94, 94) ;border-radius: 50vmax; font-size: 0.8vmax; width: 6vmax; ">Sign Out</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9 ">
                    <section>
                        <div class="row ">
                            <div class="col-5 ">
                                <div class="text-muted d-inline " style="font-size: 1.5vmax; ">Account</div>
                                <div class="d-inline ">
                                    <i class="fa-regular fa-pen-to-square " style="color: #ffffff; font-size: 1.2vmax; float: right; "></i>
                                </div>
                                <p class="text-muted mt-3 ">Here you can edit public information about yourself. The changes will be display within 5 minutes.</p>
                            </div>
                            <div class="col-7 ">
                                <div class="row mx-3 " style="background-color:rgb(63, 63, 63); border-radius: 1vmax; ">
                                    <div class="mx-2 my-2 ">
                                        <div class="mb-3 row ">
                                            <label class="col-sm-2 col-form-label text-light ">Display name</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readosnly class="form-control-plaintext text-light " value="{{$user -> customer_name}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label class="col-sm-2 col-form-label text-light ">Username</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " value="{{$user -> customer_username}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label for="staticEmail " class="col-sm-2 col-form-label text-light ">Email</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " id="staticEmail " value="{{$user -> customer_email}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label class="col-sm-2 col-form-label text-light ">Date of birth</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " value="{{$user -> customer_date_of_birth}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label class="col-sm-2 col-form-label text-light ">Phone</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " value="{{$user -> customer_phonenumber}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label class="col-sm-2 col-form-label text-light ">Password</label>
                                            <div class="col-sm-10 ">
                                                <input type="password " readonly class="form-control-plaintext text-light " value="{{$user -> customer_password}}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </section>

                    <section class="mt-5 ">
                        <div class="row ">
                            <div class="col-5 ">
                                <div class="text-muted d-inline " style="font-size: 1.5vmax; ">Billing Details</div>
                                <div class="d-inline ">
                                    <i class="fa-regular fa-pen-to-square " style="color: #ffffff; font-size: 1.2vmax; float: right; "></i>
                                </div>
                                <p class="text-muted mt-3 ">Here you can edit public information about yourself. The changes will be display within 5 minutes.</p>
                            </div>
                            <div class="col-7 ">
                                <div class="row mx-3 " style="background-color:rgb(63, 63, 63); border-radius: 1vmax; ">
                                    <div class="mx-2 my-2 ">
                                        <div class="mb-3 row ">
                                            <label for="staticEmail " class="col-sm-2 col-form-label text-light ">Email</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " id="staticEmail " value="email@example.com ">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label for="staticEmail " class="col-sm-2 col-form-label text-light ">Email</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " id="staticEmail " value="email@example.com ">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label for="staticEmail " class="col-sm-2 col-form-label text-light ">Email</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " id="staticEmail " value="email@example.com ">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label for="staticEmail " class="col-sm-2 col-form-label text-light ">Email</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " id="staticEmail " value="email@example.com ">
                                            </div>
                                        </div>
                                        <div class="mb-3 row ">
                                            <label for="staticEmail " class="col-sm-2 col-form-label text-light ">Email</label>
                                            <div class="col-sm-10 ">
                                                <input type="text " readonly class="form-control-plaintext text-light " id="staticEmail " value="email@example.com ">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </section>

                  

                </div>
            </div>
        </section>

    </div>

    <script src="/bootstrapLib/bootstrap.bundle.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js "></script>

</body>

</html>
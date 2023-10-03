<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\..\public\bootstrapLib\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="../../../public/img/page_logo/download-removebg-preview.png">
    <link rel="stylesheet" href="../../css/scroll/hideScrollBar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/custom_login.css">
    <title>Netfnix</title>
</head>

<body style=" background-color:#000;">
    <div class="container-fluid">
        <div class="row" style="padding-top:15em;">
            <div class="col-6">
                <div class="col-7 float-end pe-4">
                    <h2 class="text-white">Login</h2>
                    <form method="POST" class="" action="">

                        <div class="fs-5 my-3 text-danger border-0 border-bottom pb-2 border-light d-none">
                            Tên đăng nhập hoặc mật khẩu không đúng!
                        </div>


                        <div class="mb-3">
                            <input class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="User name" name="user_name" style="outline: none;">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Password" name="password" style="outline: none;">
                        </div>
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
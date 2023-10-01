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
        <div class="row" style="padding-top:10em;">
            <div class="col-6 mx-auto">

                <h2 class="text-danger text-center">Register</h2>
                <form method="post" class="" action="{{route('login.store')}}">
                    @csrf
                    <div class="fs-5 my-3 text-white border-0 border-bottom pb-2 border-light d-none">
                        Tên đăng nhập đã tồn tại!
                    </div>

                    <div class="fs-5 my-3 text-white border-0 border-bottom pb-2 border-light d-none">
                        Mật khẩu nhập lại không trùng khớp!
                    </div>


                    <div class="mb-3">
                        <input class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="User name" name="user_name" style="outline: none;" required>
                    </div>
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
                    <div class="mb-3">
                        <input type="text" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Address" name="cus_address" style="outline: none;" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Phonenumber" name="cus_phonenumber" style="outline: none;" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Password" name="password" style="outline: none;" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="border-0 border-bottom col-12 py-3 bg-transparent text-white" placeholder="Re-password" name="re_password" style="outline: none;" required>
                    </div>


                    <button type="submit" name="register_btn" class="mb-2 text-dark py-3 mt-3 col-12 border-0 bg-transparent login__button position-relative">
                            <div class="text-light fs-5">Register</div>
                        </button>
                    <a class="text-decoration-danger fs-6 text-danger fw-light fst-italic" href="{{route('login.index')}}">Already have an account?</a>

                </form>
            </div>

        </div>
    </div>
    <script src="js/screenProps/setBrowserSize.js"></script>
    <script src="public/bootstrapLib/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
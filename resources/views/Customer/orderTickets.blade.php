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

<body style="background-color: black">
    <div class="container-fluid p-0">
             <header class="row d-flex  p-3  justify-content-between" style="background-color:none">
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
                    <a href="{{route('search')}}">
                        <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-50 translate-middle" style="font-size: 1.2vmax;color: #ffffff"></i>                    
                    </a>
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

    <div class="row p-3  ">
                <div class="col-7">
                    <div class="row screen mb-5">
                        <img src="/img/seat/bg-screen.png" style="object-fit: cover; width: 100%;" alt="">
                    </div>
                    <div class="row seat d-flex col-12 " style="margin-top: 1vmax;">
                        <div class="col-1">
                                        <div class="row">
                                                <div class="col-12 text-center  fw-bolder fs-5" style="height: 2.4vmax;">
                                                </div>
                                             @for($i = 0; $i < 6; $i++)
                                                @if($i == 0)
                                                        <div class="col-12 text-center text-muted fw-bolder fs-5" style="height: 4.8vmax;">
                                                            A
                                                        </div>
                                                @elseif($i == 1)
                                                        <div class="col-12 text-center text-muted fw-bolder fs-5" style="height: 4.8vmax;">
                                                            B
                                                        </div>
                                                @elseif($i == 2)
                                                        <div class="col-12 text-center text-muted fw-bolder fs-5" style="height: 4.8vmax;">
                                                            C
                                                        </div>
                                                @elseif($i == 3)
                                                        <div class="col-12 text-center text-muted fw-bolder fs-5" style="height: 4.8vmax;">
                                                            D
                                                        </div>
                                                @elseif($i == 4)
                                                        <div class="col-12 text-center text-muted fw-bolder fs-5" style="height: 4.8vmax;">
                                                            E
                                                        </div>
                                                @elseif($i == 5)
                                                        <div class="col-12 text-center text-muted fw-bolder fs-5" style="height: 4.8vmax;">
                                                            F
                                                        </div>
                                                @endif
                                            @endfor
                                        </div>
                        </div>
                            <div class="col-11">
                                <div class="row mb-3">
                                    @for($i = 0; $i < 12; $i++)
                                        <div class="col-1 text-center text-muted fw-bolder fs-5" >
                                            {{$i + 1}}
                                        </div>
                                    @endfor
                                </div>
                                <div class="row">
                                         @foreach($seats as $seat)
                                                
                                                @if($seat -> type_id == 1)
                                                    <form role="form" method="post" action="{{route('orderTicket',['seat_id' => $seat -> seat_id, 'schedule_id' => $seat -> schedule_id])}}" class="col-1">
                                                             @csrf
                                                            @method('PUT')
                                                    @if($seat -> schedule_seat_status == 0)
                                                        <button type="submit"  class="btn btn-none shadow-none col-12">
                                                            <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAr0lEQVR4nO2QQQrCMBBFc4EWdO+6Z5FuCsVLSsE72Eu4rt0q6AWeBFIRaWxnmkKlecsh89/kGxNZLcAOqIAncuzOCcg00hvTudssidj+NBRHiVhTr4+HRByUKP5VdQIUwGVCww1Q2qzRVX8csHEBGulWIsqBFrgCezc7KMSlL68X9+B9tZulCnHiy+vle9s3H2Iob/liLf8nDo2J4o71Vm0CM0ZcA+cZxPUcuZFl8wJRIS97SX64DQAAAABJRU5ErkJggg=="></div>
                                                        </button>  
                                                    @elseif($seat -> schedule_seat_status == 1)
                                                        <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                            <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA10lEQVR4nO2UQQrCMBBFewFb8n+3rj2LuBGKlxTBO9hLiDsz2YmCXkBJpOAilaS2UjEPZhPa/zrTTrMs8bcYpaaa3GjgJuQ9ptw9wNaQs2ipkOdYoacuNitYbDvtQfrsnlyHizuM901dg8U9Sl0lcSsncqLJpQb2H3xUWoDKZgWPuuFYFMoFdJDqPEf4uy3LhZBGkyJKze2ZAVbRHQNVW54Xd8HLU9uzA5DHipvx+vK8tK1B1/UJXisZm7grvyeWb/06JYn5L6POeiZEXAuwG0BcD5GbGDcPNFcd7syXIkAAAAAASUVORK5CYII="></div>
                                                        </button>  
                                                    @elseif($seat -> schedule_seat_status == 2 && $seat -> customer_id != $user -> id)
                                                            <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA4ElEQVR4nO2UQQrCMBBFewErzbh17VnEjVC8pAjeQW8gwowtmWJ1q6AXqAwoCjaQpFWU5sPfhPa/zi+TKArqrJI8HwLTQjFdgalysbyjNC6BceQO1XRyBb5Z01myrMEyaWPo03NrsE+9ZuPFZeKqTQewuWrEHhQ0VZqowb8tlcZUsqyrfqi/3yQS4AONy62yBg30bgIaj8B4SAoay5limjlfIBpTU16t5IHXr5YzlWWx88T3euvyamVaA9/1sV4r+DWwr/4PDN+6OiGAuStVRy3LAoxrxbhqH4wfyQ36bd0A+6VLYy4GIYQAAAAASUVORK5CYII="></div>
                                                            </button>
                                                    @elseif($seat -> schedule_seat_status == 2 && $seat -> customer_id == $user -> id)
                                                            <button type="submit"  class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA5klEQVR4nO2UUQqCQBCGvUDFjM89dxNnRIggOl2Rs0ovIXSHukTP1WtBXaDYyAhyaVctivxgXkT/b/1x9LyGvwWmQRcUZ6DohIrPLqOfAaGFn1LPWYqK967CpxE66Cx7seKssvQu57mD2L1eY+1CR2txbW97m0ZsxJ/0W34SDkB4XaHiDcbBUGdZV53TmUVwDSghbY8DtBZBTBEo2oHQFiQMrx9awiNncRwMTXmF6BseT62vYcptV3Feb1FeIaY1KLs+1muF3yYuy++J8VO/TmzE6l+q9mrmtVhohcLL2sXyntyG7+YCA4EH4/PVpiIAAAAASUVORK5CYII="></div>
                                                            </button>
                                                    @elseif($seat -> schedule_seat_status == 3 && $seat -> customer_id == $user -> id)
                                                            <button type="submit" disabled  class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA5klEQVR4nO2UUQqCQBCGvUDFjM89dxNnRIggOl2Rs0ovIXSHukTP1WtBXaDYyAhyaVctivxgXkT/b/1x9LyGvwWmQRcUZ6DohIrPLqOfAaGFn1LPWYqK967CpxE66Cx7seKssvQu57mD2L1eY+1CR2txbW97m0ZsxJ/0W34SDkB4XaHiDcbBUGdZV53TmUVwDSghbY8DtBZBTBEo2oHQFiQMrx9awiNncRwMTXmF6BseT62vYcptV3Feb1FeIaY1KLs+1muF3yYuy++J8VO/TmzE6l+q9mrmtVhohcLL2sXyntyG7+YCA4EH4/PVpiIAAAAASUVORK5CYII="></div>
                                                            </button>  
                                                    @elseif($seat -> schedule_seat_status == 3 && $seat -> customer_id != $user -> id)
                                                            <button type="submit" disabled  class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA4UlEQVR4nO2UQQrCMBBFewEF68JJUbeeRdwIxUuK4BnsRPEIrq1bBd1OIJKKUrCVSVql0nyYTWj/m/lkEgRerZXeRCOFYkUobkoKbVOPf2CtZTSxhhLC2Rb41oCEi/Fig82kVaG5WrLBLvF+iP3Kn7i+abPy4FJp2e9QIuaEcKhwo48kITZe7KhfDeC4ZwxcoHo3DNkg2g5mhHAihJQQptlFQ1g4gOMyv0KZD/JdmzO9D7u24Ge8RX6FKlsD1/Vhr5VqGthV/wdWv3o6lQfLtkQd1CwGGFAhJPWD4Su+Xs3WHaGYZJrSMa3iAAAAAElFTkSuQmCC"></div>
                                                            </button>  
                                                    @endif
                                                    </form>
                                                
                                                @elseif( $seat -> type_id == 2)
                                                    <form role="form" method="post" action="{{route('orderTicket',['seat_id' => $seat -> seat_id, 'schedule_id' => $seat -> schedule_id])}}" class="col-1">
                                                            @csrf
                                                            @method('PUT')
                                                        @if($seat -> schedule_seat_status == 0)
                                                            <button type="submit"  class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" class="col-6 mx-auto" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3klEQVR4nO2ZS2xNQRjH+2AtoYIGi6ZRUY+VhJSVakKIRyXUVoSdZ1KxsusOVeq5IPFohERiZWHhkXhtPBMb9SoRxOaqaNGffPK/nFztvWfmnnvuIee3anpmvu/7z3wz883cioqUlJSUlJSUlH8XYBSwBjgBPAE+AENEh9kym4+B40Cr+YxaRBvwgvh5DqyNQkC1RqfcHAOqihFyhOTQ7StiNcljhU9KlWNNFKLXYnMRspTk0uIi5CjJpdtFyF2Sy20XITXAaKAWaAa6gEwZgs7I9yLFYjHVhBYygrgJwPkYRfSYT99gF8rAG2AA6APOAQv0vRLoiEFEh/kKE9NwddThAsYPqV1liWemRz5CxxQUUqjD745qP7FEayaTTSfXmLJT50KT+h0kerq8Y9JUunBWzhYTPc2y7R6TFpELfXJm22HU1Mq2e0zaCVz4biW16rEfRIfZqpZt8+HCgAl56+F0nEbuPdHxTjbHe/Tt88lHY4mcXiI6LhZRsP5aI00ed+9OOZ2j0rpYngEzZfOAY1+LfX52C+507PwZmOZVPuSvLBqAfsdY9gcNVHmIeQ2sK7qI+1OkLgPqgKnArZAzsW/Yu7xNEXCG8mD11WaVP4XWyWlgXpgRihsb3XrgAfBNZ9TLkRq7THUcPAVO6b6xHZgb+LYDWAXs1YPgteCZlSQhj4ApwDZgj3L9Ts7DnKVaO7AJmCVRiRNyFWjUE2mYtNsI7EqikGz6TAbuFSjrW3XWffIR8iUeLZwExuakVfCsatRsBOvBQRchD4mP6Xrdz2VIF7jc3avXRUjY21mxvAImBUqkj8D9wPc27Wx/3whDCqn3KKV9sINtvf62BwUTNQbYDXzVLwEbAu3tjKkLLURibG8vNZdVX7UAs/UwaKm0HJgBrAS2BNpvdRIRENOukSklF5Q+gzn/v6Kn237FsNNLRECMjVi5aShKREBMXpJu/78UcjOPn+sltn8jjJGfT8zJxA5Aeb8AAAAASUVORK5CYII="></div>
                                                            </button>   
                                                        @elseif($seat -> schedule_seat_status == 1)
                                                            <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADn0lEQVR4nO1Z34tVVRTejvZ2xdnfd87MZV6GYlCEIKSHlAzyR6G+CCmUvvUfRPTjtYfIxxqnslQEpXLwB4QI4msmRhRU5EOBM3PXPnMJh4IwRcfyxDpzxu7Ide7Z55577k3ugvVw7zl7r+8731pnr72PMX3rW9/61re+9a1v/1+LjVnlgL2OPOrIq0LOCXnPkXERrnMJOefInx15xAF7NGahJCQI9gk5UxRoD5+uWfty2wRiY1YmT6d8AvEStYDDsTED+ZUAPuk2CbfowMe5SDjgpa6D51Kvkbu9U6pLNRG38CnFll2NINjVA6DjpqoAL2YmIsCn3QbsiqgVB3zbdcBs7kJ+k5nIbKUSfGfMYzVyJAK2O3JCgBulg0YScyIitykWxaTYTDt2bWhoWMhTJRKZ1Ji5wNaC4DmdwAGzjrzjyMgBJ2vWbtbrsTErBDhQghIHNFYWTEtMexoBDrUoso/0voRMZ5WZ1Bg+mO4TaTmgYaDePx2G1U7UjAA3FtPJF9OidJmDzVr7rI5zwIcdUGMiN6Yk/3yCAV8kwYAXiiYSAduTh5QHU1pEPgGjhAg5UjSRGjmSqu2PKX0TZB4k5N/aUqf92D9FkdC5YmNW6twaw3P8HWVf906B1auZFuT1whQBftM569VqmGN85J+P6tbuTFPgywIVOZu7YdUa0Yr33XsLOZ4EHRx8SlvrAtS4JtY+mRb6QU8s9yJrNy2sI+S412DgrygI1pqCLSLXCXDTk8gHjSv7gDcZ0kkQvNJ2E5c2qULuF+CcelYlhHy/6V5eJXLA50XlvafKv0xXq+sduVWAEy1S8TMHbGz5hLpBpGbt63pmJsCvDnhmuXszS12iCtfTw74r9Wp11JF/pqQ2C3layB+bnR30FBEh34vWrNmgJ4oCvKpbWPff9Yt6KJi8ioGNjny+8c3aU0T0aEfI4xnujXSR7FkiWgsShmOOfOdh65iQl2eGhx8X8ky+1AJulVQnvztyiyPfbULiytTg4KgA3z9wbd5HkZ9KIqKA33LksSb/z0RBsKHJmKnMRDLvzgpwBbv4ZhLgfHomMJ/8Xki9P5ruCDMRCcOxHK10Lq9XKqHuP3Rlj6zdpJ8REnLAD/o9RuukQaW7taGhJ4yPpQtUGan1ZvrkDzbsby7Ug+BpsXbHkt4LeM3kMUe+7YDbZaWZe5gDt4V8w7TbkXabSESua4tEgzLLBur1+R89IkJ+vUz+ftXR+clLWSb5F1J3Y9+DFPM2AAAAAElFTkSuQmCC"></div>
                                                            </button>   
                                                        @elseif($seat -> schedule_seat_status == 2 && $seat -> customer_id == $user -> id)
                                                                <button type="submit"   class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADvElEQVR4nO1Z3WtUVxC/jfUtmsy5roovYgmKIIj4oKKlVpM7s7FSaBU/3vwPRPx4XB9EH/sRrR9JvDM3mkq0IKVQ+lToB5FCQUUfLBgFo4iiIFEx8WPLnN00UTfuPbs3d1PZgXlYdu+Z32/mN+fOOet5datb3epWt7rVrW7/Y/v1kw8N0yZg7ALGq4bxvmF6ZYTyibiuxXjfCF0xQp0mDL7UmIlyAMZthvFmYqDj+w2Q7JbqGfRtnmazkz6B/OvVwhNeLtdQMQ8jdKzmJGTU8bsKSeAXtQdPr7kv+Lm7pGrTE/l3S4wGFFtsHiDUXnPQMiGZwEVWx2sOWBLoFRD8q/aAqaQD44XYRBpPfzbLO758ut/VOs8ItoJQBzANpQ+ahjS2H9J6xaKYLLZqbHbvujmGqS81IoxnNGZFYJt78GNdAIRuG8ZhEBw0jN+D0Br7g7z3gWE8lAKJQxorFqYSc9TRMosfsbOPJTOJlWE8Y0m4YBq1sg+Mf9DzvEzYPncyegaYhkbl5IqpUDqXYGF2tT4HTIcTJyLUUTEmLaVjwF6bsShoS15a2FqoRgWYbBM5ZQ0HNVhha06WiK9bbGGycMekO4FTQMYXdqS2Iz6+TLAaL+0clcs1aAxHTMOq9TuuQWfIet9KQPBeUkSA6a6u2dhNGednixVx1WMeOJstNvz5BIn8UMXA2utpx7uevUHoG7u7RMFSHa0TkNV1iNqWFJKD37rJil6B4Cq7BSswx+w9niXZhV7C5vfgIhB84pjUr8dWyOUa3MngLYhoa9VDXHFIBQm2G8YfrcetBONXJc/yWiLDdDop3Tsm5lpjZ/tiP8quA6aojBRPmZBWls1QTYgI7rJ3ZkL/mKhtxbt+G7vU6RHAe3rZB4L9zV3t84HxUVH3a0DwrBG8VOruYEoRAaGDTULL9EbRcLBDj7BmrDq/6KWg3YpDWumHuHb8zjqliOjVDghKDMkNzu2jzJQlor0wMwpaQHD/hO8xpj/nRBsXgNC5iqQFjE9T6pMHPgefAuOBEpXobz6lfUN/v/HdiENF8HJKRPIQ4l4QOvl2NfCm7aG3qzQQn0jc01kCbsGO7Uw/Fe8ERvTzzM6NLYbxYckTYRzLREGL8yhdoTf2UUbPH/pmB8FV+jdCgRxd1P9jtE/GVeN5U/eGjzwX0xdUKtIS3KOJKwyLOHq++bmJNyyHMKA3Zq+dTiT+I8O0zwg+S0tmZkLHZ8C026t2Iq01Eb8HF3lJWLlAU33995EI/jFhIKbfJnd9/D3OIv8CqtwTGaSLUnQAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                        @elseif($seat -> schedule_seat_status == 2 && $seat -> customer_id != $user -> id)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADu0lEQVR4nO1Zz4sUVxDuNXpTdF7N6LIXSVhcBCFIDjFEwfgjRC9CEkjizf9AJJqrh6DHRDf+ihIwRCNJhCCCeBISxRBMUNntqp7tqt6Jo4hLhLAqatSWejOrq447/Xp6eyZhCuow9OtX9b3vq9f13nhe17rWta51rWtd69p/2M6cmWkYPwTBQ8A4DIJjwPgIhOJM3M6FYyA0BIIHDeMHGjNTDMXQ/wSYRjNLOjE4igpCH7WOII5f0dXJHYA864bxay+OZ6TGYZj2txsETIAR3JsOROi/3+7k4UXf4C6pdtSENHFG0dwS4yiGwfq2Jy0vk5j/bnJZMR3oXCCYvFaM4O/tThheLq/fEgOZTVT0LlyYBRXsMxysAaFBIzSe/+qTxhyEkFZrLpqTza0Vm8+XF4DQDzmu/DGNmSrZIgcrdALDdBWE7gFj1TB+X2BabgfEcY8R3JlDHezUWIlyerGPon1NJt9je5847plWZhiPWRAuOU1YsxeeedHzvFI01DsdNWOExifk5JpTjTqHYIWQ3raBBL+aBkYGU+ekVDqu2tHaivlrM2eEgzU6d6qc6kWUPCBj1QarYF/mjFSwry4r95zsTuD20gPbUtt+DB9mBoLxoe2j4niGxnB8/56iv+YadE7Vh3qd3MhMVkLXdc7ecrmUYhGqznpUL0S0riYB/DlDaR1P27DaGtGKdz57M+3SoPMkeF1b65bZYORC6C+pFTrtdmTjUSHy37JbsCbmFphuFdlf5GVsIDhgmG47LuqXT2ewBeYGBgSvFKPg45abuHqTCowbjdAJ9aRMAOMXDc/ySpEROpKh7l10HvQGwWIIaZVh/LbJ2O9M5C9LQHH+QApMW/TOzAiVjQRvTjU2MdX5sYA37GUf0/leGV4Igv/UQS0HoR9B8FKju4NOA7JjblReqjeKJsRNeoSFJ/qn03opqFuxSggiXDl5Z+00IBuA8XDTcYxV+5HsVCBaC6WRkX5g3D7Fd+zcglF6FYR+SiUtw3gnF1aY/oYI3wGhzxs8Oz9Phhcapj+ee3bfhZHLOclLfRsIfdMAyGgxKi9tIDVxYCTZ6SwLt8nWdyYjeLJ+J3Bff5f+UunRzYYnwiRWGhnqT9FKp/LZ5T9L9vzBuFE/yPo3goIzjBdr/8fQuUnj/51fCV7zXKz2gcqDFdxaWzja/eR8w3iqWAnfKET03uTey0S02UtjIPSZEbybY73EjbyWA36aCsRTMDjQbiAgONASiEnMTBmo0+f/PwLBs1Po95fpnB8Ef00yyWOYc8fu6UUDkgAAAABJRU5ErkJggg=="></div>
                                                                </button> 
                                                        @elseif($seat -> schedule_seat_status == 3 && $seat -> customer_id == $user -> id)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADvElEQVR4nO1Z3WtUVxC/jfUtmsy5roovYgmKIIj4oKKlVpM7s7FSaBU/3vwPRPx4XB9EH/sRrR9JvDM3mkq0IKVQ+lToB5FCQUUfLBgFo4iiIFEx8WPLnN00UTfuPbs3d1PZgXlYdu+Z32/mN+fOOet5datb3epWt7rVrW7/Y/v1kw8N0yZg7ALGq4bxvmF6ZYTyibiuxXjfCF0xQp0mDL7UmIlyAMZthvFmYqDj+w2Q7JbqGfRtnmazkz6B/OvVwhNeLtdQMQ8jdKzmJGTU8bsKSeAXtQdPr7kv+Lm7pGrTE/l3S4wGFFtsHiDUXnPQMiGZwEVWx2sOWBLoFRD8q/aAqaQD44XYRBpPfzbLO758ut/VOs8ItoJQBzANpQ+ahjS2H9J6xaKYLLZqbHbvujmGqS81IoxnNGZFYJt78GNdAIRuG8ZhEBw0jN+D0Br7g7z3gWE8lAKJQxorFqYSc9TRMosfsbOPJTOJlWE8Y0m4YBq1sg+Mf9DzvEzYPncyegaYhkbl5IqpUDqXYGF2tT4HTIcTJyLUUTEmLaVjwF6bsShoS15a2FqoRgWYbBM5ZQ0HNVhha06WiK9bbGGycMekO4FTQMYXdqS2Iz6+TLAaL+0clcs1aAxHTMOq9TuuQWfIet9KQPBeUkSA6a6u2dhNGednixVx1WMeOJstNvz5BIn8UMXA2utpx7uevUHoG7u7RMFSHa0TkNV1iNqWFJKD37rJil6B4Cq7BSswx+w9niXZhV7C5vfgIhB84pjUr8dWyOUa3MngLYhoa9VDXHFIBQm2G8YfrcetBONXJc/yWiLDdDop3Tsm5lpjZ/tiP8quA6aojBRPmZBWls1QTYgI7rJ3ZkL/mKhtxbt+G7vU6RHAe3rZB4L9zV3t84HxUVH3a0DwrBG8VOruYEoRAaGDTULL9EbRcLBDj7BmrDq/6KWg3YpDWumHuHb8zjqliOjVDghKDMkNzu2jzJQlor0wMwpaQHD/hO8xpj/nRBsXgNC5iqQFjE9T6pMHPgefAuOBEpXobz6lfUN/v/HdiENF8HJKRPIQ4l4QOvl2NfCm7aG3qzQQn0jc01kCbsGO7Uw/Fe8ERvTzzM6NLYbxYckTYRzLREGL8yhdoTf2UUbPH/pmB8FV+jdCgRxd1P9jtE/GVeN5U/eGjzwX0xdUKtIS3KOJKwyLOHq++bmJNyyHMKA3Zq+dTiT+I8O0zwg+S0tmZkLHZ8C026t2Iq01Eb8HF3lJWLlAU33995EI/jFhIKbfJnd9/D3OIv8CqtwTGaSLUnQAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                        @elseif($seat -> schedule_seat_status == 3 && $seat -> customer_id != $user -> id)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADpElEQVR4nO2ZSWsUURDH2+0TaDJVrcEFMQiCiAcVFdxRL4IKLje/gQSXqwcxR5e4K4LihguICOJBolM1RkVBRQ8GjAGjiKIgUXG6nj6pnklMdOL06+lZlCl4h5npflW/96/qrvfG8+pWt7rVrW51q1vd/l2z7d5IycBaYTgujM+E4b0Q/jCMNomhcwnDe8P4VAiOCcMa9ZkohEnjBiHsTipoB7iXhv11JQPYC94IXZ1KA5g/gOCotd7w2CDCeLjaEOaXOgfjQRCsrnbw5ncYxlUxUqryNWGKg3RpbNHVYFhZ7aDN0DDLHEDwSM2CkEOtGML71Q7YDD3uRgax7TjGPvBGWW7yhfwlwtAmjL1VSKPe0HfaX6yxhDG145jIIAXhOhpThvFC5VIIzqvPWMEGjPN1AiF4LQRZIegRgnMB4bwQxnrDhKG1/EpAq/qKEtNvqeSNFMJDRWQ+oNepg3IqI6qE9Ya5xNQPUuyGgTfmwBugHDUjjL196eQaUyidi7MgjXNDR4z7y5BSbbFjUikdnZ3Nr9jS5NPKX5KbO0ZMWkRuzqAnTC9u8pMGsdzk50HcY9IngRs9Gm2p8/3Y9+TUwO86p86tPhxBsprrb5xX7p4/Ol8n7xIEeRsqnYYG93tzipyPceMKdWoIriSYWpfjNqxhjWjFu+69hWCvOs3S2OnaWpesBuOLbCY1LV8f+xyV/BGwPyf/HoG9jo4/27Q/xUvYLPvNQvDFUY09vybQAnOFIXhlMv76kpu4fJNqCDcahqu5EU0JYdhdcC+vEgnDmQTz3mVln9tbMFUyqUXCeKrIIp4OqHF20RWqBohhaMmdmUFn0JGa9bdrI0tdORXwnR72GcYOexPGC+En/V47W0N40TA8LnR2UFMgwrArm/Fn6ImiyfibdAtr+n4nuBEeCjKs1BQSSi0Y+GStMRBcJYwni15H0KMvyRoGgU57p2GyEO4Y8j1GkLG3UxMN4aVYqSUEXysCQ/BBOLVQCHcW+L3DPpww3jA8HHwPBtEVIXxSCZD82CYEJ/6ExG6toQIp2eWgSLTdWRIjLPi+JxPhNd2v66rr5zD1GD4W3BFGMXtn3GTXVjruyBUyvNY3e8D+HP0bIacEPNL/Y7ROBkCIpcZJkUHC9GJoqYwqqa3hwhHsG7C/uR7cxZmShuWDei/CzU4Q/TCE24XhWwXrxRYaYQwEW7xSO9Jqg1j2m0uC6FemiKNan/9/BAEe0hFBuqzzM1CUSX4CI/gkjtJHJ7IAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                        @endif
                                                    </form>

                                                @else
                                                <form role="form" method="post" action="{{route('orderTicket',['seat_id' => $seat -> seat_id, 'schedule_id' => $seat -> schedule_id])}}" class="col-2">
                                                            @csrf
                                                            @method('PUT')
                                                    @if($seat -> schedule_seat_status == 0)
                                                        <button type="submit"  class="btn btn-none shadow-none col-12">
                                                            <div class="col-12 text-center mb-5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC8ElEQVR4nO2aPWgUQRiGV6OoJEZMpRhR/AkKGn/Bf0khYqFR0EpCsDKCAU0s/MPkCsEipdhYGbCRIAqigj9djDYiaUQQtREEFb0gGBX1kQ++k2G5bOZuZu82YR7YIrMf774vMzezO5MoCgQCgUAgEAhUGaAR2AnscrhWAjWG5jRtc9EUTwt8Bp0LXMcfw4b2sCfNv8AtoME17BTgHp4x9H3zQDy7BN6Tgqk0Awu7XQKfnYCBz7gEzk3AwLkQ2BbgkM6AXjH0fSNeD1oHLAawGXjq05Wh7ZMh8VrK8tMUW9C3AfV6fxbwOMOBHwEzVbNevZtZmv4vV8D8hB78DnRo3WLgZwYDi6dFqncMGE0YAfOkaGAcwd/AahW8m8HAd1SrWb0mcUMKRyxEu1S0L4OB+1Sry6I2H5WytgE9ZC9wTynvDFGJgdcA94GHZV7PgX4jcL9+QAyVqSdemlMLnGXS6uEaYLvDt+uyIkaXO+iJl6lpBu7E/U3ovBH2Au4cTzNwDnfyRmCbFcKrt6hE0VYPLx9DRuBnjlriZV9qgbNMCOxpSO/39T7tCfHSmloPk9IOSJYnrRzZIwROIsKO0MNV4AfwIbbH9g3onmy/4U9Au2wzqYfZwFFgY2wd7pwMgfPACn32Ft3CWat/1wKHgTY5/9K2qxM98Dl97kWjTYb0JeC10fYeWKi9/zVJMALeZTjwKtl4A/5Y1F5RjzcTat5KwSkLsV4V66WyyE7pOsva2+rxWkJNd2FPugN4Arwpcr0EtqrYJuDVGHVpXDuAGcBHi8AnjR6O6wzqRFf+UWolkY/8ccJKqDqXB9QBSxKuRq+J7DwNJKzPG7TG9FhrKyxHFV8shtDptEPGfM0BXsQ8yGTWrvdPxO59tgoNTI9N+WPRVomgMW8NutVbCHtE2w8Av2L+ZK6psRVemnDeNFI4iagGOgIvA3uNf8uQYW0yWDhvKgldFlqMbdH11r+NCiHnXoa/lrKCBgKBQCAQCAQid/4BnQc5hEvJvewAAAAASUVORK5CYII="></div>
                                                        </button>
                                                    @elseif($seat -> schedule_seat_status == 1)
                                                        <button type="submit" disabled  class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 2.5 vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAADyklEQVR4nO2aTYgURxTHy6gkIWZn6v+vVoMrK7qRBPKdQDR+4CGIB2MC5hREctJAAonJIV/4cQjkkGPIJacIuQQJEcQIftyMelDESxDDOumqXkUNcSVg3JDshDd0D7Ors9PT0z3bK/WHgpnp4vX7zat6Vf2qlfLy8vLy8vLy8pphOWDQGrM+Al7N2mrAk3Wl5iY260rNk996sSk+WWBJbqBhpaId8L0j63k0S15IbMvnnGxOOOAnOzCAnmDrSs2x5M95wSYtsZ+3XUceFZ8zA1utNxXgVJHA9RDYmBnYAZ/ONmBHfpIdmNw3C4H3eeC0csCbjQw4SyIcZ+utqQHvJQessuTpsgNb8pT4qtKortScyJiVrQv6qNZrLgEDct0ODj5sgRNlBbbA8drQ0ENiU3wW3ydtUIxZ2VyufjfmsbYRBG47cqf0q1Uqyxw5XkLg8SvV6pDYi8h3HPB3uxFQC4LFsts50GGo/Gu1froRaeBw2YAtcKhhq1p9RnztwPKD3PRWR8PArng+f1U2YPEp9m1Xiv5jqpu1zQJ7ygYsPnWzZ1DdALtq9VlHHrHksUwNOGfJ/QmwfJYHCJlfWeyJLzKUCwMuswoBris1N9R6beZn1yAYvstRYx7Pak98qSv1QGHAFnivp/lGToTA5wmsBXb3PIfJdwsDdvk8TIy1DMPOK0TOvqlujIbkll43H5KgmhEmz/QIOx6RrxUGXGZ5YOYzpF/Paz+dUxuXaVZYhF1BFZDSJi3ngTnT0fURdvfNkAbuOOBqa43NAn+FWn94X81hS95wwHYpM4kPN8hHnTE7QvKl1nU47bZXlRx4bJR8Qu4dab1aSjhREDwn368uWvSIJd9y5DY5/4qhv53dwMBn8X2/aIn4hAW+dMBvLX2jSOuljeiTNzsB18oKbLV+SgpvlvwvxZ/zTSPK5I/T9LssHT7qeGNgbzxk9vYTWCqlkTHPpxwNB2Pg79r1CSXBSb1WSrGW/MUBI1ObJX+NtH6lEWHgZQtcvFe/IlpozLpLw8MPWuB6CuAPmhG+m+GkJLqejlL7KXnI7wA7ci0IFmS+wbUgWBAuXLi8XZPXH1Sf1bZ+DtwJjXlR+rT6KFlcpZEcVTjyzxTz5mPVR41oXbHA+Um5RZIZsF2uO+D9Kdf+SAV9Vqn5U1J+u7ZN9VnyDoeUehPYEHi78Tv5hiP/mZJoL7a+QDOtwiBYMc2J4a3kJGImFI/AryNjNjdfy5Bt5+TonkzOm7pSfIC2oXmiaMwLqedGnyTnXol/4msmUC8vLy8vLy8vL9W7/gcpe3kbSo/pfwAAAABJRU5ErkJggg=="></div>
                                                        </button>
                                                    @elseif($seat -> schedule_seat_status == 2 && $seat -> customer_id != $user -> id)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD4klEQVR4nO2aTYwUVRDHGxGDSna3680oBAgEdQkHMHrwkxgPxOABPMCBA8GbKOoBOKAxAic9EA8evZhgvBhjPBgkUQkXXAwZEiRDV3UPVc1uQogJCOtB2ERtUz0fzE6YnZ6e7qEnef/kJbO9LzX1e6/qvdevxnGsrKysrKysrKzusyAIVpXEfwXY35K6hf4GJ4oWt4yePv2gPhvEZuzTjL8yM9Dx6YsuCH1thKJsGv7etK2fM7HJ+B8wfj82U4XBaKNokWH8MTvYersLnK1dI/ST+pya1w1paw5O5QkcgXivpQYG9j4cNWDD9EFqYMN4dPSA8agFTipg3Kkr4MjMcH213pEY8F6C0HvBMJ0tPDDTlPrqJFIULSqxN9m+obuX6WUIgjH996qZmYdB8FRRgUHwlzVhuDSeoCAYi31vP5ywN9narkpXvBXdZhAY/zaCe7XfeIhrjdBcAYHnJuTSmtheiG8D4+1uEVAOq8v1S7/tkRf/uIwb49ETPFE0YBD6QW1NMG1SX3uwfKPHu9meRpn2x8BMxwoHzHSs4dv+3v3xltPP3gZChwsHLHS4nzOD0w/whPhPG8aTRvDnNA2YzhvG4y1gxuPxCwTTVCqbjCc1lHMDLrLyAY6ixS7T5rTvruVa9clOR0uXLz2V1p764kTRA7kBA3vvZXAS+qgJC0IfD5zHTO/mBmwyeZnAW60wTLBDZO2b05dRwe0DHz6Yptry7rcBgecM47b8crjAssCSSUjTG1mdpzNqc5pmuc2wyekGpLiLFlvgyM6w2JCOsslVug6MCIJ32p5Pj8BJi/pqwMhaEGiemZ1q9aFS6O/SG5j5+zC9M/LAwHRVr6AaJZ9tesnu1vAl9WV5EJTjsz3TPv2sz4Dpi5EGNo37NCP05Xx/6HMQ/KNtYK5pddNlHgehvxYGZgqLCuzWaquN4PqEg/NZw8fuxT9G0Q4He4aW0JE4ZISODBNYQ1XfeZP0BcavGtHwXdcBZDpQL4kK7jVCv+oC0dkMo9fMGxD/eWCie/XLp/nPrbhaecQw3eg9Kf6eOrBeJXUwCJ4pCb41UCl1mALB9xeeXTrvVCpLUn9BuVpd9ti0v65b0wXCGbK63p8z3iwHwRN6/dTu4+PXLjyayLCWKgzTnwny5lDulB1+gVBlfhjjnXiPrkfBp/MHgq4ng65UloBQrScw025nyKr/3gTPNRap225Ir+vzeA3qqHLqWuO0/4BmIWmIdK8Y4myzEnE/pOlmhD5xQ+9F/RvEe9Mw/tvh45lmvakvxQW0EF9tVeGueM8mzo0hqRQGzzT9U19TgVpZWVlZWVlZWTmD639QVMVHxryNZAAAAABJRU5ErkJggg=="></div>
                                                                </button> 
                                                    @elseif($seat -> schedule_seat_status == 2 && $seat -> customer_id == $user -> id)
                                                                <button type="submit" class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD6UlEQVR4nO2aX4hUdRTHf2qhke3M+c0sFRqKmhRk/wwqzbaH9Z4zs2pB7UtI9FRBQWkP/SPXh6AHn0J6sGzvOXfsoZEoCAv8gy/r1kuELyGE+hIEGrUS2G6kG+fOzuw0Obt37tw73o3fF36wc/fHuefzO7+/53eNcXJycnJycnJyus6yFVqZ5/LjVnAwfinfbarDSxpGTw7coM+6sRn6xEMrEgPNfToEVvCQFZpOpuDpRiMKnk7EJtNVYPyi72PPdkc7bRZZwa+Tg62VWeBk7QLTUfU5Ni/4HiXtVJrAM9H2YgNbxrcWGjAIvRk/woJ7Fx4w7nXAUWWZntEZcMFEWH31vacjA15L1qdHQPDbzAMzjauvJpKmzaKilNY3L+jglzbbCvXpv1dWh28CxhNZBQbB46v8gWWhzQr1hb43sRSltL6xXBUreHu7CALjZWB8UevlfFxtGacyB8w4lT9UXqX2QPAlEPqzXQ/o98u3aaXD8xj8G0ZLG0IHGY9kD5i+Ult5pnvV13nqf2aA8VIEo7tqDuK+zAEL7qsFg3ZFqD9hOlnbrNCe7AHTnk72DKYT4Hzg3WeFvgGmYzHL9yAodWD9OzxAMI3Hsae+aFdODTjLSge4OrwEhB6Le3btD7x1rY4WRwfvjGtPfTEjI4tTA7bsvdLVeKvt2t6pw1rBd7sdw4UAX04NGJI5TEw0umGUFSJh30wnRguMO7refDCNNwF/150tnMoHtD29MZxhOWBJoksLPpnUfjqRwjilwyy1CENKGZDMTlrggMlF2LouTQk1Ak6C4C/NOTZg+gMEd/+/xjDjRcul5zTNFK4UB3fcAkwvFKT0UPM6HHXbazIOPFHwvbtm3v2opnByfvl+/X1rsPVmEO/ZPNNOvf+qQeNHCxuY8e3wvYzvzT6jq5bxfWD6qcm/n2HUu0OjbwV/nw/4fFaBIdh6jyberOCVCI3zYa1x6PP2deicAfFen98YjdS6DI30ElgzpTmhByI1DtOXM72B5wjc7jAnralYy3TKCp5tLcD4IwTephA4KD8MTGeuVS+Nkq/gFvMBLbWCFyJAvzYb4f/YGtOJrqur1F5KD/lzw+LZ/urA8tgv6K8OLM99MrSmXdHPH0yP1T5/jpNF9jZqnWYfdRY3UaRXFZbxtwhj5g3TQ8GBwZwV/KEF9oqu0aHfjK+2zDu/RoM+sPHG5im/XdH1z/RY+g2HpnobsAE+r88LQekpK/RXS0DO/OsDmjkNM62d477pUv0m4noovCwT2p8Xb9vsZxk42RL5sfp9U0fSZaHg4xONW7gKPhh5bPRIeu9V9099jQXq5OTk5OTk5ORkutc/H+IWmsAjGBIAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                    @elseif($seat -> schedule_seat_status == 3 && $seat -> customer_id == $user -> id)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD6UlEQVR4nO2aX4hUdRTHf2qhke3M+c0sFRqKmhRk/wwqzbaH9Z4zs2pB7UtI9FRBQWkP/SPXh6AHn0J6sGzvOXfsoZEoCAv8gy/r1kuELyGE+hIEGrUS2G6kG+fOzuw0Obt37tw73o3fF36wc/fHuefzO7+/53eNcXJycnJycnJyus6yFVqZ5/LjVnAwfinfbarDSxpGTw7coM+6sRn6xEMrEgPNfToEVvCQFZpOpuDpRiMKnk7EJtNVYPyi72PPdkc7bRZZwa+Tg62VWeBk7QLTUfU5Ni/4HiXtVJrAM9H2YgNbxrcWGjAIvRk/woJ7Fx4w7nXAUWWZntEZcMFEWH31vacjA15L1qdHQPDbzAMzjauvJpKmzaKilNY3L+jglzbbCvXpv1dWh28CxhNZBQbB46v8gWWhzQr1hb43sRSltL6xXBUreHu7CALjZWB8UevlfFxtGacyB8w4lT9UXqX2QPAlEPqzXQ/o98u3aaXD8xj8G0ZLG0IHGY9kD5i+Ult5pnvV13nqf2aA8VIEo7tqDuK+zAEL7qsFg3ZFqD9hOlnbrNCe7AHTnk72DKYT4Hzg3WeFvgGmYzHL9yAodWD9OzxAMI3Hsae+aFdODTjLSge4OrwEhB6Le3btD7x1rY4WRwfvjGtPfTEjI4tTA7bsvdLVeKvt2t6pw1rBd7sdw4UAX04NGJI5TEw0umGUFSJh30wnRguMO7refDCNNwF/150tnMoHtD29MZxhOWBJoksLPpnUfjqRwjilwyy1CENKGZDMTlrggMlF2LouTQk1Ak6C4C/NOTZg+gMEd/+/xjDjRcul5zTNFK4UB3fcAkwvFKT0UPM6HHXbazIOPFHwvbtm3v2opnByfvl+/X1rsPVmEO/ZPNNOvf+qQeNHCxuY8e3wvYzvzT6jq5bxfWD6qcm/n2HUu0OjbwV/nw/4fFaBIdh6jyberOCVCI3zYa1x6PP2deicAfFen98YjdS6DI30ElgzpTmhByI1DtOXM72B5wjc7jAnralYy3TKCp5tLcD4IwTephA4KD8MTGeuVS+Nkq/gFvMBLbWCFyJAvzYb4f/YGtOJrqur1F5KD/lzw+LZ/urA8tgv6K8OLM99MrSmXdHPH0yP1T5/jpNF9jZqnWYfdRY3UaRXFZbxtwhj5g3TQ8GBwZwV/KEF9oqu0aHfjK+2zDu/RoM+sPHG5im/XdH1z/RY+g2HpnobsAE+r88LQekpK/RXS0DO/OsDmjkNM62d477pUv0m4noovCwT2p8Xb9vsZxk42RL5sfp9U0fSZaHg4xONW7gKPhh5bPRIeu9V9099jQXq5OTk5OTk5ORkutc/H+IWmsAjGBIAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                    @elseif($seat -> schedule_seat_status == 3 && $seat -> customer_id != $user -> id)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD5klEQVR4nO2aTWhcVRTHX4wVP0okwcmc82ZsxbQRC1Xsws8gXYjYRdOFLlyUdtfYDxeti7aUNq7sQly4dCMoboxIF0WLjRLzzpmXQZKFICqUtnRRpFDtx6LJzL16y3kzk2QGJ/PmzXuTN3D/cOHlzXByfjnnfp0Tx7GysrKysrKyslpnmWIuXy7A64rcN6IOMwfPmimnf9nmjPOgvOvEpvhk/HwuPlDaNKgIvtKMJp4Bv9Zsy3McNhXhf5rhnPHzQ53BGqdPM34fH2xlrADHa1czXBSfIwMrD96K36kkgdEoxjcjA2vCk70GrAlPRI8w4Ye9Biw+W+CwUgV4p7IC9kaExVfF8LbTico0/LJmnEs9MIEvvoaCMsbpM547Wrehe/iaKQ4NBJ/7+Uc04U+pBSb40cxsfjjwtTg0IL7XHXg8d3R5uzKzT2CzCCqCe5pgIvjeXPYpRVBKG7D4ZAqwuWIP3lMMi80ywMxkQLaeb9Y0yKhL/vD2wCDhd2kD1oznxVbJyz0nvrZg+Vq2njutjcLRYBFj/DhtwOJTNbpHW2cD3nba2ds0w5m0AYtP7ZwZnHaAS5R7XjNe0AzTEceCYvyiBizPwQWCwI9mDy9IKicGnGYlAmymnP4y4Vjk+7Cf39LoqPk5tzXyXZhwzBjngcSANeGRGO6tp2qwmuB0x3OYsocTA1YxXCaClXIlDUPsEPH65rRllN3xjg8fBP5yhBmLncFCSZG7OzHgNMsCcywpjXviOk/HMYKUZnc8sQirhCog6V20yAIbG2G2KW1iWqBuKoI/FMPS8juGa6k/ael2QRkvS0OgdmY2v217SBfcd6UCs3of1gwHex5YEVyXEpTUo+REJUX2csF9NQD3IBOc7T04JM/VbfOzngbW1XqaIvi84Q/xqSK8sSoL/pLuppkffFwR3l0TWBFeTSuwmXWfNOw+EzIon1RSu3nzTzFekSvaB60NwmR1nkx2FdiDjNx5QwEzflkF/nYNjmOVlijBhCYoBAtE4yD8vTZvyl72JUXw5/9+L4FR9rMvmnl8VBH8HSL991WDMt1oRzOwJjzQUSu1m9KM77fIwAUz72yI/AvMTGajoeGnm45iLu90Wc3q54rhluHMiJSf6nz8IftYKMPSqlAM/7ROITyeOGWDX5pxvgF2SfZo+VwxnK1fxOBmKGhJDUVwKcRCtrcboHW+0aZBTfhLFXZREeyS97IGNXY5Za0xq/6BZm3DnBlp3m+SOlSlE7EekummGD4qs/uK/KwJ9ivCfxuCwbV+U1uqNNCyO2tl0dIs7gg9N7qkUsF9YaV0m90ZCdTKysrKysrKysrpXPcBqXU0zAX2I9kAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                    @endif
                                                    
                                                </form>
                                            
                                                @endif

                                        @endforeach
                            </div>
                            
                        </div>
                                            
                    </div>
                       

                </div>
                <div class="col-5">
                   
                    <div class="row content mt-3 mb-3 ">
                         @foreach($schedule as $schedule)
                            <div class="row  mb-3">
                                <a href="{{route('detail',$schedule -> movie_id)}}" class="text-decoration-none mt-3"> 
                                    <span class="border rounded-pill text-light text-center px-3 py-2 fs-5" style="cursor: pointer;">
                                    <i class="fa-solid fa-left-long me-2"></i>  Back 
                            </span></a>
                            </div>
                        <div class="row">
                             <div class="col-6 hide-scrollbar" style="height: 30vmax; overflow-x: hidden; overflow-y: scroll;">
                                <div class="text-light fs-2 mb-3 fw-bolder">
                                    {{$schedule -> movie_name}}
                                </div>
                                <div class="text-light fs-4 mb-5 fw-bolder">
                                    {{$schedule -> room_name}}
                                </div>
                                <div class="text-light fs-4 mb-3 fw-bolder">
                                    <span class="text-danger">Date: </span>{{$schedule -> date}}
                                </div>
                                <div class="text-light fs-5 mb-2 fw-bolder">
                                    <span class="text-danger">Start time: </span>{{$schedule -> start_time}}
                                </div> 
                                <div class="text-light fs-5 fw-bolder mb-5">
                                    <span class="text-danger">End time: </span>{{$schedule -> end_time}}
                                </div>
                                @foreach($seats as $seat)
                                    @if($seat -> schedule_seat_status == 2 && $seat -> customer_id == $user -> id)
                                        @if($seat -> number <= 12)
                                        <div class="text-light fs-5 fw-bolder mb-2">
                                            <span class="text-danger">Seat: </span>A{{$seat -> number}}
                                        </div>
                                        @elseif($seat -> number > 12 && $seat -> number <= 24)
                                        <div class="text-light fs-5 fw-bolder mb-2">
                                            <span class="text-danger">Seat: </span>B{{$seat -> number - 12}}
                                        </div>
                                        @elseif($seat -> number > 24 && $seat -> number <= 36)
                                        <div class="text-light fs-5 fw-bolder mb-2">
                                            <span class="text-danger">Seat: </span>C{{$seat -> number - 24}}
                                        </div>
                                        @elseif($seat -> number > 36 && $seat -> number <= 48)
                                        <div class="text-light fs-5 fw-bolder mb-2">
                                            <span class="text-danger">Seat: </span>D{{$seat -> number - 36}}
                                        </div>
                                        @elseif($seat -> number > 48 && $seat -> number <= 60)
                                        <div class="text-light fs-5 fw-bolder mb-2">
                                            <span class="text-danger">Seat: </span>E{{$seat -> number - 48}}
                                        </div>
                                        @elseif($seat -> number > 60 && $seat -> number <= 66)
                                        <div class="text-light fs-5 fw-bolder mb-2">
                                            <span class="text-danger">Seat: </span>F{{$seat -> number - 60}}
                                        </div>
                                        @endif
                                        <div class="text-light fs-5 fw-bolder mb-3">
                                            <span class="text-danger">Price: </span>{{number_format($seat -> price)}} VND
                                        </div>
                                    @endif
                                @endforeach

                                @if($total_price != 0)
                                        <div class="text-light fs-5 fw-bolder mt-5 mb-3">
                                            <span class="text-danger fs-4">Total price: </span>{{number_format($total_price)}} VND
                                        </div> 
                                @endif

                            </div>
                            <div class="col-6">
                                <img class="col-12 border rounded-3 border-0 "  src="{{asset(\Illuminate\Support\Facades\Storage::url('img/movie_poster/').$schedule -> poster_img)}}" alt="" style="object-fit: cover;height: 30vmax; width: 20vmax;">
                            </div>
                        </div>
                        
                           
                         @endforeach
                    </div>
                    <div class="d-inline">
                         <form role="form" method="post" class="d-inline" action="{{route('bookTicket',['schedule_id' => $seat -> schedule_id])}}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger shadow-none"><i class="fa-solid fa-ticket me-2"></i> Booking</button>
                        </form>
                        <form role="form" method="post" class="d-inline" action="{{route('undon',['schedule_id' => $seat -> schedule_id])}}">
                            @csrf
                            <button type="submit" class="btn btn-danger shadow-none mx-5"><i class="fa-solid fa-eraser me-2"></i> Clear</button>
                        </form> 
                    <!-- <a href="{{route('undon',['schedule_id' => $seat -> schedule_id])}}" class="btn btn-danger d-inline p-2 mx-5"  >Clear</a>  -->
                        <form role="form" method="post" class="d-inline" action="{{route('vnpay')}}">
                            @csrf
                            <button type="submit" class="btn btn-danger shadow-none mx-5" name="redirect"><i class="fa-solid fa-eraser me-2"></i>Vnpay</button>
                        </form> 
                    </div>
                  
                </div>
    </div>
                        <div class="row d-inline mx-3">
                            <div class="row mt-3 mx-2 d-inline">
                                <div class="d-inline" style="background-color: #E31313; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Maintenance seat</div>
                            </div>

                            <div class="row mt-3 mx-2 d-inline">
                                <div class="d-inline" style="background-color: white; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Available seat</div>
                            </div>

                            <div class="row mt-3 mx-2 d-inline">
                                <div class="d-inline" style="background-color: #40C057; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Reserved seat</div>
                            </div>

                            <div class="row mt-3 mx-2 d-inline">
                                <div class="d-inline" style="background-color: #13DED8; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Seats are being taken by someone else</div>
                            </div>

                            <div class="row mt-3 mx-2 d-inline">
                                <div class="d-inline" style="background-color: #FCC419; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Reserved seat by someone else</div>
                            </div>
                        </div>

                            <div class="row d-inline mt-3">
                                <div class="row mt-3 mx-2 d-inline">
                                    <div class="d-inline text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAr0lEQVR4nO2QQQrCMBBFc4EWdO+6Z5FuCsVLSsE72Eu4rt0q6AWeBFIRaWxnmkKlecsh89/kGxNZLcAOqIAncuzOCcg00hvTudssidj+NBRHiVhTr4+HRByUKP5VdQIUwGVCww1Q2qzRVX8csHEBGulWIsqBFrgCezc7KMSlL68X9+B9tZulCnHiy+vle9s3H2Iob/liLf8nDo2J4o71Vm0CM0ZcA+cZxPUcuZFl8wJRIS97SX64DQAAAABJRU5ErkJggg=="></div>
                                    <div class="d-inline text-light">Normal seat</div>
                                </div>

                                <div class="row mt-3 mx-2 d-inline">
                                    <div class="d-inline text-center mb-5"><img style="width: 1.5vmax;" class="col-6 mx-auto" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3klEQVR4nO2ZS2xNQRjH+2AtoYIGi6ZRUY+VhJSVakKIRyXUVoSdZ1KxsusOVeq5IPFohERiZWHhkXhtPBMb9SoRxOaqaNGffPK/nFztvWfmnnvuIee3anpmvu/7z3wz883cioqUlJSUlJSUlH8XYBSwBjgBPAE+AENEh9kym4+B40Cr+YxaRBvwgvh5DqyNQkC1RqfcHAOqihFyhOTQ7StiNcljhU9KlWNNFKLXYnMRspTk0uIi5CjJpdtFyF2Sy20XITXAaKAWaAa6gEwZgs7I9yLFYjHVhBYygrgJwPkYRfSYT99gF8rAG2AA6APOAQv0vRLoiEFEh/kKE9NwddThAsYPqV1liWemRz5CxxQUUqjD745qP7FEayaTTSfXmLJT50KT+h0kerq8Y9JUunBWzhYTPc2y7R6TFpELfXJm22HU1Mq2e0zaCVz4biW16rEfRIfZqpZt8+HCgAl56+F0nEbuPdHxTjbHe/Tt88lHY4mcXiI6LhZRsP5aI00ed+9OOZ2j0rpYngEzZfOAY1+LfX52C+507PwZmOZVPuSvLBqAfsdY9gcNVHmIeQ2sK7qI+1OkLgPqgKnArZAzsW/Yu7xNEXCG8mD11WaVP4XWyWlgXpgRihsb3XrgAfBNZ9TLkRq7THUcPAVO6b6xHZgb+LYDWAXs1YPgteCZlSQhj4ApwDZgj3L9Ts7DnKVaO7AJmCVRiRNyFWjUE2mYtNsI7EqikGz6TAbuFSjrW3XWffIR8iUeLZwExuakVfCsatRsBOvBQRchD4mP6Xrdz2VIF7jc3avXRUjY21mxvAImBUqkj8D9wPc27Wx/3whDCqn3KKV9sINtvf62BwUTNQbYDXzVLwEbAu3tjKkLLURibG8vNZdVX7UAs/UwaKm0HJgBrAS2BNpvdRIRENOukSklF5Q+gzn/v6Kn237FsNNLRECMjVi5aShKREBMXpJu/78UcjOPn+sltn8jjJGfT8zJxA5Aeb8AAAAASUVORK5CYII="></div>
                                    <div class="d-inline text-light">Vip seat</div>
                                </div>

                                <div class="row mt-3 mx-2 d-inline">
                                    <div class="d-inline text-center mb-5"><img style="width: 2.5 vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC8ElEQVR4nO2aPWgUQRiGV6OoJEZMpRhR/AkKGn/Bf0khYqFR0EpCsDKCAU0s/MPkCsEipdhYGbCRIAqigj9djDYiaUQQtREEFb0gGBX1kQ++k2G5bOZuZu82YR7YIrMf774vMzezO5MoCgQCgUAgEAhUGaAR2AnscrhWAjWG5jRtc9EUTwt8Bp0LXMcfw4b2sCfNv8AtoME17BTgHp4x9H3zQDy7BN6Tgqk0Awu7XQKfnYCBz7gEzk3AwLkQ2BbgkM6AXjH0fSNeD1oHLAawGXjq05Wh7ZMh8VrK8tMUW9C3AfV6fxbwOMOBHwEzVbNevZtZmv4vV8D8hB78DnRo3WLgZwYDi6dFqncMGE0YAfOkaGAcwd/AahW8m8HAd1SrWb0mcUMKRyxEu1S0L4OB+1Sry6I2H5WytgE9ZC9wTynvDFGJgdcA94GHZV7PgX4jcL9+QAyVqSdemlMLnGXS6uEaYLvDt+uyIkaXO+iJl6lpBu7E/U3ovBH2Au4cTzNwDnfyRmCbFcKrt6hE0VYPLx9DRuBnjlriZV9qgbNMCOxpSO/39T7tCfHSmloPk9IOSJYnrRzZIwROIsKO0MNV4AfwIbbH9g3onmy/4U9Au2wzqYfZwFFgY2wd7pwMgfPACn32Ft3CWat/1wKHgTY5/9K2qxM98Dl97kWjTYb0JeC10fYeWKi9/zVJMALeZTjwKtl4A/5Y1F5RjzcTat5KwSkLsV4V66WyyE7pOsva2+rxWkJNd2FPugN4Arwpcr0EtqrYJuDVGHVpXDuAGcBHi8AnjR6O6wzqRFf+UWolkY/8ccJKqDqXB9QBSxKuRq+J7DwNJKzPG7TG9FhrKyxHFV8shtDptEPGfM0BXsQ8yGTWrvdPxO59tgoNTI9N+WPRVomgMW8NutVbCHtE2w8Av2L+ZK6psRVemnDeNFI4iagGOgIvA3uNf8uQYW0yWDhvKgldFlqMbdH11r+NCiHnXoa/lrKCBgKBQCAQCAQid/4BnQc5hEvJvewAAAAASUVORK5CYII="></div>
                                    <div class="d-inline text-light">Couple seat</div>
                                </div>
                            </div>
    </div>
   
    
    <script src="/bootstrapLib/bootstrap.bundle.min.js"></script>

    <!-- <script>
        function reloadPage() {
            location.reload();
        }

        setInterval(reloadPage, 3000);
    </script> -->

</body>

</html>
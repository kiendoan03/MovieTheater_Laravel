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
                    <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-50 translate-middle" style="font-size: 1.2vmax;color: #ffffff"></i>
                </div>

                <div class="dropdown" style="height: 3v
                max; width: 3vmax;">
               
                    <img class="col-12 border rounded-circle " style="object-fit: cover; overflow: hidden;" src="{{asset(\Illuminate\Support\Facades\Storage::url('img/user/avatar_default.jpg'))}}" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" height="" alt="">
                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1"> 
                        <li><a class="dropdown-item bg-dark text-light" href="{{route('user')}}">Profile</a></li>
                        <li><a class="dropdown-item bg-dark text-light" href="#">Admin site</a></li>
                        <li><a class="dropdown-item bg-dark text-light" href="{{route('login.login')}}">Login</a></li>
                    </ul>
                </div>

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
                                                    @elseif($seat -> schedule_seat_status == 2)
                                                            <button type="submit"  class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA5klEQVR4nO2UUQqCQBCGvUDFjM89dxNnRIggOl2Rs0ovIXSHukTP1WtBXaDYyAhyaVctivxgXkT/b/1x9LyGvwWmQRcUZ6DohIrPLqOfAaGFn1LPWYqK967CpxE66Cx7seKssvQu57mD2L1eY+1CR2txbW97m0ZsxJ/0W34SDkB4XaHiDcbBUGdZV53TmUVwDSghbY8DtBZBTBEo2oHQFiQMrx9awiNncRwMTXmF6BseT62vYcptV3Feb1FeIaY1KLs+1muF3yYuy++J8VO/TmzE6l+q9mrmtVhohcLL2sXyntyG7+YCA4EH4/PVpiIAAAAASUVORK5CYII="></div>
                                                            </button>
                                                    @elseif($seat -> schedule_seat_status == 3)
                                                            <button type="submit" disabled  class="btn btn-none shadow-none col-12">
                                                                <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA5klEQVR4nO2UUQqCQBCGvUDFjM89dxNnRIggOl2Rs0ovIXSHukTP1WtBXaDYyAhyaVctivxgXkT/b/1x9LyGvwWmQRcUZ6DohIrPLqOfAaGFn1LPWYqK967CpxE66Cx7seKssvQu57mD2L1eY+1CR2txbW97m0ZsxJ/0W34SDkB4XaHiDcbBUGdZV53TmUVwDSghbY8DtBZBTBEo2oHQFiQMrx9awiNncRwMTXmF6BseT62vYcptV3Feb1FeIaY1KLs+1muF3yYuy++J8VO/TmzE6l+q9mrmtVhohcLL2sXyntyG7+YCA4EH4/PVpiIAAAAASUVORK5CYII="></div>
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
                                                        @elseif($seat -> schedule_seat_status == 2)
                                                                <button type="submit" class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADvElEQVR4nO1Z3WtUVxC/jfUtmsy5roovYgmKIIj4oKKlVpM7s7FSaBU/3vwPRPx4XB9EH/sRrR9JvDM3mkq0IKVQ+lToB5FCQUUfLBgFo4iiIFEx8WPLnN00UTfuPbs3d1PZgXlYdu+Z32/mN+fOOet5datb3epWt7rVrW7/Y/v1kw8N0yZg7ALGq4bxvmF6ZYTyibiuxXjfCF0xQp0mDL7UmIlyAMZthvFmYqDj+w2Q7JbqGfRtnmazkz6B/OvVwhNeLtdQMQ8jdKzmJGTU8bsKSeAXtQdPr7kv+Lm7pGrTE/l3S4wGFFtsHiDUXnPQMiGZwEVWx2sOWBLoFRD8q/aAqaQD44XYRBpPfzbLO758ut/VOs8ItoJQBzANpQ+ahjS2H9J6xaKYLLZqbHbvujmGqS81IoxnNGZFYJt78GNdAIRuG8ZhEBw0jN+D0Br7g7z3gWE8lAKJQxorFqYSc9TRMosfsbOPJTOJlWE8Y0m4YBq1sg+Mf9DzvEzYPncyegaYhkbl5IqpUDqXYGF2tT4HTIcTJyLUUTEmLaVjwF6bsShoS15a2FqoRgWYbBM5ZQ0HNVhha06WiK9bbGGycMekO4FTQMYXdqS2Iz6+TLAaL+0clcs1aAxHTMOq9TuuQWfIet9KQPBeUkSA6a6u2dhNGednixVx1WMeOJstNvz5BIn8UMXA2utpx7uevUHoG7u7RMFSHa0TkNV1iNqWFJKD37rJil6B4Cq7BSswx+w9niXZhV7C5vfgIhB84pjUr8dWyOUa3MngLYhoa9VDXHFIBQm2G8YfrcetBONXJc/yWiLDdDop3Tsm5lpjZ/tiP8quA6aojBRPmZBWls1QTYgI7rJ3ZkL/mKhtxbt+G7vU6RHAe3rZB4L9zV3t84HxUVH3a0DwrBG8VOruYEoRAaGDTULL9EbRcLBDj7BmrDq/6KWg3YpDWumHuHb8zjqliOjVDghKDMkNzu2jzJQlor0wMwpaQHD/hO8xpj/nRBsXgNC5iqQFjE9T6pMHPgefAuOBEpXobz6lfUN/v/HdiENF8HJKRPIQ4l4QOvl2NfCm7aG3qzQQn0jc01kCbsGO7Uw/Fe8ERvTzzM6NLYbxYckTYRzLREGL8yhdoTf2UUbPH/pmB8FV+jdCgRxd1P9jtE/GVeN5U/eGjzwX0xdUKtIS3KOJKwyLOHq++bmJNyyHMKA3Zq+dTiT+I8O0zwg+S0tmZkLHZ8C026t2Iq01Eb8HF3lJWLlAU33995EI/jFhIKbfJnd9/D3OIv8CqtwTGaSLUnQAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                        @elseif($seat -> schedule_seat_status == 3)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADvElEQVR4nO1Z3WtUVxC/jfUtmsy5roovYgmKIIj4oKKlVpM7s7FSaBU/3vwPRPx4XB9EH/sRrR9JvDM3mkq0IKVQ+lToB5FCQUUfLBgFo4iiIFEx8WPLnN00UTfuPbs3d1PZgXlYdu+Z32/mN+fOOet5datb3epWt7rVrW7/Y/v1kw8N0yZg7ALGq4bxvmF6ZYTyibiuxXjfCF0xQp0mDL7UmIlyAMZthvFmYqDj+w2Q7JbqGfRtnmazkz6B/OvVwhNeLtdQMQ8jdKzmJGTU8bsKSeAXtQdPr7kv+Lm7pGrTE/l3S4wGFFtsHiDUXnPQMiGZwEVWx2sOWBLoFRD8q/aAqaQD44XYRBpPfzbLO758ut/VOs8ItoJQBzANpQ+ahjS2H9J6xaKYLLZqbHbvujmGqS81IoxnNGZFYJt78GNdAIRuG8ZhEBw0jN+D0Br7g7z3gWE8lAKJQxorFqYSc9TRMosfsbOPJTOJlWE8Y0m4YBq1sg+Mf9DzvEzYPncyegaYhkbl5IqpUDqXYGF2tT4HTIcTJyLUUTEmLaVjwF6bsShoS15a2FqoRgWYbBM5ZQ0HNVhha06WiK9bbGGycMekO4FTQMYXdqS2Iz6+TLAaL+0clcs1aAxHTMOq9TuuQWfIet9KQPBeUkSA6a6u2dhNGednixVx1WMeOJstNvz5BIn8UMXA2utpx7uevUHoG7u7RMFSHa0TkNV1iNqWFJKD37rJil6B4Cq7BSswx+w9niXZhV7C5vfgIhB84pjUr8dWyOUa3MngLYhoa9VDXHFIBQm2G8YfrcetBONXJc/yWiLDdDop3Tsm5lpjZ/tiP8quA6aojBRPmZBWls1QTYgI7rJ3ZkL/mKhtxbt+G7vU6RHAe3rZB4L9zV3t84HxUVH3a0DwrBG8VOruYEoRAaGDTULL9EbRcLBDj7BmrDq/6KWg3YpDWumHuHb8zjqliOjVDghKDMkNzu2jzJQlor0wMwpaQHD/hO8xpj/nRBsXgNC5iqQFjE9T6pMHPgefAuOBEpXobz6lfUN/v/HdiENF8HJKRPIQ4l4QOvl2NfCm7aG3qzQQn0jc01kCbsGO7Uw/Fe8ERvTzzM6NLYbxYckTYRzLREGL8yhdoTf2UUbPH/pmB8FV+jdCgRxd1P9jtE/GVeN5U/eGjzwX0xdUKtIS3KOJKwyLOHq++bmJNyyHMKA3Zq+dTiT+I8O0zwg+S0tmZkLHZ8C026t2Iq01Eb8HF3lJWLlAU33995EI/jFhIKbfJnd9/D3OIv8CqtwTGaSLUnQAAAAASUVORK5CYII="></div>
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
                                                    @elseif($seat -> schedule_seat_status == 2)
                                                                <button type="submit" class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD6UlEQVR4nO2aX4hUdRTHf2qhke3M+c0sFRqKmhRk/wwqzbaH9Z4zs2pB7UtI9FRBQWkP/SPXh6AHn0J6sGzvOXfsoZEoCAv8gy/r1kuELyGE+hIEGrUS2G6kG+fOzuw0Obt37tw73o3fF36wc/fHuefzO7+/53eNcXJycnJycnJyus6yFVqZ5/LjVnAwfinfbarDSxpGTw7coM+6sRn6xEMrEgPNfToEVvCQFZpOpuDpRiMKnk7EJtNVYPyi72PPdkc7bRZZwa+Tg62VWeBk7QLTUfU5Ni/4HiXtVJrAM9H2YgNbxrcWGjAIvRk/woJ7Fx4w7nXAUWWZntEZcMFEWH31vacjA15L1qdHQPDbzAMzjauvJpKmzaKilNY3L+jglzbbCvXpv1dWh28CxhNZBQbB46v8gWWhzQr1hb43sRSltL6xXBUreHu7CALjZWB8UevlfFxtGacyB8w4lT9UXqX2QPAlEPqzXQ/o98u3aaXD8xj8G0ZLG0IHGY9kD5i+Ult5pnvV13nqf2aA8VIEo7tqDuK+zAEL7qsFg3ZFqD9hOlnbrNCe7AHTnk72DKYT4Hzg3WeFvgGmYzHL9yAodWD9OzxAMI3Hsae+aFdODTjLSge4OrwEhB6Le3btD7x1rY4WRwfvjGtPfTEjI4tTA7bsvdLVeKvt2t6pw1rBd7sdw4UAX04NGJI5TEw0umGUFSJh30wnRguMO7refDCNNwF/150tnMoHtD29MZxhOWBJoksLPpnUfjqRwjilwyy1CENKGZDMTlrggMlF2LouTQk1Ak6C4C/NOTZg+gMEd/+/xjDjRcul5zTNFK4UB3fcAkwvFKT0UPM6HHXbazIOPFHwvbtm3v2opnByfvl+/X1rsPVmEO/ZPNNOvf+qQeNHCxuY8e3wvYzvzT6jq5bxfWD6qcm/n2HUu0OjbwV/nw/4fFaBIdh6jyberOCVCI3zYa1x6PP2deicAfFen98YjdS6DI30ElgzpTmhByI1DtOXM72B5wjc7jAnralYy3TKCp5tLcD4IwTephA4KD8MTGeuVS+Nkq/gFvMBLbWCFyJAvzYb4f/YGtOJrqur1F5KD/lzw+LZ/urA8tgv6K8OLM99MrSmXdHPH0yP1T5/jpNF9jZqnWYfdRY3UaRXFZbxtwhj5g3TQ8GBwZwV/KEF9oqu0aHfjK+2zDu/RoM+sPHG5im/XdH1z/RY+g2HpnobsAE+r88LQekpK/RXS0DO/OsDmjkNM62d477pUv0m4noovCwT2p8Xb9vsZxk42RL5sfp9U0fSZaHg4xONW7gKPhh5bPRIeu9V9099jQXq5OTk5OTk5ORkutc/H+IWmsAjGBIAAAAASUVORK5CYII="></div>
                                                                </button> 
                                                    @elseif($seat -> schedule_seat_status == 3)
                                                                <button type="submit" disabled class="btn btn-none shadow-none col-12">
                                                                    <div class="col-12 text-center mb-5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD6UlEQVR4nO2aX4hUdRTHf2qhke3M+c0sFRqKmhRk/wwqzbaH9Z4zs2pB7UtI9FRBQWkP/SPXh6AHn0J6sGzvOXfsoZEoCAv8gy/r1kuELyGE+hIEGrUS2G6kG+fOzuw0Obt37tw73o3fF36wc/fHuefzO7+/53eNcXJycnJycnJyus6yFVqZ5/LjVnAwfinfbarDSxpGTw7coM+6sRn6xEMrEgPNfToEVvCQFZpOpuDpRiMKnk7EJtNVYPyi72PPdkc7bRZZwa+Tg62VWeBk7QLTUfU5Ni/4HiXtVJrAM9H2YgNbxrcWGjAIvRk/woJ7Fx4w7nXAUWWZntEZcMFEWH31vacjA15L1qdHQPDbzAMzjauvJpKmzaKilNY3L+jglzbbCvXpv1dWh28CxhNZBQbB46v8gWWhzQr1hb43sRSltL6xXBUreHu7CALjZWB8UevlfFxtGacyB8w4lT9UXqX2QPAlEPqzXQ/o98u3aaXD8xj8G0ZLG0IHGY9kD5i+Ult5pnvV13nqf2aA8VIEo7tqDuK+zAEL7qsFg3ZFqD9hOlnbrNCe7AHTnk72DKYT4Hzg3WeFvgGmYzHL9yAodWD9OzxAMI3Hsae+aFdODTjLSge4OrwEhB6Le3btD7x1rY4WRwfvjGtPfTEjI4tTA7bsvdLVeKvt2t6pw1rBd7sdw4UAX04NGJI5TEw0umGUFSJh30wnRguMO7refDCNNwF/150tnMoHtD29MZxhOWBJoksLPpnUfjqRwjilwyy1CENKGZDMTlrggMlF2LouTQk1Ak6C4C/NOTZg+gMEd/+/xjDjRcul5zTNFK4UB3fcAkwvFKT0UPM6HHXbazIOPFHwvbtm3v2opnByfvl+/X1rsPVmEO/ZPNNOvf+qQeNHCxuY8e3wvYzvzT6jq5bxfWD6qcm/n2HUu0OjbwV/nw/4fFaBIdh6jyberOCVCI3zYa1x6PP2deicAfFen98YjdS6DI30ElgzpTmhByI1DtOXM72B5wjc7jAnralYy3TKCp5tLcD4IwTephA4KD8MTGeuVS+Nkq/gFvMBLbWCFyJAvzYb4f/YGtOJrqur1F5KD/lzw+LZ/urA8tgv6K8OLM99MrSmXdHPH0yP1T5/jpNF9jZqnWYfdRY3UaRXFZbxtwhj5g3TQ8GBwZwV/KEF9oqu0aHfjK+2zDu/RoM+sPHG5im/XdH1z/RY+g2HpnobsAE+r88LQekpK/RXS0DO/OsDmjkNM62d477pUv0m4noovCwT2p8Xb9vsZxk42RL5sfp9U0fSZaHg4xONW7gKPhh5bPRIeu9V9099jQXq5OTk5OTk5ORkutc/H+IWmsAjGBIAAAAASUVORK5CYII="></div>
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
                            <div class="row col-2 mb-3">
                                <a href="{{route('detail',$schedule -> movie_id)}}" class="btn btn-danger mt-3">Back</a>
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
                                    @if($seat -> schedule_seat_status == 2)
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
                    <form role="form" method="post" action="{{route('bookTicket',['schedule_id' => $seat -> schedule_id])}}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger shadow-none">Booking</button>
                    </form>
                </div>
    </div>
                        <div class="row d-inline">
                            <div class="row mt-3 mx-5 d-inline">
                                <div class="d-inline" style="background-color: #E31313; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Maintenance seat</div>
                            </div>

                            <div class="row mt-3 mx-5 d-inline">
                                <div class="d-inline" style="background-color: white; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Available seat</div>
                            </div>

                            <div class="row mt-3 mx-5 d-inline">
                                <div class="d-inline" style="background-color: #40C057; width: 0.5vmax; height: 1.2vmax"></div>
                                <div class="d-inline text-light">Reserved seat</div>
                            </div>
                        </div>
                            
                            <div class="row d-inline mt-3">
                                <div class="row mt-3 mx-5 d-inline">
                                    <div class="d-inline text-center mb-5"><img style="width: 1.5vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAr0lEQVR4nO2QQQrCMBBFc4EWdO+6Z5FuCsVLSsE72Eu4rt0q6AWeBFIRaWxnmkKlecsh89/kGxNZLcAOqIAncuzOCcg00hvTudssidj+NBRHiVhTr4+HRByUKP5VdQIUwGVCww1Q2qzRVX8csHEBGulWIsqBFrgCezc7KMSlL68X9+B9tZulCnHiy+vle9s3H2Iob/liLf8nDo2J4o71Vm0CM0ZcA+cZxPUcuZFl8wJRIS97SX64DQAAAABJRU5ErkJggg=="></div>
                                    <div class="d-inline text-light">Normal seat</div>
                                </div>

                                <div class="row mt-3 mx-5 d-inline">
                                    <div class="d-inline text-center mb-5"><img style="width: 1.5vmax;" class="col-6 mx-auto" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3klEQVR4nO2ZS2xNQRjH+2AtoYIGi6ZRUY+VhJSVakKIRyXUVoSdZ1KxsusOVeq5IPFohERiZWHhkXhtPBMb9SoRxOaqaNGffPK/nFztvWfmnnvuIee3anpmvu/7z3wz883cioqUlJSUlJSUlH8XYBSwBjgBPAE+AENEh9kym4+B40Cr+YxaRBvwgvh5DqyNQkC1RqfcHAOqihFyhOTQ7StiNcljhU9KlWNNFKLXYnMRspTk0uIi5CjJpdtFyF2Sy20XITXAaKAWaAa6gEwZgs7I9yLFYjHVhBYygrgJwPkYRfSYT99gF8rAG2AA6APOAQv0vRLoiEFEh/kKE9NwddThAsYPqV1liWemRz5CxxQUUqjD745qP7FEayaTTSfXmLJT50KT+h0kerq8Y9JUunBWzhYTPc2y7R6TFpELfXJm22HU1Mq2e0zaCVz4biW16rEfRIfZqpZt8+HCgAl56+F0nEbuPdHxTjbHe/Tt88lHY4mcXiI6LhZRsP5aI00ed+9OOZ2j0rpYngEzZfOAY1+LfX52C+507PwZmOZVPuSvLBqAfsdY9gcNVHmIeQ2sK7qI+1OkLgPqgKnArZAzsW/Yu7xNEXCG8mD11WaVP4XWyWlgXpgRihsb3XrgAfBNZ9TLkRq7THUcPAVO6b6xHZgb+LYDWAXs1YPgteCZlSQhj4ApwDZgj3L9Ts7DnKVaO7AJmCVRiRNyFWjUE2mYtNsI7EqikGz6TAbuFSjrW3XWffIR8iUeLZwExuakVfCsatRsBOvBQRchD4mP6Xrdz2VIF7jc3avXRUjY21mxvAImBUqkj8D9wPc27Wx/3whDCqn3KKV9sINtvf62BwUTNQbYDXzVLwEbAu3tjKkLLURibG8vNZdVX7UAs/UwaKm0HJgBrAS2BNpvdRIRENOukSklF5Q+gzn/v6Kn237FsNNLRECMjVi5aShKREBMXpJu/78UcjOPn+sltn8jjJGfT8zJxA5Aeb8AAAAASUVORK5CYII="></div>
                                    <div class="d-inline text-light">Vip seat</div>
                                </div>

                                <div class="row mt-3 mx-5 d-inline">
                                    <div class="d-inline text-center mb-5"><img style="width: 2.5 vmax;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC8ElEQVR4nO2aPWgUQRiGV6OoJEZMpRhR/AkKGn/Bf0khYqFR0EpCsDKCAU0s/MPkCsEipdhYGbCRIAqigj9djDYiaUQQtREEFb0gGBX1kQ++k2G5bOZuZu82YR7YIrMf774vMzezO5MoCgQCgUAgEAhUGaAR2AnscrhWAjWG5jRtc9EUTwt8Bp0LXMcfw4b2sCfNv8AtoME17BTgHp4x9H3zQDy7BN6Tgqk0Awu7XQKfnYCBz7gEzk3AwLkQ2BbgkM6AXjH0fSNeD1oHLAawGXjq05Wh7ZMh8VrK8tMUW9C3AfV6fxbwOMOBHwEzVbNevZtZmv4vV8D8hB78DnRo3WLgZwYDi6dFqncMGE0YAfOkaGAcwd/AahW8m8HAd1SrWb0mcUMKRyxEu1S0L4OB+1Sry6I2H5WytgE9ZC9wTynvDFGJgdcA94GHZV7PgX4jcL9+QAyVqSdemlMLnGXS6uEaYLvDt+uyIkaXO+iJl6lpBu7E/U3ovBH2Au4cTzNwDnfyRmCbFcKrt6hE0VYPLx9DRuBnjlriZV9qgbNMCOxpSO/39T7tCfHSmloPk9IOSJYnrRzZIwROIsKO0MNV4AfwIbbH9g3onmy/4U9Au2wzqYfZwFFgY2wd7pwMgfPACn32Ft3CWat/1wKHgTY5/9K2qxM98Dl97kWjTYb0JeC10fYeWKi9/zVJMALeZTjwKtl4A/5Y1F5RjzcTat5KwSkLsV4V66WyyE7pOsva2+rxWkJNd2FPugN4Arwpcr0EtqrYJuDVGHVpXDuAGcBHi8AnjR6O6wzqRFf+UWolkY/8ccJKqDqXB9QBSxKuRq+J7DwNJKzPG7TG9FhrKyxHFV8shtDptEPGfM0BXsQ8yGTWrvdPxO59tgoNTI9N+WPRVomgMW8NutVbCHtE2w8Av2L+ZK6psRVemnDeNFI4iagGOgIvA3uNf8uQYW0yWDhvKgldFlqMbdH11r+NCiHnXoa/lrKCBgKBQCAQCAQid/4BnQc5hEvJvewAAAAASUVORK5CYII="></div>
                                    <div class="d-inline text-light">Couple seat</div>
                                </div>
                            </div>
    </div>
   
    
    <script src="/bootstrapLib/bootstrap.bundle.min.js"></script>

</body>

</html>
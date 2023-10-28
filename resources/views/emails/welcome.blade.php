<x-mail::message>
# NETFNIX QRCode

You need to store this QRCode.
  <div class="row">
                @foreach($info_ticket as $info_ticket)
                    <div class="col-sm-5 mx-auto">
                            <div class="card my-5 border-0" style="border-radius: 3vmax" >
                                <div class="card-header py-3 text-center bg-danger" style="border-radius: 3vmax 3vmax 0 0">
                                    <p class="fs-1 fw-bold">{{$info_ticket -> cus_name}}</p> 
                                    <h3>Netfnix QR Code </h3>
                                </div> 
                                @php
                                    $seats = $info_ticket -> number; 
                                     if($seats <= 12){
                                         $seats = 'A'.$seats;
                                     }elseif($seats <= 24){
                                         $seats = 'B'.($seats-12);
                                     }elseif($seats <= 36){
                                         $seats = 'C'.($seats-24);
                                     }elseif($seats <= 48){
                                         $seats = 'D'.($seats-36);
                                     }elseif($seats <= 60){
                                         $seats = 'E'.($seats-48);
                                     }elseif($seats <= 66){
                                         $seats = 'F'.($seats-60);
                                     }
                                @endphp
                                    <div class="card-body mx-auto py-5">
                                        {!! QrCode::size(350)->generate($info_ticket -> movie_name.
                                            "\n".$info_ticket -> room_name."\n".'Date: '.$info_ticket->date.
                                            "\n".'Start time: ' .$info_ticket->start_time.
                                            "\n".'End time: '.$info_ticket->end_time.
                                            "\n".'Seat: '.$seats.
                                            "\n".'Price: '.number_format($info_ticket->final_price).' VND') !!}
                                    </div> 
                            </div> 
                    </div>
                @endforeach
        </div>
<x-mail::button :url="'http://127.0.0.1:8000/'">
NETFNIX
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

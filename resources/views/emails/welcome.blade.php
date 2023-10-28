             
        
<x-mail::message>
   
# NETFNIX QRCode
<div>
    Dear {{$user -> name}}
    <br>
</div>
<div>
     @foreach($info_ticket as $info_ticket)
 <div>
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
                                    <br>
                                    # {{$seats}}
                                    <br>
                                {!! QrCode::size(350)->generate($info_ticket -> movie_name.
                                                "\n".$info_ticket -> room_name."\n".'Date: '.$info_ticket->date.
                                                "\n".'Start time: ' .$info_ticket->start_time.
                                                "\n".'End time: '.$info_ticket->end_time.
                                                "\n".'Seat: '.$seats.
                                                "\n".'Price: '.number_format($info_ticket->final_price).' VND') !!}
 </div>
 @endforeach  
</div>

<x-mail::button :url="'http://127.0.0.1:8000/'">
NETFNIX
</x-mail::button>

Thanks,<br>
{{ config('app.name') }} 
  
</x-mail::message>
 
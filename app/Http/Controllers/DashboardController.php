<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $now = Carbon::today();
        $now -> setTimezone('Asia/Ho_Chi_Minh');  
        $total_movies = Movie::count();
        $movie_showing = Movie::where('release_date','<=',$now)->where('end_date','>=',$now)->count();
        $movie_upcomming = Movie::where('release_date','>',$now)->count();
        $movie_ended = Movie::where('end_date','<',$now)->count();
        $total_user = Customer::count();
        $total_income = Ticket::sum('final_price');
        $tickets_sold = Ticket::count();
        $admin = Auth::guard('staff')->user();

        $month_income = Ticket::whereMonth('created_at', Carbon::now()->month)->sum('final_price');

        $month_year = Carbon::now()->format('Y/m');

        // for($i=1;$i<=12;$i++){
        //     $year_income = Ticket::whereMonth('created_at', $i)->sum('final_price');
        // }


        // $movie_income = Ticket::join('schedules','tickets.schedule_id','=','schedules.id')
        // ->join('movies','schedules.movie_id','=','movies.id')
        // ->where('movies.release_date','<=',$now)
        // ->where('movies.end_date','>=',$now)
        // ->get(['tickets.final_price','movies.movie_name','movies.poster_img']);
        // dd($movie_income);  

        // foreach($movie_income as $movie_income){
        //    $total_movie_income = $movie_income->sum('final_price');
        // }

        return view('admin.dashboard',[
            'total_movies'=>$total_movies,
            'movie_showing'=>$movie_showing,
            'movie_upcomming'=>$movie_upcomming,
            'movie_ended'=>$movie_ended,
            'total_user'=>$total_user,
            'total_income'=>$total_income,
            'tickets_sold'=>$tickets_sold,
            'admin'=>$admin,
            'month_income'=>$month_income,
            'month_year'=>$month_year,
            // 'year_income'=>$year_income,
            // 'movie_income'=>$movie_income,
            // 'total_movie_income'=>$total_movie_income,
        ]);
    }

}

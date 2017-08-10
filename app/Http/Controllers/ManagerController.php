<?php

namespace App\Http\Controllers;

use App\Funpacol\Repositories\CityRepo;
use App\Funpacol\Repositories\GodchidrenRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{

    protected $godfatherRepo;
    protected $cityRepo;
    public function __construct(GodchidrenRepo $godchidrenRepo, CityRepo $cityRepo)
    {
        $this->godfatherRepo = $godchidrenRepo;
        $this->cityRepo = $cityRepo;
    }

    public function home()
    {
        $dates = DB::table('godfathers')
            ->where('date_birthday', '=', Carbon::today())
            ->get();
        return view('home.index', compact('dates'));
    }

    public function dashboard()
    {
        return view('dashboard/dashboardHome');
    }

    public function icons()
    {
        return view('dashboard/icons');
    }

    public function maps()
    {
        return view('dashboard/maps');
    }

    public function notifications()
    {
        return view('dashboard/notifications');
    }

    public function table()
    {
        return view('dashboard/table');
    }

    public function template()
    {
        return view('dashboard/template');
    }

    public function typography()
    {
        return view('dashboard/typography');
    }

    public function upgrade()
    {
        return view('dashboard/upgrade');
    }

    public function users()
    {
        $cities = $this->cityRepo->cities();
        return view('dashboard/user', compact('cities'));

    }



    public function BirthdayGodchildrens()
    {

        $dates = DB::table('godchildrens')
            ->whereMonth('birth_date', '=' ,Carbon::now()->month )
            ->whereDay('birth_date', '=' ,Carbon::now()->day)
            ->get();
        return view('home/birthday_godchildrens', compact('dates'));

    }

    public function BirthdayEmployees()
    {
        $city = Auth::user()->city_id;
        $dates = DB::table('employees')
            ->whereMonth('date_birthday', '=' ,Carbon::now()->month )
            ->whereDay('date_birthday', '=' ,Carbon::now()->day)
            ->where('city_id', '=', $city)
            ->get();
        return view('home/birthday_employees', compact('dates'));
    }



    public function BirthdayGodfathers()
    {
        $city = Auth::user()->city_id;
        $dates = DB::table('godfathers')
            ->whereMonth('date_birthday', '=' ,Carbon::now()->month )
            ->whereDay('date_birthday', '=' ,Carbon::now()->day)
            ->where('city_id', '=', $city)
            ->get();


        return view('home/birthday_godfathers', compact('dates'));
    }
}

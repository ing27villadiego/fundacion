<?php

namespace App\Http\Controllers;


use App\Funpacol\Repositories\EmployeeRepo;
use Illuminate\Support\Facades\Auth;


class PostmenController extends Controller
{

    protected $employeeRepo;


    public function __construct(EmployeeRepo $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;

    }

    public function index()
    {
        $city = Auth::user()->city_id;
        $postmens = $this->employeeRepo->All()->where('position_id', '=', 3)->where('city_id', '=', $city);
        return view('postmens/index', compact('postmens'));

    }



    public function postmenShow($id)
    {
        dd($id);
    }


}

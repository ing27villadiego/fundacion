<?php

namespace App\Http\Controllers;


use App\Funpacol\Repositories\EmployeeRepo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PromoterController extends Controller
{


    protected $employeeRepo;

    public function __construct(EmployeeRepo $employeeRepo)
    {

        $this->employeeRepo = $employeeRepo;
    }

    public function prueba()
    {
        $promoters = $this->employeeRepo->All();

        return response()->json([$promoters], 200);
    }

    public function index()
    {
        $city = Auth::user()->city_id;
        $promoters = $this->employeeRepo->All()->where('position_id', '=', 1)->where('city_id', '=', $city);

        return view('promoters/index', compact('promoters'));
    }


    public function promoterShow($id)
    {
        $city = Auth::user()->city_id;
        $godfathers = DB::table('godfathers')->where('promoter_id', '=', $id)
            ->where('city_id', '=', $city)
            ->get();
        $promoter = $this->employeeRepo->edit($id);

        return view('promoters/show', compact('godfathers', 'promoter'));
    }

}

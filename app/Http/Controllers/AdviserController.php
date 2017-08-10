<?php

namespace App\Http\Controllers;



use App\Funpacol\Repositories\AdviserRepo;
use App\Funpacol\Repositories\EmployeeRepo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdviserController extends Controller
{
    protected $adviserRepo;
    protected $employeeRepo;

    public function __construct(AdviserRepo $adviserRepo,EmployeeRepo $employeeRepo)
    {
        $this->adviserRepo = $adviserRepo;
        $this->employeeRepo = $employeeRepo;
    }

    public function index()
    {
        $city = Auth::user()->city_id;
        $advisers = $this->employeeRepo->All()->where('position_id', '=', 2)->where('city_id', '=', $city);

        return view('advisers/index', compact('advisers'));
    }


    public function adviserShow($id)
    {
        $city = Auth::user()->city_id;
        $godfathers = DB::table('godfathers')->where('adviser_id', '=', $id)
            ->where('city_id', '=', $city)
            ->get();
        $adviser = $this->employeeRepo->edit($id);
        return view('advisers/show', compact('godfathers', 'adviser'));
    }




}

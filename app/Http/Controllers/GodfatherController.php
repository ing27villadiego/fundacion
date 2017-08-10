<?php

namespace App\Http\Controllers;


use App\Funpacol\Entities\City;
use App\Funpacol\Entities\Godchildren;
use App\Funpacol\Managers\GodfatherManager;
use App\Funpacol\Managers\UpdateGodfatherManager;
use App\Funpacol\Repositories\AdviserRepo;
use App\Funpacol\Repositories\CityRepo;
use App\Funpacol\Repositories\DocumentRepo;
use App\Funpacol\Repositories\EmployeeRepo;
use App\Funpacol\Repositories\GodchidrenRepo;
use App\Funpacol\Repositories\GodfatherRepo;
use App\Funpacol\Repositories\PaymentperiodRepo;
use App\Funpacol\Repositories\PaymenttypeRepo;
use App\Funpacol\Repositories\PromoterRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class GodfatherController extends Controller {

    protected $godfatherRepo;
    protected $cityRepo;
    protected $godchildrenRepo;
    protected $documentRepo;
    protected $paymenttypeRepo;
    protected $paymentperiodRepo;
    protected $adviserRepo;
    protected $promoterRepo;
    protected $employeeRepo;

    public function __construct(GodfatherRepo $godfatherRepo,
                                CityRepo $cityRepo,
                                EmployeeRepo $employeeRepo,
                                GodchidrenRepo $godchidrenRepo,
                                DocumentRepo $documentRepo,
                                PaymentperiodRepo $paymentperiodRepo,
                                PaymenttypeRepo $paymenttypeRepo,
                                AdviserRepo $adviserRepo,
                                PromoterRepo $promoterRepo)
    {
        $this->godfatherRepo = $godfatherRepo;
        $this->cityRepo = $cityRepo;
        $this->godchildrenRepo = $godchidrenRepo;
        $this->documentRepo = $documentRepo;
        $this->paymentperiodRepo = $paymentperiodRepo;
        $this->paymenttypeRepo = $paymenttypeRepo;
        $this->adviserRepo = $adviserRepo;
        $this->promoterRepo = $promoterRepo;
        $this->employeeRepo = $employeeRepo;

    }


    public function index()
    {
        $city = Auth::user()->city_id;
        $godfathers = $this->godfatherRepo->All()->where('city_id', '=', $city);
        return view('godfathers/index', compact('godfathers'));
    }



    public function godfatherCreate()
    {
        $city = Auth::user()->city_id;
        $letter = $this->cityRepo->edit($city);
        $godchildrens = $this->godchildrenRepo->AllTodo();
        $paymentperiods = $this->paymentperiodRepo->All()->pluck('name', 'id');
        $paymenttypes = $this->paymenttypeRepo->All()->pluck('name', 'id');
        $documents = $this->documentRepo->All()->pluck('name', 'id');
        $advisers = $this->employeeRepo->AllAdviser();
        $promoters = $this->employeeRepo->AllPromoter();
        return view('godfathers/create', compact('documents', 'letter','advisers', 'promoters', 'godchildrens', 'paymentperiods', 'paymenttypes'));
    }

    public function godfatherStore()
    {
        $godfather = $this->godfatherRepo->newGodfather();
        $manager = new GodfatherManager($godfather, Input::all());

        dd($manager);


        if ($manager->save())
        {
            return Redirect::route('godfathers');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }



    public function godfatherEdit($id)
    {

        $godfather = $this->godfatherRepo->edit($id);
        $cities = $this->cityRepo->cities();
        $godchildrens = $this->godchildrenRepo->All()->pluck('first_name', 'id');
        $documents = $this->documentRepo->All()->pluck('name', 'id');
        $paymentperiods = $this->paymentperiodRepo->All()->pluck('name', 'id');
        $paymenttypes = $this->paymenttypeRepo->All()->pluck('name', 'id');
        $advisers = $this->employeeRepo->AllAdviser();
        $promoters = $this->employeeRepo->AllPromoter();
        return view('godfathers/edit', compact('godfather', 'cities',
            'godchildrens',
            'documents',
            'paymenttypes',
            'paymentperiods',
            'advisers',
            'promoters'));
    }

    public function godfatherUpdate($id)
    {
        $godfather = $this->godfatherRepo->update($id);

        $manager = new UpdateGodfatherManager($godfather, Input::all());

        if ($manager->save())
        {
            return Redirect::route('godfathers');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function godfatherShow($id)
    {
        $godfather = $this->godfatherRepo->edit($id);
        return view('godfathers/show', compact('godfather'));
    }

}

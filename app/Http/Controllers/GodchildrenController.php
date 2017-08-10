<?php

namespace App\Http\Controllers;


use App\Funpacol\Managers\GodchildrenManager;
use App\Funpacol\Managers\UpdateGodchildrenManager;
use App\Funpacol\Repositories\CityRepo;
use App\Funpacol\Repositories\DatafamilyRepo;
use App\Funpacol\Repositories\DocumentRepo;
use App\Funpacol\Repositories\GodchidrenRepo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class GodchildrenController extends Controller {


    protected $godchildrenRepo;
    protected $cityRepo;
    protected $documentRepo;
    protected $datafamilyRepo;


    public function __construct(GodchidrenRepo $godchidrenRepo,
                                CityRepo $cityRepo,
                                DocumentRepo $documentRepo,
                                DatafamilyRepo $datafamilyRepo)
    {
        $this->godchildrenRepo = $godchidrenRepo;
        $this->documentRepo = $documentRepo;
        $this->cityRepo = $cityRepo;
        $this->datafamilyRepo = $datafamilyRepo;
    }

    public function index()
    {
        $godchildrens = $this->godchildrenRepo->All();
        return view('godchildrens/index', compact('godchildrens'));

    }

    public function godchildrenCreate()
    {
        $cities = $this->cityRepo->cities();
        $documents = $this->documentRepo->All()->pluck('name', 'id');
        $datafamilies = $this->datafamilyRepo->All()->pluck('first_name', 'id');
        return view('godchildrens/create', compact('cities', 'documents', 'datafamilies'));
    }

    public function godchildrenStore()
    {
        $godchildren = $this->godchildrenRepo->newGodchildren();
        $manager = new GodchildrenManager($godchildren, Input::all());

        if ($manager->save())
        {
            return Redirect::route('godchildrens');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function godchildrenEdit($id)
    {
        $godchildren = $this->godchildrenRepo->edit($id);
        $cities = $this->cityRepo->cities();
        $documents = $this->documentRepo->All()->pluck('name' , 'id');
        $datafamilies = $this->datafamilyRepo->All()->pluck('first_name', 'id');
        return view('godchildrens/edit', compact('cities', 'documents', 'godchildren', 'datafamilies'));
    }

    public function godchildrenUpdate($id)
    {
        $godchildren = $this->godchildrenRepo->update($id);

        $manager = new UpdateGodchildrenManager($godchildren, Input::all());

        if ($manager->save())
        {
            return Redirect::route('godchildrens');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function godchildrenShow($id)
    {
        $city = Auth::user()->city_id;
        $godchildren = $this->godchildrenRepo->edit($id);
        $godfathers = DB::table('godfathers')
            ->where('godchildren_id', '=', $id)
            ->where('city_id', '=', $city)
            ->get();

        return view('godchildrens/show',compact('godfathers', 'godchildren'));
    }


}

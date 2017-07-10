<?php

namespace App\Http\Controllers;

use App\Funpacol\Managers\CityManager;
use App\Funpacol\Managers\UpdateCityManager;
use App\Funpacol\Repositories\CityRepo;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class CitiesController extends Controller {


    protected $cityRepo;
    public function __construct(CityRepo $cityRepo)
    {
        $this->cityRepo = $cityRepo;
    }
    public function index()
    {
        $cities = $this->cityRepo->All();
        return view('cities/index', compact('cities'));
    }
    public function cityCreate()
    {
        $city = $this->cityRepo->newCity();
        $manager = new CityManager($city, Input::all());
        if ($manager->save())
        {
            return Redirect::route('cities');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function cityEdit($id)
    {
        $city = $this->cityRepo->edit($id);
        return view('cities/edit', compact('city'));
    }

    public function updateCity($id)
    {

        $city = $this->cityRepo->update($id);

        $manager = new UpdateCityManager($city, Input::all());

        if ($manager->save())
        {
            return Redirect::route('cities');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

}

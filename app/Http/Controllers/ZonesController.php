<?php

namespace App\Http\Controllers;

use App\Funpacol\Managers\ZoneManager;
use App\Funpacol\Repositories\CityRepo;
use App\Funpacol\Repositories\ZoneRepo;
use App\Funpacol\Managers\UpdateZoneManager;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class ZonesController extends Controller
{
    protected $zoneRepo;
    protected $cityRepo;

    public function __construct(ZoneRepo $zoneRepo,
                                CityRepo $cityRepo)
    {

        $this->zoneRepo = $zoneRepo;
        $this->cityRepo = $cityRepo;

    }

    public function index()
    {
        $cities = $this->cityRepo->All()->pluck('name','id')->where('state', 1);
        $zones = $this->zoneRepo->All();

        return view('zones/index', compact('zones', 'cities'));
    }

    public function zoneCreate()
    {

        $zone = $this->zoneRepo->newZone();
        $manager = new ZoneManager($zone, Input::all());
        if ($manager->save())
        {
            return Redirect::route('zones');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors()->whith('success', 'Zona creada con exito !'));

    }

    public function zoneEdit($id)
    {
        $zone = $this->zoneRepo->edit($id);
        $cities = $this->cityRepo->All()->pluck('name','id');
        return view('zones/edit', compact('zone', 'cities'));
    }

    public function updateZone($id)
    {

        $zone = $this->zoneRepo->update($id);

        $manager = new UpdateZoneManager($zone, Input::all());

        if ($manager->save())
        {
            return Redirect::route('zones');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }



}

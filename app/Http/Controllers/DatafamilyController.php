<?php

namespace App\Http\Controllers;


use App\Funpacol\Managers\DatafamilyManager;
use App\Funpacol\Managers\UpdateDatafamilyManager;
use App\Funpacol\Repositories\CityRepo;
use App\Funpacol\Repositories\DatafamilyRepo;
use App\Funpacol\Repositories\DocumentRepo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class DatafamilyController extends Controller
{

    protected $datafamilyRepo;
    protected $cityRepo;
    protected $documentRepo;

    public function __construct(DatafamilyRepo $datafamilyRepo,
                                DocumentRepo $documentRepo,
                                CityRepo $cityRepo)
    {

        $this->cityRepo = $cityRepo;
        $this->documentRepo = $documentRepo;
        $this->datafamilyRepo = $datafamilyRepo;


    }

    public function index()
    {
        $datafamilies = $this->datafamilyRepo->All();
        return view('datafamilies/index', compact('datafamilies'));
    }


    public function datafamilyStore()
    {
        $cities = $this->cityRepo->cities();
        $documents = $this->documentRepo->All()->pluck('name', 'id');

        return view('datafamilies/create', compact('cities', 'documents'));
    }

    public function datafamilyCreate()
    {
        $datafamily = $this->datafamilyRepo->newDatafamily();
        $manager = new DatafamilyManager($datafamily, Input::all());

        if ($manager->save())
        {
            return Redirect::route('datafamilies');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }


    public function datafamilyEdit($id)
    {
        $datafamily = $this->datafamilyRepo->edit($id);
        $cities = $this->cityRepo->cities();
        $documents = $this->documentRepo->All()->pluck('name', 'id');
        return view('datafamilies/edit', compact('datafamily', 'cities', 'documents'));
    }



    public function datafamilyUpdate($id)
    {
        $datafamily = $this->datafamilyRepo->update($id);

        $manager = new UpdateDatafamilyManager($datafamily, Input::all());

        if ($manager->save())
        {
            return Redirect::route('datafamilies');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }


}

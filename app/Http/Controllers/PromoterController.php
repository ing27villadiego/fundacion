<?php

namespace App\Http\Controllers;


use App\Funpacol\Managers\PromoterManager;
use App\Funpacol\Repositories\CityRepo;
use App\Funpacol\Repositories\DocumentRepo;
use App\Funpacol\Repositories\PromoterRepo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PromoterController extends Controller
{

    protected $promoterRepo;
    protected $documentRepo;
    protected $cityRepo;

    public function __construct(PromoterRepo $promoterRepo,
                                DocumentRepo $documentRepo,
                                CityRepo $cityRepo)
    {
        $this->promoterRepo = $promoterRepo;
        $this->documentRepo = $documentRepo;
        $this->cityRepo = $cityRepo;
    }

    public function index()
    {
        $promoters = $this->promoterRepo->All();
        return view('promoters.index', compact('promoters'));
    }

    public function create()
    {
        $documents = $this->documentRepo->All()->pluck('name','id');
        $cities = $this->cityRepo->All()->pluck('name', 'id');
        return view('promoters.create', compact('documents', 'cities'));
    }

    public function promoterCreate()
    {

        $promoter = $this->promoterRepo->newPromoter();
        $manager = new PromoterManager($promoter, Input::all());
        if ($manager->save())
        {
            return Redirect::route('promoters');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

}

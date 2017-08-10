<?php

namespace App\Http\Controllers\Admin;

use App\Funpacol\Repositories\GodfatherRepo;
use App\Http\Controllers\Controller;

class GodfathersController extends Controller {

    protected $godfatherRepo;

    public function __construct(GodfatherRepo $godfatherRepo)
    {
        $this->godfatherRepo = $godfatherRepo;
    }

    public function index()
    {
        $godfathers = $this->godfatherRepo->All();
        return view('dashboard/godfathers/index', compact('godfathers'));
    }
}

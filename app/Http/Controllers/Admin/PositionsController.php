<?php

namespace App\Http\Controllers\Admin;

use App\Funpacol\Repositories\PositionRepo;
use App\Http\Controllers\Controller;

class PositionsController extends Controller {

    protected $positionRepo;

    public function __construct(PositionRepo $positionRepo)
    {
        $this->positionRepo = $positionRepo;
    }

    public function index()
    {
        $positions = $this->positionRepo->All();

        return view('dashboard/positions/index', compact('positions'));
    }

}

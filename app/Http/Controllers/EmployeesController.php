<?php

namespace App\Http\Controllers;


use App\Funpacol\Managers\EmployeeManager;
use App\Funpacol\Managers\UpdateEmployeeManager;
use App\Funpacol\Repositories\DocumentRepo;
use App\Funpacol\Repositories\EmployeeRepo;
use App\Funpacol\Repositories\PositionRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EmployeesController extends Controller {

    protected $employeeRepo;
    protected $positionRepo;
    protected $documentRepo;

    public function __construct(EmployeeRepo $employeeRepo,
                                DocumentRepo $documentRepo,
                                PositionRepo $positionRepo )
    {
        $this->employeeRepo = $employeeRepo;
        $this->positionRepo = $positionRepo;
        $this->documentRepo = $documentRepo;
    }


    public function index()
    {

        $city = Auth::user()->city_id;
        $employees = $this->employeeRepo->All()->where('city_id', '=', $city);
        return view('employees/index', compact('employees'));
    }

    public function employeeCreate()
    {
        $documents = $this->documentRepo->All()->pluck('name', 'id');
        $positions = $this->positionRepo->All()->pluck('name', 'id');
        return view('employees/create', compact('positions', 'documents'));
    }

    public function employeeStore()
    {
        $employee = $this->employeeRepo->newEmployee();
        $manager = new EmployeeManager($employee, Input::all());

        if ($manager->save())
        {
            return Redirect::route('employees');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function employeeEdit($id)
    {
        $documents = $this->documentRepo->All()->pluck('name', 'id');
        $positions = $this->positionRepo->All()->pluck('name', 'id');
        $employee = $this->employeeRepo->edit($id);
        return view('employees/edit', compact('employee', 'documents', 'positions'));
    }

    public function employeeUpdate($id)
    {
        $employee = $this->employeeRepo->update($id);

        $manager = new UpdateEmployeeManager($employee, Input::all());

        if ($manager->save())
        {
            return Redirect::route('employees');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }


}

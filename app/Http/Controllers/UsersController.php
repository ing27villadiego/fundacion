<?php

namespace App\Http\Controllers;

use App\Funpacol\Repositories\CityRepo;
use App\Funpacol\Repositories\UserRepo;
use App\Funpacol\Managers\UserManager;
use App\Funpacol\Managers\UpdateUserManager;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class UsersController extends Controller
{

    protected $userRepo;
    protected $cityRepo;

    public function __construct(UserRepo $userRepo,
                                CityRepo $cityRepo)
    {
        $this->userRepo = $userRepo;
        $this->cityRepo = $cityRepo;
    }

    public function index ()
    {
        $users = $this->userRepo->All();

        return view('dashboard/users/index', compact('users'));
    }

    public function userCreate()
    {

        $cities = $this->cityRepo->cities();

        return view('dashboard/users/create', compact('cities'));
    }

    public function createUser()
    {

        $user = $this->userRepo->newUser();
        $manager = new UserManager($user, Input::all());

        if ($manager->save())
        {
            return Redirect::route('dashboard_users');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());

    }

    public function userEdit($id)
    {
        $cities = $this->cityRepo->All()->pluck('name','id');
        $user = $this->userRepo->edit($id);
        return view('dashboard/users/edit', compact('cities', 'user'));
    }

    public function updateUser($id)
    {

        $user = $this->userRepo->update($id);

        $manager = new UpdateUserManager($user, Input::all());

        if ($manager->save())
        {
            return Redirect::route('dashboard_users');
        }
        return Redirect::back()->withInput()->withErrors($manager->getErrors());
    }

    public function deleteUser($id)
    {
        dd('eliminar usuario'.$id);
    }

}

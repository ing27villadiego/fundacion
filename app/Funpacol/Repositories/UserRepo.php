<?php namespace App\Funpacol\Repositories;

/**
 * Created by PhpStorm.
 * User: ing26sistemas
 * Date: 19/05/17
 * Time: 12:06 PM
 */


use App\Funpacol\Entities\User;

use Sentinel;

class UserRepo extends BaseRepo {

    public function getModel()
    {
        return new User;
    }


    public function storeLogin($request)
    {
        return Sentinel::registerAndActivate($request->all());
    }

    public function login($request)
    {
        return Sentinel::authenticate($request->all());
    }

}
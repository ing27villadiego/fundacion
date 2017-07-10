<?php namespace App\Funpacol\Repositories;

/**
 * Created by PhpStorm.
 * User: ing26sistemas
 * Date: 19/05/17
 * Time: 11:50 AM
 */

use App\Funpacol\Entities\City;


abstract class BaseRepo {


    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public function cities()
    {

        return City::orderBy('name', 'DESC')->pluck('name','id');

    }

    public function All()
    {
        return $this->model->all();
    }

    public function edit($id)
    {
        return $this->model->find($id);
    }

    public function update($id)
    {
        return $this->model->find($id);
    }





}
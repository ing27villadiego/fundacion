<?php
/**
 * Created by PhpStorm.
 * User: ing26sistemas
 * Date: 2/06/17
 * Time: 2:25 PM
 */

namespace App\Funpacol\Repositories;


use App\Funpacol\Entities\Promoter;

class PromoterRepo extends BaseRepo {

    public function getModel()
    {
        return new Promoter();
    }

    public function newPromoter()
    {
        $promoter = new Promoter();
        $promoter->state = 1;
        return $promoter;
    }

}
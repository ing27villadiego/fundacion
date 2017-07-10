<?php
/**
 * Created by PhpStorm.
 * User: ing26sistemas
 * Date: 27/05/17
 * Time: 9:08 AM
 */

namespace App\Funpacol\Repositories;
use App\Funpacol\Entities\Post;


class PostRepo extends BaseRepo {

    public function getModel()
    {
       return new Post;
    }

}
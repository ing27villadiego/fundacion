<?php
/**
 * Created by PhpStorm.
 * User: ing26sistemas
 * Date: 2/06/17
 * Time: 6:20 PM
 */

namespace App\Funpacol\Managers;


class PromoterManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'first_name' => 'required|max:150',
            'last_name' => 'required|max:150',
            'document' => 'max:15',
            'address'=> 'max:15',
            'cell_phone'=> 'max:15',
            'email'=> 'max:30'

        ];
        return $rules;

    }

}
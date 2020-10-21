<?php


namespace App\Http\Controllers;


use App\Veicles;

class VeiclesController extends BaseController
{
    public function __construct()
    {
        $this->class = Veicles::class;

    }

}

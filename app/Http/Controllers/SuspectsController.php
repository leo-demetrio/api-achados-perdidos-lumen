<?php


namespace App\Http\Controllers;


use App\Suspects;

class SuspectsController extends BaseController
{
    public function __construct()
    {
        $this->class = Suspects::class;

    }
}

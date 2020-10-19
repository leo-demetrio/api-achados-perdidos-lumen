<?php


namespace App\Http\Controllers;


use App\Suspects;

class SuspectsController extends Controller
{
    public function index()
    {
        echo "suspects";
        var_dump(Suspects::all());

    }
}

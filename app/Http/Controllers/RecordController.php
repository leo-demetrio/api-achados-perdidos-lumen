<?php


namespace App\Http\Controllers;

use App\Record;



class RecordController extends BaseController
{
    public function __construct()
    {
        $this->class = Record::class;
    }
}

<?php


namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class RecordController extends BaseController
{
    public function __construct()
    {
        $this->class = Record::class;
    }
}

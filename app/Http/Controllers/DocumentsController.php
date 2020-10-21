<?php


namespace App\Http\Controllers;
use App\Documents;

class DocumentsController extends BaseController
{
    public function __construct()
    {
        $this->class = Documents::class;

    }

}

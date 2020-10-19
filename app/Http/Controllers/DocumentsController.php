<?php


namespace App\Http\Controllers;
use App\Documents;

class DocumentsController extends Controller
{
    public function index()
    {
        echo "documents";
        var_dump(Documents::all());

    }

}

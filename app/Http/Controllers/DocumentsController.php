<?php


namespace App\Http\Controllers;

use App\Documents;
use Illuminate\Http\Request;

class DocumentsController extends BaseController
{
    public function __construct()
    {
        $this->class = Documents::class;

    }
    public function storeDoc(int $id_record)
    {
        $docs = Documents::query()->where('record_id',$id_record)->get();
        return $docs;

    }
    public function store(Request $r)
    {

        $this->class::create([

            "record_id" => $r->record_id,
            "number_doc" => $r->number_doc,
            "type_doc" => $r->type_doc,
            "date_loss" =>  $r->date_loss,
            "name_doc" => $r->name_doc,
            "situation" => $r->situation

        ]);
        return  response()->json($this->class::all(), 201);
    }

}

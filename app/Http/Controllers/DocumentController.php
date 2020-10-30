<?php


namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends BaseController
{
    public function __construct()
    {
        $this->class = Document::class;

    }
    public function storeDoc(int $id_record)
    {
        $docs = Document::query()->where('record_id',$id_record)->get();
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
    public function indexDoc(int $recordId)
    {
        $document = Document::query()->where('record_id', $recordId)->get();

        if(empty($document)){
            return response()->json('Não encotramos os recursos',404);
        }
        return response()->json($document, 200);
    }

}

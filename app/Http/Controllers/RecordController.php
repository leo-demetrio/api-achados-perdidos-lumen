<?php


namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class RecordController extends Controller
{
    public function index()
    {
        return Record::all();

    }
    public function show(int $id): JsonResponse
    {
        echo 'registro ';
        $rc = Record::find($id);

        is_null($rc) ? $status = 204 : $status = 201;

        return new JsonResponse($rc,$status);

    }
    public function store(Request $r): JsonResponse
    {
        Record::create($r->all());

        return new JsonResponse(Record::all(),201);
    }
    public function update(int $id, Request $r): JsonResponse
    {
        $rc = Record::find($id);
        if(is_null($rc)){
          return response()->json(["erro" => "Erro registro não encontrado"],404);
        }
        $rc->fill($r->all());
        $rc->save();

        return new JsonResponse($rc,200);
    }

    public function destroy(int $id)
    {
        $qtdRecRem = Record::destroy($id);
        if ($qdRecRem === 0) {
            return response()->json(
                ['erro' => 'Recurso não encontrado'],
                404
            );
        }
        return new Json('',204);


    }

}

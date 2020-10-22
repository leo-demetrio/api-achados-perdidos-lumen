<?php


namespace App\Http\Controllers;



use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class BaseController extends  Controller
{
    protected $class;

    public function index()
    {
        return $this->class::paginate();

    }

    public function show(int $id): JsonResponse
    {

        $rc = $this->class::find($id);

        is_null($rc) ? $status = 204 : $status = 201;

        return new JsonResponse($rc, $status);

    }

    public function store(Request $r)
    {
        //return "ok";exit;
        return response()->json($this->class::create($r->all()));
        //return  response()->json($this->class::all(), 201);
    }

    public function update(int $id, Request $r): JsonResponse
    {
        $rc = $this->class::find($id);
        if (is_null($rc)) {
            return response()->json(["erro" => "Erro registro não encontrado"], 404);
        }
        $rc->fill($r->all());
        $rc->save();

        return new JsonResponse($rc, 200);
    }

    public function destroy(int $id)
    {
        //devolve numero de recursos removidos
        $qtdRemove = $this->class::destroy($id);
        if ($qtdRemove === 0) {
            return response()->json(
                ['erro' => 'Recurso não encontrado'],
                404
            );
        }
        return new JsonResponse('', 204);


    }
}

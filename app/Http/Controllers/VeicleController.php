<?php


namespace App\Http\Controllers;


use App\Veicle;

class VeicleController extends BaseController
{
    public function __construct()
    {
        $this->class = Veicle::class;

    }
    public function indexVeicles(int $recordId)
    {
        $veicles = Veicle::query()->where('record_id', $recordId)->get();
        if(empty($veicles)){
            return response()->json('Recursos não encontrados', 404);
        }
        return response()->json($veicles, 200);
    }

}

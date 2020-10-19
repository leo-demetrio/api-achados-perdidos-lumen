<?php


namespace App\Http\Controllers;



use App\RecordComplete;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;


class RecordCompleteController extends Controller
{
    public function index()
    {
        echo 'registro completo';
        return
        return new JsonResponse(RecordComplete::all(),200);

    }
    public function show(int $id)
    {
        echo 'registro completo';
        $rc = RecordComplete::find($id);
        return new JsonResponse($rc,201);

    }
    public function store(Request $r): JsonResponse
    {
        $re = RecordComplete::create([
            'name' => $r->name,
            'tel' => $r->tel,
            'tel' => $r->tel_rec
        ]);
        return new JsonResponse($re,201);
    }

}

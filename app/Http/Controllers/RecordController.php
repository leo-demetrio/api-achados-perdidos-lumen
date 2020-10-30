<?php


namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RecordController extends BaseController
{
    public function __construct()
    {
        $this->class = Record::class;
    }
    public function generateRegister(Request $request)
    {

        $record = $this->validate($request, [
           'email' => 'required | email',
           'password' => 'required',
           'ip' => 'required'
        ]);
        //var_dump($record);exit;
        $recordPasswordHash = Hash::make($record['password']);

        //return
        $record = Record::create([
           'email' => $record['email'],
           'password' => $recordPasswordHash,
            'ip' => $record['ip']
        ]);
        //verificação
        return response()->json($record,200);
        //var_dump($return);

    }
}

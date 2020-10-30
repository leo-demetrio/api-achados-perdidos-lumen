<?php


namespace App\Http\Controllers;


use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Record;

class GenerateTokenController extends Controller
{
    public function generateToken(Request $request)
    {

        $this->validate(
            $request, [
                'email' => 'required | email',
                'password' => 'required'
            ]
        );

        $record = Record::where('email', $request->email)->first();

        $returnCheck = Hash::check($request->password, $record->password);
        //var_dump($returnCheck);exit;
        if( is_null($record) || !$returnCheck ){
            return response()->json('Não foi encontrado nenhum registro',401);
        }
        //echo "passou";exit;
        $passworBanck = $record->password;
        $token = JWT::encode(['password' => $passworBanck], env('Key_AuthServiceProvider'));
        return $token;
    }

}

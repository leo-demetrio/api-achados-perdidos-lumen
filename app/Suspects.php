<?php


namespace App;




use Illuminate\Database\Eloquent\Model;

class Suspects extends Model
{
    protected $table = 'suspects';
    protected $primaryKey = 'id_sus';
    protected $fillable = [
        'record_id','model','board','ip'
    ];

}

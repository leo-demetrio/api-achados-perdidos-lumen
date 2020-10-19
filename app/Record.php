<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';
    protected $primaryKey = 'id_record';
    protected $fillable = ['email','password','ip'];

    public function recordComplete()
    {
        return $this->hasOne(RecordComplete::class,'record_id','id_record');
    }
    public function documents()
    {
        return $this->hasMany(Documents::class);
    }
    public function veicles()
    {
        return $this->hasMany(Veicles::class);
    }



}
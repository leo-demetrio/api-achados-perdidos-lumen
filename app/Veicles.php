<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Veicles extends Model
{
    protected $table = 'veicles';
    protected $primaryKey = 'id_vei';
    protected $fillable = [
        'board','model','color','date_occurrence','name_owner','situation'
    ];

    public function record()
    {
        return $this->belongsTo(Record::class);

    }

}

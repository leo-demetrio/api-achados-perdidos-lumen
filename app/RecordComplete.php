<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class RecordComplete extends Model
{
    protected $table = 'record_complete';
    protected $primaryKey = 'id_rc';
    protected $fillable = ['name','tel','tel_rec'];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

}

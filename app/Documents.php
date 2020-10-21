<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id_doc';
    protected $fillable = ['record_id','number_doc','type_doc','date_loss','name_doc','situation'];

    public function registro()
    {
        return $this->belongsTo(Record::class);
    }

}

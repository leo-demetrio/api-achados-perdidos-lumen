<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id_doc';
    protected $fillable = [
        'record_id','number_doc','type_doc','date_loss','name_doc','situation'
    ];
    protected $appends = ['links'];

    public function registro()
    {
        return $this->belongsTo(Record::class);
    }
    public function getLinksAttribute(): array
    {
        return [ 'documents' => '/api/registro/' . $this->record_id . '/documentos'];
    }

}

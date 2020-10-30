<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Veicle extends Model
{
    protected $table = 'veicles';
    protected $primaryKey = 'id_vei';
    protected $fillable = [
        'record_id','board','model','color','date_occurrence','name_owner','situation'
    ];
    protected $appends = ['links'];

    public function record()
    {
        return $this->belongsTo(Record::class);

    }
    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/veiculos/' . $this->id_vei,
            'veicles' => '/api/registro/'. $this->record_id . '/veiculos'];
    }

}

<?php

// app/Models/SampleDetail.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SampleDetail extends Model
{
    protected $table = 'sample_details';
    protected $primaryKey = 'id';
    protected $fillable = [
    'sample_identification_no',
	'date_of_collection',
	'time_of_collection',
	'temperature_upon_collection',
	'sample_type_or_outlet',
	'location_details',
	'sender_initials',
	'additional_information',
	'created_at',
	'updated_at',
	'deleted_at',
    'category_id',
    ];
    


    public function sample()
    {
        return $this->belongsTo(Sample::class,'sample_id', 'doc_code');
    }
}

<?php
// app/Models/Sample.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sample extends Model
{
    use SoftDeletes;
    protected $table = 'samples';
    protected $primaryKey = 'doc_code';
    protected $fillable = [
    'doc_code',
    'sample_category',
    'revison',
	'prepared_by',
	'approved_by',
	'received_package_condition',
	'type_of_sampling',
	'date_and_time_of_sample_received',
	'temperature_observed_when_received',
	'verified_by',
	'created_at',
	'updated_at',
	'deleted_at',
    'category_id',
    ];


    public function sampleDetails()
    {
        return $this->hasMany(SampleDetail::class, 'sample_id', 'doc_code');
    }
}

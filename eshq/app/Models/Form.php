<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'form_type',
        'form_data',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'form_data' => 'array',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->name = $model->generateName();
        });
    }

    public function generateName()
    {
        return $this->form_type . '_' . now()->format('YmdHis');
    }
}
